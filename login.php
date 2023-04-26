
<?php
//if(isset($_POST['name'])){
$email = stripslashes($email);
$password = stripslashes($password);
$email = $_POST['email'];
$password = $_POST['password'];

//}

  $con = new mysqli("localhost","root","","db_register");
  if($con->connect_error){
    die("failed to connect : ".$con->connect_error);
  }else{
    $stmt = $con->prepare("select * from user_details where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();

    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
      $data = $stmt_result-> fetch_assoc();
      if($data['password'] === $password){
      header("Location: welcome.html");
      
      }

     else{
      echo  "<script>
      
      window.location='register.html';
      alert('Invalid Email or Password');
      
      
      </script>";
      
     }
    }
  }

  ?>