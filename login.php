<?php include 'publicheader.php';

if (isset($_POST['submit'])) {
   extract($_POST);

   $q="select * from login where username='$uname' and password='$pword'";
   $res=select($q);

   if (sizeof($res)>0) 
   {
      $_SESSION['logid']=$res[0]['login_id'];
    $logid=$_SESSION['logid'];
   	if ($res[0]['usertype']=="admin") {
   	   return redirect('adminhome.php');

    }elseif ($res[0]['usertype']=="hr") {
      $q="select * from hr where login_id='$logid'";
      $res=select($q);
      if (sizeof($res)>0) {
        $_SESSION['hr_id']=$res[0]['hr_id'];
          $hr_id=$_SESSION['hr_id'];
      }
    return redirect('hrhome.php');
    }


    elseif ($res[0]['usertype']=="client") {
      $q="select * from client where login_id='$logid'";
      $res=select($q);
      if (sizeof($res)>0) {

          $_SESSION['login_id']=$res[0]['login_id'];
          $login_id=$_SESSION['login_id'];
        $_SESSION['client_id']=$res[0]['client_id'];
          $client_id=$_SESSION['client_id'];
      }
    return redirect('clienthome.php');
    }



     elseif ($res[0]['usertype']=="trainee") {
      $q="select * from trainee where login_id='$logid'";
      $res=select($q);
      if (sizeof($res)>0) {
        $_SESSION['login_id']=$res[0]['login_id'];
          $login_id=$_SESSION['login_id'];
        $_SESSION['trainee_id']=$res[0]['trainee_id'];
          $trainee_id=$_SESSION['trainee_id'];
      }
    return redirect('traineehome.php');
    }
    elseif ($res[0]['usertype']=="employee") {
      $q="select * from employee where login_id='$logid'";
      $res=select($q);
      if (sizeof($res)>0) {

        $_SESSION['login_id']=$res[0]['login_id'];
          $login_id=$_SESSION['login_id'];
        $_SESSION['employee_id']=$res[0]['employee_id'];
          $employee_id=$_SESSION['employee_id'];
      }
    return redirect('employeehome.php');
    }
    else{
      alert('invalid username & password');
    }
}
}
 
?>


<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <form method="post">
	<center>
		<h1>LOGIN</h1>
		<table class="table" style="width:500px;color: white;">
			<tr>
				<th>Username</th>
				<td><input type="text" placeholder="enter username" class="form-control" required=""  name="uname"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" placeholder="enter password" class="form-control" required="" name="pword"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" value="Login" class="btn btn-danger btn-lg" name="submit"></td>
			</tr>
		</table>
	</center>
</form>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/why-us.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
<style>
	td,th,tr{border:none !important}
</style>

<?php include 'footer.php'?>