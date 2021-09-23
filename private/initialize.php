<?php
    ob_start(); //Output buffering is turned one
    /**
     * Initialize.php should load up all the code that's in
     * functions.php and other libraries of codes as well.
     */

     //Constant Paths
     //D:\Full-Stack-Dev\PHP_Fullstack_Dev\PHP_With_MySQL_Build_CMS\Globe_bank\private
     define("PRIVATE_PATH", dirname(__FILE__)); 
     //D:\Full-Stack-Dev\PHP_Fullstack_Dev\PHP_With_MySQL_Build_CMS\Globe_bank
     //Go backward one and that get us globe_bank directory
     define("PROJECT_PATH", dirname(PRIVATE_PATH));
     //D:\Full-Stack-Dev\PHP_Fullstack_Dev\PHP_With_MySQL_Build_CMS\Globe_bank\public
     define("PUBLIC_PATH", PROJECT_PATH . '/public');
     //D:\Full-Stack-Dev\PHP_Fullstack_Dev\PHP_With_MySQL_Build_CMS\Globe_bank\private\shared
     define("SHARED_PATH", PRIVATE_PATH . '/shared');
     
     /**
      * *Can dynamically find everything in URL up to "/public". 
      * *Returns the position of the first occurrence of a string inside another string
      *      *first arg - return specifies the string to find
      *      *second arg = specifies the string to search
      * *$_SERVER['SCRIPT_NAME] -Returns the path of the current script in the URL
      *     e.g /PHP_With_MySQL_Build_CMS/Globe_bank/private/initialize.php 
      * *substr() - extract/return part of string
      *     *first arg - specifies the string to return a part of
      *     *second arg - specifies where to start in the string
      *     *third arg - specifies the length of the returned string
      */
     $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
     $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
     define("WWW_ROOT", $doc_root);
     
     require_once('functions.php');
     require_once('database.php');
     require_once('query_functions.php');

     //Make a connection to the database
     $db = db_connect();
?>