<?php
include_once('helper.php');
include_once('database.inc.php');

// $html = 'Lo siento, es posible que no tenga la respuesta o que no entienda la pregunta. Por favor, inténtalo de nuevo con otras palabras';
$allowedShortWords = ['job' => true, 'hi' => true, 'bye' => true];

if(isset($_POST['text'])) {
    //Obtains the message from the user
    $txt = mysqli_real_escape_string($con, $_POST['text']);

    //Obtains an array which each word from the message
    $explodedTxt = explode(' ', $txt);

    //Initialize variables
    $request = array();
    $response = array();
    $html = "I am sorry! Either I do not know the answer or did not understand the question. Please, try again rephrasing it";

    //For each word, if its length > 3 cleans it and makes the different requests to the table of the data base
    foreach($explodedTxt as $text) {
        if(strlen($text) > 3 ||isset($allowedShortWords[$text])) {
            $text = cleanStr($text);
            $request[] = "SELECT answer from questions_answers where question like '%{$text}%'";
        }
    }

    //If it obtains a valid request, for each one, saves the response
    if(!empty($request)) {
        foreach($request as $req) {
            $response[] = mysqli_query($con, $req);
        }
    }

    //For each response, obtains a valid one and saves it as $html, replacing its original value
    if(!empty($response)) {
        foreach($response as $res) {
            if($res -> num_rows > 0) {
                $row = mysqli_fetch_assoc($res);
                if(isset($row['answer'])) {
                    $html= $row['answer'];
                    break;
                }
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
    


?>
