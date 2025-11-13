<?php 
  
  class cg_alert{
    public $class;
    public $title;
    public $message;
    public $nbr_sec;
    public $history;

    public $is_fresh = false;

    public function __construct($table = ''){
      if(!empty($table))
        $this->get($table);
    }

    public function get($table){
      $this->history = new cg_history();
      $this->history->getLastAction($table);

      if(!empty($this->history->action)){

        $this->is_fresh = true;

        $this->class = "alert-".$this->history->action;
        $this->title = str_replace('_', ' ', $this->history->action)." ".$this->history->table;

        $this->nbr_sec = $this->history->nbr_sec." seconds ago";
        
        switch ($this->history->action) {
          case 'add':
            $this->message = "the client was inserted successfully";
            break;
          case 'delete':
            $this->message = "the client was deleted successfully";
            break;
          case 'move_to_trash':
            $this->message = "the client was moved to trash successfully";
            break;
          case 'update':
            $this->message = "the client was updated successfully";
            break;
          case 'restore':
            $this->message = "the client was restored successfully";
            break;
          case 'restore_all':
            $this->message = "ll clients are restored successfully";
            break;
          case 'truncate':
            $this->message = "All clients are deleted successfully";
            break;
          case 'empty_trash':
            $this->message = "the trash was empty successfully";
            break;
        }
      }
      

    }

  }

?>