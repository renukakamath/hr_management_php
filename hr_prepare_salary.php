<?php include 'hrheader.php';
$hr_id=$_SESSION['hr_id'];
extract($_GET);


if (isset($_POST['submit'])) {
    extract($_POST);

    $q="insert into salary values(null,'$employee','$hr_id','$salary','$hrent')";
    insert($q);

   
   // alert('insertion successfully');
   // return redirect('hr_prepare_salary.php');

}

?>

<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 700px">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">

<center>
    <form method="post">
        <h1>salary</h1>
        <br>
        <table class="table" style="width:500px;">

             <tr>
                <th>Employee</th>
                <td><select name="employee" id="select" class="form-control">
                <option>--Select--</option>
                    <?php 
                $q="select * from  employee inner join overtime using (employee_id)";
                 $res=select($q);
                
                 foreach ($res as $row ) {?>
                     
                     

                      <option value="<?php echo $row['employee_id'] ?>"><?php echo $row['first_name'] ?></option>
                 <?php }



                     ?>
                  
                </select></td>
            </tr>
            <tr>
                <th>Over Time</th>
                <td><input type="text"  name="salary" required="" id="extra_hour" class="form-control"></td>
            </tr>
            <tr>
                <th>Basic salary</th>
                <td><input type="text"  name="salary" id="basic_salary" required="" class="form-control"></td>
            </tr>

             <tr>
                <th>Month</th>
                <td><input type="month"  name="hrent" required="" class="form-control"></td>
            </tr>
            
            
             

            <tr>
                <td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submit" value="submit"></td>
            </tr>
        </table>
</form>
</center>
</div></div></div></section>


        <center><h1> salary</h1>
        <table class="table" style="width:500px;">
            <tr>
                <th>Slno.</th>
                <th>Employee</th>
                <th>salary</th>
                <th>Month</th>
                
                
                
            </tr>
            <?php
            $q="select * from salary inner join employee using (employee_id) ";
     $res=select($q);
     $sino=1;
         foreach ($res as $row) {?>
                <tr>
                   <td><?php echo $sino++ ?></td>
                    <td><?php echo $row['first_name'] ?></td>
                   <td><?php echo $row['basic_salary'] ?></td>
                    <td><?php echo $row['house_rent'] ?></td>
                    
                    
                   
                 
                   
           
                </tr>
                <?php }?>

        </table>
    </form>
</center>
<?php include 'footer.php'?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>

   $('select').on('change', function (e) {
var optionSelected = $("option:selected", this);
var valueSelected = this.value;

$.ajax({
data: {id:valueSelected} ,
type: "post",
url: "getcount.php",
success: function(value){
  
      var data = JSON.parse(value)
        console.log(data);
      console.log(typeof(data));
    document.getElementById("extra_hour").value=data.value1;
    document.getElementById("basic_salary").value=data.value2;
}
});
});
    </script>