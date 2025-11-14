<?php 

      class Bookings{

        private $cn;

        public $id_bookings;
        public $id_client;
        public $id_program;
        public $persons;
        public $travel_date;
        public $status;
        public $total_amount;
        
        public $bookingss = array();
        public $assoc_bookingss = array();
        
        public $client;
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
              $this->delete($obj["id_bookings"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_bookings"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_bookings"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_bookings){
          $this->id_bookings = $id_bookings;

          $query = "SELECT * FROM `bookings` WHERE `id_bookings` = ".$this->id_bookings;
          $result = $this->cn->requete($query);

          if($bookings = $result->fetch())
            $this->set($bookings);
        }

        public function set($bookings){
          if(isset($bookings["deleted_at"]))
            $this->deleted_at = $bookings["deleted_at"];
          
              $this->id_bookings = (isset($bookings["id_bookings"]) and !empty($bookings["id_bookings"]) )?$bookings["id_bookings"]:0;
          
              $this->id_client = (isset($bookings["id_client"]) and !empty($bookings["id_client"]) )?$bookings["id_client"]:0;
          
              if($this->get_obj and isset($bookings["id_client"])){
                $this->client = new Client();
                $this->client->get($this->id_client);
              }
          
              $this->id_program = (isset($bookings["id_program"]) and !empty($bookings["id_program"]) )?$bookings["id_program"]:0;
          
              if($this->get_obj and isset($bookings["id_program"])){
                $this->program = new Program();
                $this->program->get($this->id_program);
              }
          
              $this->persons = (isset($bookings["persons"]) and !empty($bookings["persons"]) )?$bookings["persons"]:0;
          
                if(isset($bookings["travel_date"]) and !empty($bookings["travel_date"]))
                  $this->travel_date = variables::date_format($bookings["travel_date"]);
          
              $this->status = (isset($bookings["status"]))?trim($this->secure($bookings["status"])):"";
          
              $this->total_amount = (isset($bookings["total_amount"]) and !empty($bookings["total_amount"]) )?$bookings["total_amount"]:0;
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllBookings($page = 1, $id_program = 0){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `bookings` WHERE `deleted_at` IS NULL";
            
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
          $requete = "SELECT * FROM `bookings`";

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
            $requete .= " ORDER BY `id_bookings` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($bookings = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $b = new Bookings($this->get_obj);
              $b->set($bookings);
              $b->clean();
              array_push($this->bookingss, $b);
            // }else{
            //   array_push($this->assoc_bookingss, $bookings);
            // }
          }
        }
        
        public function getNbrBookings(){
          $requete = "SELECT count(*) AS counter FROM `bookings` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($bookings = $result->fetch()){
            $this->counter = $bookings["counter"];
          }
        }

        public function getNbrDeletedBookings(){
          $requete = "SELECT count(*) AS trash_counter FROM `bookings` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($bookings = $result->fetch()){
            $this->trash_counter = $bookings["trash_counter"];
          }
        }

        public function getAllDeletedBookings($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `bookings` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `bookings` WHERE `deleted_at` IS NOT NULL ORDER BY `id_bookings` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($bookings = $result->fetch()){
            $b = new Bookings($this->get_obj);
            $b->set($bookings);
            array_push($this->bookingss, $b);
          }
        }

        
        public function add($bookings){
          $this->set($bookings);
          
            $requete = "INSERT `bookings`(`id_client`,`id_program`,`persons`,`travel_date`,`status`,`total_amount`) values($this->id_client,$this->id_program,$this->persons,'$this->travel_date','$this->status',$this->total_amount);";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($bookings){
          $this->set($bookings);
          
          $requete = "UPDATE `bookings` SET `id_client` = $this->id_client,`id_program` = $this->id_program,`persons` = $this->persons,`travel_date` = '$this->travel_date',`status` = '$this->status',`total_amount` = $this->total_amount WHERE `id_bookings` = $this->id_bookings";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `bookings`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_bookings){
          $requete = "UPDATE `bookings` SET deleted_at = NOW() WHERE id_bookings = $id_bookings;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_bookings){
          $requete = "DELETE FROM `bookings` WHERE `id_bookings` = $id_bookings;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_bookings){
          $requete = "UPDATE `bookings` SET deleted_at = NULL WHERE `id_bookings` = $id_bookings;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `bookings` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `bookings` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Bookings","id_bookings");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Bookings");
        }

        public function clean(){
          
          unset($this->bookingss);
          unset($this->assoc_bookingss);

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

        public function countByDate($date)
        { 
            $result = $this->cn->requete("SELECT COUNT(*) FROM bookings WHERE DATE(created_at) = '$date'");
            return $result->fetchColumn();
        }

      }

    ?>