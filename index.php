<?php

include("functions/verify.php");

$db = new SQLite3('gaebulg.sqlite');

$check = $db->query("SELECT * FROM gaebulg WHERE executed=0");

while($row = $check->fetchArray(SQLITE3_ASSOC)){

$var = test_video('ipfs.io/ipfs/'.$row["url"]);

$id = $row['id'];
echo $id.PHP_EOL;

if($var==1) {
$db->query("UPDATE gaebulg SET executed=1 WHERE id='$id'");
} else {
$db->query("UPDATE gaebulg SET executed=2 WHERE id='$id'");
}


}




?>