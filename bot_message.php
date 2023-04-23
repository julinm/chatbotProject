<?php
include_once('helper.php');
include_once('database.inc.php');

  //  $html = 'Lo siento, es posible que no tenga la respuesta o que no entienda la pregunta. Por favor, inténtalo de nuevo con otras palabras';
    $html = "I am sorry! Either I do not know the answer or did not understand the question. Please, try again rephrasing it";

if(isset($_POST['text'])){

    //Obtains the message from the user
    $txt = mysqli_real_escape_string($con, $_POST['text']);

    //Obtains an array which each word from the message
    $explodedTxt = explode(' ', $txt);

    //For each word, if its length > 3 cleans it and makes the different requests to the table of the data base
    foreach($explodedTxt as $text){
        if(strlen($text) > 3 || $text == 'job' || $text == 'hi' || $text == 'bye'){
            $text = cleanStr($text);
            $request[] = "SELECT answer from questions_answers where question like '%{$text}%'";       
        }

    //If it obtains a valid request, for each one, saves the response
    if(isset($request)){
        foreach($request as $req){
            $response[] = mysqli_query($con, $req);
        }
    }

    //For each response, obtains a valid one and saves it as $html, replacing its original value
    if(isset($response)){
        foreach($response as $res){
            if(mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                $html=$row['answer'];
            }
        }
    }

    //Insert message, time and who sent it to de table 'messages'
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"insert into message(message,added_on,type) values('$txt','$added_on','user')");
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"insert into message(message,added_on,type) values('$html','$added_on','bot')");
    echo $html;
    }
    
}

?>
