<?php include 'clientheader.php';

 $client_id=$_SESSION['client_id'];
  extract($_GET);

  ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 200px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        </div></div></div></section>

        <center><h1> vaccancy</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                
                <th>Post</th>

                <th>details</th>
                <th>Image</th>
                
                
            </tr>
            <?php 

     $q="select * from vaccancy  ";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                 
                   <td><?php echo $row['post'] ?>    </td>

                     <td><?php echo $row['details'] ?></td>
                   <td><img src="<?php echo $row['image'] ?> " width="100" height="100"></td>
                   <td><a href="clint_application.php?vid=<?php echo $row['vaccancy_id'] ?>">Apply</a></td>
                  
                   
                  
                   
           <?php } ?>
                </tr>
               
        </table>
    </form>
</center>

<?php include 'footer.php'?>