<?php 

      class ProgramDay{

        private $cn;

        public $id_program_day;
        public $id_program;
        public $day_order;
        
        public $program_days = array();
        public $assoc_program_days = array();
        
        public $program;
        public $content;

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
              $this->delete($obj["id_program_day"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_program_day"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_program_day"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_program_day){
          $this->id_program_day = $id_program_day;

          $query = "SELECT * FROM `program_day` WHERE `id_program_day` = ".$this->id_program_day;
          $result = $this->cn->requete($query);

          if($program_day = $result->fetch())
            $this->set($program_day);
        }

        public function set($program_day){
          if(isset($program_day["deleted_at"]))
            $this->deleted_at = $program_day["deleted_at"];
          
            $this->id_program_day = (isset($program_day["id_program_day"]) and !empty($program_day["id_program_day"]) )?$program_day["id_program_day"]:0;
        
            $this->id_program = (isset($program_day["id_program"]) and !empty($program_day["id_program"]) )?$program_day["id_program"]:0;
        
            if($this->get_obj and isset($program_day["id_program"])){
              $this->program = new Program();
              $this->program->get($this->id_program);
            }

            if($this->get_obj and $this->id_program_day){
              $this->content = new ProgramDayTranslation(0);
              $this->content->getProgramDayTranslation($this->id_program_day);
            }
        
            $this->day_order = (isset($program_day["day_order"]) and !empty($program_day["day_order"]) )?$program_day["day_order"]:0;
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllProgramDay($page = 1, $id_program = 0){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `program_day` WHERE `deleted_at` IS NULL";
            
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
          $requete = "SELECT * FROM `program_day`";

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
            $requete .= " ORDER BY `day_order` ASC";
          else
            $requete .= " ORDER BY `id_program_day` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($program_day = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $p = new ProgramDay($this->get_obj);
              $p->set($program_day);
              $p->clean();
              array_push($this->program_days, $p);
            // }else{
            //   array_push($this->assoc_program_days, $program_day);
            // }
          }
        }
        
        public function getNbrProgramDay(){
          $requete = "SELECT count(*) AS counter FROM `program_day` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($program_day = $result->fetch()){
            $this->counter = $program_day["counter"];
          }
        }

        public function getNbrDeletedProgramDay(){
          $requete = "SELECT count(*) AS trash_counter FROM `program_day` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($program_day = $result->fetch()){
            $this->trash_counter = $program_day["trash_counter"];
          }
        }

        public function getAllDeletedProgramDay($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `program_day` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `program_day` WHERE `deleted_at` IS NOT NULL ORDER BY `id_program_day` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($program_day = $result->fetch()){
            $p = new ProgramDay($this->get_obj);
            $p->set($program_day);
            array_push($this->program_days, $p);
          }
        }

        
        public function add($program_day){
          $this->set($program_day);
          
            $requete = "INSERT `program_day`(`id_program`,`day_order`) values($this->id_program,$this->day_order);";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($program_day){
          $this->set($program_day);
          
          $requete = "UPDATE `program_day` SET `id_program` = $this->id_program,`day_order` = $this->day_order WHERE `id_program_day` = $this->id_program_day";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `program_day`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_program_day){
          $requete = "UPDATE `program_day` SET deleted_at = NOW() WHERE id_program_day = $id_program_day;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_program_day){
          $requete = "DELETE FROM `program_day` WHERE `id_program_day` = $id_program_day;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_program_day){
          $requete = "UPDATE `program_day` SET deleted_at = NULL WHERE `id_program_day` = $id_program_day;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `program_day` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `program_day` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Program Day","id_program_day");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Program Day");
        }

        public function clean(){
          
          unset($this->program_days);
          unset($this->assoc_program_days);

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