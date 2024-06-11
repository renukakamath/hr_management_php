<?php include 'hrheader.php';


if (isset($_POST['submit'])) {
    extract($_POST);

    $q="insert into overtime values(null,'$overtime','$overtimes','$date','$employee')";
    $id=insert($q);

   
   alert('insertion successfully');
   return redirect('admin_manage_overtime.php');

}
if (isset($_GET['did'])) {
    extract($_GET);

    $q="delete from overtime where overtime_id='$did'";
    delete($q);
     alert('deletion successfully');
   return redirect('admin_manage_overtime.php');

}
if (isset($_GET['uid'])) {
    extract($_GET);

    $q="select * from overtime inner join employee using (employee_id) where overtime_id='$uid'";
    $res=select($q);
}
if (isset($_POST['update'])) {
    extract($_POST); 

    echo$q="update overtime set extra_hour='$overtime',overtime='$overtimes',`date`='$date' where  overtime_id='$uid'";
    update($q);
alert('updation successfully');
   return redirect('admin_manage_overtime.php');
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
        <h1>Update overtime</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Overtime </th>
                <td><input type="text" class="form-control"  value="<?php echo $res[0]['extra_hour']  ?>" name="overtime" required=""></td>
            </tr>

            <tr>
                <th>overtime</th>
                <td><input type="time"  name="overtimes"  value="<?php echo $res[0]['overtime']  ?>" required="" class="form-control"></td>
            </tr>
            <tr>
                <th>Date </th>
                <td><input type="date" class="form-control"  value="<?php echo $res[0]['date']  ?>" name="date" required=""></td>
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
                <td align="center" colspan="2"><input type="submit"  class="btn btn-success" name="update" value="Register"></td>
            </tr>
        </table>
      <?php }else{ ?>
<br>
         <center>
    <form method="post">
        <h1>Manage overtime</h1>
        <br>
        <table class="table" style="width:500px;">
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
            <tr>
                <th>overtime To</th>
                <td><input type="time"  name="overtime" required="" class="form-control"></td>
            </tr>

            <tr>
                <th>overtime</th>
                <td><input type="time"  name="overtimes" required="" class="form-control"></td>
            </tr>
            <tr>
                <th>Date </th>
                <td><input type="date"  class="form-control" name="date" required=""></td>
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
      


        <center><h1> overtime</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>overtime</th>
                
                <th>Date</th>
                <th>Employee</th>
                
                
            </tr>
            <?php 

     $q="select * from overtime inner join employee using(employee_id)";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['extra_hour'] ?></td>
                  
                   <td><?php echo $row['date'] ?></td>
                   <td><?php echo $row['first_name'] ?></td>
                   <td><a href= "?uid=<?php echo $row['overtime_id'] ?>" class="btn btn-success" >update</a></td>
                   <td><a href= "?did=<?php echo $row['overtime_id'] ?>" class="btn btn-danger" >delete</a></td>

                   <td><a class="btn btn-danger" href="hr_prepare_salary.php?eid=<?php echo $row['employee_id']?>">Prepare Salary</a></td>

                    
           
                </tr>
                <?php }




             ?>


        </table>
    </form>
</center>
<?php include 'footer.php'?>