<?php 
    require_once('../../../private/initialize.php'); 

    if (!isset($_GET['id'])) {
        redirect_to(url_for('/staff/pages/new.php'));
    }

    $id = $_GET['id'];
    $menu_name = '';
    $position = '';
    $visible = '';

    if (is_post_request()) { //if post request, that means form was submitted
        //Handle form values sent by new.php
        $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
        $position = $_POST['position'] ?? '';
        $visible = $_POST['visible'] ?? '';

        echo "Form parameters<br />";
        echo "Menu name: " . $menu_name . "<br />";
        echo "Position: " . $position . "<br />";
        echo "Visible: " . $visible . "<br />";
    }
?>

<?php $page_title = 'Edit Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
    <div id="content">
        <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">
            Back to the List
        </a>
        <div class="subject edit">
            <h1>Edit Page</h1>
            <form method="POST"
            action="
                <?php echo url_for('/staff/pages/edit.php?id=' . htmlspecialchars(urlencode($id))); ?>">
                <dl>
                    <dt>Menu Name</dt>
                    <dd><input type="text" name="menu_name" value="<?php echo $menu_name ?>" /></dd>
                </dl>
                <dl>
                    <dt>Position</dt>
                    <dd>
                        <select name="position">
                            <option value="1">1</option>
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
                    <input type="submit" value="Edit Subject" />
                </div>
            </form>
        </div>
    </div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>