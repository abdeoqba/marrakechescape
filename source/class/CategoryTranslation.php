<?php 

      class CategoryTranslation{

        private $cn;

        public $id_category_translation;
        public $id_category;
        public $language;
        public $title;
        public $description;
        public $content;
        
        public $category_translations = array();
        public $assoc_category_translations = array();
        
        public $category;

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
              $this->delete($obj["id_category_translation"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_category_translation"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_category_translation"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_category_translation){
          $this->id_category_translation = $id_category_translation;

          $query = "SELECT * FROM `category_translation` WHERE `id_category_translation` = ".$this->id_category_translation;
          $result = $this->cn->requete($query);

          if($category_translation = $result->fetch())
            $this->set($category_translation);
        }

        public function set($category_translation){
          if(isset($category_translation["deleted_at"]))
            $this->deleted_at = $category_translation["deleted_at"];
          
              $this->id_category_translation = (isset($category_translation["id_category_translation"]) and !empty($category_translation["id_category_translation"]) )?$category_translation["id_category_translation"]:0;
          
              $this->id_category = (isset($category_translation["id_category"]) and !empty($category_translation["id_category"]) )?$category_translation["id_category"]:0;
          
              if($this->get_obj and isset($category_translation["id_category"])){
                $this->category = new Category();
                $this->category->get($this->id_category);
              }
          
              $this->language = (isset($category_translation["language"]))?trim($this->secure($category_translation["language"])):"";
          
              $this->title = (isset($category_translation["title"]))?trim($this->secure($category_translation["title"])):"";
          
              $this->description = (isset($category_translation["description"]))?trim($this->secure($category_translation["description"])):"";
          
              $this->content = (isset($category_translation["content"]))?trim($this->secure($category_translation["content"])):"";
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllCategoryTranslation($page = 1, $id_category = 0){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `category_translation` WHERE `deleted_at` IS NULL";
            
        if ($id_category != 0)
              $requete .= " AND `id_category` = ".$id_category;
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


          
        if ($id_category != 0)
              $requete .= " AND `id_category` = ".$id_category;
          //products per page
          $requete = "SELECT * FROM `category_translation`";

          if ($this->page > 0 or $id_category != 0 ){

            $requete .= " WHERE ";

            if ($this->page > 0) {

              $requete .= "`deleted_at` IS NULL";

              if ($id_category != 0)
                $requete .= " AND ";
              
            }

            if ($id_category != 0)
              $requete .= "`id_category` = ".$id_category;
            

          }
          
          if ($id_category != 0)
            $requete .= " ORDER BY `id_category` ASC";
          else
            $requete .= " ORDER BY `id_category_translation` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($category_translation = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $c = new CategoryTranslation($this->get_obj);
              $c->set($category_translation);
              $c->clean();
              array_push($this->category_translations, $c);
            // }else{
            //   array_push($this->assoc_category_translations, $category_translation);
            // }
          }
        }
        
        public function getNbrCategoryTranslation(){
          $requete = "SELECT count(*) AS counter FROM `category_translation` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($category_translation = $result->fetch()){
            $this->counter = $category_translation["counter"];
          }
        }

        public function getNbrDeletedCategoryTranslation(){
          $requete = "SELECT count(*) AS trash_counter FROM `category_translation` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($category_translation = $result->fetch()){
            $this->trash_counter = $category_translation["trash_counter"];
          }
        }

        public function getAllDeletedCategoryTranslation($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `category_translation` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `category_translation` WHERE `deleted_at` IS NOT NULL ORDER BY `id_category_translation` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($category_translation = $result->fetch()){
            $c = new CategoryTranslation($this->get_obj);
            $c->set($category_translation);
            array_push($this->category_translations, $c);
          }
        }

        
        public function add($category_translation){
          $this->set($category_translation);
          
              $this->content = nl2br($this->content);
          
            $requete = "INSERT `category_translation`(`id_category`,`language`,`title`,`description`,`content`) values($this->id_category,'$this->language','$this->title','$this->description','$this->content');";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($category_translation){
          $this->set($category_translation);
          
              $this->content = nl2br($category_translation["content"]);
          
          $requete = "UPDATE `category_translation` SET `id_category` = $this->id_category,`language` = '$this->language',`title` = '$this->title',`description` = '$this->description',`content` = '$this->content' WHERE `id_category_translation` = $this->id_category_translation";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `category_translation`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_category_translation){
          $requete = "UPDATE `category_translation` SET deleted_at = NOW() WHERE id_category_translation = $id_category_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_category_translation){
          $requete = "DELETE FROM `category_translation` WHERE `id_category_translation` = $id_category_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_category_translation){
          $requete = "UPDATE `category_translation` SET deleted_at = NULL WHERE `id_category_translation` = $id_category_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `category_translation` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `category_translation` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Category Translation","id_category_translation");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Category Translation");
        }

        public function clean(){
          
          unset($this->category_translations);
          unset($this->assoc_category_translations);

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