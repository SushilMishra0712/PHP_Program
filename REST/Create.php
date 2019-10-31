<?php
    $db=new PDO("mysql:host=localhost;dbname=myDBPDO","root",null);
    echo "Connected with database\n";
    //create database myDBPDO
    // $sql="CREATE DATABASE myDBPDO";
    // $db->exec($sql);
    //create table MyGuests
    $sql="CREATE TABLE MyGuests(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                firstname VARCHAR(30) NOT NULL,
                                lastname VARCHAR(30) NOT NULL,
                                email VARCHAR(50),
                                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    $db->exec($sql);
    echo "Table Created Succesfully";
?>