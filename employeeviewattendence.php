
<?php include 'employeeheader.php' ;

    $employee_id=$_SESSION['employee_id'];
    extract($_GET);

?>


<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 200px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        </div></div></div></section>

        
        <center><h1> attendance</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>In Time</th>
                <th>Out Time</th>
                <th>Date</th>
                <th>Employee</th>
                
                
            </tr>
            <?php 

     $q="select * from attendance inner join employee using(employee_id) where employee_id='$employee_id'";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['in_time'] ?></td>
                    <td><?php echo $row['out_time'] ?></td>
                   <td><?php echo $row['date'] ?></td>
                   <td><?php echo $row['first_name'] ?></td>
                  

                    
           
                </tr>
                <?php }




             ?>


        </table>
    </form>
</center>
<?php include 'footer.php'?>