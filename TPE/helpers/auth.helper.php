<?php
class AuthHelper {
    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if(isset($_SESSION['USERNAME']))
            return $_SESSION['USERNAME'];
        else
            return null;
    }
    
    public static function checkLoggedIn(){
        session_status();
        if(!isset($_SESSION['USERNAME'])){
            return false;
        }
        else{
            return true;
        }
    }
}
?>