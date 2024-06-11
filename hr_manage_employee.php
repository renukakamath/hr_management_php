<?php include 'hrheader.php';


if (isset($_POST['submit'])) {
    extract($_POST);

    $q="insert into login values(null,'$uname','$passw','employee')";
        $id=insert($q);
        $q="insert into employee values(null,'$id','$fname','$lname','$place','$phone','$email','$qualification','$salary')";
        insert($q);
   
   alert('insertion successfully');
   return redirect('hr_manage_employee.php');

}
if (isset($_GET['did'])) {
    extract($_GET);

    $q="delete from employee where employee_id='$did'";
    delete($q);
     alert('deletion successfully');
   return redirect('hr_manage_employee.php');

}
if (isset($_GET['uid'])) {
    extract($_GET);

    $q="select * from employee  where employee_id='$uid'";
    $res=select($q);
}
if (isset($_POST['update'])) {
    extract($_POST); 

    echo$q="update employee set first_name='$fname',last_name='$lname',place='$place',phone='$phone',email='$email',qualification='$qualification' where employee_id='$uid'";
    update($q);
alert('updation successfully');
   return redirect('hr_manage_employee.php');
}


?>
<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
<center>
     <?php if (isset($_GET['uid'])) { ?> 
    <form method="post">
        <h1>Update Employee</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>First Name</th>
                <td><input type="text"  value="<?php echo $res[0]['first_name']  ?>" name="fname" required=""></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><input type="text"  name="lname" value="<?php echo $res[0]['last_name']  ?>" required=""></td>
            </tr>
            <tr>
                <th>Place</th>
                <td><input type="text"  name="place" value="<?php echo $res[0]['place']  ?>" required=""></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><input type="text" pattern="[0-9]{10}"  name="phone" value="<?php echo $res[0]['phone']  ?>" required=""></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email"  name="email" value="<?php echo $res[0]['email']  ?>" required=""></td>
            </tr>
            <tr>
                <th>Qualification</th>
                <td><input type="text"  name="qualification" value="<?php echo $res[0]['qualification']  ?>" required=""></td>
            </tr>
             <tr>
                <th>Salary</th>
                <td><input type="text"  value="10000" readonly=""  name="salary" required="" class="form-control"></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" name="update"></td>
            </tr>
        </table>
 <?php   }else{ ?>
<br>
         <center>
    <form method="post">
        <h1>Manage Employee</h1>
        <br>
        <table class="table" style="width:500px;">
            <tr>
                <th>First Name</th>
                <td><input type="text"  name="fname" required="" class="form-control"></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><input type="text"  name="lname" required="" class="form-control"></td>
            </tr>
            <tr>
                <th>Place</th>
                <td><input type="text" name="place" required="" class="form-control"></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><input type="text"  pattern="[0-9]{10}" name="phone" required="" class="form-control"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email"  name="email" required="" class="form-control"></td>
            </tr>
            <tr>
                <th>Qualification</th>
                <td><input type="text"  name="qualification" required="" class="form-control"></td>
            </tr>
              <tr>
                <th>Salary</th>
                <td><input type="text" value="10000" readonly="" name="salary" required="" class="form-control"></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><input type="text"  name="uname" required="" class="form-control"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password"  name="passw" required="" class="form-control"></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submit" value="submit"></td>
            </tr>
        </table>
<?php } ?>
       </div>
     </div>
   </div>

 </section><!-- End Hero -->


        <center><h1> Employee</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>Employee Name</th>
                <th>Place</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Qualification</th>
                <th>Salary</th>
                
            </tr>
            <?php 

     $q="select * from employee ";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {
            ?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['first_name'] ?><?php echo $row['last_name'] ?></td>
                   <td><?php echo $row['place'] ?>    </td>
                   <td><?php echo $row['phone'] ?></td>
                   <td><?php echo $row['email'] ?></td>
                   <td><?php echo $row['qualification'] ?></td>
                   <td><?php echo $row['salary'] ?></td>
                   <td><a href="?uid=<?php echo $row['employee_id']?>" class="btn btn-success" >update</a></td>
                   <td><a href="?did=<?php echo $row['employee_id'] ?>" class="btn btn-danger" >delete</a></td>
                  <!--  <td><a href="hr_adddesignation.php"  class="btn btn-success">Designation</a></td>
                   <td><a href="hr_addbenifit.php" class="btn btn-success">Benifit</a></td>
                    -->
           
                </tr>

            <?php } ?>
               
        </table>
    </form>
</center>
<?php include 'footer.php'?>