<?php
    /**
     * Define the the function that we are going to use
     */
    
     function url_for($script_path) {
         //add the leading '/' if not present
         if ($script_path[0] != '/') {
             $script_path = "/" . $script_path;
         }
         return WWW_ROOT . $script_path;
     }

     function urlencodeSpecialChars($string='') {
         return urlencode($string);
     }

     function error_404() {
         /**
          * In order to return 404 error, need to use the header
          * function and need to provide a string.
          * Use $_SERVER Global to ask for current server protocol
          * is because protocol often change
          * $_SERVER['SERVER_PROTOCOL'] => HTTP/1.1
          */
          header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
          exit(); //don't do any additional php, we are done
     }

     function error_500() {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        exit();
     }

     function redirect_to($location) {
        header("Location:" . $location);
        //Good practice to put exit afterwards so that
        //no other code on the page executes
        exit;
     }

     function is_get_request() {
         return $_SERVER['REQUEST_METHOD'] == 'GET';
     }

     function is_post_request() {
         return $_SERVER['REQUEST_METHOD'] == 'POST';
     }
?>