<!-- Greg Uctum, Kehsley Lewis, Tim Sterk -->
<?PHP

$l = mysqli_connect("34.224.83.184", "student14", "phppass14", "student14");
$query = "select * from survey";
mysqli_query($l,$query);

$course_id=$_GET['course_id'];
$clientURL="http://bb.dataii.com:8080";


require_once('classes/Rest.class.php');
require_once('classes/Token.class.php');


$rest = new Rest($clientURL);
$token = new Token();

$token = $rest->authorize();
$access_token = $token->access_token;

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Szymon's Army Polls</title>
    <link rel="stylesheet" href="css/371styles.css">
	<script>
function loadNo() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("message").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "load_no.txt", true);
  xhttp.send();
}

function loadYes() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("message").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "load_yes.txt", true);
  xhttp.send();
}
</script>
  </head>
<body>



<div id="poll">
<h3>Do you like PHP and AJAX so far?</h3>
<form>
Yes:
<input type="radio" name="vote" value="0" onclick="<?PHP

$query = 'update survey set yes = yes + 1';

?>; loadYes()">
<br>No:
<input type="radio" name="vote" value="1" onclick="<?PHP

$query = 'update survey set no = no + 1';

?>; loadNo()">
<form action="pull_vote.php" method="POST">
<br />
<?PHP
  mysqli_query($l,$query);
  $a = "select * from users";
  $b = mysqli_query($l,$a);
  ?>
<a href="https://lkehlsey.ddns.net:9014/coursegames/pull_vote.php" class="button">Continue</a>
<p id="message"></p>
</form>
</form>
</div>

</body>
</html>