<html>
    <head>
        <?php include('database.inc.php'); ?>

        <title>PHP Chatbot - Julia Menardi</title>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body class ="full-background">
        <div class = "container mt-4">
            <div class = "row justify-content-md-center mb-4 mt-4">
                <div class = "col-md-8">
                    <div class="card shadow chat-background bg-transparent">
                        <div class="card-header">
                            <strong class="text-white badge p-2">Julia Menardi - ChatBot</strong><span class="dot"></span>

                        </div>
                        <div class="card-body messages-box">
                           <ul class="list-unstyled messages-list">
                            <?php
							$res=mysqli_query($con,"select * from message");
							if(mysqli_num_rows($res)>0 && isset($_GET['user'])){
								$html='';
								while($row=mysqli_fetch_assoc($res)){
									$message=$row['message'];
									$added_on=$row['added_on'];
									$strtotime=strtotime($added_on);
									$time=date('h:i A',$strtotime);
									$type=$row['type'];
									if($type=='user'){
										$class="messages-me";
										$imgAvatar="user_avatar.png";
										$name="Me";
									}else{
										$class="messages-you";
										$imgAvatar="bot_avatar.png";
										$name="JuliBot";
									}
									$html.='<li class="'.$class.' clearfix"><span class="message-img"><img src="image/'.$imgAvatar.'" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title text-secondary">'.$name.'</strong> <span class="time-messages text-muted font-weight-secondary text-info"><span class="minutes">'.$time.'</span></span> </div><p class="messages-p">'.$message.'</p></div></li>';
								}
								echo $html;
							}else{
								?>
                                <li class="messages-me clearfix start_chat alert alert-info">
                                    <form method="GET" class="pull-right">
                                        <?php if(!isset($_GET['language']) || $_GET['language'] == 'English' ){ ?>
                                            Cambia a: <input type="submit" class="btn btn-dark btn-sm" name="language" value="Español">
                                        <?php } else { ?>
                                            Change to: <input type="submit" class="btn btn-dark btn-sm" name="language" value="English">
                                        <?php } ?>
                                    </form>
                                    <br>
                                    <?php if(!isset($_GET['language']) || $_GET['language'] == 'English' ){ ?>
                                        <strong> Welcome! </strong> <br> 
                                        <h5 class="info"> I can answer basic questions about Julia, like her work experience, studies, technologies she uses and more, but if you want to get to know her more in depth, you can contact her at julimenardi@hotmail.com to talk more. </h5> 
                                        <strong> Having said that, let's start! What would you like to know?</strong>
                                    <?php } else { ?>
                                        <strong>Bienvenid@! <strong><br> 
                                        <h5 class="info">Puedo responder preguntas básicas acerca de Julia, como su experiencia laboral, estudios, las tecnologías que utiliza y más. Sin embargo, para conocer más detalles, recomiendo escribirle a su correo: julimenardi@hotmail.com. </h5> 
                                        <strong>Habiendo dicho eso, comencemos! Hazme una pregunta<strong>
                                    <?php } ?>
                                </li>
								<?php
							}
							?>
                            </ul>
                        </div>
                        <div class="card-header">
                            <div class="input-group input-group-append mt-2">
                                <form class="d-flex" method="POST" onsubmit="sendMessage(); return false;">
                                    <input type="text" id= "input-me" name="message" class="form-control input-sm" placeholder="Type your message here...">
                                    <input type="submit" value="Send"  class="btn btn-info p-1">
                                </form>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                           <span class="text-secondary">Contact Me!
                           <span class="ml-4"><a href="https://github.com/julinm"><i class="fa fa-github"></i></a></span>
                           <span class="ml-4">|</span>
                           <span class="ml-4 mr-6"><a href="https://www.linkedin.com/in/julia-menardi-106353206/"><i class="fa fa-linkedin"></i></a></span>
                           <span class="ml-4">|</span>
                           <span class="ml-4 mr-6"><a href="mailto:julimenardi@hotmail.com">Email</a></span>
                           <span class="ml-4">|</span>
                           <span class="ml-4 mr-6"><a href="https://juliamenardiportfolio.000webhostapp.com/">CV</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            <?php include_once('.\functions.js'); ?>
        </script>

    </body>
</html>

