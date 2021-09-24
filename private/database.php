<?php
    require_once('db_credentials.php');

    function db_connect() {
        $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, 3306);
        //$connection = mysqli_connect("localhost", "soran", "soranXD555" ,"globe_bank");
        confirm_db_connect();
        return $connection;
    }

    function db_disconnect($connection) {
        if (isset($connection)) {
            mysqli_close($connection);
        }
    }

    function confirm_db_connect() {
        //Check what was the most recent connection, was there an error?
        if (mysqli_connect_errno()) {
            //Display the error message
            $msg = "Database connection failed: ";
            $msg .= mysqli_connect_error();
            $msg .= " (" . mysqli_connect_errno() . ")";
            exit($msg); //stop php code from that point
        }
    }

    function confirm_result_Set($result_set) {
        if (!$result_set) {
            exit("Database query failed"); //will terminate the program
        }
    }
?>