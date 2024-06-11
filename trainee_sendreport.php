<?php include 'traineeheader.php';

 $trainee_id=$_SESSION['trainee_id'];
  extract($_GET);


if (isset($_POST['submit'])) {
    extract($_POST);

    $q="insert into daily_report values(null,'$wid','$eid','$trainee_id','$feedback',pending)";
    $id=insert($q);

   
   alert('insertion successfully');
   return redirect("trainee_sendreport.php?wid=$wid");

}

?>

<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">

<center>
    <form method="post">
        <h1>daily report</h1>
        <br>
        <table class="table" style="width:500px;">
            <tr>
                <th>Details</th>
                <td><input type="text"  name="feedback" required="" class="form-control"></td>
            </tr>
            <tr>
              <th>Employee</th>
              <td><select  class="form-control"  name="eid">

                <?php 

              $q="select * from employee";
              $res=select($q);

              foreach ($res as $row ) {
               ?>

            <option  value="<?php echo  $row['employee_id'] ?>"><?php echo $row['first_name'] ?></option>
               <?php  
              }
                 ?>
              
              </select></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submit" value="submit"></td>
            </tr>
        </table>
</form>
</center>
</div></div></div></section>


        <center><h1> daily report</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>Employee</th>
                <th>Details</th>
                <th>Status</th>
                
                
            </tr>
            <?php
            $q="select * from daily_report inner join employee using (employee_id)";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['first_name'] ?></td>
                   <td><?php echo $row['details'] ?></td>
                     <td><?php echo $row['status'] ?></td>
                   
                 
                   
           
                </tr>
                <?php }?>

        </table>
    </form>
</center>
<?php include 'footer.php'?>