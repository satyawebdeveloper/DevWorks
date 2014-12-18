
<?Php
$dbhost_name = "127.0.0.1";
$database = "satya";// database name
$username = "root"; // user name
$password = "mysql"; // password 

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?> 

