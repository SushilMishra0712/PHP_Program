<?php
//Facade Design Pattern Example
//A CodeTwit class to tweet on twitter
class CodeTwit{
    function tweet($status,$url){
        var_dump('Tweeted:'.$status.' from: '.$url);
    }
}
//A Googleplus class to share our posts on Google plus
class Googleplus{
    function share($url){
        var_dump('Shared on google plus:'.$url);
    }
}
//A Reddiator class to share post on reddit
class Reddiator{
    function reddit($url,$title){
        var_dump('Reddit! '.$url.' title: '.$title);
    }
}
//class Facade to simplify classes and methods
class shareFacade{
    //holds the reference to all of the classes
    protected $twitter;
    protected $google;
    protected $reddit;
    //the objects are injected to the constructor
    function __construct($twitterObj,$googleObj,$redditObj){
        $this->twitter=$twitterObj;
        $this->google=$googleObj;
        $this->reddit=$redditObj;
    }
    //single method to share posts on all social networkss
    function share($url,$title,$status){
        $this->twitter->tweet($status,$url);
        $this->google->share($url);
        $this->reddit->reddit($url,$title);
    }
}
//create objects of Social network classes
$twitterObj=new CodeTwit;
$redditObj=new Reddiator;
$googleObj=new Googleplus;

//pass the objects to the shareFacade class object
$shareObj=new shareFacade($twitterObj,$googleObj,$redditObj);

//call only one method to share on all social networks
$shareObj->share('https://myBlog.com/post-Awesome','My Greatest Post',"Read my all the Posts here");