<?php 

      class Payments{

        private $cn;

        public $id_payments;
        public $id_booking;
        public $amount;
        public $gateway;
        public $status;
        
        public $paymentss = array();
        public $assoc_paymentss = array();
        
        public $bookings;

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
              $this->delete($obj["id_payments"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_payments"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_payments"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_payments){
          $this->id_payments = $id_payments;

          $query = "SELECT * FROM `payments` WHERE `id_payments` = ".$this->id_payments;
          $result = $this->cn->requete($query);

          if($payments = $result->fetch())
            $this->set($payments);
        }

        public function set($payments){
          if(isset($payments["deleted_at"]))
            $this->deleted_at = $payments["deleted_at"];
          
              $this->id_payments = (isset($payments["id_payments"]) and !empty($payments["id_payments"]) )?$payments["id_payments"]:0;
          
              $this->id_booking = (isset($payments["id_booking"]) and !empty($payments["id_booking"]) )?$payments["id_booking"]:0;
          
              if($this->get_obj and isset($payments["id_booking"])){
                $this->bookings = new Bookings();
                $this->bookings->get($this->id_booking);
              }
          
              $this->amount = (isset($payments["amount"]) and !empty($payments["amount"]) )?$payments["amount"]:0;
          
              $this->gateway = (isset($payments["gateway"]))?trim($this->secure($payments["gateway"])):"";
          
              $this->status = (isset($payments["status"]))?trim($this->secure($payments["status"])):"";
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllPayments($page = 1, $id_bookings = 0){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `payments` WHERE `deleted_at` IS NULL";
            
        if ($id_bookings != 0)
              $requete .= " AND `id_bookings` = ".$id_bookings;
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


          
        if ($id_bookings != 0)
              $requete .= " AND `id_bookings` = ".$id_bookings;
          //products per page
          $requete = "SELECT * FROM `payments`";

          if ($this->page > 0 or $id_bookings != 0 ){

            $requete .= " WHERE ";

            if ($this->page > 0) {

              $requete .= "`deleted_at` IS NULL";

              if ($id_bookings != 0)
                $requete .= " AND ";
              
            }

            if ($id_bookings != 0)
              $requete .= "`id_bookings` = ".$id_bookings;
            

          }
          
          if ($id_bookings != 0)
            $requete .= " ORDER BY `id_bookings` ASC";
          else
            $requete .= " ORDER BY `id_payments` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($payments = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $p = new Payments($this->get_obj);
              $p->set($payments);
              $p->clean();
              array_push($this->paymentss, $p);
            // }else{
            //   array_push($this->assoc_paymentss, $payments);
            // }
          }
        }
        
        public function getNbrPayments(){
          $requete = "SELECT count(*) AS counter FROM `payments` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($payments = $result->fetch()){
            $this->counter = $payments["counter"];
          }
        }

        public function getNbrDeletedPayments(){
          $requete = "SELECT count(*) AS trash_counter FROM `payments` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($payments = $result->fetch()){
            $this->trash_counter = $payments["trash_counter"];
          }
        }

        public function getAllDeletedPayments($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `payments` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `payments` WHERE `deleted_at` IS NOT NULL ORDER BY `id_payments` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($payments = $result->fetch()){
            $p = new Payments($this->get_obj);
            $p->set($payments);
            array_push($this->paymentss, $p);
          }
        }

        
        public function add($payments){
          $this->set($payments);
          
            $requete = "INSERT `payments`(`id_booking`,`amount`,`gateway`,`status`) values($this->id_booking,$this->amount,'$this->gateway','$this->status');";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($payments){
          $this->set($payments);
          
          $requete = "UPDATE `payments` SET `id_booking` = $this->id_booking,`amount` = $this->amount,`gateway` = '$this->gateway',`status` = '$this->status' WHERE `id_payments` = $this->id_payments";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `payments`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_payments){
          $requete = "UPDATE `payments` SET deleted_at = NOW() WHERE id_payments = $id_payments;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_payments){
          $requete = "DELETE FROM `payments` WHERE `id_payments` = $id_payments;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_payments){
          $requete = "UPDATE `payments` SET deleted_at = NULL WHERE `id_payments` = $id_payments;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `payments` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `payments` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Payments","id_payments");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Payments");
        }

        public function clean(){
          
          unset($this->paymentss);
          unset($this->assoc_paymentss);

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