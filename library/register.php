<?php
include "db.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $role = $_POST['role'];

   $sql = "insert into users(name,email,password,role)values('$name','$email','$password','$role')";

   $result = mysqli_query($conn,$sql);

   if(!$result){
      echo "Error: " . $conn->error;
   }
   else{
     echo "You have registered successfully";
   }
}
?>
<!DOCTYPE html>
<html>
<?php include "heading.php"; ?>
<body>
   <div class="register">
       <form action="register.php" method="post">
         <input type="text" name="name" placeholder="Enter Your Name"> <br>
         <input type="email" name="email" placeholder="Enter your Email"> <br>
         <input type="password" name="password" placeholder="Enter your Password"> <br>
         <input type="text" name="role" value="user" hidden> <br>
        <button type="submit">Sign Up</button>
     </form>
   </div>  
</body>
</html>