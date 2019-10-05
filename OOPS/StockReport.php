<?php
//Stock Report
class StockReport{
    //function to find total value of each stock
    public function userinput(){
    echo "How many stock you want to enter\n";
    fscanf(STDIN,"%d",$number);
    $totalvalue=0;
        //for loop to take $number times output
        for($i=0;$i<$number;$i++){
            echo "Enter share name\n";
            fscanf(STDIN,"%s",$share_name);
            echo "Enter number of share\n";
            fscanf(STDIN,"%d",$number_of_share);
            echo "Enter share price\n";
            fscanf(STDIN,"%d",$share_price);
            $array[$i]=array($share_name,$number_of_share,$share_price);
            $j=0;
            echo "value of share ".$share_name.":".$array[$i][$j+1]*$array[$i][$j+2]."\n";
            $sum=$array[$i][$j+1]*$array[$i][$j+2];
            $totalvalue=$totalvalue+$sum;
        }
        //store $totalvalue in array
        array_push($array,$totalvalue);
        echo "Total value of all stocks are:".$totalvalue."\n";
        return $array;
    }
    //function to print results in json file
    public function printresult($data){
        $result=file_put_contents("Stockreport0.json",json_encode($data));
        //if found data then echo successful
        if(!$result){
        echo "Something went wrong\n";
        }
        else{
        echo "Results stored successful\n";
        }
    }
}
//create object of class StockReport
$object=new StockReport;
//store $array in $data from function userinput
$data = $object->userinput();
//call function printresult
$object->printresult($data);
// print_r($array);


