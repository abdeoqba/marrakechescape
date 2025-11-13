<?php 

      class Program{

        private $cn;

        public $id_program;
        public $id_category;
        public $id_image;
        public $nbr_days;
        public $start;
        public $end;
        public $price;
        
        public $programs = array();
        public $assoc_programs = array();
        
        public $category;
        public $image;
        public $content;
        public $itinerary;

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
              $this->delete($obj["id_program"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_program"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_program"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_program){
          $this->id_program = $id_program;

          $query = "SELECT * FROM `program` WHERE `id_program` = ".$this->id_program;
          $result = $this->cn->requete($query);

          if($program = $result->fetch())
            $this->set($program);
        }

        public function set($program){
          if(isset($program["deleted_at"]))
            $this->deleted_at = $program["deleted_at"];
          
              $this->id_program = (isset($program["id_program"]) and !empty($program["id_program"]) )?$program["id_program"]:0;
          
              $this->id_category = (isset($program["id_category"]) and !empty($program["id_category"]) )?$program["id_category"]:0;
          
              if($this->get_obj and isset($program["id_category"])){
                $this->category = new Category();
                $this->category->get($this->id_category);
              }
          
              $this->id_image = (isset($program["id_image"]) and !empty($program["id_image"]) )?$program["id_image"]:0;
          
              if($this->get_obj and isset($program["id_image"])){
                $this->image = new Image();
                $this->image->get($this->id_image);
              }

              if($this->get_obj and $this->id_program){
                $this->content = new ProgramTranslation(0);
                $this->content->getProgramTranslation($this->id_program);

                $this->itinerary = new ProgramDay(0);
                $this->itinerary->getAllProgramDay(0,$this->id_program);
              }
          
              $this->nbr_days = (isset($program["nbr_days"]))?trim($this->secure($program["nbr_days"])):"";
          
              $this->start = (isset($program["start"]))?trim($this->secure($program["start"])):"";
          
              $this->end = (isset($program["end"]))?trim($this->secure($program["end"])):"";
          
              $this->price = (isset($program["price"]) and !empty($program["price"]) )?$program["price"]:0;
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllProgram($page = 1, $id_image = 0){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `program` WHERE `deleted_at` IS NULL";
            
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
          $requete = "SELECT * FROM `program`";

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
            $requete .= " ORDER BY `id_program` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($program = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $p = new Program($this->get_obj);
              $p->set($program);
              $p->clean();
              array_push($this->programs, $p);
            // }else{
            //   array_push($this->assoc_programs, $program);
            // }
          }
        }
        
        public function getNbrProgram(){
          $requete = "SELECT count(*) AS counter FROM `program` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($program = $result->fetch()){
            $this->counter = $program["counter"];
          }
        }

        public function getNbrDeletedProgram(){
          $requete = "SELECT count(*) AS trash_counter FROM `program` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($program = $result->fetch()){
            $this->trash_counter = $program["trash_counter"];
          }
        }

        public function getAllDeletedProgram($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `program` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `program` WHERE `deleted_at` IS NOT NULL ORDER BY `id_program` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($program = $result->fetch()){
            $p = new Program($this->get_obj);
            $p->set($program);
            array_push($this->programs, $p);
          }
        }

        
        public function add($program){
          $this->set($program);
          
            $requete = "INSERT `program`(`id_category`,`id_image`,`nbr_days`,`start`,`end`,`price`) values($this->id_category,$this->id_image,'$this->nbr_days','$this->start','$this->end',$this->price);";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($program){
          $this->set($program);
          
          $requete = "UPDATE `program` SET `id_category` = $this->id_category,`id_image` = $this->id_image,`nbr_days` = '$this->nbr_days',`start` = '$this->start',`end` = '$this->end',`price` = $this->price WHERE `id_program` = $this->id_program";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `program`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_program){
          $requete = "UPDATE `program` SET deleted_at = NOW() WHERE id_program = $id_program;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_program){
          $requete = "DELETE FROM `program` WHERE `id_program` = $id_program;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_program){
          $requete = "UPDATE `program` SET deleted_at = NULL WHERE `id_program` = $id_program;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `program` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `program` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Program","id_program");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Program");
        }

        public function clean(){
          
          unset($this->programs);
          unset($this->assoc_programs);

          unset($this->cn);

          $this->category->clean();
          $this->content->clean();
          $this->itinerary->clean();

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