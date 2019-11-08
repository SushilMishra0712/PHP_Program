<?php
require 'User.php';
$object_registration_validate=new User;
$object_registration_validate->create_table_if_notexist();
$object_registration_validate->registration();
?>