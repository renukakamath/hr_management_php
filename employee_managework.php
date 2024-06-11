<?php include 'employeeheader.php';

  $employee_id=$_SESSION['employee_id'];
  extract($_GET);

if (isset($_POST['submit'])) {
    extract($_POST);




$dir = "assets/";
  $file = basename($_FILES['imgg']['name']);
  $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
  $target = $dir.uniqid("image_").".".$file_type;
  if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
  {

    echo$q="insert into work values(null,'$employee_id','$tid','$work','$target','$details')";
    $id=insert($q);

   
   alert('insertion successfully');
   return redirect("employee_managework.php?tid=$tid");


}else
    {
      echo "file uploading error occured";
    }


}

?>

<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">

<center>
    <form method="post"  enctype="multipart/form-data">
        <h1>Work</h1>
        <br>
        <table class="table" style="width:500px;">
            <tr>
                <th>work name</th>
                <td><input type="text"  name="work" required="" class="form-control"></td>
            </tr>


             <tr>
                <th>Upload</th>
                <td><input type="file"  name="imgg" required="" class="form-control"></td>
            </tr>

             <tr>
                <th>Details</th>
                <td><input type="text"  name="details" required="" class="form-control"></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submit" value="submit"></td>
            </tr>
        </table>
</form>
</center>
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
            $q="select * from work  where trainee_id='$tid'";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['work_name'] ?></td>
                   <td><img src="<?php echo $row['upload'] ?>"  width="100" height="100"></td>
                   <td><?php echo $row['details'] ?></td>

                   <td><a href="employee_viewwork.php?tid=<?php echo $row['work_id'] ?>"  class="btn btn-success">View work status</a></td>
                  
                     
                   
                 
                   
           
                </tr>
                <?php }?>

        </table>
    </form>
</center>
<?php include 'footer.php'?>