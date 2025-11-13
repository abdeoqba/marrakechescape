<?php 

      class ProgramTranslation{

        private $cn;

        public $id_program_translation;
        public $id_program;
        public $language;
        public $title;
        public $description;
        public $content;
        public $includes;
        public $excludes;
        public $highlights;
        
        public $program_translations = array();
        public $assoc_program_translations = array();
        
        public $program;

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
              $this->delete($obj["id_program_translation"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_program_translation"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_program_translation"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_program_translation){
          $this->id_program_translation = $id_program_translation;

          $query = "SELECT * FROM `program_translation` WHERE `id_program_translation` = ".$this->id_program_translation;
          $result = $this->cn->requete($query);

          if($program_translation = $result->fetch())
            $this->set($program_translation);
        }

        public function set($program_translation){
          if(isset($program_translation["deleted_at"]))
            $this->deleted_at = $program_translation["deleted_at"];
          
              $this->id_program_translation = (isset($program_translation["id_program_translation"]) and !empty($program_translation["id_program_translation"]) )?$program_translation["id_program_translation"]:0;
          
              $this->id_program = (isset($program_translation["id_program"]) and !empty($program_translation["id_program"]) )?$program_translation["id_program"]:0;
          
              if($this->get_obj and isset($program_translation["id_program"])){
                $this->program = new Program();
                $this->program->get($this->id_program);
              }
          
              $this->language = (isset($program_translation["language"]))?trim($this->secure($program_translation["language"])):"";
          
              $this->title = (isset($program_translation["title"]))?trim($this->secure($program_translation["title"])):"";
          
              $this->description = (isset($program_translation["description"]))?trim($this->secure($program_translation["description"])):"";
          
              $this->content = (isset($program_translation["content"]))?trim($this->secure($program_translation["content"])):"";
          
              $this->includes = (isset($program_translation["includes"]))?trim($this->secure($program_translation["includes"])):"";
          
              $this->excludes = (isset($program_translation["excludes"]))?trim($this->secure($program_translation["excludes"])):"";
          
              $this->highlights = (isset($program_translation["highlights"]))?trim($this->secure($program_translation["highlights"])):"";
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllProgramTranslation($page = 1, $id_program = 0, $lang = 'en'){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `program_translation` WHERE `deleted_at` IS NULL";
            
        if ($id_program != 0)
              $requete .= " AND `id_program` = ".$id_program;
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


          
        if ($id_program != 0)
              $requete .= " AND `id_program` = ".$id_program;
          //products per page
          $requete = "SELECT * FROM `program_translation`";

          if ($this->page > 0 or $id_program != 0 ){

            $requete .= " WHERE ";

            if ($this->page > 0) {

              $requete .= "`deleted_at` IS NULL";

              if ($id_program != 0)
                $requete .= " AND ";
              
            }

            if ($id_program != 0)
              $requete .= "`id_program` = ".$id_program;
            

          }
          
          if ($id_program != 0)
            $requete .= " ORDER BY `id_program` ASC";
          else
            $requete .= " ORDER BY `id_program_translation` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($program_translation = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $p = new ProgramTranslation($this->get_obj);
              $p->set($program_translation);
              $p->clean();
              array_push($this->program_translations, $p);
            // }else{
            //   array_push($this->assoc_program_translations, $program_translation);
            // }
          }
        }

        public function getProgramTranslation($id_program = 0, $language = 'en'){

          $requete = "SELECT * FROM `program_translation` 
          WHERE `deleted_at` IS NULL AND `language` = '$language' AND `id_program` = $id_program
          ORDER BY `id_program_translation` ASC";
            
          $result = $this->cn->requete($requete);

          if($program_translation = $result->fetch())
            $this->set($program_translation);
        }

        public function getNbrProgramTranslation(){
          $requete = "SELECT count(*) AS counter FROM `program_translation` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($program_translation = $result->fetch()){
            $this->counter = $program_translation["counter"];
          }
        }

        public function getNbrDeletedProgramTranslation(){
          $requete = "SELECT count(*) AS trash_counter FROM `program_translation` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($program_translation = $result->fetch()){
            $this->trash_counter = $program_translation["trash_counter"];
          }
        }

        public function getAllDeletedProgramTranslation($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `program_translation` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `program_translation` WHERE `deleted_at` IS NOT NULL ORDER BY `id_program_translation` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($program_translation = $result->fetch()){
            $p = new ProgramTranslation($this->get_obj);
            $p->set($program_translation);
            array_push($this->program_translations, $p);
          }
        }

        
        public function add($program_translation){
          $this->set($program_translation);
          
              $this->content = nl2br($this->content);
          
              $this->includes = nl2br($this->includes);
          
              $this->excludes = nl2br($this->excludes);
          
              $this->highlights = nl2br($this->highlights);
          
            $requete = "INSERT `program_translation`(`id_program`,`language`,`title`,`description`,`content`,`includes`,`excludes`,`highlights`) values($this->id_program,'$this->language','$this->title','$this->description','$this->content','$this->includes','$this->excludes','$this->highlights');";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($program_translation){
          $this->set($program_translation);
          
              $this->content = nl2br($program_translation["content"]);
          
              $this->includes = nl2br($program_translation["includes"]);
          
              $this->excludes = nl2br($program_translation["excludes"]);
          
              $this->highlights = nl2br($program_translation["highlights"]);
          
          $requete = "UPDATE `program_translation` SET `id_program` = $this->id_program,`language` = '$this->language',`title` = '$this->title',`description` = '$this->description',`content` = '$this->content',`includes` = '$this->includes',`excludes` = '$this->excludes',`highlights` = '$this->highlights' WHERE `id_program_translation` = $this->id_program_translation";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `program_translation`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_program_translation){
          $requete = "UPDATE `program_translation` SET deleted_at = NOW() WHERE id_program_translation = $id_program_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_program_translation){
          $requete = "DELETE FROM `program_translation` WHERE `id_program_translation` = $id_program_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_program_translation){
          $requete = "UPDATE `program_translation` SET deleted_at = NULL WHERE `id_program_translation` = $id_program_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `program_translation` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `program_translation` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Program Translation","id_program_translation");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Program Translation");
        }

        public function clean(){
          
          unset($this->program_translations);
          unset($this->assoc_program_translations);

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