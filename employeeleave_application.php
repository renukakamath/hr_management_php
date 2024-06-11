<?php include 'employeeheader.php';

 $employee_id=$_SESSION['employee_id'];
   extract($_GET);

if (isset($_POST['submit'])) {
    extract($_POST);

 $q="insert into leaveapplication values(null,'$employee_id','$adate','$atodate','$no_of_days','$reason','pending')";
    $id=insert($q);

   
   alert('insertion successfully');
   return redirect('employeeleave_application.php');

}
if (isset($_GET['did'])) {
    extract($_GET);

    $q="delete from leaveapplication where leave_app_id='$did'";
    delete($q);
     alert('deletion successfully');
   return redirect('employeeleave_application.php');

}
if (isset($_GET['uid'])) {
    extract($_GET);

    $q="select * from leaveapplication inner join employee using (employee_id) where leave_app_id='$uid'";
    $res1=select($q);
}
if (isset($_POST['update'])) {
    extract($_POST); 

$q="update leaveapplication set applied_date='$adate',applied_to_date='$atodate',no_of_days='$no_of_days',reason='$reason'where leave_app_id='$uid'";
    update($q);
alert('updation successfully');
   return redirect('employeeleave_application.php');
}




?>



<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">


   <?php if (isset($_GET['uid'])) { ?> 
<center>
    
    <form method="post">
        <h1>Update Leave</h1>
        <table class="table" style="width:500px;">
           
            <tr>
                <th>Applied date </th>
                <td><input type="date" class="form-control"  value="<?php echo $res1[0]['applied_date'] ?>" name="adate" required=""></td>
            </tr>
               <tr>
                <th>Applied To date </th>
                <td><input type="date"class="form-control"  value="<?php echo  $res1[0]['applied_to_date'] ?>" name="atodate" required=""></td>
            </tr>
            <tr>
                <th>NO OF Days </th>
                <td><input type="text" class="form-control"  value="<?php echo  $res1[0]['no_of_days'] ?>" name="no_of_days" required=""></td>
            </tr>
              <tr>
                <th>Reason </th>
                <td><input type="text" class="form-control"  value="<?php echo  $res1[0]['reason'] ?>" name="reason" required=""></td>
            </tr>
            
            <tr>
                <td align="center" colspan="2"><input type="submit" class="btn btn-success" name="update" value="Register"></td>
            </tr>
        </table>
     <?php }else{ ?>
<br>
         <center>
    <form method="post">
        <h1>Manage Leave</h1>
        <br>
         <table class="table" style="width:500px;">
           
            <tr>
                <th>Applied date </th>
                <td><input type="date" class="form-control"  name="adate" required=""></td>
            </tr>
               <tr>
                <th>Applied To date </th>
                <td><input type="date"  class="form-control"  name="atodate" required=""></td>
            </tr>
            <tr>
                <th>NO OF Days </th>
                <td><input type="text" class="form-control"  name="no_of_days" required=""></td>
            </tr>
              <tr>
                <th>Reason </th>
                <td><input type="text"  class="form-control" name="reason" required=""></td>
            </tr>
            
            <tr>
                <td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submit" value="Register"></td>
            </tr>
        </table>
<?php } ?> 

 </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->     

        <center>
            <h1> Leave</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>Employee</th>
                <th>Applied Date</th>
                <th>Applied To Date</th>
                     <th>No OF Days</th>
                <th>Reason</th>
                <th>Status</th>
                
                
            </tr>
         <?php
            $q="select * from leaveapplication inner join employee using (employee_id)";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['first_name'] ?></td>
                   <td><?php echo $row['applied_date'] ?></td>
                   <td><?php echo $row['applied_to_date'] ?></td>
                    <td><?php echo $row['no_of_days'] ?></td>
                   <td><?php echo $row['reason'] ?></td>
                   <td><?php echo $row['status'] ?></td>
                      <td><a href="?uid=<?php echo $row['leave_app_id'] ?>" class="btn btn-success" >update</a></td>
                   <td><a href="?did=<?php echo $row['leave_app_id'] ?>" class="btn btn-danger" >delete</a></td>
                   
                   
           
                </tr>
                <?php } ?>

        </table>
    </form>
</center>
<?php include 'footer.php'?>