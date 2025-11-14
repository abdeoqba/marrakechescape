<?php 

      class Client{

        private $cn;

        public $id_client;
        public $full_name;
        public $email;
        public $phone;
        public $country;
        public $program;
        public $id_program;
        public $message;
        
        public $clients = array();
        public $assoc_clients = array();
        

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
              $this->delete($obj["id_client"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_client"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_client"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_client){
          $this->id_client = $id_client;

          $query = "SELECT * FROM `client` WHERE `id_client` = ".$this->id_client;
          $result = $this->cn->requete($query);

          if($client = $result->fetch())
            $this->set($client);
        }

        public function set($client){
          if(isset($client["deleted_at"]))
            $this->deleted_at = $client["deleted_at"];
          
              $this->id_client = (isset($client["id_client"]) and !empty($client["id_client"]) )?$client["id_client"]:0;
          
              $this->full_name = (isset($client["full_name"]))?trim($this->secure($client["full_name"])):"";
          
              $this->email = (isset($client["email"]))?trim($this->secure($client["email"])):"";
          
              $this->phone = (isset($client["phone"]))?trim($this->secure($client["phone"])):"";
          
              $this->country = (isset($client["country"]))?trim($this->secure($client["country"])):"";
          
              $this->program = (isset($client["program"]))?trim($this->secure($client["program"])):"";
          
              $this->id_program = (isset($client["id_program"]) and !empty($client["id_program"]) )?$client["id_program"]:0;
          
              $this->message = (isset($client["message"]))?trim($this->secure($client["message"])):"";
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllClient($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `client` WHERE `deleted_at` IS NULL";
            
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
          $requete = "SELECT * FROM `client`";

          //if ($this->page > 0) 
            $requete .= " WHERE `deleted_at` IS NULL";

          $requete .= " ORDER BY `id_client` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($client = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $c = new Client($this->get_obj);
              $c->set($client);
              $c->clean();
              array_push($this->clients, $c);
            // }else{
            //   array_push($this->assoc_clients, $client);
            // }
          }
        }
        
        public function getNbrClient(){
          $requete = "SELECT count(*) AS counter FROM `client` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($client = $result->fetch()){
            $this->counter = $client["counter"];
          }
        }

        public function getNbrDeletedClient(){
          $requete = "SELECT count(*) AS trash_counter FROM `client` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($client = $result->fetch()){
            $this->trash_counter = $client["trash_counter"];
          }
        }

        public function getAllDeletedClient($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `client` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `client` WHERE `deleted_at` IS NOT NULL ORDER BY `id_client` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($client = $result->fetch()){
            $c = new Client($this->get_obj);
            $c->set($client);
            array_push($this->clients, $c);
          }
        }

        
        public function add($client){
          $this->set($client);
          
              $this->message = nl2br($this->message);
          
            $requete = "INSERT `client`(`full_name`,`email`,`phone`,`country`,`program`,`id_program`,`message`) values('$this->full_name','$this->email','$this->phone','$this->country','$this->program',$this->id_program,'$this->message');";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($client){
          $this->set($client);
          
              $this->message = nl2br($client["message"]);
          
          $requete = "UPDATE `client` SET `full_name` = '$this->full_name',`email` = '$this->email',`phone` = '$this->phone',`country` = '$this->country',`program` = '$this->program',`id_program` = $this->id_program,`message` = '$this->message' WHERE `id_client` = $this->id_client";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `client`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_client){
          $requete = "UPDATE `client` SET deleted_at = NOW() WHERE id_client = $id_client;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_client){
          $requete = "DELETE FROM `client` WHERE `id_client` = $id_client;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_client){
          $requete = "UPDATE `client` SET deleted_at = NULL WHERE `id_client` = $id_client;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `client` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `client` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Client","id_client");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Client");
        }

        public function clean(){
          
          unset($this->clients);
          unset($this->assoc_clients);

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