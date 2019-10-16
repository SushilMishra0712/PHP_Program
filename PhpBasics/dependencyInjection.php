<?php
class Logger{
    public function log($message){
        echo "Logging message:$message";
    }
}
class UserProfile{
    private $logger;
    public function __construct(Logger $logger){
        $this->logger=$logger;
    }
    public function createUser(){
        $this->logger->log("User Created.\n");
    }
    public function updateUser(){
        $this->logger->log("User Updated.\n");
    }
    public function deleteUser(){
        $this->logger->log("User deleted.\n");
    }
}
$logger=new Logger();
$profile=new UserProfile($logger);
$profile->createUser();
$profile->updateUser();
$profile->deleteUser();
?>