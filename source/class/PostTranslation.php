<?php 

      class PostTranslation{

        private $cn;

        public $id_post_translation;
        public $id_post;
        public $language;
        public $title;
        public $slug;
        public $content;
        public $meta_title;
        public $meta_description;
        public $excerpt;
        
        public $post_translations = array();
        public $assoc_post_translations = array();
        
        public $post;

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
              $this->delete($obj["id_post_translation"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_post_translation"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_post_translation"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_post_translation){
          $this->id_post_translation = $id_post_translation;

          $query = "SELECT * FROM `post_translation` WHERE `id_post_translation` = ".$this->id_post_translation;
          $result = $this->cn->requete($query);

          if($post_translation = $result->fetch())
            $this->set($post_translation);
        }

        public function set($post_translation){
          if(isset($post_translation["deleted_at"]))
            $this->deleted_at = $post_translation["deleted_at"];
          
              $this->id_post_translation = (isset($post_translation["id_post_translation"]) and !empty($post_translation["id_post_translation"]) )?$post_translation["id_post_translation"]:0;
          
              $this->id_post = (isset($post_translation["id_post"]) and !empty($post_translation["id_post"]) )?$post_translation["id_post"]:0;
          
              if($this->get_obj and isset($post_translation["id_post"])){
                $this->post = new Post();
                $this->post->get($this->id_post);
              }
          
              $this->language = (isset($post_translation["language"]))?trim($this->secure($post_translation["language"])):"";
          
              $this->title = (isset($post_translation["title"]))?trim($this->secure($post_translation["title"])):"";
          
              $this->slug = (isset($post_translation["slug"]))?trim($this->secure($post_translation["slug"])):"";
          
              $this->content = (isset($post_translation["content"]))?trim($this->secure($post_translation["content"])):"";
          
              $this->meta_title = (isset($post_translation["meta_title"]))?trim($this->secure($post_translation["meta_title"])):"";
          
              $this->meta_description = (isset($post_translation["meta_description"]))?trim($this->secure($post_translation["meta_description"])):"";
          
              $this->excerpt = (isset($post_translation["excerpt"]))?trim($this->secure($post_translation["excerpt"])):"";
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllPostTranslation($page = 1, $id_post = 0){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `post_translation` WHERE `deleted_at` IS NULL";
            
        if ($id_post != 0)
              $requete .= " AND `id_post` = ".$id_post;
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


          
        if ($id_post != 0)
              $requete .= " AND `id_post` = ".$id_post;
          //products per page
          $requete = "SELECT * FROM `post_translation`";

          if ($this->page > 0 or $id_post != 0 ){

            $requete .= " WHERE ";

            if ($this->page > 0) {

              $requete .= "`deleted_at` IS NULL";

              if ($id_post != 0)
                $requete .= " AND ";
              
            }

            if ($id_post != 0)
              $requete .= "`id_post` = ".$id_post;
            

          }
          
          if ($id_post != 0)
            $requete .= " ORDER BY `id_post` ASC";
          else
            $requete .= " ORDER BY `id_post_translation` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($post_translation = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $p = new PostTranslation($this->get_obj);
              $p->set($post_translation);
              $p->clean();
              array_push($this->post_translations, $p);
            // }else{
            //   array_push($this->assoc_post_translations, $post_translation);
            // }
          }
        }
        
        public function getNbrPostTranslation(){
          $requete = "SELECT count(*) AS counter FROM `post_translation` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($post_translation = $result->fetch()){
            $this->counter = $post_translation["counter"];
          }
        }

        public function getNbrDeletedPostTranslation(){
          $requete = "SELECT count(*) AS trash_counter FROM `post_translation` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($post_translation = $result->fetch()){
            $this->trash_counter = $post_translation["trash_counter"];
          }
        }

        public function getAllDeletedPostTranslation($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `post_translation` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `post_translation` WHERE `deleted_at` IS NOT NULL ORDER BY `id_post_translation` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($post_translation = $result->fetch()){
            $p = new PostTranslation($this->get_obj);
            $p->set($post_translation);
            array_push($this->post_translations, $p);
          }
        }

        
        public function add($post_translation){
          $this->set($post_translation);
          
              $this->content = nl2br($this->content);
          
            $requete = "INSERT `post_translation`(`id_post`,`language`,`title`,`slug`,`content`,`meta_title`,`meta_description`,`excerpt`) values($this->id_post,'$this->language','$this->title','$this->slug','$this->content','$this->meta_title','$this->meta_description','$this->excerpt');";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($post_translation){
          $this->set($post_translation);
          
              $this->content = nl2br($post_translation["content"]);
          
          $requete = "UPDATE `post_translation` SET `id_post` = $this->id_post,`language` = '$this->language',`title` = '$this->title',`slug` = '$this->slug',`content` = '$this->content',`meta_title` = '$this->meta_title',`meta_description` = '$this->meta_description',`excerpt` = '$this->excerpt' WHERE `id_post_translation` = $this->id_post_translation";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `post_translation`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_post_translation){
          $requete = "UPDATE `post_translation` SET deleted_at = NOW() WHERE id_post_translation = $id_post_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_post_translation){
          $requete = "DELETE FROM `post_translation` WHERE `id_post_translation` = $id_post_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_post_translation){
          $requete = "UPDATE `post_translation` SET deleted_at = NULL WHERE `id_post_translation` = $id_post_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `post_translation` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `post_translation` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Post Translation","id_post_translation");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Post Translation");
        }

        public function clean(){
          
          unset($this->post_translations);
          unset($this->assoc_post_translations);

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