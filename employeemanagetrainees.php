<?php include 'employeeheader.php';


if (isset($_POST['submit'])) {
    extract($_POST);

    $q="insert into login values(null,'$uname','$passw','trainee')";
        $id=insert($q);
        $q="insert into trainee values(null,'$id','$fname','$lname','$place','$phone','$email','$qualification')";
        insert($q);
   
   alert('insertion successfully');
   return redirect('employeemanagetrainees.php');

}
if (isset($_GET['did'])) {
    extract($_GET);

    $q="delete from trainee where trainee_id='$did'";
    delete($q);
     alert('deletion successfully');
   return redirect('employeemanagetrainees.php');

}
if (isset($_GET['uid'])) {
    extract($_GET);

    $q="select * from trainee  where trainee_id='$uid'";
    $res=select($q);
}
if (isset($_POST['update'])) {
    extract($_POST); 

    echo$q="update trainee set firstname='$fname',lastname='$lname',place='$place',phone='$phone',email='$email',qualification='$qualification' where trainee_id='$uid'";
    update($q);
alert('updation successfully');
   return redirect('employeemanagetrainees.php');
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
        <h1>Update trainee</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>First Name</th>
                <td><input type="text" required="" class="form-control" value="<?php echo $res[0]['firstname']  ?>" name="fname" required=""></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><input type="text" required="" class="form-control" name="lname" value="<?php echo $res[0]['lastname']  ?>" required=""></td>
            </tr>
            <tr>
                <th>Place</th>
                <td><input type="text" required="" class="form-control" name="place" value="<?php echo $res[0]['place']  ?>" required=""></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><input type="text"required="" class="form-control" pattern="[0-9]{10}"  name="phone" value="<?php echo $res[0]['phone']  ?>" required=""></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" required="" class="form-control" name="email" value="<?php echo $res[0]['email']  ?>" required=""></td>
            </tr>
            <tr>
                <th>Qualification</th>
                <td><input type="text"  required="" class="form-control" name="qualification" value="<?php echo $res[0]['qualification']  ?>" required=""></td>
            </tr>
           
            <tr>
                <td align="center" colspan="2"><input type="submit"  class="btn btn-success" name="update"></td>
            </tr>
        </table>
 <?php   }else{ ?>
<br>
         <center>
    <form method="post">
        <h1>Manage trainee</h1>
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


        <center><h1> trainee</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>trainee Name</th>
                <th>Place</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Qualification</th>
                
                
            </tr>
            <?php 

     $q="select * from trainee ";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {
            ?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['firstname'] ?><?php echo $row['lastname'] ?></td>
                   <td><?php echo $row['place'] ?>    </td>
                   <td><?php echo $row['phone'] ?></td>
                   <td><?php echo $row['email'] ?></td>
                   <td><?php echo $row['qualification'] ?></td>
                   
                   <td><a href="?uid=<?php echo $row['trainee_id']?>" class="btn btn-success" >update</a></td>
                   <td><a href="?did=<?php echo $row['trainee_id'] ?>" class="btn btn-danger" >delete</a></td>
                   <td><a href="employee_managework.php?tid=<?php echo $row['trainee_id'] ?>"  class="btn btn-success">Manage Work</a></td>
                  
                   
           
                </tr>

            <?php } ?>
               
        </table>
    </form>
</center>
<?php include 'footer.php'?>