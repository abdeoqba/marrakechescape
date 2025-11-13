<?php 

  class variables {
      
      //database
      public static $host = "localhost";
      public static $username = "root";
      public static $password = "";
      public static $database = "marrakechescape.com_db";
      public static $character = "utf8";

      //debug
      public static $debug = true;
      public static $sql_query_debug = false;
      public static $is_hosted = false;
      public static $is_demo = false;

      //cg
      public static $project_name = "Marrakech Escape";
      public static $project_url = "marrakechescape.com";
      public static $domain_name = "marrakechescape.com";
      public static $prefix = "cg_";

      //navige
      public static $header_level = 1;
      public static $cd = "../";
      public static $root;
      public static $home_page = "admin/";

      //folders
      public static $css = "asset/css/";
      public static $js = "asset/js/";
      public static $image = "asset/image/";
      public static $fonts = "asset/fonts/";
      public static $svgs = "asset/svgs/";
      public static $webfonts = "asset/webfonts/";


      //date format
      public static $date_format = "Y-m-d";
      public static $human_date_format = "F jS, Y";
      public static $time_format = "H:i:s";
      public static $date_time_format;

      //settings
      public static $nbr_article_per_page = 24;

      public static function set($is_hosted){

        self::$is_hosted = $is_hosted;

        if(self::$is_hosted){
          
          //if developpment will disable when hosted
          self::$debug = false;

          self::$host .= ":3306";
          if(!self::$is_demo){
            self::$username = "scaper_oqba";
            self::$password = "aMf(!nTGvZFpoM!X";
            self::$database = "scaper_marrakech_db";
          }else{
            self::$username = "";
            self::$password = "";
            self::$database = "";
          }
        }
      }

      public static function cd($header_level){
        self::$header_level = $header_level;

        switch ($header_level) {
          case 0:
            self::$cd = "";
            break;
          case 1:
            self::$cd = "../";
            break;
          case 2:
            self::$cd = "../../";
            break;
          case 3:
            self::$cd = "../../../";
            break;
          
          default:
            self::$cd = "../";
            break;
        }

        self::$css = self::$cd . self::$css;
        self::$js = self::$cd . self::$js;
        self::$image = self::$cd . self::$image;
        self::$fonts = self::$cd . self::$fonts;
        
        self::$home_page = self::$cd . self::$home_page;
      }

      public static function date_format($datetime){
        return date(self::$date_format,strtotime($datetime));
      }

      public static function human_date_format($datetime){
        return date(self::$human_date_format,strtotime($datetime));
      }

      public static function time_format($datetime){
        return date(self::$time_format,strtotime($datetime));
      }

      public static function date_time_format($datetime){
        self::$date_time_format = self::$date_format." ".self::$time_format;
        return date(self::$date_time_format,strtotime($datetime));
      }

      public static function date_time_local_format(){
        return date(self::$date_format)."T".date(self::$time_format);
      }

      public static function date_local_format(){
        return date(self::$date_format);
      }
      
      public static function imageResize($imageResourceId,$width,$height,$targetWidth,$targetHeight) {

        $targetLayer=imagecreatetruecolor($width,$height);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$width,$height, $width,$height);

        return $targetLayer;
      }
  }

?>