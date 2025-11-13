<?php 

      class Image{

        private $cn;

        public $id_image;
        public $photo_file;
        public $alt_text;
        
        public $images = array();
        public $assoc_images = array();
        

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

            case "update_photo_file":
              $this->update_photo_file($obj);
              break;
              

            case "update":
              $this->update($obj);
              break;

            case "delete":
              $this->delete($obj["id_image"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_image"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_image"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_image){
          $this->id_image = $id_image;

          $query = "SELECT * FROM `image` WHERE `id_image` = ".$this->id_image;
          $result = $this->cn->requete($query);

          if($image = $result->fetch())
            $this->set($image);
        }

        public function set($image){
          if(isset($image["deleted_at"]))
            $this->deleted_at = $image["deleted_at"];
          
              $this->id_image = (isset($image["id_image"]) and !empty($image["id_image"]) )?$image["id_image"]:0;
          
              if(isset($image["photo_file"]))
                $this->photo_file = $image["photo_file"];
              if(empty($this->photo_file))
                $this->photo_file = "asset/image/sample.jpg";
          
              $this->alt_text = (isset($image["alt_text"]))?trim($this->secure($image["alt_text"])):"";
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllImage($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `image` WHERE `deleted_at` IS NULL";
            
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


          
          //products per page
          $requete = "SELECT * FROM `image`";

          //if ($this->page > 0) 
            $requete .= " WHERE `deleted_at` IS NULL";

          $requete .= " ORDER BY `id_image` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($image = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $i = new Image($this->get_obj);
              $i->set($image);
              $i->clean();
              array_push($this->images, $i);
            // }else{
            //   array_push($this->assoc_images, $image);
            // }
          }
        }
        
        public function getNbrImage(){
          $requete = "SELECT count(*) AS counter FROM `image` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($image = $result->fetch()){
            $this->counter = $image["counter"];
          }
        }

        public function getNbrDeletedImage(){
          $requete = "SELECT count(*) AS trash_counter FROM `image` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($image = $result->fetch()){
            $this->trash_counter = $image["trash_counter"];
          }
        }

        public function getAllDeletedImage($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `image` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `image` WHERE `deleted_at` IS NOT NULL ORDER BY `id_image` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($image = $result->fetch()){
            $i = new Image($this->get_obj);
            $i->set($image);
            array_push($this->images, $i);
          }
        }

        
        public function add($image){
          $this->set($image);
          
            $requete = "INSERT `image`(`photo_file`,`alt_text`) values('$this->photo_file','$this->alt_text');";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($image){
          $this->set($image);
          
          $requete = "UPDATE `image` SET `alt_text` = '$this->alt_text' WHERE `id_image` = $this->id_image";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }


            public function update_photo_file($image){
              $this->set($image);
              $requete = "UPDATE `image` SET `photo_file` = '$this->photo_file' WHERE `id_image` = $this->id_image";

              if(variables::$sql_query_debug)
                echo $requete;
            
              $this->cn->modifier($requete);
            }


        public function truncate(){
          $requete = "TRUNCATE TABLE `image`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_image){
          $requete = "UPDATE `image` SET deleted_at = NOW() WHERE id_image = $id_image;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_image){
          $requete = "DELETE FROM `image` WHERE `id_image` = $id_image;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_image){
          $requete = "UPDATE `image` SET deleted_at = NULL WHERE `id_image` = $id_image;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `image` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `image` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Image","id_image");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Image");
        }

        public function clean(){
          
          unset($this->images);
          unset($this->assoc_images);

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