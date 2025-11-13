<?php 

  require 'var.php';

  //date_default_timezone_set('Africa/Casablanca');
  date_default_timezone_set('UTC');
  
  ///project
  //debug: inder developpment
  if(variables::$debug){
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
  }

/*  
  $need_class = true;
  $need_db = true;
  $need_auth = false;
*/

  $root = $_SERVER['DOCUMENT_ROOT'];
  $hosted = $root[0] == '/';

  variables::$root = $root;

  if(!$hosted)
    variables::$root .=  '/'.variables::$project_url;

  //is hosted
  variables::$is_demo = (!($_SERVER['SERVER_NAME'] == variables::$domain_name) and $hosted);
  variables::set($hosted);
  variables::$sql_query_debug = false;


  if(variables::$is_demo)
    variables::$root = $_SERVER['DOCUMENT_ROOT'].'/demo/'.variables::$project_url.'/';

  ///page
  //use class
  if($need_class){
    require variables::$root.'/source/class/autoloader.php';
    Autoloader::register();
  }
    
  //need authentificat
  if($need_auth)
    require variables::$root.'/source/controller/admin_check_login.php';


  //use database: need data
  if($need_db)
    require variables::$root.'/source/model/gestion_donnee.php';

?>