<?php
    session_start(); 
    header("Content-Type: text/html; charset=UTF-8");

    error_reporting(1);
    ini_set("display_errors", 1);


    $conn = mysqli_connect("localhost","//DB아이디","//DB비밀번호","//DB스키마이름"); 
    

    if(mysqli_connect_error()){
        echo "mysql 접속중 오류가 발생했습니다. ";
        echo mysqli_connect_error(); 
    }
?>