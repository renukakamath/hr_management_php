<?php include 'traineeheader.php';

 $trainee_id=$_SESSION['trainee_id'];
  extract($_GET);




    $q="select * from trainee  where trainee_id='$trainee_id'";
    $res=select($q);



if (isset($_POST['update'])) {
    extract($_POST); 

    echo$q="update trainee set firstname='$fname',lastname='$lname',place='$place',phone='$phone',email='$email',qualification='$qualification' where trainee_id='$trainee_id'";
    update($q);
alert('updation successfully');
   return redirect('trainee_profile.php');
}


?>
<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
<center>
     <?php if (sizeof($res)>0) { ?> 
    <form method="post">
        <h1> trainee  Profile</h1>
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
 <?php   }?>
<br>
  
       </div>
     </div>
   </div>

 </section><!-- End Hero -->


  
</center>
<?php include 'footer.php'?>