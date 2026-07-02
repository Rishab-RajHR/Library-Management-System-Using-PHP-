<?php
session_start();
include "db.php";
if($_GET['book_id']){
      $book_id = $_GET['book_id'];
}
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    if($_SERVER['role'] == "user"){
        $sql = "INSERT INTO transactions(
        user_id, book_id, issue_date,status) VALUES ('$user_id','$book_id','CURDATE()','borrowed')";
        $result = mysqli_query($conn,$sql);
        if($result){
             $sql2 = "UPDATE books SET quantity = quantity -1 WHERE id = '$book_id' ";

             $result2 =  mysqli_query($conn,$sql2);
            
             echo "Your request has been sent to the librarian! <a href='index.php'>Go Back</a>";
        }
        else{
            echo "Error: " . $conn->error;
        }
    }
    else{
        header("Location: admin/dashboard.php");
    }
}
else{
   header("Location: login.php");
}

?>