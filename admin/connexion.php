<?php

$conx = mysqli_connect("localhost","root","","masante");
if($conx==false)
{
    die("Connection echouee! ".$conx-> connect_error);
}
?>