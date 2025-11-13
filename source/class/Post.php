<?php 

      class Post{

        private $cn;

        public $id_post;
        public $id_post_category;
        public $id_image;
        public $published_at;
        public $status;
        
        public $posts = array();
        public $assoc_posts = array();
        
        public $post_category;
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
              $this->delete($obj["id_post"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_post"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_post"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_post){
          $this->id_post = $id_post;

          $query = "SELECT * FROM `post` WHERE `id_post` = ".$this->id_post;
          $result = $this->cn->requete($query);

          if($post = $result->fetch())
            $this->set($post);
        }

        public function set($post){
          if(isset($post["deleted_at"]))
            $this->deleted_at = $post["deleted_at"];
          
              $this->id_post = (isset($post["id_post"]) and !empty($post["id_post"]) )?$post["id_post"]:0;
          
              $this->id_post_category = (isset($post["id_post_category"]) and !empty($post["id_post_category"]) )?$post["id_post_category"]:0;
          
              if($this->get_obj and isset($post["id_post_category"])){
                $this->post_category = new PostCategory();
                $this->post_category->get($this->id_post_category);
              }
          
              $this->id_image = (isset($post["id_image"]) and !empty($post["id_image"]) )?$post["id_image"]:0;
          
              if($this->get_obj and isset($post["id_image"])){
                $this->image = new Image();
                $this->image->get($this->id_image);
              }
          
              if(isset($post["published_at"]))
                $this->published_at = $post["published_at"];
          
              $this->status = (isset($post["status"]))?trim($this->secure($post["status"])):"";
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllPost($page = 1, $id_image = 0){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `post` WHERE `deleted_at` IS NULL";
            
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
          $requete = "SELECT * FROM `post`";

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
            $requete .= " ORDER BY `id_post` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($post = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $p = new Post($this->get_obj);
              $p->set($post);
              $p->clean();
              array_push($this->posts, $p);
            // }else{
            //   array_push($this->assoc_posts, $post);
            // }
          }
        }
        
        public function getNbrPost(){
          $requete = "SELECT count(*) AS counter FROM `post` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($post = $result->fetch()){
            $this->counter = $post["counter"];
          }
        }

        public function getNbrDeletedPost(){
          $requete = "SELECT count(*) AS trash_counter FROM `post` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($post = $result->fetch()){
            $this->trash_counter = $post["trash_counter"];
          }
        }

        public function getAllDeletedPost($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `post` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `post` WHERE `deleted_at` IS NOT NULL ORDER BY `id_post` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($post = $result->fetch()){
            $p = new Post($this->get_obj);
            $p->set($post);
            array_push($this->posts, $p);
          }
        }

        
        public function add($post){
          $this->set($post);
          
            $requete = "INSERT `post`(`id_post_category`,`id_image`,`published_at`,`status`) values($this->id_post_category,$this->id_image,'$this->published_at','$this->status');";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($post){
          $this->set($post);
          
          $requete = "UPDATE `post` SET `id_post_category` = $this->id_post_category,`id_image` = $this->id_image,`published_at` = '$this->published_at',`status` = '$this->status' WHERE `id_post` = $this->id_post";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `post`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_post){
          $requete = "UPDATE `post` SET deleted_at = NOW() WHERE id_post = $id_post;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_post){
          $requete = "DELETE FROM `post` WHERE `id_post` = $id_post;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_post){
          $requete = "UPDATE `post` SET deleted_at = NULL WHERE `id_post` = $id_post;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `post` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `post` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Post","id_post");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Post");
        }

        public function clean(){
          
          unset($this->posts);
          unset($this->assoc_posts);

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