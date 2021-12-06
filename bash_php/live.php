<form method="post">
  Enter Number bro:<br>
  <input type="number" name="number"><br>
  <input type="text" name="u_name">
  <input type="submit" value="Submit">
</form>


<?php
$myfile = fopen("var.sh", "w") or die("Unable to open file!");
$txt = $_POST['number'];
$main_txt = "number=";
$main= $main_txt.$txt;
fwrite($myfile, $main);
fclose($myfile);

$myfile1 = fopen("name.sh", "w") or die("Unable to open file!");
$txt1 = $_POST['u_name'];
$main_txt1 = "u_name=";
$main1= $main_txt1.$txt1;
fwrite($myfile1, $main1);
fclose($myfile1);

ob_implicit_flush(true);
ob_end_flush();

$cmd = "bash /var/www/html/test.sh";

$descriptorspec = array(
   0 => array("pipe", "r"),   // stdin is a pipe that the child will read from
   1 => array("pipe", "w"),   // stdout is a pipe that the child will write to
   2 => array("pipe", "w")    // stderr is a pipe that the child will write to
);


$process = proc_open($cmd, $descriptorspec, $pipes, realpath('./'), array());

if (is_resource($process)) {

    while ($s = fgets($pipes[1])) {
        print $s;

    }
}

//display name
$cmd1 = "bash /var/www/html/name.sh";

$descriptorspec1 = array(
   0 => array("pipe", "r"),   // stdin is a pipe that the child will read from
   1 => array("pipe", "w"),   // stdout is a pipe that the child will write to
   2 => array("pipe", "w")    // stderr is a pipe that the child will write to
);


$process1 = proc_open($cmd1, $descriptorspec1, $pipes, realpath('./'), array());

if (is_resource($process1)) {

    while ($s = fgets($pipes[1])) {
        print $s;

    }
}


?>
