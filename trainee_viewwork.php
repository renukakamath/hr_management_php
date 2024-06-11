<?php include 'traineeheader.php';

  $trainee_id=$_SESSION['trainee_id'];

extract($_GET);
?>

<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 200px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">


</div></div></div></section>


        <center><h1>View  Work</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>work</th>
                <th>Upload</th>
                <th>Details</th>
              
                
                
            </tr>
            <?php
            $q="select * from work  where trainee_id='$trainee_id'";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['work_name'] ?></td>
                  
                   <td><?php echo $row['details'] ?></td>

                 

                        <td><a href="<?php echo $row['upload'] ?>  "   download><img src="<?php echo $row['upload'] ?>"   height="100" width="100" ></a></td>
                        
                         <td><a  href="trainee_sendreport.php?wid=<?php echo $row['work_id'] ?>">Send Report</a></td>
                   
                 
                   
           
                </tr>
                <?php }?>

        </table>
    </form>
</center>
<?php include 'footer.php'?>