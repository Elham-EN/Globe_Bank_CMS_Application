<?php require_once('../../../private/initialize.php'); ?>

<?php 
    $id = isset($_GET['id']) ? $_GET['id'] : '1'; //if not set, give default value of 1
    $subject = find_subject_by_id($id);
?>

<?php $page_title = "Show Page"; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>
    <div id="content">
        <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">
            &laquo; Back to the list
        </a>
        <br /><br />
        <div class="subject show">
            <h1>Subject: <?php echo htmlspecialchars($subject['menu_name']); ?></h1>
            <div class="attributes">
                <dl>
                    <dt>Menu Name</dt>
                    <dd> <?php echo htmlspecialchars($subject['menu_name']); ?></dd>
                </dl>
                <dl>
                    <dt>Position</dt>
                    <dd> <?php echo htmlspecialchars($subject['position']); ?></dd>
                </dl>
                <dl>
                    <dt>Visible</dt>
                    <dd> <?php echo $subject['visible'] == '1' ? 'true' : 'false'; ?></dd>
                </dl>
            </div>
        </div>
    </div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
   