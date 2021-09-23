<?php
    require_once('db_credentials.php');

    function db_connect() {
        $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, 3306);
        //$connection = mysqli_connect("localhost", "soran", "soranXD555" ,"globe_bank");
        return $connection;
    }

    function db_disconnect($connection) {
        if (isset($connection)) {
            mysqli_close($connection);
        }
    }
?>