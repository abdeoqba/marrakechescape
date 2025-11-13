<?php 

      class ProgramDayTranslation{

        private $cn;

        public $id_program_day_translation;
        public $id_day;
        public $language;
        public $title;
        public $content;
        
        public $program_day_translations = array();
        public $assoc_program_day_translations = array();
        
        public $program_day;

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
              $this->delete($obj["id_program_day_translation"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_program_day_translation"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_program_day_translation"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_program_day_translation){
          $this->id_program_day_translation = $id_program_day_translation;

          $query = "SELECT * FROM `program_day_translation` WHERE `id_program_day_translation` = ".$this->id_program_day_translation;
          $result = $this->cn->requete($query);

          if($program_day_translation = $result->fetch())
            $this->set($program_day_translation);
        }

        public function set($program_day_translation){
          if(isset($program_day_translation["deleted_at"]))
            $this->deleted_at = $program_day_translation["deleted_at"];
          
              $this->id_program_day_translation = (isset($program_day_translation["id_program_day_translation"]) and !empty($program_day_translation["id_program_day_translation"]) )?$program_day_translation["id_program_day_translation"]:0;
          
              $this->id_day = (isset($program_day_translation["id_day"]) and !empty($program_day_translation["id_day"]) )?$program_day_translation["id_day"]:0;
          
              if($this->get_obj and isset($program_day_translation["id_day"])){
                $this->program_day = new ProgramDay();
                $this->program_day->get($this->id_day);
              }
          
              $this->language = (isset($program_day_translation["language"]))?trim($this->secure($program_day_translation["language"])):"";
          
              $this->title = (isset($program_day_translation["title"]))?trim($this->secure($program_day_translation["title"])):"";
          
              $this->content = (isset($program_day_translation["content"]))?trim($this->secure($program_day_translation["content"])):"";
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllProgramDayTranslation($page = 1, $id_program_day = 0, $lang = 'en'){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `program_day_translation` WHERE `deleted_at` IS NULL";
            
        if ($id_program_day != 0)
              $requete .= " AND `id_program_day` = ".$id_program_day;
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


          
        if ($id_program_day != 0)
              $requete .= " AND `id_program_day` = ".$id_program_day;
          //products per page
          $requete = "SELECT * FROM `program_day_translation`";

          if ($this->page > 0 or $id_program_day != 0 ){

            $requete .= " WHERE ";

            if ($this->page > 0) {

              $requete .= "`deleted_at` IS NULL";

              if ($id_program_day != 0)
                $requete .= " AND ";
              
            }

            if ($id_program_day != 0)
              $requete .= "`id_program_day` = ".$id_program_day;
            

          }
          
          if ($id_program_day != 0)
            $requete .= " ORDER BY `id_program_day` ASC";
          else
            $requete .= " ORDER BY `id_program_day_translation` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($program_day_translation = $result->fetch(PDO::FETCH_ASSOC)){
              $p = new ProgramDayTranslation($this->get_obj);
              $p->set($program_day_translation);
              $p->clean();
              array_push($this->program_day_translations, $p);
          }
        }


        public function getProgramDayTranslation($id_program_day = 0, $language = 'en'){

          $requete = "SELECT * FROM `program_day_translation` 
          WHERE `deleted_at` IS NULL AND `language` = '$language' AND `id_day` = $id_program_day
          ORDER BY `id_program_day_translation` ASC";
            
          $result = $this->cn->requete($requete);

          if($program_day_translation = $result->fetch())
            $this->set($program_day_translation);
        }
        
        public function getNbrProgramDayTranslation(){
          $requete = "SELECT count(*) AS counter FROM `program_day_translation` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($program_day_translation = $result->fetch()){
            $this->counter = $program_day_translation["counter"];
          }
        }

        public function getNbrDeletedProgramDayTranslation(){
          $requete = "SELECT count(*) AS trash_counter FROM `program_day_translation` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($program_day_translation = $result->fetch()){
            $this->trash_counter = $program_day_translation["trash_counter"];
          }
        }

        public function getAllDeletedProgramDayTranslation($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `program_day_translation` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `program_day_translation` WHERE `deleted_at` IS NOT NULL ORDER BY `id_program_day_translation` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($program_day_translation = $result->fetch()){
            $p = new ProgramDayTranslation($this->get_obj);
            $p->set($program_day_translation);
            array_push($this->program_day_translations, $p);
          }
        }

        
        public function add($program_day_translation){
          $this->set($program_day_translation);
          
              $this->content = nl2br($this->content);
          
            $requete = "INSERT `program_day_translation`(`id_day`,`language`,`title`,`content`) values($this->id_day,'$this->language','$this->title','$this->content');";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($program_day_translation){
          $this->set($program_day_translation);
          
              $this->content = nl2br($program_day_translation["content"]);
          
          $requete = "UPDATE `program_day_translation` SET `id_day` = $this->id_day,`language` = '$this->language',`title` = '$this->title',`content` = '$this->content' WHERE `id_program_day_translation` = $this->id_program_day_translation";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `program_day_translation`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_program_day_translation){
          $requete = "UPDATE `program_day_translation` SET deleted_at = NOW() WHERE id_program_day_translation = $id_program_day_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_program_day_translation){
          $requete = "DELETE FROM `program_day_translation` WHERE `id_program_day_translation` = $id_program_day_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_program_day_translation){
          $requete = "UPDATE `program_day_translation` SET deleted_at = NULL WHERE `id_program_day_translation` = $id_program_day_translation;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `program_day_translation` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `program_day_translation` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Program Day Translation","id_program_day_translation");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Program Day Translation");
        }

        public function clean(){
          
          unset($this->program_day_translations);
          unset($this->assoc_program_day_translations);

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