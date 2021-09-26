<?php
    require_once('../../../private/initialize.php'); 
    //This is to check whether form was submitted or not 
    if (is_post_request()) { //if post request, that means form was submitted
        //Handle form values sent by new.php
        $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
        $position = $_POST['position'] ?? '';
        $visible = $_POST['visible'] ?? '';

        $query = "INSERT INTO subjects (menu_name, position, visible) ";
        $query .= "VALUES ('" . $menu_name ."', '" . $position ."', '" . $visible ."')";
        $result = mysqli_query($db, $query);  //For INSERT statements, $result is true/false
        if ($result) { //Check if data inserted
            $new_id = mysqli_insert_id($db); //Get the new id of the new inserted record
            redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));
        } else {
            echo mysqli_error($db); //what was the problem?
            db_disconnect($db); 
            exit; //make sure noting else execute
        }
    
    } else { //if get request, means coming from the URL. Redirect back to new.php 
        redirect_to(url_for('/staff/subjects/new.php'));
    }
?>