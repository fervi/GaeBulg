<html><head><title>Steel is my body and fire is my blood</title></head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"><body style="background-color: whitesmoke">
<div class="container"><div class="row">

<?php

$db = new SQLite3('gaebulg.sqlite'); // FIX YOUR PATH HERE
$result = $db->query("SELECT * FROM gaebulg WHERE executed > 0 ORDER BY ID DESC");

if(!empty($_GET['nolimit']))
{
$limit=2500;
}
else
{
$limit = 100;
}

$count = 0;
$nw = 0;
$w = 0;
$left = 214530;
$table = '<table class="table table-hover table-striped table-sm" width="100%" border="1">';
$table = $table.'<thead class="thead-dark"><tr><th>ID:</th><th>IPFS:</th><th>Works*:</th></tr></thead>';
while($res = $result->fetchArray(SQLITE3_ASSOC)){
$count = $count + 1;

if($res['executed']==1) { 
$works = "<font color='red'>Yes</font>";
$w=$w+1;
} else  {
$works = "No";
$nw=$nw+1;
}

if($limit!=0)
{
$table=$table.'<tr><td><a href="https://steemit.com'.$res['videohash'].'">'.$res['id'].'</a></td><td><a href="https://ipfs.io/ipfs/'.$res['url'].'">Link</a></td><td>'.$works.'</td></tr>';
$limit--;
}

}

$table=$table.'</table>';

echo '<b>'.round(($nw / $count)*100).'%  of movies from Dtube does not work (on Decentralized platform lol XD).</b> | [ <i>Make money, not network</i>  ] ~Whales';

echo $table;

echo '<center><small>Just kidding, it\'s '.($nw / $count)*100 .'% (Works: '.$w.', Not working: '.$nw.', Left: '.($left-$w-$nw).')</small></center>';

?>

* Dube uses IPFS. This means that the bot did not find these movies during the operation, but they can potentially appear over time (because the node will appear or disappear).
</div></div></body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</html>