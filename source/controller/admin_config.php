<?php

  if(isset($_POST)){

    $username=$_POST["inputEmail"];
    $password=$_POST["inputPassword"];

    if (!empty($username) and !empty($password)) {

        $need_class = true;
        $need_db = true;
        $need_auth = false;
        include ("../init.php");

        $l = new cg_user();
        $l->check_user_exist($username,$password);
        $l->authenticate();
          
        if ($l->authenticated){
          variables::cd(1);
          header("Location: ".variables::$home_page);
        }
        else
          header("Location: login");
          

    }else header("Location: login");
    
  }else header("Location: login");
  

?>