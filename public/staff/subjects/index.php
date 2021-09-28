<?php require_once('../../../private/initialize.php'); ?>

<?php 
  $subject_result = find_all_subjects(); //Perform database query
  /**Method_1
   * $count = mysqli_num_rows($subject_result);
   * for ($i = 0; $i < $count; $i++) {
   *     $subject = mysqli_fetch_assoc($subject_result);
   *     echo $subject['menu_name'];
   * }
   */


?>

<?php $page_title = 'Subjects';?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
    <div id="content">
       <div class="subjects listing">
           <h1>Subjects</h1>
           <div class="actions">
               <a class="action" href="<?php echo url_for('/staff/subjects/new.php');?>">Create New Subject</a>
           </div>
           <table class="list">
               <tr>
                   <th>ID</th>
                   <th>Position</th>
                   <th>Visible</th>
                   <th>Name</th>
                   <th>&nbsp;</th>
                   <th>&nbsp;</th>
                   <th>&nbsp;</th>
               </tr>
               <?php while ($subject = mysqli_fetch_assoc($subject_result)) { ?>
                    <tr>
                        <td><?php echo $subject['id']; ?></td>
                        <td><?php echo $subject['position']; ?></td>
                        <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
                        <td><?php echo $subject['menu_name']; ?></td>
                        <td><a class="action" 
                                href="<?php  echo
                                        url_for('/staff/subjects/show.php?id=' . $subject['id']); 
                                      ?>">
                                View
                             </a></td>
                        <td>
                            <a class="action" href="
                                <?php echo url_for('/staff/subjects/edit.php?id=' . $subject['id']);?>">
                                Edit
                            </a>
                        </td>
                        <td><a class="action" href="
                                <?php echo url_for('/staff/subjects/delete.php?id=' . $subject['id']);?>">
                                Delete
                            </a>
                        </td>
                    </tr>
               <?php } ?>
           </table>
           <?php mysqli_free_result($subject_result); ?>
       </div> 
    </div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>        