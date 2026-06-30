<?php
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['role'] == "admin"){
        echo "You are admin";
    }
    else{
       header("Location: ../dashboard.php");
    }
}
else{
   header("Location: ../login.php");
}
?>
<?php
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['role'] == "user"){
        echo "You are user";
    }
    else{
       header("Location: admin/dashboard.php");
    }
}
else{
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>
<body>
  <a href="../logout.php">Log Out</a>
</body>
</html>