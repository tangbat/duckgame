<?php session_start();  
$correct = NULL;
$score = NULL;
$total = NULL;
$error = NULL;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prevFirstNum = $_POST['firstNum'];
    $prevSecondNum = $_POST['secondNum'];
    $prevOperation = $_POST['operation'];
    $prevScore = $_POST['score'];
    $userAnswer = $_POST['answer'];
    $prevTotalNoAdd = $_POST['total'];
    $prevTotal = $_POST['total'] + 1; 
    
    if (is_numeric($_POST['answer'])) {
        if($prevOperation == '+') {
          $answer = $prevFirstNum + $prevSecondNum;
        } else {
          $answer = $prevFirstNum - $prevSecondNum;
        }
        if($_POST['answer'] == $answer) {
          $correct = 1;
          $prevScore++;
        } else {
          $correct = 2;
        }
    } else {
    $error = true;
    }
    $score = $prevScore;
        
    if (is_numeric($_POST['answer'])) {
        $total = $prevTotal;
    } else {
        $total = $prevTotalNoAdd;
    }
    } else {
      $score = 0;
      $total = 0;
    }
    $holder = rand(1, 2);
    $firstNum = rand(0, 20);
    $secondNum = rand(0, 20);
    if($holder == 1) {
      $operation = '+';
    }
    else {
      $operation = '-'; 
    }
    if(isset($_POST['logout'])) {
    header("location: index.php");
    session_destroy();
    }
?>



<!DOCTYPE html>
<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Math Game</title>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" 
            rel="stylesheet" media="screen">   
    </head>
   <body>
        <div class="container">
            <form action="mathGame.php" method="post" role="form" class="form-horizontal">
                <div class="row">
                   <div class="col-sm-4 col-sm-offset-4">
                      <h1>Math Game</h1>
                   </div>
                   <div class="col-sm-3">
                       <input type="submit" name="logout" value="logout" class="btn btn-default btn-sm" />
                   </div>
                </div>
                <div class="row">
                   <label class="col-sm-2 col-sm-offset-3"><?php echo $firstNum; ?></label>
                   <label class="col-sm-2"><?php echo $operation; ?></label>
                   <label class="col-sm-2"><?php echo $secondNum; ?></label>
                   <div class="col-sm-3"></div>
                </div>

                <input type="hidden" name="firstNum" value="<?php echo $firstNum; ?>">
                <input type="hidden" name="operation" value="<?php echo $operation; ?>">
                <input type="hidden" name="secondNum" value="<?php echo $secondNum; ?>">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <input type="hidden" name="score" value="<?php echo $score; ?>">

                <div class="form-group">
                   <div class="col-sm-3 col-sm-offset-4">
                      <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter answer" size="6">
                   </div>
                   <div class="col-sm-5"></div>
                </div>
                <div class="row">
                   <div class="col-sm-3 col-sm-offset-4">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <button type="submit" class="btn btn-primary btn-sm">
                      Submit</button>
                   </div>
                   <div class="col-sm-3"></div>
                </div>
            </form>
        <hr>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
              <?php
              if($correct == 1) {
                echo '<span style="font-weight: bold; color: #1c801c; ">
                    Correct! ' . $prevFirstNum . ' ' . $prevOperation . ' ' 
                    . $prevSecondNum . ' = '. $answer .' </span>';
                  
              } else if($correct == 2) {
                echo '<span style="font-weight: bold; color: rgb(255, 59, 0); ">
                    Wrong. You answered ' . $userAnswer . '. But ' 
                    . $prevFirstNum . ' ' . $prevOperation . ' ' 
                    . $prevSecondNum . ' = ' . $answer . '.</span>';
                
              } else if ($error) {
                echo '<span style="font-weight: bold; color: rgb(255, 59, 0); ">
                    Only numbers will compute.</span>';
              }
              ?>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">

            <?php
                if ($total !== 0) {
                echo 'Score: ' . $score . ' / ' . $total;
                } else {
                    echo 'Score: 0 / 0';
                }
            ?>
            </div>
            <div class="col-sm-4"></div>
         </div>
      </div>
    </body>
</html>