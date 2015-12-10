<?php
function dump($array){
    echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}

// Connect to a MySQL database using PHP PDO
$dsn      = 'mysql:host=127.0.0.1;dbname=Movie;';
$login    = 'root';
$password = '';
$options  = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
$pdo = new PDO($dsn, $login, $password, $options);

//$pdo = new PDO($dsn, $login, $password, $options);
try {
    $pdo = new PDO($dsn, $login, $password, $options);
}
catch(Exception $e) {
    //throw $e; // For debug purpose, shows all connection details
    throw new PDOException('Could not connect to database, hiding connection details.'); // Hide connection details.
}

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// Do SELECT from a table
$sql = "SELECT * FROM Movie;";
$sth = $pdo->prepare($sql);
$sth->execute();
$res = $sth->fetchAll();

echo $thStart = "<table>";
echo $tr = "<tr><th>Rad</th><th>Id</th><th>Bild</th><th>Titel</th><th>År</th><th>Genre</th></tr>";
foreach($res AS $key => $val) {
   echo $td = "<tr><td>{$key}</td><td>{$val->id}</td><td><img width='80' height='40' src='{$val->image}' alt='{$val->title}' /></td><td>{$val->title}</td><td>{$val->YEAR}</td></tr>";
}
echo $thEnd = "</table>";