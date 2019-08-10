<?php
include 'db.php';
if(isset($_POST['submit'])){
    $question = $_POST['ques'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $hash = bin2hex(random_bytes(16));
	$sql = "INSERT INTO questions (question, hash) "

			. "VALUES ('$question','$hash')";



        if ($conn->query($sql)) {
            $sql_option = "INSERT INTO options (option1, option2, option3, hash) "

			. "VALUES ('$option1','$option2','$option3','$hash')";
            if ($conn->query($sql_option)) {
            ?>
            <script>
            alert("done");
            </script>
            <?php }
        
        }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ask Question</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Ask Question</h2>
  <form action="ask_question.php" method="post">
    <div class="form-group">
      <label for="Question">Question:</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Your Question" name="ques">
    </div>
    <!-- <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div> -->
    <div class="form-group">
      <label for="Option1">Option1</label>
      <input type="text" class="form-control" id="option1" placeholder="Enter Your Option" name="option1">
    </div>
    <div class="form-group">
      <label for="Option2">Option2</label>
      <input type="text" class="form-control" id="option2" placeholder="Enter Your Option" name="option2">
    </div>
    <div class="form-group">
      <label for="Option3">Option3</label>
      <input type="text" class="form-control" id="option3" placeholder="Enter Your Option" name="option3">
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
