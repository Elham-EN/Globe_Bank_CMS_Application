<?php
    require_once('../../../private/initialize.php');

    if(!isset($_GET['id'])) {
        redirect_to(url_for('/staff/subjects/index.php'));
    }

    $id = $_GET['id'];
    $subject = find_subject_by_id($id);

    if(is_post_request()) { //if post request
        //Delete one record only
        $quey = "DELETE FROM subjects WHERE id='" . $id . "' LIMIT 1";
        $result = mysqli_query($db, $quey);
        //For DELETE Statement, $result is true/false
         if (!empty($result)) {
             redirect_to(url_for('/staff/subjects/index.php'));
         } else { //DELETE Failed
             echo mysqli_error($db);
             db_disconnect($db);
             exit;
         }
    }
?>

<?php $page_title = 'Delete Subject'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">
            &laquo; Back to List
        </a>

        <div class="subject delete">

            <h1>Delete Subject</h1>
            <p>Are you sure you want to delete this subject?</p>
            <p class="item"><?php echo htmlspecialchars($subject['menu_name']); ?></p>

            <form action="<?php echo url_for('/staff/subjects/delete.php?id=' . 
                htmlspecialchars(urlencode($subject['id']))); ?>" method="POST">
                <div id="operations">
                    <input type="submit" name="commit" value="Delete Subject" />
                </div>
            </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>