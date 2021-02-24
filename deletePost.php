 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Projekt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$nr=$_GET["id"];
$sql = "DELETE FROM posty WHERE id=$nr";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
header('Location: Forum.php');
?> 