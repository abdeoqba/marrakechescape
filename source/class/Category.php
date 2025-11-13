<?php 

      class Category{

        private $cn;

        public $id_category;
        public $parent_id;
        public $id_image;
        
        public $categorys = array();
        public $assoc_categorys = array();
        
        public $category;
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
              $this->delete($obj["id_category"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_category"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_category"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_category){
          $this->id_category = $id_category;

          $query = "SELECT * FROM `category` WHERE `id_category` = ".$this->id_category;
          $result = $this->cn->requete($query);

          if($category = $result->fetch())
            $this->set($category);
        }

        public function set($category){
          if(isset($category["deleted_at"]))
            $this->deleted_at = $category["deleted_at"];
          
              $this->id_category = (isset($category["id_category"]) and !empty($category["id_category"]) )?$category["id_category"]:0;
          
              $this->parent_id = (isset($category["parent_id"]) and !empty($category["parent_id"]) )?$category["parent_id"]:0;
          
              if($this->get_obj and isset($category["parent_id"])){
                $this->category = new Category();
                $this->category->get($this->parent_id);
              }
          
              $this->id_image = (isset($category["id_image"]) and !empty($category["id_image"]) )?$category["id_image"]:0;
          
              if($this->get_obj and isset($category["id_image"])){
                $this->image = new Image();
                $this->image->get($this->id_image);
              }
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllCategory($page = 1, $id_image = 0){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `category` WHERE `deleted_at` IS NULL";
            
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
          $requete = "SELECT * FROM `category`";

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
            $requete .= " ORDER BY `id_category` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($category = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $c = new Category($this->get_obj);
              $c->set($category);
              $c->clean();
              array_push($this->categorys, $c);
            // }else{
            //   array_push($this->assoc_categorys, $category);
            // }
          }
        }
        
        public function getNbrCategory(){
          $requete = "SELECT count(*) AS counter FROM `category` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($category = $result->fetch()){
            $this->counter = $category["counter"];
          }
        }

        public function getNbrDeletedCategory(){
          $requete = "SELECT count(*) AS trash_counter FROM `category` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($category = $result->fetch()){
            $this->trash_counter = $category["trash_counter"];
          }
        }

        public function getAllDeletedCategory($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `category` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `category` WHERE `deleted_at` IS NOT NULL ORDER BY `id_category` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($category = $result->fetch()){
            $c = new Category($this->get_obj);
            $c->set($category);
            array_push($this->categorys, $c);
          }
        }

        
        public function add($category){
          $this->set($category);
          
            $requete = "INSERT `category`(`parent_id`,`id_image`) values($this->parent_id,$this->id_image);";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($category){
          $this->set($category);
          
          $requete = "UPDATE `category` SET `parent_id` = $this->parent_id,`id_image` = $this->id_image WHERE `id_category` = $this->id_category";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `category`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_category){
          $requete = "UPDATE `category` SET deleted_at = NOW() WHERE id_category = $id_category;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_category){
          $requete = "DELETE FROM `category` WHERE `id_category` = $id_category;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_category){
          $requete = "UPDATE `category` SET deleted_at = NULL WHERE `id_category` = $id_category;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `category` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `category` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Category","id_category");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Category");
        }

        public function clean(){
          
          unset($this->categorys);
          unset($this->assoc_categorys);

          unset($this->trash_counter);
          unset($this->deleted_at);
          unset($this->toast);
          unset($this->history);

          unset($this->offset);
          unset($this->nbr_pages);
          unset($this->nbr_total_articles);
          unset($this->page);
          unset($this->counter);
          unset($this->cn);
        }


        public function secure($string){
          return str_replace("'","’",$string);
        }

      }

    ?>