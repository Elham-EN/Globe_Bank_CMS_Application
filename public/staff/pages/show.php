<?php require_once('../../../private/initialize.php'); ?>

<?php 
    $id = isset($_GET['id']) ? $_GET['id'] : '1'; 
    //Select one page based on the id from GET request from the URL
    $query = "SELECT * FROM pages WHERE id='" . $id . "'";
    //Get the the result based on the query i have defined
    $result = mysqli_query($db, $query);
    //If result is not set, then terminate the php program
    if (!$result) {
        exit("Database query failed");
    }
    //Fetch result row as a assoicaitve array
    $page = mysqli_fetch_assoc($result);
    echo "<pre>"; print_r($page); echo "</pre>"; //readable array
    //Free the memory to increase performance
    mysqli_free_result($result); 
?>

<?php $page_title = "Show Page"; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>
    <div id="content">
        <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">
            &laquo; Back to the list
        </a>
        <br /><br />
        <div class="page show">
            <h1>
                Page: <?php echo htmlspecialchars($page['menu_name']); ?>
            </h1>
            <div class="attributes">
                <?php $subject = find_subject_by_id($page['subject_id']); ?>
                <dl>
                    <dt>Menu Name</dt>
                    <dd> 
                        <?php echo htmlspecialchars($subject['menu_name']); ?>
                    </dd>
                </dl>
                <dl>
                    <dt>Position</dt>
                    <dd> 
                        <?php echo htmlspecialchars($page['position']); ?>
                    </dd>
                </dl>
                <dl>
                    <dt>Visible</dt>
                    <dd> 
                        <?php echo $page['visible'] == '1' ? 'true' : 'false'; ?>
                    </dd>
                </dl>
                <dl>
                    <dt>Content</dt>
                    <dd><?php echo htmlspecialchars($page['content']); ?></dd>
                </dl>
            </div>
        </div>
    </div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
   
    