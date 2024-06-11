<?php include 'hrheader.php';

if (isset($_GET['aid'])) {
  extract($_GET);

  echo$q="update application set status='accept' where application_id='$aid'";
  update($q);




  echo$q1="SELECT *  from application inner join  client using (client_id) where application_id='$aid'";
  $res=select($q1);

    try{

  
            echo$email=$res[0]['email'];
          

            
             require("class.phpmailer.php");

          $mail = new PHPMailer();
          $mail->IsSMTP(); 
          $mail->SMTPDebug = 1;
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = 'tls'; 
          $mail->Host = "smtp.gmail.com";
          $mail->Port = 587;
          $mail->Username = "hariharan0987pp@gmail.com"; 
          $mail->Password = "rjcbcumvkpqynpep";


          $mail->From = "Councillor App Account";
          $mail->FromName = "hariharan0987pp@gmail.com"; 
          $mail->AddAddress($email);
          $mail->Subject ="Request Accepted";
          $mail->Body    = str_replace("<br />", "\n", nl2br("  Request Accepted succesfully ....! We will contact you soon...!"));
          $mail->AltBody = "";

          if(!$mail->Send())
          {
            
             ?>
              <script type="text/javascript">
           // alert("mail not  send");
            // window.location="usercheckandverifyotp.php";
            </script>
             
             <?php
          }
          else
          {
            echo ' send';
            ?>
              <script type="text/javascript">
            alert("mail send succesfully!!!!!!!Check your email ");
              window.location="adminhome.php";
            </script>
             
             <?php
          }
            }catch (Exception $e)
            
          {
            echo $e;
          }
   alert('update successfully');
 return redirect('hr_appliciation.php');

}
if (isset($_GET['uid'])) {
  extract($_GET);

  echo$q="update application set status='reject' where application_id='$uid'";
  update($q);



  
  echo$q1="SELECT *  from application inner join  client using (client_id) where application_id='$aid'";
  $res=select($q1);

    try{

  
            echo$email=$res[0]['email'];
          

            
             require("class.phpmailer.php");

          $mail = new PHPMailer();
          $mail->IsSMTP(); 
          $mail->SMTPDebug = 1;
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = 'tls'; 
          $mail->Host = "smtp.gmail.com";
          $mail->Port = 587;
          $mail->Username = "hariharan0987pp@gmail.com"; 
          $mail->Password = "rjcbcumvkpqynpep";


          $mail->From = "Councillor App Account";
          $mail->FromName = "hariharan0987pp@gmail.com"; 
          $mail->AddAddress($email);
          $mail->Subject ="Request Rejected";
          $mail->Body    = str_replace("<br />", "\n", nl2br("  Request Rejected  ....! Better luck Next Time...!"));
          $mail->AltBody = "";

          if(!$mail->Send())
          {
            
             ?>
              <script type="text/javascript">
           // alert("mail not  send");
            // window.location="usercheckandverifyotp.php";
            </script>
             
             <?php
          }
          else
          {
            echo ' send';
            ?>
              <script type="text/javascript">
            alert("mail send succesfully!!!!!!!Check your email ");
              window.location="adminhome.php";
            </script>
             
             <?php
          }
            }catch (Exception $e)
            
          {
            echo $e;
          }
  alert('update successfully');
  return redirect('hr_appliciation.php');
}

?>


<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 200px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        </div></div></div></section>

        <center><h1>View client applications</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>Vaccancy</th>
                <th> Name</th>
                <th>Place</th>
                <th>Phone</th>
                <th>Email</th>
                <th>photo</th>
               
                <th>Qualification</th>
                <th>Dob</th>
              
                <th>uploadresume</th>
                <th>Status</th>
                
            </tr>
           <?php 

 $q="SELECT * FROM CLIENT INNER JOIN login USING(login_id) INNER JOIN application USING (client_id)  inner join vaccancy  using (vaccancy_id)";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                   <td><?php echo $row['post'] ?> <?php echo $row['details'] ?></td>
                   <td><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></td>
                   <td><?php echo $row['place'] ?> </td>
                   <td><?php echo $row['phone'] ?> </td>
                   <td><?php echo $row['email'] ?></td>

                     <td><a href="<?php echo $row['photo'] ?>  "   download><img src="<?php echo $row['photo'] ?>"   height="100" width="100" ></a></td>
                
                   <td><?php echo $row['qualification'] ?></td>
                      <td><?php echo $row['dob'] ?></td>

                     

                        <td><a href="<?php echo $row['uploadresume'] ?>  "   download><img src="<?php echo $row['uploadresume'] ?>"   height="100" width="100" ></a></td>
                        

                            <td><?php echo $row['status'] ?></td>

                       <?php   if( $row['status']=="pending") { ?>
                        

                         <td><a href="?aid=<?php echo $row['application_id'] ?>">Accept</a></td>
                         <td><a href="?uid=<?php echo $row['application_id'] ?>">Reject</a></td>

<?php }?>
                  
           
                </tr>
              <?php }




             ?>

        </table>
    </form>
</center>
<?php include 'footer.php'?>