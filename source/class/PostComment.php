<?php 

      class PostComment{

        private $cn;

        public $id_post_comment;
        public $id_post;
        public $id_client;
        public $name;
        public $email;
        public $content;
        public $status;
        
        public $post_comments = array();
        public $assoc_post_comments = array();
        
        public $post;
        public $client;

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
              $this->delete($obj["id_post_comment"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_post_comment"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_post_comment"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_post_comment){
          $this->id_post_comment = $id_post_comment;

          $query = "SELECT * FROM `post_comment` WHERE `id_post_comment` = ".$this->id_post_comment;
          $result = $this->cn->requete($query);

          if($post_comment = $result->fetch())
            $this->set($post_comment);
        }

        public function set($post_comment){
          if(isset($post_comment["deleted_at"]))
            $this->deleted_at = $post_comment["deleted_at"];
          
              $this->id_post_comment = (isset($post_comment["id_post_comment"]) and !empty($post_comment["id_post_comment"]) )?$post_comment["id_post_comment"]:0;
          
              $this->id_post = (isset($post_comment["id_post"]) and !empty($post_comment["id_post"]) )?$post_comment["id_post"]:0;
          
              if($this->get_obj and isset($post_comment["id_post"])){
                $this->post = new Post();
                $this->post->get($this->id_post);
              }
          
              $this->id_client = (isset($post_comment["id_client"]) and !empty($post_comment["id_client"]) )?$post_comment["id_client"]:0;
          
              if($this->get_obj and isset($post_comment["id_client"])){
                $this->client = new Client();
                $this->client->get($this->id_client);
              }
          
              $this->name = (isset($post_comment["name"]))?trim($this->secure($post_comment["name"])):"";
          
              $this->email = (isset($post_comment["email"]))?trim($this->secure($post_comment["email"])):"";
          
              $this->content = (isset($post_comment["content"]))?trim($this->secure($post_comment["content"])):"";
          
              $this->status = (isset($post_comment["status"]))?trim($this->secure($post_comment["status"])):"";
          
        }

        

        //$page 0 = all items without post_limits
        //$page 1 = last 24 item
        //$page 2 = 2end last 24 item and so on

        //fk != 0 get item from this fk

        public function getAllPostComment($page = 1, $id_client = 0){

          // variables::$nbr_article_per_page
          $this->page = $page;
          $requete = "";

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `post_comment` WHERE `deleted_at` IS NULL";
            
        if ($id_client != 0)
              $requete .= " AND `id_client` = ".$id_client;
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


          
        if ($id_client != 0)
              $requete .= " AND `id_client` = ".$id_client;
          //products per page
          $requete = "SELECT * FROM `post_comment`";

          if ($this->page > 0 or $id_client != 0 ){

            $requete .= " WHERE ";

            if ($this->page > 0) {

              $requete .= "`deleted_at` IS NULL";

              if ($id_client != 0)
                $requete .= " AND ";
              
            }

            if ($id_client != 0)
              $requete .= "`id_client` = ".$id_client;
            

          }
          
          if ($id_client != 0)
            $requete .= " ORDER BY `id_client` ASC";
          else
            $requete .= " ORDER BY `id_post_comment` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }
        

          $result = $this->cn->requete($requete);
          while($post_comment = $result->fetch(PDO::FETCH_ASSOC)){
            // if($this->page > 0){
              $p = new PostComment($this->get_obj);
              $p->set($post_comment);
              $p->clean();
              array_push($this->post_comments, $p);
            // }else{
            //   array_push($this->assoc_post_comments, $post_comment);
            // }
          }
        }
        
        public function getNbrPostComment(){
          $requete = "SELECT count(*) AS counter FROM `post_comment` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($post_comment = $result->fetch()){
            $this->counter = $post_comment["counter"];
          }
        }

        public function getNbrDeletedPostComment(){
          $requete = "SELECT count(*) AS trash_counter FROM `post_comment` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($post_comment = $result->fetch()){
            $this->trash_counter = $post_comment["trash_counter"];
          }
        }

        public function getAllDeletedPostComment($page = 1){

          // variables::$nbr_article_per_page
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `post_comment` WHERE `deleted_at` IS NOT NULL";
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
          $requete = "SELECT * FROM `post_comment` WHERE `deleted_at` IS NOT NULL ORDER BY `id_post_comment` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($post_comment = $result->fetch()){
            $p = new PostComment($this->get_obj);
            $p->set($post_comment);
            array_push($this->post_comments, $p);
          }
        }

        
        public function add($post_comment){
          $this->set($post_comment);
          
              $this->content = nl2br($this->content);
          
            $requete = "INSERT `post_comment`(`id_post`,`id_client`,`name`,`email`,`content`,`status`) values($this->id_post,$this->id_client,'$this->name','$this->email','$this->content','$this->status');";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function update($post_comment){
          $this->set($post_comment);
          
              $this->content = nl2br($post_comment["content"]);
          
          $requete = "UPDATE `post_comment` SET `id_post` = $this->id_post,`id_client` = $this->id_client,`name` = '$this->name',`email` = '$this->email',`content` = '$this->content',`status` = '$this->status' WHERE `id_post_comment` = $this->id_post_comment";

          if(variables::$sql_query_debug)
            echo $requete;

          $this->cn->modifier($requete);
        }



        public function truncate(){
          $requete = "TRUNCATE TABLE `post_comment`";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_post_comment){
          $requete = "UPDATE `post_comment` SET deleted_at = NOW() WHERE id_post_comment = $id_post_comment;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function delete($id_post_comment){
          $requete = "DELETE FROM `post_comment` WHERE `id_post_comment` = $id_post_comment;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restore($id_post_comment){
          $requete = "UPDATE `post_comment` SET deleted_at = NULL WHERE `id_post_comment` = $id_post_comment;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `post_comment` SET deleted_at = NULL WHERE 1=1";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `post_comment` WHERE deleted_at IS NOT NULL;";

          if(variables::$sql_query_debug)
            echo $requete;
            
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          $this->history->save($action,$obj,"Post Comment","id_post_comment");
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("Post Comment");
        }

        public function clean(){
          
          unset($this->post_comments);
          unset($this->assoc_post_comments);

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