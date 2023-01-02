<?php


$cname = $_POST["countryname"];
$newCname = str_replace(" ",",",$cname);
        $ch  = curl_init();
        $url = "https://api.opencagedata.com/geocode/v1/json?q=$newCname&key=e3f6f1ae5039498497c16001a834e083&language=en&pretty=1";
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($res);
        $result1 = $result->results;
        if($result){
            foreach($result1 as $row){
                echo "<p>category : ";
                echo '<b>' .$row->components->_category . '</b><br>';
                echo "<p>type : ";
                echo '<b>' . $row->components->_type . '</b><br>';
                // echo "city : ";
                // echo '<b>' .$row->components->city . '</b><br>';
                echo "<p>continent : ";
                echo '<b>' . $row->components->continent . '</b><br>';
                echo "<p>country_code : ";
                echo '<b>' .$row->components->country_code . '</b><br>';
                // echo "postcode : ";
                // echo '<b>' .$row->components->postcode . '</b><br>';
                echo "<p>formatted : ";
                echo '<b>' .$row->formatted . '</b><br>';
                echo "<p>lat : ";
                echo '<b>' .$row->geometry->lat. '</b><br>';
                echo "<p>lng : ";
                echo '<b>' .$row->geometry->lng . '</b><br>';
            }
        }

  

?>