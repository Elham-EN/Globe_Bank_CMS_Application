<?php 
    require_once('../../../private/initialize.php'); 

    if (!isset($_GET['id'])) {
        redirect_to(url_for('/staff/subjects/index.php'));
    }

    $id = $_GET['id'];

     //if post request (process the form), that means form data was sent to database
    if (is_post_request()) {
        //Handle form values sent by new.php
        //$menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
        //*Now submit these form values to the database
        $subject = [];
        $subject['id'] = $id;
        $subject['menu_name'] = $_POST['menu_name'] ?? '';
        $subject['position'] = $_POST['position'] ?? '';
        $subject['visible'] = $_POST['visible'] ?? '';
        $result = update_subject($subject);
        redirect_to(url_for('/staff/subjects/show.php?id=' . $id));
    //if not post request, find the specific record that's already in the database
    } else { 
        $subject = find_subject_by_id($id); //Return an assoicative array
        $subject_result = find_all_subjects(); //Select statement return results
        $subject_count = mysqli_num_rows($subject_result); //get number of records
        mysqli_free_result($subject_result);
    }
?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
    <div id="content">
        <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">
            Back to the List
        </a>
        <div class="subject edit">
            <h1>Edit Subject</h1>
            <form method="POST"
            action="
                <?php echo url_for('/staff/subjects/edit.php?id=' . htmlspecialchars(urlencode($id))); ?>">
                <dl>
                    <dt>Menu Name</dt>
                    <dd>
                        <input type="text" name="menu_name" value="<?php 
                            echo htmlspecialchars($subject['menu_name']) ?>" />
                    </dd>
                </dl>
                <dl>
                    <dt>Position</dt>
                    <dd>
                        <select name="position">
                            <?php
                            //List of positions is based on how many subjects are in the database
                                for ($i = 1; $i <= $subject_count; $i++) {
                                    echo "<option value=\"{$i}\"";
                                    //If the position is equal to the current value
                                    if ($subject['position'] == $i){
                                        echo " selected"; //mark as selected
                                    }
                                    echo ">{$i}</option>";
                                } 
                            ?>
                        </select>
                    </dd>
                </dl>
                <dl>
                    <dt>Visibile</dt>
                    <dd>
                        <input type="hidden" name="visible" value="0" />
                        <input type="checkbox" name="visible" value="1"   
                            <?php if($subject['visible'] == "1") echo " checked"; ?>>
                    </dd>
                </dl>
                <div id="operations">
                    <input type="submit" value="Edit Subject" />
                </div>
            </form>
        </div>
    </div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>