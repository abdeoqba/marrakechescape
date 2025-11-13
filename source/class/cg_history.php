<?php 

  class cg_history{

    private $cn;

    public $id_history;
    public $table;
    public $id_user;
    public $id_obj;
    public $action;
    public $time;
    public $nbr_sec;
    
    public $offset;
    public $nbr_pages; 
    public $nbr_total_articles; 
    public $page;

    public $histories = array();
    public $user;
    public $table_obj;
    public $id;

    public function __construct(){
      $this->cn = new GestionConnexion();
    }

    public function set($history){

      $this->id_history = $history['id_history'];
      $this->table = $history['table'];
      $this->id_user = $history['id_user'];
      if($this->id_user!= 0){
        $this->user = new cg_user();
        $this->user->get($this->id_user);
      }

      $this->id_obj = $history['id_obj'];
      /*if($this->id_obj!=0 and !in_array($this->action, array('delete','truncate','empty_trash'))){
        $this->obj = new $this->table();
        $this->obj->get($this->id_obj);
      }*/

      $this->action = $history['action'];
      $this->time = $history['time'];

      if(isset($history['time']) and $history['time'] != '')
        $this->time = variables::date_time_format($this->time);
    }

    public function getLastAction($table){
      $query = "SELECT TIME_TO_SEC(TIMEDIFF(now(), time)) AS nbr_sec,".variables::$prefix."history.* FROM ".variables::$prefix."history WHERE TIME_TO_SEC(TIMEDIFF(now(), time))<10 AND `table` = '$table' ORDER BY id_history DESC LIMIT 1;";
      $result = $this->cn->requete($query);

      if($history = $result->fetch())
        $this->set($history);
    }

    public function save($action,$obj,$table_name,$primary_key_name){
      if(in_array($action, array('empty_trash','truncate','restore_all','connect','disconnect')))
        $requete = "INSERT ".variables::$prefix."history(`id_user`,`table`,`action`,`time`) values(".$_SESSION[variables::$prefix.'id_user'].",'$table_name','$action',now());";
      else{
        if($action == 'add')
          $id_obj = $this->cn->getLastInsertedId();
        else
          $id_obj = $obj[$primary_key_name];

        $this->id_user = 0;
        if(isset($_SESSION[variables::$prefix.'id_user']))
          $this->id_user = $_SESSION[variables::$prefix.'id_user'];

        $requete = "INSERT ".variables::$prefix."history(`id_user`,`id_obj`,`table`,`action`,`time`) values(".$this->id_user.",$id_obj,'".$table_name."','$action',now());";
      }
      
      $this->cn->modifier($requete);
    }

    public function getAllHistory($page = 1){
      // variables::$nbr_article_per_page
      $this->page = $page;

      if ($this->page > 0) {
        //numbre total products
        $requete = "SELECT COUNT(*) as nbr_total_articles FROM `cg_history`";
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
      $requete = "SELECT * FROM `cg_history` ORDER BY `time` DESC ";

      if ($this->page > 0) {
        $requete .= "LIMIT ".$this->offset.", ".variables::$nbr_article_per_page;
      }

      $result = $this->cn->requete($requete);
      while($cg_history = $result->fetch()){
        $h = new cg_history();
        $h->set($cg_history);
        array_push($this->histories, $h);
      }
    }
  }

?>