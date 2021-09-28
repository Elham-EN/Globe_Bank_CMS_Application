<?php 
   require_once('../../../private/initialize.php'); 

   if (is_post_request()) { //If check it is POST request (From form)
        $page = []; //Created Empty Array
        //Add post data from the FORM into associative array $page and 
        //check if post data contain value, if not then set it to empty string
        $page['subject_id'] = $_POST['subject_id'] ?? '';
        $page['menu_name'] = $_POST['menu_name'] ?? '';
        $page['position'] = $_POST['position'] ?? '';
        $page['visible'] = $_POST['visible'] ?? '';
        $page['content'] = $_POST['content'] ?? '';

        //INSERT data from the assoicative array into the Database
        $result = insert_page($page); //will return boolean value
        //Return the id of the lastest record the was inserted into Database
        $new_id = mysqli_insert_id($db); 
        //Redirect to show.php with the id
        redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));
   } else { //If it is not a POST request
        $page = []; //Create Empty Array
        $page['subject_id'] = '';
        $page['menu_name'] = '';
        $page['position'] = '';
        $page['visible'] = '';
        $page['content'] = '';
   } 
   //Retrieve all records in pages table
   $page_set = find_all_pages(); 
   //Return how many records there in pages table and add +1 because we
   //are going to add a new page from the FORM
   $page_count = mysqli_num_rows($page_set) + 1;
   mysqli_free_result($page_set); //Free up the result. 
?>

<?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
    <div id="content">
        <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">
            Back to the List
        </a>
        <div class="page new">
            <h1>Create Page</h1>
            <form action="<?php echo url_for('/staff/pages/new.php'); ?>" method="POST">
                <dl>
                    <dt>Subject</dt>
                    <dd>
                        <select name="subject_id">
                            <?php
                                //Get all records from the subjects table
                                $subject_set = find_all_subjects();
                                //Loop as long it able to retrieve data from the database
                                while ($subject = mysqli_fetch_assoc($subject_set)) {
                                    echo "<option value=\"" . htmlspecialchars($subject['id']) . "\"";
                                    //if subject_id from pages table equal to id from the subjects table
                                    if ($page['subject_id'] == $subject['id']) {
                                        echo " selected";
                                    }
                                    echo ">" . htmlspecialchars($subject['menu_name']) . "</option>";
                                }
                                mysqli_free_result($subject_set);
                            ?>
                        </select>
                    </dd>
                </dl>
                <dl>
                <dt>Menu Name</dt>
                    <dd><input type="text" name="menu_name" value="
                        <?php echo htmlspecialchars($page['menu_name']); ?>" />
                    </dd>
                </dl>
                <dl>
                    <dt>Position</dt>
                    <dd>
                        <select name="position">
                            <?php
                                for ($i = 1; $i <= $page_count; $i++) {
                                    echo "<option value=\"{$i}\"";
                                    if ($page['position'] == $i) {
                                        echo " selected";
                                    }
                                    echo ">{$i}</option>";
                                }
                            ?>
                        </select>
                    </dd>
                </dl>
                <dl>
                    <dt>Visible</dt>
                    <dd>
                    <input type="hidden" name="visible" value="0" />
                    <input type="checkbox" name="visible" value="1"
                        <?php if($page['visible'] == "1") { echo " checked"; } ?> />
                    </dd>
                </dl>
                <dl>
                    <dt>Content</dt>
                    <dd>
                        <textarea name="content" cols="60" rows="10">
                            <?php echo htmlspecialchars($page['content']); ?>
                        </textarea>
                    </dd>
                </dl>
                <div id="operations">
                    <input type="submit" value="Create Subject" />
                </div>
            </form>
        </div>
    </div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>