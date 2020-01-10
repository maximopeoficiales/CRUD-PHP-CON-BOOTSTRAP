<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "task_bd"
);

/* if (isset($conn)) {
    echo "si conecte";
} else {
    echo "No he conectado";
}
 */