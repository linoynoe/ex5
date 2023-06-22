<?php
    include 'db.php';
    include 'config.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <title>Book list</title>
           
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>		
    <link rel="stylesheet" href="css/style.css">
    </head>
<body>
    <main>

    <a href="booklist.php">
        <h1>Linoy BookStore </h1>
    </a>
       
    <br>
    <div>
        <h2>Categories</h2>
        <ul id="category-list">
            <?php
        // Read categories from JSON file
        $categories = json_decode(file_get_contents('data/categories.json'), true);
        
        // Display categories
        foreach ($categories as $category) {
            echo '<li><a href="booklist.php?category=' . urlencode($category) . '">' . $category . '</a></li>';
        }
            ?>
        </ul>
    </div>
<div>
    <h2>Book List</h2>
    <ul id="book-list">

    <?php
        $selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';

        $sql = "SELECT * FROM tbl_41_book";
        if (!empty($selectedCategory)) {
            $sql .= " WHERE category = '$selectedCategory'";
        }
      
        // Execute the query
        $result = $connection->query($sql);

        // Display the book list
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<li><a href="bookpage.php?id=' . $row['id'] . '">' . $row['book_name'] . '</a></li>';
            }
        } else {
            echo "<li>No books found.</li>";
        }
        ?>
    </ul>
  </div>
</main>
</body>
</html>
<?php

//close DB connection

mysqli_close($connection);

?>