<?php
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['role']=="admin"){
      if($_SERVER['REQUEST_METHOD'] == "POST"){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $image = $_FILES['image']['name'];
    $quantity = $_POST['quantity'];

    include "../db.php";

    $sql = "INSERT INTO books(
          title,author,isbn,image,quantity) VALUES('$title','$author','$isbn','$image','$quantity')";
    $result = mysqli_query($conn,$sql);
    if(!$result){
       echo "Error!: {$conn->error}";
    }
    else{
       $image_location = $_FILES['image']['tmp_name'];
       $upload_location = "../image/".$image;
       move_uploaded_file($image_location, $upload_location.$image);
       echo "Book Added Successfully";
    }
  }
 }
}
else{
    header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library</title>
   <style type="text/css">
    .admin{
       display: flex;
       justify-content: center;
       margin-top: 150px;
    }
    .admin input{
      margin: 5px;
      padding: 20px;
      border: none;
      border-bottom: 2px solid blue;
    }
    .admin button{
        padding: 20px;
        width: 100%;
        margin: 5px;
        border-radius: 2px;
        background-color: lightskyblue;
    }
    .file{
       border: none !important;
       width: 100%;
    }
   </style>
</head>
<body>
  <div class="admin">
     <form action="add_book.php" method="post" enctype="multipart/form-data">
      <input type="text" name="title" placeholder="Enter the Title"> <br>
      <input type="text" name="author" placeholder="Enter the Author"> <br>
      <input type="text" name="isbn" placeholder="Enter the ISBN"> <br>
      <input class="file" type="file" name="image"> <br>
      <input type="text" name="quantity" placeholder="Book Quantity"> <br>
       <button type="submit">Add Book</button>
    </form>
  </div>
</body>
</html>