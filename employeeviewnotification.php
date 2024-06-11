<?php include 'employeeheader.php'?>


<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 200px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        </div></div></div></section>
        <center><h1> Notification</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>Notification</th>
                <th>date</th>
                
                
            </tr>
            <?php
            $q="select * from notification ";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['notification'] ?></td>
                     <td><?php echo $row['date'] ?></td>
                   
                 
                   
           
                </tr>
                <?php }?>

        </table>
    </form>
</center>
<?php include 'footer.php'?>