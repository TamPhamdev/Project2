<?php  
 $connect = mysqli_connect("localhost", "root", "", "ahihishop");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:index.php");  
 }  

 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {    
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT * FROM account WHERE ACC_NAME = '$username' AND ACC_PASS = '$password'"; 
           echo $query;
           $result = mysqli_query($connect, $query);
           $row = mysqli_fetch_array($result);
           $role = $row[3];
           $permission = $row[4];
           if ($role == 'Inactive')
           {
                 echo '<script>alert("Tài khoản của bạn đã bị khóa.'
               . ' Vui lòng liên hệ Admin để biết thêm chi tiết !!!")</script>';  
           }
            else if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION["username"] = $username; 
                $_SESSION["role"] = $role; 
                $_SESSION["permission"] = $permission;
                header("location:index.php");  
           }  
           else  
           {  
                echo '<script>alert("Tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại !!!")</script>';  
           }  
      }  
 }  
 ?>  
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Admin - Login</title>

  <!-- Bootstrap core CSS-->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <!-- Custom fonts for this template-->




</head>

<body style="background-color: #f5f5f5;">

  <div class="container">
    <div class="row d-flex justify-content-center align-items-center"  style="height: 100vh;">
      <div class="col-md-6 col-sm-6  border-0" style="background-color: #f5f5f5;">
        <div class=" card-login mx-auto border-0">
          <div class="label text-center">Ahihi Shop
            <h4 style="margin:30px 0;">Please login</h4>
           
          </div>
          <div class="card-body">
              <form method="POST">
              <div class="form-group">
                <div class="form-label-group">
                  <input name="username" type="text" id="inputEmail" class="form-control" placeholder="User name" required="required"
                    autofocus="autofocus">
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                </div>
              </div>

               <input type="submit" name="login" value="Login" class="btn btn-info" />  
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">Forget password ???</button>
               <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h5>Admin 123456</h5> <br>
          <h5>KhuongKhuong 123456</h5> <br>
           <h5>TamTam 123123</h5> <br>
            <h5>ToaiToai 123123</h5> <br>
             <h5>BachBach 123123</h5> <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <!-- Bootstrap core JavaScript-->
  <script src="../assets/js/jquery-3.3.1.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>


</body>

</html>