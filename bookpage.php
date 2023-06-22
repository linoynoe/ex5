<?php
    include 'db.php';
    include 'config.php';

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
            <title>Book Page</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>		
    <link rel="stylesheet" href="css/style.css">  
  </head>
  <main>
    <body>
    
       <a href="booklist.php" id="logo">
        <h1>Linoy BookStore </h1>
        </a>

    <?php
    // Retrieve book ID from query parameter
    $bookId = $_GET['id'];

    $sql = "SELECT * FROM tbl_41_book WHERE id = '$bookId'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();  
        echo '<br><h2 >' . $row['book_name'] . '</h2><br>';
        echo '<img src="' . $row['Picture2'] . '" alt="Image 2"><br>';
        echo '<br><p><b>Category: </b>' . $row['Category'] . '</p>';
        echo '<p><b>Price:</b> ' . $row['price']  . '$</p>';
        echo '<p><b>Author:</b> ' . $row['author_name'] . '</p>';
        // Display images
        echo '<img src="' . $row['Picture'] . '" alt="Image 1"><br><br>';  
      
        
    } else {
        echo "<p>Book not found.</p>";
    }

    ?>
    </main>
    </body>
</html>
<?php

//close DB connection

mysqli_close($connection);

?>

