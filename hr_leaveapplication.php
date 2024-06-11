   <?php include 'hrheader.php';



if (isset($_GET['did'])) {
    extract($_GET);

    $q="update leaveapplication set status='Accept' where leave_app_id='$did'";
    update($q);
     alert(' successfully');
   return redirect('hr_leaveapplication.php');

}
if (isset($_GET['uid'])) {
    extract($_GET);

    $q="update leaveapplication set status='reject' where leave_app_id='$uid'";
    update($q);

alert('updation successfully');
   return redirect('hr_leaveapplication.php');
}




?>



  


    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 200px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        </div></div></div></section>


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


                   <?php if($row['status']=="pending"){ ?>
                      <td><a href="?uid=<?php echo $row['leave_app_id'] ?>" class="btn btn-success" > Reject</a></td>
                   <td><a href="?did=<?php echo $row['leave_app_id'] ?>" class="btn btn-danger" >Accept</a></td>

                   <?php }?>
                   
                   
           
                </tr>
                <?php } ?>

        </table>
    </form>
</center>