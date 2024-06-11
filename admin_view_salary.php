<?php include 'adminheader.php'?>

<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 200px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        </div></div></div></section>

  <center><h1> Salary</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>User Name</th>
                <th>Basic Salary</th>
            
                <th>Month</th>
               
              
                
               
                
            </tr>
           <?php 

     $q="select * from salary inner join employee using(employee_id)";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></td>
                   <td><?php echo $row['basic_salary'] ?> </td>
                 
                   <td><?php echo $row['house_rent'] ?></td>
                    
                    
                       
           
                </tr>
              <?php }




             ?>

        </table>
    </form>
</center>
<?php include 'footer.php'?>