<?php
    //*CRUD Operation
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

    function find_page_by_id($id) {
      global $db;
  
      $sql = "SELECT * FROM pages ";
      $sql .= "WHERE id='" . $id . "'";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $page = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
      return $page; // returns an assoc. array
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

    
    
    function insert_page($page) {
      global $db;
      $sql = "INSERT INTO pages ";
      $sql .= "(subject_id, menu_name, position, visible, content) ";
      $sql .= "VALUES (";
      $sql .= "'" . $page['subject_id'] . "',";
      $sql .= "'" . $page['menu_name'] . "',";
      $sql .= "'" . $page['position'] . "',";
      $sql .= "'" . $page['visible'] . "',";
      $sql .= "'" . $page['content'] . "'";
      $sql .= ")";
      $result = mysqli_query($db, $sql);
      if ($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }
    
    function update_page($page) {
      global $db;
      $sql = "UPDATE pages SET ";
      $sql .= "subject_id='" . $page['subject_id'] . "', ";
      $sql .= "menu_name='" . $page['menu_name'] . "', ";
      $sql .= "position='" . $page['position'] . "', ";
      $sql .= "visible='" . $page['visible'] . "', ";
      $sql .= "content='" . $page['content'] . "' ";
      $sql .= "WHERE id='" . $page['id'] . "' ";
      $sql .= "LIMIT 1";
  
      $result = mysqli_query($db, $sql);
      if ($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }

    function delete_page($id) {
      global $db;
      $sql = "DELETE FROM pages WHERE id='" . $id . "' LIMIT 1";
      $result = mysqli_query($db, $sql);
      if ($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }
?>