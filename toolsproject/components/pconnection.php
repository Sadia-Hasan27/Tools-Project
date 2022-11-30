<?php
$db = new mysqli('localhost','root','','userform');
if($db->connect_error){
    echo $db->connect_error;
}