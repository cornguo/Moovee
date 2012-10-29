<?php
$counter = intval(file_get_contents("counter.dat"));

if(!isset($_COOKIE['visitor'])){
    $counter++;
    $fp = fopen("counter.dat", "w");
    flock($fp, LOCK_EX);   // do an exclusive lock
    fwrite($fp, $counter);
    flock($fp, LOCK_UN);   // release the lock
    fclose($fp);
//    setcookie("visitor", 1, time()+3600);
    @setcookie("visitor", 1, time()+30); // set to 30 sec.
}
echo "# {$counter}";
?>
