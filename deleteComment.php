 <?php
 require_once "connect.php";
                                         $conn= new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$nr=$_GET["id"];
$nr2=$_GET["id2"];
$sql = "DELETE FROM komentarze WHERE id=$nr";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location:Forum.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
header('Location: post.php?id='.$nr2);
?> 