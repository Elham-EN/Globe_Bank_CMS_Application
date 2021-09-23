<?php require_once('../../../private/initialize.php'); ?>

<?php 
  $subject_result = find_all_subject(); //Perform database query
  /**
   * $count = mysqli_num_rows($subject_result);
   * for ($i = 0; $i < $count; $i++) {
   *     $subject = mysqli_fetch_assoc($subject_result);
   *     echo $subject['menu_name'];
   * }
   */

   //Use returned data (if any)
   while ($subject = mysqli_fetch_assoc($subject_result)) {
       echo $subject['menu_name'] . "<br />";
   }
  //Array contains another array
  $subjects = [
    ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Globe Bank'],
    ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
    ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
    ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
  ];
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
               <?php foreach ($subjects as $subject) { ?>
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
                        <td><a class="action" href="">Delete</a></td>
                    </tr>
               <?php } ?>
           </table>
           <?php mysqli_free_result($subject_result); ?>
       </div> 
    </div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>        