<?php
    function find_all_subject() {
        global $db;
        $query = "SELECT * FROM subjects ORDER BY position ASC";
        $subject_result = mysqli_query($db, $query);
        return $subject_result;
    }
?>