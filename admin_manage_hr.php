<?php include 'adminheader.php';

if (isset($_GET['aid'])) {
  extract($_GET);

  $q="update login set usertype='hr' where login_id='$aid'";
  update($q);
   alert('update successfully');
 return redirect('admin_manage_hr.php');

}
if (isset($_GET['uid'])) {
  extract($_GET);

  $q="update login set usertype='Reject' where login_id='$uid'";
  update($q);

  alert('update successfully');
  return redirect('admin_manage_hr.php');
}

?>


<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 200px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        </div></div></div></section>

        <center><h1> HR</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>HR Name</th>
                <th>Place</th>
                <th>Phone</th>
                <th>Email</th>
               
                <th>Qualification</th>
                <th>Dob</th>
                <th>Gender</th>
                
            </tr>
           <?php 

 $q="select * from hr inner join login using(login_id)  where usertype='hr' or usertype='pending'";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></td>
                   <td><?php echo $row['place'] ?> </td>
                   <td><?php echo $row['phone'] ?> </td>
                   <td><?php echo $row['email'] ?></td>
                
                   <td><?php echo $row['qualification'] ?></td>
                      <td><?php echo $row['dob'] ?></td>
                         <td><?php echo $row['gender'] ?></td>

                       <?php   if( $row['usertype']=="pending") { ?>
                        

                         <td><a href="?aid=<?php echo $row['login_id'] ?>">Accept</a></td>
                         <td><a href="?uid=<?php echo $row['login_id'] ?>">Reject</a></td>

<?php }?>
                  
           
                </tr>
              <?php }




             ?>

        </table>
    </form>
</center>
<?php include 'footer.php'?>