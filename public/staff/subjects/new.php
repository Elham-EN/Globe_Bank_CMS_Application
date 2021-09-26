<?php 
    require_once('../../../private/initialize.php'); 

    /**
     *  $test = $_GET['test'] ?? '';
    *   if ($test == '404') {
    *       error_404();
    *   } elseif ($test == '500') {
    *       error_500();
    *   } elseif ($test == 'redirect') {
    *       redirect_to(url_for('/staff/subjects/index.php'));
    *   } 
     */
    $subject_result = find_all_subjects(); //Select statement return results
    // Plus one extra for the record we're creating now.
    $subject_count = mysqli_num_rows($subject_result) + 1; //get number of records
    mysqli_free_result($subject_result);
    $subject = []; //Empty associative array
    //By default, it to be in the highest position automatically. For example if we
    //have five records, it will have a choice one through six and it will default
    //in position six automatically 
    $subject['position'] = $subject_count;
?>

<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
    <div id="content">
        <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">
            Back to the List
        </a>
        <div class="subject new">
            <h1>Create Subject</h1>
            <form action="<?php echo url_for('/staff/subjects/create.php'); ?>" method="POST">
                <dl>
                    <dt>Menu Name</dt>
                    <dd><input type="text" name="menu_name" value="" /></dd>
                </dl>
                <dl>
                    <dt>Position</dt>
                    <dd>
                        <select name="position">
                        <?php
                            //List of positions is based on how many subjects are in the database
                            for ($i = 0; $i <= $subject_count; $i++) {
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
                        <input type="checkbox" name="visible" value="1">
                    </dd>
                </dl>
                <div id="operations">
                    <input type="submit" value="Create Subject" />
                </div>
            </form>
        </div>
    </div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>