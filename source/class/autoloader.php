<?php 

  class Autoloader {

    static function register(){
      spl_autoload_register(array(__CLASS__,'autoload'));
    }

    static function autoload($classname){
      if (file_exists(variables::$root.'/source/class/'.$classname.'.php')) {
        require variables::$root.'/source/class/'.$classname.'.php';
      }
    }
  }

?>