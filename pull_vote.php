<?php

$l = mysqli_connect("34.224.83.184", "student14", "phppass14", "student14");
$query = "select * from survey";
mysqli_query($l,$query);

//getting amount of yes votes
$query = "select * from survey";
$result = mysqli_query($l,$query);
$row = mysqli_fetch_array($result);

$yes = $row['yes'];
$no = $row['no'];

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Szymon's Army Polls</title>
    <link rel="stylesheet" href="css/371styles.css">
  </head>
<body>
<div class="results">
<h2>Result:</h2>
<table id="center">
<tr>
<td>Yes:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($yes/($no+$yes),2)); ?>'
height='20'>
<?php echo(100*round($yes/($no+$yes),2)); ?>%
</td>
</tr>
<tr>
<td>No:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($no/($no+$yes),2)); ?>'
height='20'>
<?php echo(100*round($no/($no+$yes),2)); ?>%
</td>
</tr>
</table>

</div>

</body>
</html>