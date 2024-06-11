
<?php include 'employeeheader.php';
$employee_id=$_SESSION['employee_id'];
extract($_GET);
if (isset($_GET['eid'])) {
  extract($_GET);

  echo$q="insert into participants values(null,'$employee_id','$eid')";
  insert($q);
  echo$q="update event set status='participants' where event_id='$eid'";
  update($q);
  alert("successfully");
  return redirect('employeeviewevent.php');
}


 ?>


<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 200px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        </div></div></div></section>
        <center><h1> Event</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>Title</th>
                <th>Venue</th>
                <th>Date</th>
                <th>Description</th>
                <th>Status</th>
                
            </tr>
            <?php 

     $q="select * from event ";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['title'] ?></td>
                   <td><?php echo $row['venu'] ?>    </td>
                   <td><?php echo $row['date'] ?></td>
                   <td><?php echo $row['description'] ?></td>
                   <td><?php echo $row['status'] ?></td>

                   <?php if($row['status']=="pending"){ ?>
                   <td><a class="btn btn-success" href="?eid=<?php echo $row['event_id'] ?>">participation</a></td>

                   <?php }?>


                 
                   
           <?php } ?>
                </tr>
               
        </table>
    </form>
</center>
<?php include 'footer.php'?>