<?php
include_once('database.inc.php');

$txt = mysqli_real_escape_string($con, $_POST['text']);


if(strstr($txt, 'experiencia')){
    $txt = 'experiencia laboral';
} else if(strstr($txt, 'estudio') || strstr($txt, 'curso') || strstr($txt, 'grado')){
    $txt = 'estudios';
} else {
    $txt = $txt;
}
$request = "SELECT answer from questions_answers where question like '%{$txt}%'";
$response = mysqli_query($con, $request);

if(mysqli_num_rows($response) > 0) {
    $row = mysqli_fetch_assoc($response);
    $html=$row['answer'];
} else {
    $html="Lo siento, no entiendo la pregunta. Intenta de nuevo!";
}

$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into message(message,added_on,type) values('$txt','$added_on','user')");
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into message(message,added_on,type) values('$html','$added_on','bot')");
echo $html;

?>
