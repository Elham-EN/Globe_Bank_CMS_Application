<?php
    require_once('../../../private/initialize.php'); 
    //This is to check whether form was submitted or not 
    if (is_post_request()) { //if post request, that means form was submitted
        //Handle form values sent by new.php
        $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
        $position = $_POST['position'] ?? '';
        $visible = $_POST['visible'] ?? '';

        echo "Form parameters<br />";
        echo "Menu name: " . $menu_name . "<br />";
        echo "Position: " . $position . "<br />";
        echo "Visible: " . $visible . "<br />";
    } else { //if get request, means coming from the URL. Redirect back to new.php 
        redirect_to(url_for('/staff/subjects/new.php'));
    }
  
?>