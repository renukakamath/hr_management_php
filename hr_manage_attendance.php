<?php include 'hrheader.php';
$hr_id=$_SESSION['hr_id'];
extract($_GET);


if (isset($_POST['submit'])) {
    extract($_POST);

    echo$q="insert into attendance values(null,'$employee','$hr_id','$intime','$outtime',curdate())";
    $id=insert($q);

   
   alert('insertion successfully');
   return redirect('hr_manage_attendance.php');

}
if (isset($_GET['did'])) {
    extract($_GET);

    $q="delete from attendance where attendance_id='$did'";
    delete($q);
     alert('deletion successfully');
   return redirect('hr_manage_attendance.php');

}
if (isset($_GET['uid'])) {
    extract($_GET);

    $q="select * from attendance inner join employee using (employee_id) where attendance_id='$uid'";
    $res=select($q);
}
if (isset($_POST['update'])) {
    extract($_POST); 

    echo$q="update attendance set employee_id='$employee',`in_time`='$intime' ,out_time='$outtime' where  attendance_id='$uid'";
    update($q);
    alert('updation successfully');
   return redirect('hr_manage_attendance.php');
}




?>

<!-- ======= Hero Section ======= -->
  <!-- <section id="hero" class="d-flex align-items-center" style="height: 700px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
   <?php if (isset($_GET['uid'])) { ?> 
<center>
    
    <form method="post">
        <h1>Update attendance</h1>
        <table class="table" style="width:500px;">
            
            <tr>
                <th>Time In </th>
                <td><input type="time" class="form-control"  value="<?php echo $res[0]['in_time']  ?>" name="intime" required=""></td>
            </tr>

             <tr>
                <th>Time Out </th>
                <td><input type="time" class="form-control"  value="<?php echo $res[0]['out_time']  ?>" name="outtime" required=""></td>
            </tr>
            <tr>
                <th>Employee</th>
                <td><select name="employee" class="form-control">
                    <?php 
                $q="select * from  employee ";
                 $res=select($q);
                 foreach ($res as $row ) {?>
                     <option value="<?php echo $res[0]['employee_id'] ?>"><?php echo $res[0]['first_name'] ?></option>
                      <option>--Select--</option>

                      <option value="<?php echo $row['employee_id'] ?>"><?php echo $row['first_name'] ?></option>
                 <?php }



                     ?>
                  
                </select></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit"  class="btn btn-success" name="update" ></td>
            </tr>
        </table>
      <?php }else{ ?>
<br>
         <center>
    <form method="post">
        <h1>Manage attendance</h1>
        <br>
        <table class="table" style="width:500px;">
               
            <tr>
                <th>Time In </th>
                <td><input type="time" class="form-control"  name="intime" required=""></td>
            </tr>

             <tr>
                <th>Time Out </th>
                <td><input type="time" class="form-control"  name="outtime" required=""></td>
            </tr>
            <tr>
                <th>Employee</th>
                <td><select name="employee" class="form-control">
                    <?php 
                $q="select * from  employee ";
                 $res=select($q);
                 foreach ($res as $row ) {?>
                     
                      <option>--Select--</option>

                      <option value="<?php echo $row['employee_id'] ?>"><?php echo $row['first_name'] ?></option>
                 <?php }



                     ?>
                  
                </select></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submit" value="submit"></td>
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
      

<section id="hero" class="d-flex align-items-center" style="height: 700px;margin-left:0px ">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"data-aos="fade-up" data-aos-delay="100">
        <center><h1> attendance</h1>
        <table class="table" style="width:700px;">
            <tr>
                <th>Slno.</th>
                  <th>Employee</th>
                <th>In Time  
                Out Time </th>
                <th>Over Time</th>
                <th>Date</th>
              
                
                
            </tr>
            <?php 

     $q="select * from employee";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>


                    <form method="POST">

                   <td><?php echo $sino++ ?></td>
                    <td><?php echo $row['first_name'] ?></td>

                  <!-- <td><input type="radio" name="p<?php echo $sino; ?>" value="9.00">P
                    <input type="radio" name="a<?php echo $sino; ?>" value="6.00">A</td> -->

                    <td>
                        <select name="att<?php echo $sino; ?>">
                            <option value="p">Present</option>
                            <option value="a">Absent</option>
                        </select>
                    </td>



                   

                    <td><input type="text" name="overtime<?php echo $sino; ?>"></td>
                   <td><input type="date" name="date<?php echo $sino; ?>"></td>

       
            

                    <td><input type="hidden" name="emp_id<?php echo $sino; ?>" value="<?php echo $row['employee_id'] ?>">  </td>

                       </tr>
        


        <?php 

if (isset($_POST['attendance'])) {
   extract($_POST);


$overtime=$_POST['overtime'.$sino];
$emp_id=$_POST['emp_id'.$sino];
$date=$_POST['date'.$sino];
$att=$_POST['att'.$sino];


// alert($overtime);
// alert($emp_id);
// alert($date);
// alert($att);

if($att=="p"){

    $q="INSERT INTO `attendance` VALUES(NULL,'$emp_id','$hr_id','09:00','06:00','$date')";
    insert($q);
    $q1="INSERT INTO `overtime` VALUES(NULL,'$overtime','$date','$emp_id')";
    insert($q1);

}
else if($att=="a"){

    $q="INSERT INTO `attendance` VALUES(NULL,'$emp_id','$hr_id','0','0','$date')";
    insert($q);
    $q1="INSERT INTO `overtime` VALUES(NULL,'0','$date','$emp_id')";
    insert($q1);

}


  
}
$sino =$sino+1;

 ?>



             
                <?php }




             ?>


             <td><input type="submit" class="btn btn-success" name="attendance"></td>


             </form>







        </table>
    </form>
</center>

  
    </div>

  </section>
<?php include 'footer.php'?>