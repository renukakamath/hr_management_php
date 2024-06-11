<?php include 'employeeheader.php';

if (isset($_POST['submit'])) {
    extract($_POST);

    echo$q="insert into benefits values(null,'$desig','$benefits','$des')";
    $id=insert($q);

   
   alert('insertion successfully');
   return redirect('hr_addbenifit.php');

}

?>

<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 200px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">


</div></div></div></section>


        <center><h1> work status</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>details</th>
                <th>status</th>
                <th>trainee</th>
                
              
                
                
            </tr>
            <?php
            $q="select * from daily_report inner join trainee using (trainee_id)";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['details'] ?></td>
                   <td><?php echo $row['status'] ?></td>
                   <td><?php echo $row['firstname'] ?></td>

                     
                   
                 
                   
           
                </tr>
                <?php }?>

        </table>
    </form>
</center>
<?php include 'footer.php'?>