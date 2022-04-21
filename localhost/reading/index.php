<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<link rel="stylesheet" type="text/css" href="zhs11004.css">
<script src="colorTheme.js"></script>
</head>
<body>  

<body class="light">
  <div class="container">

  <div id="input">
 
<?php
// define variables and set to empty values
$title = $date = $author = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


 if (empty($_POST["title"])) {
    $title = "";
  } else {
    $title = test_input($_POST["title"]);
  }
  if (empty($_POST["author"])) {
    $author = "";
  } else {
    $author = test_input($_POST["author"]);
  }
  if (empty($_POST["date"])) {
    $date = "";
  } else {
    $date = test_input($_POST["date"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <br><br>
  <label for="title">title: </label>
  <input type="text" name="title" size = 70 value="<?php echo $title;?>" required>
  <br><br>
  <label for="date">date:</label>
  <input type="date" id="date" name="date" value="<?php echo $date;?>" required>
  <br><br>
  <label for="author">author(s):</label>
  <input type="text" id="author" name="author" size = 70 value="<?php echo $author;?>" required>
  <br><br>
  <input type="submit" name="submit" value="process conferene info">  
</form>

</div>


  <div id="display">

    <?php
    echo "<br><span style=\"font-size:130%;\">email</span><br><br>";
    echo "Hi all, <br><br> On  Tuesday " . $date . " 10am, we will discuss " . $title . " by " . $author . " (attached). <br><br> Zoom link: https://tinyurl.com/synsem2021. See y'all there! <br><br> Best, <br> Zheng";
    ?>




  </div>
  </div>    
</body>

</html>
