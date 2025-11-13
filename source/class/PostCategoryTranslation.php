<?php 

      class PostCategoryTranslation{

        private $cn;

        public $id_post_category_translation;
        public $id_post_category;
        public $language;
        public $title;
        public $description;
        
        public $post_category_translations = array();
        public $assoc_post_category_translations = array();
        
        public $post_category;

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
              $this->delete($obj["id_post_category_translation"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_post_category_translation"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_post_category_translation"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_post_category_translation){
          $this->id_post_category_translation = $id_post_category_translation;

          $query = "SELECT * FROM `post_category_translation` WHERE `id_post_category_translation` = ".$this->id_post_category_translation;
          $result = $this->cn->requete($query);

          if($post_category_translation = $result->fetch())
            $this->set($post_category_translation);
        }

        public function set($post_category_translation){
          if(isset($post_category_translation["deleted_at"]))
            $this->deleted_at = $post_category_translation["deleted_at"];
          
              $this->id_post_category_translation = (isset($post_category_translation["id_post_category_translation"]) and !empty($post_category_translation["id_post_category_translation"]) )?$post_category_translation["id_post_category_translation"]:0;
          
              $this->id_post_category = (isset($post_category_translation["id_post_category"]) and !empty($post_category_translation["id_post_category"]) )?$post_category_translation["id_post_category"]:0;
          
              if($this->get_obj and isset($post_category_translation["id_post_category"])){
                $this->post_category = new PostCategory();
                $this->post_category->get($this->id_post_category);
              }
          
              $this->language = (isset($post_category_translation["language"]))?trim($this->secure($post_category_translation["language"])):"";
          
              $this->title = (isset($post_category_translation["title"]))?trim($this->secure($post_category_translation["title"])):"";
          
              $this->description = (isset($post_category_translation["description"]))?trim($this->secure($post_category_translation["description"])):"";
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllPostCategoryTranslation($page = 1, $id_post_category = 0){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `post_category_translation` WHERE `deleted_at` IS NULL";
            
        if ($id_post_category != 0)
              $requete .= " AND `id_post_category` = ".$id_post_category;
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


          
        if ($id_post_category != 0)
              $requete .= " AND `id_post_category` = ".$id_post_category;
          //products per page
          $requete = "SELECT * FROM `post_category_translation`";

          if ($this->page > 0 or $id_post_category != 0 ){

            $requete .= " WHERE ";

            if ($this->page > 0) {

              $requete .= "`deleted_at` IS NULL";

              if ($id_post_category != 0)
                $requete .= " AND ";
              
            }

            if ($id_post_category != 0)
              $requete .= "`id_post_category` = ".$id_post_category;
            

          }
          
          if ($id_post_category != 0)
            $requete .= " ORDER BY `id_post_category` ASC";
          else
            $requete .= " ORDER BY `id_post_category_translation` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($post_category_translation = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $p = new PostCategoryTranslation($this->get_obj);
              $p->set($post_category_translation);
              $p->clean();
              array_push($this->post_category_translations, $p);
            // }else{
            //   array_push($this->assoc_post_category_translations, $post_category_translation);
            // }
          }
        }
        
        public function getNbrPostCategoryTranslation(){
          $requete = "SELECT count(*) AS counter FROM `post_category_translation` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($post_category_translation = $result->fetch()){
            $this->counter = $post_category_translation["counter"];
          }
        }

        public function getNbrDeletedPostCategoryTranslation(){
          $requete = "SELECT count(*) AS trash_counter FROM `post_category_translation` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($post_category_translation = $result->fetch()){
            $this->trash_counter = $post_category_translation["trash_counter"];
          }
        }

        public function getAllDeletedPostCategoryTranslation($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `post_category_translation` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `post_category_translation` WHERE `deleted_at` IS NOT NULL ORDER BY `id_post_category_translation` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($post_category_translation = $result->fetch()){
            $p = new PostCategoryTranslation($this->get_obj);
            $p->set($post_category_translation);
            array_push($this->post_category_translations, $p);
          }
        }

        
        public function add($post_category_translation){
          $this->set($post_category_translation);
          
            $requete = "INSERT `post_category_translation`(`id_post_category`,`language`,`title`,`description`) values($this->id_post_category,'$this->language','$this->title','$this->description');";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($post_category_translation){
          $this->set($post_category_translation);
          
          $requete = "UPDATE `post_category_translation` SET `id_post_category` = $this->id_post_category,`language` = '$this->language',`title` = '$this->title',`description` = '$this->description' WHERE `id_post_category_translation` = $this->id_post_category_translation";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `post_category_translation`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_post_category_translation){
          $requete = "UPDATE `post_category_translation` SET deleted_at = NOW() WHERE id_post_category_translation = $id_post_category_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_post_category_translation){
          $requete = "DELETE FROM `post_category_translation` WHERE `id_post_category_translation` = $id_post_category_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_post_category_translation){
          $requete = "UPDATE `post_category_translation` SET deleted_at = NULL WHERE `id_post_category_translation` = $id_post_category_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `post_category_translation` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `post_category_translation` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Post Category Translation","id_post_category_translation");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Post Category Translation");
        }

        public function clean(){
          
          unset($this->post_category_translations);
          unset($this->assoc_post_category_translations);

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