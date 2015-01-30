<html>
<head>
<title>Code sample: Getting to philosophy</title>
</head>
<body>
Code Sample:  Getting to philosophy<br><br>
<a href='https://github.com/aws910/gettingToPhilosophy'>Click here to view the source on github</a><hr>
<form action='<?php print $_SERVER['PHP_SELF'] ?>'>
Wikipedia link: <input type='text' name='wiki_url' size=50 value='http://en.wikipedia.org/wiki/Free_content'><br>
<input type='submit'>
</form>
<?php
if (isset($_GET['wiki_url'])){
  $wiki_url = $_GET['wiki_url'];
  if (substr($wiki_url,0,23) != 'http://en.wikipedia.org'){
    echo 'given link is not a valid wikipedia url.';
  } else {
    //Submit the url to the CLI program and display the results here
    $shell_cmd = "php gettingToPhilosophy.php $wiki_url";
    print "valid link received.  Executing the following command:<br>$shell_cmd<br><br>Output follows:<br><br>";
    //$shell_cmd ='ls -l';
    $shell_output = shell_exec($shell_cmd);
    print nl2br($shell_output);
  }
}
?>
</body>
</html>
