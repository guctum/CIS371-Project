<?PHP

$l = mysqli_connect("34.224.83.184", "student14", "phppass14", "student14");
$query = "select * from survey";
mysqli_query($l,$query);

$query = 'update survey set yes = yes + 1';

?>
