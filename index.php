<?php  session_start();
?>

<!DOCTYPE html>

<head>
    <title>Login to Math Game</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" 
        rel="stylesheet" media="screen">   
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-2">
                <h2>Please login to enjoy our math game.</h2>
            </div>
            <div class="col-sm-1"></div>
        </div>
        
        <div class="container">
            <form action="" method="post" role="form" class="form-horizontal">
                <div class="form-group">

                    <div class="col-sm-4 text-right">Email:</div>
                    <div class="col-sm-3">
                        <input type="text" name="user" class="form-control"/>
                    </div>
                    <div class="col-sm-5"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 text-right">Password:</div>
                    <div class="col-sm-3">
                        <input type="password" name="pass" class="form-control"/>
                    </div>
                    <div class="col-sm-5"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-4">
                        <input type="submit" name="login" value="LOGIN" class="btn btn-default btn-sm" />
                    </div>   
                </div>
            </form>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-3 col-sm-offset-4">
                  
        <?php
            if(isset($_POST['login'])) {   
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                if($user == "duk@duk.duk" && $pass == "duk") { 
                    $_SESSION['use']=$user;               
                    echo '<script type="text/javascript"> window.open("mathGame.php",
                        "_self");</script>';       
                } else {
                    echo '<span style="padding-left: 35px;  font-weight: bold; 
                        color: rgb(255, 59, 0); "> Invalid Email or Password</span>';
                }
            }
        ?>
            
        </div>
    </div>
    
</body>

</html>