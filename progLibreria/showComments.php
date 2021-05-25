<<<<<<< HEAD
<?php
include_once("db_connect.php");
$commentQuery = "SELECT idcommento, idcorpo, corpo, commentatore, datacommento FROM commento WHERE idcorpo = '0' ORDER BY idcommento DESC";
$commentsResult = mysqli_query($conn, $commentQuery) or die("database error:". mysqli_error($conn));
$commentHTML = '';
while($comment = mysqli_fetch_assoc($commentsResult)){
	$commentHTML .= '
		<div class="panel panel-primary">
		<div class="panel-heading">By <b>'.$comment["commentatore"].'</b> on <i>'.$comment["datacommento"].'</i></div>
		<div class="panel-body">'.$comment["corpo"].'</div>
		</div> ';
}
echo $commentHTML;
=======
<?php
include_once("db_connect.php");
$commentQuery = "SELECT idcommento, idcorpo, corpo, commentatore, datacommento FROM commento WHERE idcorpo = '0' ORDER BY idcommento DESC";
$commentsResult = mysqli_query($conn, $commentQuery) or die("database error:". mysqli_error($conn));
$commentHTML = '';
while($comment = mysqli_fetch_assoc($commentsResult)){
	$commentHTML .= '
		<div class="panel panel-primary">
		<div class="panel-heading">By <b>'.$comment["commentatore"].'</b> on <i>'.$comment["datacommento"].'</i></div>
		<div class="panel-body">'.$comment["corpo"].'</div>
		</div> ';
}
echo $commentHTML;
>>>>>>> 97ddb548cde7ae887c66fc5603f6bdb3df875c6d
?>