<?php include 'clientheader.php';
 $client_id=$_SESSION['client_id'];
  extract($_GET);


if (isset($_POST['update'])) {
    extract($_POST);



    $dir = "assets/";
  $file = basename($_FILES['imgg']['name']);
  $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
  $target1 = $dir.uniqid("image_").".".$file_type;
  if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target1))


    $dir = "assets/";
  $file = basename($_FILES['upload']['name']);
  $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
  $target2 = $dir.uniqid("image_").".".$file_type;
  if(move_uploaded_file($_FILES['upload']['tmp_name'], $target2))
  {
    

    echo$q="insert into application values(null,'$client_id','$target1','$date','$qualification','$target2','pending','$vid')";
    $id=insert($q);

   
   alert('insertion successfully');
   return redirect('clint_application.php');



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
    
    <form method="post"   enctype="multipart/form-data">
        <h1>Apply Now</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Photo </th>
                <td><input type="file" class="form-control"  name="imgg" required=""></td>
            </tr>


             <tr>
                <th>Upload  </th>
                <td><input type="file" class="form-control"  name="upload" required=""></td>
            </tr>

            <tr>
                <th>qualification</th>
                <td><input type="text"  name="qualification" required="" class="form-control"></td>
            </tr>
            <tr>
                <th>Date OF Birth </th>
                <td><input type="date" class="form-control"  name="date" required=""></td>
            </tr>
          
            <tr>
                <td align="center" colspan="2"><input type="submit"  class="btn btn-success" name="update" value="Register"></td>
            </tr>
        </table>
     


    </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
      


    
<?php include 'footer.php'?>