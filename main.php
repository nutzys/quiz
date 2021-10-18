<?php
include "db.php";
$questionData = $db->query("SELECT * FROM questions");

$points = 0;
$questionInfo = [];
$correct = [];
$selected = [];

//panem datus no db un ieliek dataQ
while($dataQ = $questionData->fetch_assoc()){
    //ieliek datus array
    array_push($questionInfo, $dataQ);
}

foreach($questionInfo as $cor){
    array_push($correct, $cor["correct"]);
}

if(isset($_POST["submit"])){
    for($c = 0; $c < count($questionInfo); $c++){
        if($_POST["butn".$c]){
            array_push($selected, $_POST["butn".$c]);
        }
    }
    for($n = 0; $n < 10; $n++){
        if($selected[$n] == $correct[$n]){
            $points++;
        }
    }
    echo "Tu ieguvi ". $points. "/10 punktus!";
    $t = $db->query("SELECT MAX(id) FROM user_info");
    foreach($t as $y){
        foreach($y as $j){
            $db->query("UPDATE user_info SET score = ". $points ." WHERE id = ". $j);
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Quiz</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand">Quiz</a>
    </nav>
    <div id="quiz-container">
        <div id="quiz">
            <form method="post">
                <?for($i = 0; $i < count($questionInfo); $i++){?>
                    <h3><?echo ($i+1). ".".$questionInfo[$i]["question"]?></h3>

                    <input type="radio" name="<?echo "butn".$i?>" id="btn1" value="1" class="question">
                    <label for="btn1"><?echo $questionInfo[$i]["ans1"]?></label>

                    <input type="radio" name="<?echo "butn".$i?>" id="btn2" value="2" class="question">
                    <label for="btn<?$i?>"><?echo $questionInfo[$i]["ans2"]?></label>

                    <input type="radio" name="<?echo "butn".$i?>" id="btn3" value="3" class="question">
                    <label for="btn3"><?echo $questionInfo[$i]["ans3"]?></label>

                    <input type="radio" name="<?echo "butn".$i?>" id="btn3" value="4" class="question">
                    <label for="btn3"><?echo $questionInfo[$i]["ans4"]?></label>
                <?}?>
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom justify-content-center">
                    <input type="submit" name="submit" value="submit" id="submit" class="btn btn-secondary">
                </nav>
            </form>
        </div>
    </div>
</body>
</html>