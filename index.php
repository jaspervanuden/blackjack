<?php
session_start();


$cards = ['A','2','3','4','5','6','7','8','9','10','J','Q','H'];
$types = ['klaveren ','Harten ','Schoppen ','Ruiten '];

if (!isset($_SESSION['deck'])) {
    $_SESSION['deck'] = [];
    foreach ($types as $type){
        foreach ($cards as $card){
            $_SESSION['deck'][]=[$type,$card];
        }
    }
    shuffle($_SESSION['deck']);
}


if (!empty($_POST['action'])) {
    if ($_POST['action'] == 'deal') {
        $_SESSION['playerCards'] = [];
        $_SESSION['dealerCards'] = [];
    
        $_SESSION['playerCards'][] = array_pop($_SESSION['deck']);
        $_SESSION['playerCards'][] = array_pop($_SESSION['deck']);
    
        $_SESSION['dealerCards'][] = array_pop($_SESSION['deck']);
    }
    else if ($_POST['action'] == 'hit') {
        $_SESSION['playerCards'][] = array_pop($_SESSION['deck']);
    }
    else if ($_POST['action'] == 'reset') {
        $_SESSION = [];
        session_destroy();
        header('Location: /');
        exit;
    }
    else if ($_POST['action'] == 'stand') {
        $_SESSION['dealerCards'][] = array_pop($_SESSION['deck']);
    }
}
    //$_SESSION['playerTotal'] = $_SESSION['playerCards'];

pre_r($_SESSION['playerCards']);
pre_r($_SESSION['dealerCards']);

echo count($_SESSION['deck']);


    if  $playerCards > 21 $dealerCards -> echo "winner";


?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Casino</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}"/>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background: url(img/welcome.jpg) 0px 0px no-repeat;
                background-size: cover; 
               

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #2b9720;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            
        </style>
    </head>
    <body>
            <div class="content" style="color: #2b9720;">
                <div class="title m-b-md">
                    Welcome to online Blackjack!
                    <div style="font-size: 60%">Please click on deal to start playing</div> 
                    <form action="" method="post">
                        <button type="submit" name="action" value="deal">Deal</button>
                        <button type="submit" name="action" value="reset">Reset</button>
                        <button type="submit" name="action" value="hit">Hit</button>
                        <button type="submit" name="action" value="stand">Stand</button>
                    </form>
                </div>  
                <div class="card flex-right"> 
                    <h4>your hand</h4> 
                <?php  
                  //  echo ($_SESSION['playerCards'][] = array_pop($_SESSION['deck']));
                  //  echo  $_SESSION['playerCards'];
                  //  ?><p>  </p><?php
                  //  echo $_SESSION['playerCards'];
                    ?>
                    <p><?php ?></p><?php
                   // if (isset($_POST["hit"])){
                    //        echo $soort[array_rand($soort)] . $card[array_rand($card)];
                     //   }?>
                        <p><?php ?></p>
                </div> 
                <div class="card2 flex-left">
                    <h4>dealer hand</h4>
                    <?php
                   // echo $soort[array_rand($soort)] . $card[array_rand($card)];
                    ?><p>  </p><?php
                   // echo $soort[array_rand($soort)] . $card[array_rand($card)];?>
                </div>  
                <div>
<p>sdasd</p>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

function pre_r($value) {
    echo "<pre style='text-align: left;'>";
    if (is_iterable($value)) {
        print_r($value);
    }
    else {
        var_dump($value);
    }
    echo "</pre>";
}