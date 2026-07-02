<?php
include "db.php";
$sql = "select * from books";
        $result = mysqli_query($conn,$sql);
        if(!$result){
          echo "Error: " . $conn->error;
        }
        else{

        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library</title>
  <style>
       *{
         margin: 0;
         padding: 0;
         overflow-x: hidden;
       }
       header{
          padding: 30px;
          top: 0;
          width: 100%;
          position: fixed;
          background-color: gray;
       }
       footer{
          position: fixed;
          bottom: 0;
          width: 100%;
          background-color: gray;
          padding: 10px;
          text-align: center;
       }
       .indexsection{
           display: flex;
           flex-wrap: wrap;
           justify-content: center;
           margin-top: 100px;
       }
        .indexsection div{
            width: 200px;
            text-align: center;
         }
        .indexsection img{
            width: 100%;
         }
  </style>
</head>
<body>
  <header>
    <h1>Library Home Page</h1>
  </header>
  <section class="indexsection">
    <?php   
         while ($row = mysqli_fetch_assoc($result)){
            
         
    ?>
  <div>
       <img src="image/<?php echo "${$row['image']}"?>">
       <p>Book Title: <?php echo "{$row['title']}"?></p>
       <p>Author: <?php echo "{$row['author']}"?></p>
       <p>ISBN: <?php echo "{$row['isbn']}"?></p>
       <p>Quantity: <?php echo "{$row['quantity']}"?></p>
  </div>
  <?php  } ?>
  </section>
  <footer>
      <p>copyright@Alex tech knowledge</p>
  </footer>
</body>
</html>