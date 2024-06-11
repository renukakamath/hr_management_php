<?php include 'hrheader.php';


if (isset($_POST['submit'])) {
    extract($_POST);

    $q="insert into event values(null,'$title','$venue','$date','$description','pending')";
    $id=insert($q);
      
   
   alert('insertion successfully');
   return redirect('hr_manageevent.php');

}
if (isset($_GET['did'])) {
    extract($_GET);

    $q="delete from event where event_id='$did'";
    delete($q);
     alert('deletion successfully');
   return redirect('hr_manageevent.php');

}
if (isset($_GET['uid'])) {
    extract($_GET);

    $q="select * from event  where event_id='$uid'";
    $res=select($q);
}
if (isset($_POST['update'])) {
    extract($_POST); 

    echo$q="update event set title='$title',venu='$venue',`date`='$date',description='$description' where event_id='$uid'";
    update($q);
alert('updation successfully');
   return redirect('hr_manageevent.php');
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
        <h1>Update Event</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Title</th>
                <td><input type="text" class="form-control" value="<?php echo $res[0]['title']  ?>"  name="title" required=""></td>
            </tr>
            <tr>
                <th>Venue</th> 
                <td><input type="text" class="form-control"  name="venue" value="<?php echo $res[0]['venu']  ?>" required=""></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><input type="date" class="form-control"  name="date" value="<?php echo $res[0]['date']  ?>" required=""></td>
            </tr>
            <tr>
                <th>Description</th> 
                <td><input type="text" class="form-control"  name="description" value="<?php echo $res[0]['description']  ?>" required=""></td>
            </tr>
          
            <tr>
                <td align="center" colspan="2"><input type="submit" name="update"></td>
            </tr>
        </table>
 <?php   }else{ ?>
<br>
         <center>
    <form method="post">
        <h1>Manage Event</h1>
        <br>
        <table class="table" style="width:500px;">
            <tr>
                <th>Title</th>
                <td><input type="text" class="form-control" name="title" required=""></td>
            </tr>
            <tr>
                <th>Venue</th>
                <td><input type="text "class="form-control"  name="venue"  required=""></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><input type="date" class="form-control"  name="date" required=""></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><input type="text" class="form-control"  name="description"  required=""></td>
            </tr>
          
            <tr>
                <td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submit" value="submit"></td>
            </tr>
        </table>
<?php } ?>
       </div>
     </div>
   </div>

 </section><!-- End Hero -->


        <center><h1> Event</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>Title</th>
                <th>Venue</th>
                <th>Date</th>
                <th>Description</th>
               <th>User name</th>
                
            </tr>
            <?php 

     $q="select * from event inner join participants using (event_id) inner join employee using (employee_id) ";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['title'] ?></td>
                   <td><?php echo $row['venu'] ?>    </td>
                   <td><?php echo $row['date'] ?></td>
                   <td><?php echo $row['description'] ?></td>
                   <td><?php echo $row['first_name']?></td>
                   
                   <td><a href="?uid=<?php echo $row['event_id']?>" class="btn btn-success" >update</a></td>
                   <td><a href="?did=<?php echo $row['event_id'] ?>" class="btn btn-danger" >delete</a></td>
                   
           <?php } ?>
                </tr>
               
        </table>
    </form>
</center>
<?php include 'footer.php'?>