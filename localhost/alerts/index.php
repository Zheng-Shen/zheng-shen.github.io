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
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $start = $end = $location = $org = $invited = $website = $deadline = $submission = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["invited"])) {
    $invited = "";
  } else {
    $invited = test_input($_POST["invited"]);
  }

  if (empty($_POST["start"])) {
    $start = "";
  } else {
    $start = test_input($_POST["start"]);
  }

  if (empty($_POST["end"])) {
    $end = "";
  } else {
    $end = test_input($_POST["end"]);
  }

  if (empty($_POST["org"])) {
    $org = "";
  } else {
    $org = test_input($_POST["org"]);
  }


  if (empty($_POST["location"])) {
    $location = "";
  } else {
    $location = test_input($_POST["location"]);
  }


  if (empty($_POST["submission"])) {
    $submission = "";
  } else {
    $submission = test_input($_POST["submission"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }


  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["deadline"])) {
    $deadline = "";
  } else {
    $deadline = test_input($_POST["deadline"]);
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
  name: <input type="text" name="name" value="<?php echo $name;?>" required>
  <label for="start">from:</label>
  <input type="date" id="start" name="start" value="<?php echo $start;?>" required>
  <label for="end">to:</label>
  <input type="date" id="end" name="end" value="<?php echo $end;?>" required>
  <br><br>
  <label for="location">location:</label>
  <input type="text" id="location" name="location" value="<?php echo $location;?>" required>
  <label for="org">organized by:</label>
  <input type="text" id="org" name="org" value="<?php echo $org;?>" required>
  <br><br>
  invited speakers: <textarea name="invited" rows="4" cols="57"><?php echo $invited;?></textarea>
  <br><br>
  website: <input type="text" name="website" size="80" value="<?php echo $website;?>" required>
  <br><br>
  contact: <input type="text" name="email" size="40" value="<?php echo $email;?>">
  <span class="error"><?php echo $emailErr;?></span>
  <br><br>
  <label for="deadline">submission deadline:</label>
  <input type="date" id="deadline" name="deadline" value="<?php echo $deadline;?>" required>
  <br><br>
  <label for="submission">submission page:</label>
  <input type="url" id="submission" name="submission"  size="70" value="<?php echo $submission;?>" required>
  <br><br>
  <input type="submit" name="submit" value="process conferene info">  
</form>

</div>


  <div id="display">

    <?php
    echo "<br><span style=\"font-size:130%;\">excerpt (html)</span><br><br>";
    echo $name . ": " . $start . " to " . $end;
    echo "<br>";
    echo "Location: " . $location;
    echo "<br>";
    echo "Hosted by " . $org;
    echo "<br><br>";
    echo "Invited speakers: " . $invited;
    echo "<br><br>";
    echo "Submission deadline: " . $deadline;
    echo "<br>";
    echo "Submission page: <\a href=\"".$submission."\",target=\"_blank\">".$submission."<\/a>";
    echo "<br>";
    echo "Conference website: <\a href=\"".$website."\",target=\"_blank\">".$website."<\/a>";
    echo "<br>";
    ?>

    <?php
    echo "<br><span style=\"font-size:130%;\">main text</span><br><br>";
    echo $name . " will take place from " . $start . " to " . $end . " at " . $location . ", hosted by " . $org . ".";
    echo "<br><br>";
    echo "The invited speakers include " . $invited . ".";
    echo "<br><br>";
    echo "The abstract submission deadline is " . $deadline . ".";
    echo "<br>";
    echo " The submission page is " . $submission . ".";
    echo "<br>";
    echo "The conference website is " . $website . ".";
    ?>



  </div>
  </div>    
</body>

</html>
