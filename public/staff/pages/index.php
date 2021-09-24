<?php require_once('../../../private/initialize.php'); ?>

<?php $page_result = find_all_pages(); ?>

<?php $page_title = 'Page';?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
    <div id="content">
        <div class="pages listing">
            <h1>Pages</h1>
            <div class="actions">
                <a class="action" href="<?php echo url_for('/staff/pages/new.php');?>"> Create New Page</a>
            </div>
            <table class="list">
               <tr>
                   <th>ID</th>
                   <th>Subject ID</th>
                   <th>Position</th>
                   <th>Visible</th>
                   <th>Name</th>
                   <th>&nbsp;</th>
                   <th>&nbsp;</th>
                   <th>&nbsp;</th>
               </tr>
               <?php while ($page = mysqli_fetch_assoc($page_result)) { ?>
                <tr>
                    <td><?php echo $page['id']; ?></td>
                    <td><?php echo $page['subject_id']; ?></td>
                    <td><?php echo $page['position']; ?></td>
                    <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
                    <td><?php echo $page['menu_name']; ?></td>
                    <td><a class="action" 
                            href="<?php  echo
                                    url_for('/staff/pages/show.php?id=' . htmlspecialchars(urlencode($page['id']))); 
                                    ?>">
                            View
                            </a></td>
                    <td>
                        <a class="action" href="<?php echo url_for('/staff/pages/edit.php?id=' . $page['id']);?>">
                            Edit
                        </a>
                    </td>
                    <td><a class="action" href="">Delete</a></td>
                </tr>
               <?php } ?>
            </table>
            <?php mysqli_free_result($page_result); ?>
        </div>
    </div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
