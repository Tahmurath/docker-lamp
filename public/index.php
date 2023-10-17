<?php
//print_r($_ENV);


$host = getenv('MYSQL_HOST');
$dbn = getenv('MYSQL_DATABASE');
$user = getenv('MYSQL_USER');
$pass = getenv('MYSQL_PASSWORD');
//$pass = 234234234;

// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// mysqli_report(MYSQLI_REPORT_STRICT);

try {

    $conn = new mysqli($host, $user, $pass,$dbn);

} catch (mysqli_sql_exception $e) {

    echo "mysqli_sql_exception : <pre>".print_r($e, true)."</pre><br><hr>";

    die("Unfortunately, the details you entered for connection are incorrect!");

}


$listdbtables = array_column($conn->query('SHOW Databases')->fetch_all(),0);

echo "List Databases : <pre>".print_r($listdbtables, true)."</pre><br><hr>";



