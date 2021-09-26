<?php
    function find_all_subjects() {
        global $db;
        $query = "SELECT * FROM subjects ORDER BY position ASC";
        $subject_result = mysqli_query($db, $query);
        return $subject_result;
    }

    function find_all_pages() {
        global $db;
        $query = "SELECT * FROM pages ORDER BY subject_id ASC, position ASC";
        $page_result = mysqli_query($db, $query);
        return $page_result;
    }

    function find_subject_by_id($id) {
        global $db;
        $query = "SELECT * FROM subjects WHERE id='" . $id . "'";
        $result = mysqli_query($db, $query);
        confirm_result_Set($result); //if not set, then terminate php script
        $subject = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $subject; //return associative array
    }

    function update_subject($subject) {
        global $db;
        $sql = "UPDATE subjects SET ";
        $sql .= "menu_name='" . $subject['menu_name'] . "', ";
        $sql .= "position='" . $subject['position'] . "', ";
        $sql .= "visible='" . $subject['visible'] . "' ";
        $sql .= "WHERE id='" . $subject['id'] . "' ";
        $sql .= "LIMIT 1";
        //only expect one row/record to be update in DB
        $result = mysqli_query($db, $sql);
        // For UPDATE statements, $result is true/false
        if($result) {
          return true;
        } else {
          // UPDATE failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
        }    
      }
    
?>