"# crud-ES6" 
### image crud
```
<?php
$servername = "localhost";
$username = "root";
$password = 12345;
$dbname = "new_crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch images
$sql = "SELECT id, name FROM images";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Display Images</title>
</head>
<body>
    <h1>Uploaded Images</h1>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div>';
            echo '<h2>' . $row["name"] . '</h2>';
            echo '<img src="fetch_image.php?id=' . $row["id"] . '" alt="' . $row["name"] . '" style="max-width:200px;max-height:200px;">';
            echo '</div>';
        }
    } else {
        echo "No images found.";
    }
    $conn->close();
    ?>
</body>
</html>
```
### remaining part
```
<?php
$servername = "localhost";
$username = "root";
$password = 12345;
$dbname = "new_crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT image FROM images WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($image);
    
    if ($stmt->fetch()) {
        header("Content-Type: image/jpeg"); // or the appropriate image MIME type
        echo $image;
    } else {
        echo "Image not found.";
    }

    $stmt->close();
}

$conn->close();
?>

```
### Sql
```
CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image LONGBLOB NOT NULL
);


```

### just crud

```
<?php
$servername = "localhost";
$username = "root";
$password = 12345;
$dbname = "new_crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT id, username FROM users");

// Execute the statement
$stmt->execute();

// Bind the result variables
$stmt->bind_result($id, $username);

// Fetch the results
while ($stmt->fetch()) {
    echo "id: " . $id . " - Name: " . $username . "<br>";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>



```


### just crud 2
```
<?php
include('db_connect.php');
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];

    $sql = "UPDATE `users` SET `username`='$name' WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: index.php?msg=Data updated successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
</style>
<body class="bg-dark-subtle">
<?php
$sql = "SELECT * FROM `users` WHERE id=$id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <form action="" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="name" class="form-control" value="<?php echo $row['username'] ?>" id="username" aria-describedby="usernameHelp">
            <div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<a href="view.php">Click for userDetails</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

```