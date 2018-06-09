<?php

$db = new SQLite3('gaebulg.sqlite');
$dsn= 'dblib:host=sql.steemsql.com:1433;dbname=DBSteem;';
$dbusername=""; // INSERT YOUR LOGIN HERE
$dbpassword=""; // INSERT YOUR PASSWORD HERE
try
{
    $mspdo = new PDO($dsn,$dbusername,$dbpassword);
    $mspdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $pe)
{
    die("database connect error：". $pe->getMessage());
}

$sql = "SELECT url, json_metadata FROM comments WHERE json_metadata LIKE '%dtube/0.%' -- dtube/0.7 ORDER BY id DESC;";
foreach ($mspdo->query($sql) as $row) {
$json = json_decode($row["json_metadata"], TRUE);

if(!empty($json["video"]["content"]["videohash"])) {
// Nothing
$videohash = $json["video"]["content"]["videohash"];
$url = trim($row["url"]);
}

if(!empty($url)) {
$db->query("INSERT INTO gaebulg (videohash, url, executed) VALUES ('$videohash', '$url', 0)");
}

}


?>