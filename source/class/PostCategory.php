<?php 

      class PostCategory{

        private $cn;

        public $id_post_category;
        public $id_image;
        
        public $post_categorys = array();
        public $assoc_post_categorys = array();
        
        public $image;

        public $offset;
        public $nbr_pages;
        public $nbr_total_articles;
        public $page;

        public $trash_counter;
        public $counter;
        public $deleted_at;
        public $toast;
        public $history;
        private $get_obj;

        public function __construct($get_obj = true){
          $this->get_obj = $get_obj;
          $this->cn = new GestionConnexion();

          if($get_obj)
            $this->history = new cg_history();
        }

        public function do_action($action, $obj){
          
          switch ($action) {
            case "add":
              $this->add($obj);
              break;


            case "update":
              $this->update($obj);
              break;

            case "delete":
              $this->delete($obj["id_post_category"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_post_category"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_post_category"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_post_category){
          $this->id_post_category = $id_post_category;

          $query = "SELECT * FROM `post_category` WHERE `id_post_category` = ".$this->id_post_category;
          $result = $this->cn->requete($query);

          if($post_category = $result->fetch())
            $this->set($post_category);
        }

        public function set($post_category){
          if(isset($post_category["deleted_at"]))
            $this->deleted_at = $post_category["deleted_at"];
          
              $this->id_post_category = (isset($post_category["id_post_category"]) and !empty($post_category["id_post_category"]) )?$post_category["id_post_category"]:0;
          
              $this->id_image = (isset($post_category["id_image"]) and !empty($post_category["id_image"]) )?$post_category["id_image"]:0;
          
              if($this->get_obj and isset($post_category["id_image"])){
                $this->image = new Image();
                $this->image->get($this->id_image);
              }
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllPostCategory($page = 1, $id_image = 0){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `post_category` WHERE `deleted_at` IS NULL";
            
        if ($id_image != 0)
              $requete .= " AND `id_image` = ".$id_image;
            $result = $this->cn->requete($requete);

            if ($article = $result->fetch()) {
              $this->nbr_total_articles = $article["nbr_total_articles"];
              //number of pages for this category
              if($this->nbr_total_articles>0){
                if($this->nbr_total_articles>variables::$nbr_article_per_page)
                  $this->nbr_pages = ceil($this->nbr_total_articles/variables::$nbr_article_per_page);
                else
                  $this->nbr_pages = 1;
              }
              else 
                $this->nbr_pages = 0;
              //It is used to specify the offset of the first row to be returned
              $this->offset = (variables::$nbr_article_per_page * ($this->page - 1));
            }
          }


          
        if ($id_image != 0)
              $requete .= " AND `id_image` = ".$id_image;
          //products per page
          $requete = "SELECT * FROM `post_category`";

          if ($this->page > 0 or $id_image != 0 ){

            $requete .= " WHERE ";

            if ($this->page > 0) {

              $requete .= "`deleted_at` IS NULL";

              if ($id_image != 0)
                $requete .= " AND ";
              
            }

            if ($id_image != 0)
              $requete .= "`id_image` = ".$id_image;
            

          }
          
          if ($id_image != 0)
            $requete .= " ORDER BY `id_image` ASC";
          else
            $requete .= " ORDER BY `id_post_category` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($post_category = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $p = new PostCategory($this->get_obj);
              $p->set($post_category);
              $p->clean();
              array_push($this->post_categorys, $p);
            // }else{
            //   array_push($this->assoc_post_categorys, $post_category);
            // }
          }
        }
        
        public function getNbrPostCategory(){
          $requete = "SELECT count(*) AS counter FROM `post_category` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($post_category = $result->fetch()){
            $this->counter = $post_category["counter"];
          }
        }

        public function getNbrDeletedPostCategory(){
          $requete = "SELECT count(*) AS trash_counter FROM `post_category` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($post_category = $result->fetch()){
            $this->trash_counter = $post_category["trash_counter"];
          }
        }

        public function getAllDeletedPostCategory($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `post_category` WHERE `deleted_at` IS NOT NULL";
            $result = $this->cn->requete($requete);

            if ($article = $result->fetch()) {
              $this->nbr_total_articles = $article["nbr_total_articles"];
              //number of pages for this category
              if($this->nbr_total_articles>0)
                $this->nbr_pages = ceil($this->nbr_total_articles/variables::$nbr_article_per_page)+1;
              else 
                $this->nbr_pages = 0;
              //It is used to specify the offset of the first row to be returned
              $this->offset = (variables::$nbr_article_per_page * ($this->page - 1));
            }
          }

          //products per page
          $requete = "SELECT * FROM `post_category` WHERE `deleted_at` IS NOT NULL ORDER BY `id_post_category` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($post_category = $result->fetch()){
            $p = new PostCategory($this->get_obj);
            $p->set($post_category);
            array_push($this->post_categorys, $p);
          }
        }

        
        public function add($post_category){
          $this->set($post_category);
          
            $requete = "INSERT `post_category`(`id_image`) values($this->id_image);";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($post_category){
          $this->set($post_category);
          
          $requete = "UPDATE `post_category` SET `id_image` = $this->id_image WHERE `id_post_category` = $this->id_post_category";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `post_category`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_post_category){
          $requete = "UPDATE `post_category` SET deleted_at = NOW() WHERE id_post_category = $id_post_category;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_post_category){
          $requete = "DELETE FROM `post_category` WHERE `id_post_category` = $id_post_category;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_post_category){
          $requete = "UPDATE `post_category` SET deleted_at = NULL WHERE `id_post_category` = $id_post_category;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `post_category` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `post_category` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Post Category","id_post_category");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Post Category");
        }

        public function clean(){
          
          unset($this->post_categorys);
          unset($this->assoc_post_categorys);

          unset($this->trash_counter);
          unset($this->deleted_at);
          unset($this->toast);
          unset($this->history);

          unset($this->offset);
          unset($this->nbr_pages);
          unset($this->nbr_total_articles);
          unset($this->page);
          unset($this->counter);
        }


        public function secure($string){
          return str_replace("'","’",$string);
        }

      }

    ?>