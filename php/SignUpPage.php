<?php
$success=0;
$user=0;


if($_SERVER['REQUEST_METHOD']=='POST')
{
  include 'connect.php';
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobileNo=$_POST['mobileNo'];
  $password=$_POST['password'];

  $sql="Select * from signup where email='$email'";
  $result=mysqli_query($con,$sql);

  if($result){
    $num=mysqli_num_rows($result);
    if($num>0)
    {
      // echo"User already exists";
      $user=1;
    }
    else
    {
      $sql="insert into signup (name,email,mobileNo,password) values('$name','$email','$mobileNo','$password') ";
  $result=mysqli_query($con,$sql);

  if($result)
  {
    // echo "Signup successful";
    $success=1;

  }
  else
  {
    die(mysqli_error($con));
  }

    }
  }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Page</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
if($user)
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error</strong> User Already Exists
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  
</div>';

}

?>
  <div class="signup-container">
    <div class="form-container">
      <h2>Sign Up</h2>
      <form action="SignUpPage.php" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" placeholder="Enter your name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" placeholder="Enter your email" name="email" required>
        </div>
        <div class="form-group">
          <label for="number">Number</label>
          <input type="tel" id="number" placeholder="Enter your phone number" name="mobileNo" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" placeholder="Enter your password" name="password" required>
        </div>
        <button type="submit" class="btn">Sign Up</button>
      </form>
    </div>
  </div>
</body>
</html>