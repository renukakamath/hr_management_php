<?php include 'hrheader.php';
$hr_id=$_SESSION['hr_id'];
extract($_GET);

if (isset($_POST['submit'])) {
    extract($_POST);



$dir = "assets/";
  $file = basename($_FILES['imgg']['name']);
  $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
  $target = $dir.uniqid("image_").".".$file_type;
  if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
  {
    

    $q="insert into vaccancy values(null,'$hr_id','$post','$target','$details')";
    $id=insert($q);




      
   
   alert('insertion successfully');
   return redirect('hr_managevaccancy.php');



}else
    {
      echo "file uploading error occured";
    }


}
if (isset($_GET['did'])) {
    extract($_GET);

    $q="delete from vaccancy where vaccancy_id='$did'";
    delete($q);
     alert('deletion successfully');
   return redirect('hr_managevaccancy.php');

}
if (isset($_GET['uid'])) {
    extract($_GET);

    $q="select * from vaccancy  where vaccancy_id='$uid'";
    $res=select($q);


}
if (isset($_POST['update'])) {
    extract($_POST); 



$dir = "assets/";
  $file = basename($_FILES['imgg']['name']);
  $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
  $target = $dir.uniqid("image_").".".$file_type;
  if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
  {
    


    echo$q="update vaccancy set post='$post',details='$details',image='$target' where vaccancy_id='$uid'";
    update($q);
alert('updation successfully');
   return redirect('hr_managevaccancy.php');


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
 <?php if (isset($_GET['uid'])) { ?> 
<center>
    
    <form method="post"  enctype="multipart/form-data">
        <h1>Update vaccancy</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Post</th>
                <td><input type="text" class="form-control" value="<?php echo $res[0]['post']  ?>"  name="post" required=""></td>
            </tr>
            <tr>
                <th>details</th> 
                <td><input type="text" class="form-control"  name="details" value="<?php echo $res[0]['details']  ?>" required=""></td>
            </tr>
           
            <tr>
                <th>Image</th> 
                <td><img src="<?php echo $res[0]['image']  ?>" width="100" height="100"></td>
                <td><input type="file" class="form-control"  name="imgg"  required=""></td>
            </tr>
          
            <tr>
                <td align="center" colspan="2"><input type="submit" name="update"></td>
            </tr>
        </table>
 <?php   }else{ ?>
<br>
         <center>
    <form method="post"   enctype="multipart/form-data">
        <h1>Manage vaccancy</h1>
        <br>
        <table class="table" style="width:500px;">
          
            <tr>
                <th>Post</th>
                <td><input type="text "class="form-control"  name="post"  required=""></td>
            </tr>

              <tr>
                <th>details</th>
                <td><input type="text" class="form-control" name="details" required=""></td>
            </tr>
          
            <tr>
                <th>Image</th>
                <td><input type="file" class="form-control"  name="imgg"  required=""></td>
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
                  
                   
                   <td><a href="?uid=<?php echo $row['vaccancy_id']?>" class="btn btn-success" >update</a></td>
                   <td><a href="?did=<?php echo $row['vaccancy_id'] ?>" class="btn btn-danger" >delete</a></td>
                   
           <?php } ?>
                </tr>
               
        </table>
    </form>
</center>
<?php include 'footer.php'?>