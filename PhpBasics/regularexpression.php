<?php
//Php preg_match example
$my_url="www.guru99.com";
if(preg_match("/guru/",$my_url)){
    echo "The url ".$my_url." contains guru\n";
}
else{
    echo "The url ".$my_url." does not contains guru\n";
}

//Php preg_split example
$my_text="I love Regular Expressions";
$my_array=preg_split("/ /",$my_text);
print_r($my_array);

//Php preg_replace example
$text="We at GuruSchools strive to make quality education affordable to the masses. GuruSchools.com";
$text=preg_replace("/Guru/","W3",$text);
echo $text."\n";
?>