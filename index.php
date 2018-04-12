<!-- Greg Uctum, Kehsley Lewis, Tim Sterk -->
<?PHP

$l = mysqli_connect("34.224.83.184", "student14", "phppass14", "student14");
$query = "select * from survey";
mysqli_query($l,$query);

$course_id=$_GET['course_id'];
$clientURL="http://bb.dataii.com:8080";


/* require_once('classes/Rest.class.php');
require_once('classes/Token.class.php');


$rest = new Rest($clientURL);
$token = new Token();

$token = $rest->authorize();
$access_token = $token->access_token; */
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Szymon's Army Polls</title>
    <link rel="stylesheet" href="css/371styles.css">
  </head>
<body>

<div id="poll">
<h3>Do you like PHP and AJAX so far?</h3>
<form>
Yes:
<input type="radio" name="vote" value="0" onclick="<?PHP

$query = 'update survey set yes = yes + 1';

?>">
<br>No:
<input type="radio" name="vote" value="1" onclick="<?PHP

$query = 'update survey set no = no + 1';

?>">
<form action="pull_vote.php" method="POST">
<br />
<?PHP
  mysqli_query($l,$query);
  $a = "select * from users";
  $b = mysqli_query($l,$a);
  ?>
<button type="submit" onclick="location.href='https://lkehlsey.ddns.net:9014/coursegames/pull_vote.php';">Continue</button>
</form>
</form>
</div>

</body>
</html>
