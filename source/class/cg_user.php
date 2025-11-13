<?php 

  class cg_user{
    private $cn;

    public $id_user;
    public $username;
    public $password;
    public $role;
    public $active;

    public $allow_trash;
    public $allow_truncate;
    public $allow_read_history;
    public $allow_edit;
    public $allow_manage;
    
    public $offset;
    public $nbr_pages; 
    public $nbr_total_articles; 
    public $page;

    public $checked;
    public $authenticated;
    public $history;
    public $toast;
    public $users = array();
    
    public $counter;
    public $trash_counter;


    public function __construct(){
      $this->cn = new gestionConnexion();
    }

    public function set($cg_user){
      if(isset($cg_user["deleted_at"]))
        $this->deleted_at = $cg_user["deleted_at"];
      if(isset($cg_user["id_user"]))
        $this->id_user = $cg_user["id_user"];
      if(isset($cg_user["username"]))
        $this->username = $cg_user["username"];
      if(isset($cg_user["password"]))
        $this->password = $cg_user["password"];
      if(isset($cg_user["role"]))
        $this->role = $cg_user["role"];

      $this->active = 0;
      if(isset($cg_user["active"]))
        $this->active = ($cg_user["active"]=="on" or $cg_user["active"])?1:0;
  
      $this->allow_trash = 0;
      if(isset($cg_user["allow_trash"]))
        $this->allow_trash = ($cg_user["allow_trash"]=="on" or $cg_user["allow_trash"])?1:0;
  
      $this->allow_truncate = 0;
      if(isset($cg_user["allow_truncate"]))
        $this->allow_truncate = ($cg_user["allow_truncate"]=="on" or $cg_user["allow_truncate"])?1:0;
  
      $this->allow_read_history = 0;
      if(isset($cg_user["allow_read_history"]))
        $this->allow_read_history = ($cg_user["allow_read_history"]=="on" or $cg_user["allow_read_history"])?1:0;
  
      $this->allow_edit = 0;
      if(isset($cg_user["allow_edit"]))
        $this->allow_edit = ($cg_user["allow_edit"]=="on" or $cg_user["allow_edit"])?1:0;
  
      $this->allow_manage = 0;
      if(isset($cg_user["allow_manage"]))
        $this->allow_manage = ($cg_user["allow_manage"]=="on" or $cg_user["allow_manage"])?1:0;
      
    }

    public function check_user_exist($username,$password){
      $query = "SELECT * FROM ".variables::$prefix."user WHERE username = '$username' AND password = '$password'";
      $result = $this->cn->requete($query);

      if($user = $result->fetch()){
        $this->set($user);
        $this->checked = true;
      }else
        $this->checked = false;
    }

    public function authenticate(){
      if($this->checked and !$this->authenticated){
        if(session_status()!=PHP_SESSION_ACTIVE and !isset($_SESSION))
          session_start();

        $_SESSION[variables::$prefix.'id_user'] = $this->id_user;
        $_SESSION[variables::$prefix.'username'] = $this->username;
        $_SESSION[variables::$prefix.'allow_trash'] = $this->allow_trash;
        $_SESSION[variables::$prefix.'allow_truncate'] = $this->allow_truncate;
        $_SESSION[variables::$prefix.'allow_read_history'] = $this->allow_read_history;
        $_SESSION[variables::$prefix.'allow_edit'] = $this->allow_edit;
        $_SESSION[variables::$prefix.'role'] = $this->role;
        $this->authenticated = true;
        $this->history = new cg_history();
        $this->history->save("connect",NULL,"","");
        
      }
    }

      public function do_action($action, $obj){
          switch ($action) {
            case "add":
              $this->add($obj);
              break;

            case "update":
              $this->update($obj);
              break;

            case "edit_profile":
              $this->edit_profile($obj);
              break;

            case "change_password":
              $this->change_password($obj);
              break;

            case "delete":
              $this->delete($obj["id_user"]);
              break;

            case "truncate":
              $this->truncate();
              break;

            case "restore":
              $this->restore($obj["id_user"]);
              break;

            case "restore_all":
              $this->restoreAll();
              break;

            case "move_to_trash":
              $this->moveToTrash($obj["id_user"]);
              break;

            case "empty_trash":
              $this->emptyTrash();
              break;
          }

          $this->save($action,$obj);
        }

        public function get($id_user){
          $this->id_user = $id_user;

          $query = "select * from `cg_user` where `id_user` = ".$this->id_user;
          $result = $this->cn->requete($query);

          if($cg_user = $result->fetch())
            $this->set($cg_user);
        }

        public function getAllUser($page = 1){
          if(session_status()!=PHP_SESSION_ACTIVE and !isset($_SESSION))
            session_start();
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `cg_user` WHERE `deleted_at` IS NULL AND id_user <> ".$_SESSION[variables::$prefix.'id_user'];
            $result = $this->cn->requete($requete);

            if ($article = $result->fetch()) {
              $this->nbr_total_articles = $article['nbr_total_articles'];
              //number of pages for this category
              if($this->nbr_total_articles>0)
                $this->nbr_pages = intval($this->nbr_total_articles/variables::$nbr_article_per_page)+1;
              else 
                $this->nbr_pages = 0;
              //It is used to specify the offset of the first row to be returned
              $this->offset = (variables::$nbr_article_per_page * ($this->page - 1));
            }
          }

          //products per page
          $requete = "SELECT * FROM `cg_user` WHERE `deleted_at` IS NULL AND `id_user` <> ".$_SESSION[variables::$prefix.'id_user']." ORDER BY `id_user` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($cg_user = $result->fetch()){
            $c = new cg_user();
            $c->set($cg_user);
            array_push($this->users, $c);
          }
        }

        public function getNbrUser(){
          $requete = "SELECT count(*) AS counter FROM `cg_user` WHERE `deleted_at` IS NULL";

          $result = $this->cn->requete($requete);
          if($cg_user = $result->fetch()){
            $this->counter = $cg_user["counter"];
          }
        }

        public function getNbrDeletedUser(){
          $requete = "SELECT count(*) AS trash_counter FROM `cg_user` WHERE `deleted_at` IS NOT NULL";

          $result = $this->cn->requete($requete);
          if($cg_user = $result->fetch()){
            $this->trash_counter = $cg_user["trash_counter"];
          }
        }

        public function getAllDeletedUser($page = 1){
          $requete = "SELECT * FROM `cg_user` WHERE `deleted_at` IS NOT NULL ORDER BY `deleted_at` DESC";

          $result = $this->cn->requete($requete);
          while($cg_user = $result->fetch()){
            $c = new cg_user();
            $c->set($cg_user);
            array_push($this->users, $c);
          }


          if(session_status()!=PHP_SESSION_ACTIVE and !isset($_SESSION))
            session_start();
          $this->page = $page;

          if ($this->page > 0) {
            //numbre total products
            $requete = "SELECT COUNT(*) as nbr_total_articles FROM `cg_user` WHERE `deleted_at` IS NOT NULL AND id_user <> ".$_SESSION[variables::$prefix.'id_user'];
            $result = $this->cn->requete($requete);

            if ($article = $result->fetch()) {
              $this->nbr_total_articles = $article['nbr_total_articles'];
              //number of pages for this category
              if($this->nbr_total_articles>0)
                $this->nbr_pages = intval($this->nbr_total_articles/variables::$nbr_article_per_page)+1;
              else 
                $this->nbr_pages = 0;
              //It is used to specify the offset of the first row to be returned
              $this->offset = (variables::$nbr_article_per_page * ($this->page - 1));
            }
          }

          //products per page
          $requete = "SELECT * FROM `cg_user` WHERE `deleted_at` IS NOT NULL AND `id_user` <> ".$_SESSION[variables::$prefix.'id_user']." ORDER BY `deleted_at` DESC";

          if ($this->page > 0) {
            $requete .= " LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
          }

          $result = $this->cn->requete($requete);
          while($cg_user = $result->fetch()){
            $c = new cg_user();
            $c->set($cg_user);
            array_push($this->users, $c);
          }
        }

        
        public function add($cg_user){
            $this->set($cg_user);
            $requete = "INSERT `cg_user`(`username`,`password`,`role`,`active`,`allow_trash`,`allow_truncate`,`allow_read_history`,`allow_edit`) values('$this->username','$this->password','$this->role',$this->active,$this->allow_trash,$this->allow_truncate,$this->allow_read_history,$this->allow_edit);";
          $this->cn->modifier($requete);
        }

        public function update($cg_user){
          $this->set($cg_user);
          $requete = "UPDATE `cg_user` SET `username` = '$this->username',`password` = '$this->password',`role` = '$this->role',`active` = $this->active,`allow_trash` = $this->allow_trash,`allow_truncate` = $this->allow_truncate,`allow_read_history` = $this->allow_read_history,`allow_edit` = $this->allow_edit WHERE `id_user` = $this->id_user";
          $this->cn->modifier($requete);
        }

        public function edit_profile($cg_user){
          
          if(isset($cg_user["id_user"]))
            $this->id_user = $cg_user["id_user"];

          if(isset($cg_user["username"]))
            $this->username = $cg_user["username"];

          if(session_status()!=PHP_SESSION_ACTIVE and !isset($_SESSION))
            session_start();

          $_SESSION[variables::$prefix.'username'] = $this->username;

          $requete = "UPDATE `cg_user` SET `username` = '$this->username' WHERE `id_user` = $this->id_user";
          $this->cn->modifier($requete);
        }

        public function change_password($cg_user){

          if(isset($cg_user["id_user"]))
            $this->id_user = $cg_user["id_user"];

          if(isset($cg_user["password"]))
            $this->password = $cg_user["password"];

          if(isset($cg_user["username"]))
            $this->username = $cg_user["username"];
          
          if(isset($cg_user["old_password"]))
            $old_password = $cg_user["old_password"];

          
          $requete = "UPDATE `cg_user` SET `password` = '$this->password' WHERE `id_user` = $this->id_user AND `password` = '$old_password'";
          $this->cn->modifier($requete);

        }

        public function truncate(){
          $requete = "TRUNCATE TABLE cg_user";
          $this->cn->modifier($requete);
        }

        public function moveToTrash($id_user){
          $requete = "UPDATE cg_user SET deleted_at = NOW(), `active` = 0 WHERE id_user = $id_user;";
          $this->cn->modifier($requete);
        }

        public function delete($id_user){
          $requete = "DELETE FROM `cg_user` WHERE `id_user` = $id_user;";
          $this->cn->modifier($requete);
        }

        public function restore($id_user){
          $requete = "UPDATE `cg_user` SET deleted_at = NULL, `active` = 1 WHERE `id_user` = $id_user;";
          $this->cn->modifier($requete);
        }

        public function restoreAll(){
          $requete = "UPDATE `cg_user` SET deleted_at = NULL, `active` = 1 WHERE 1=1";
          $this->cn->modifier($requete);
        }
        
        public function emptyTrash(){
          $requete = "DELETE FROM `cg_user` WHERE deleted_at IS NOT NULL;";
          $this->cn->modifier($requete);
        }

        //SAVE HISTORY
        public function save($action,$obj){
          if(in_array($action, array("empty_trash","truncate")))
            $requete = "INSERT `".variables::$prefix."history`(`id_user`,`table`,`action`,`time`) values(1,'cg_user','$action',now());";
          else{
            if($action == "add")
              $id_obj = $this->cn->getLastInsertedId();
            else
              $id_obj = $obj["id_user"];

            $requete = "INSERT `".variables::$prefix."history`(`id_user`,`id_obj`,`table`,`action`,`time`) values(".$_SESSION[variables::$prefix."id_user"].",$id_obj,'User','$action',now());";
          }
          
          $this->cn->modifier($requete);
        }

        public function getAlert(){
          $this->toast = new cg_alert();
          $this->toast->get("cg_user");
        }

  }
?>