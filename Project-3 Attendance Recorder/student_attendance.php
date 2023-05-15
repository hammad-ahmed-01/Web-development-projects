<?php

include("db.php");
$db=$conn;
$ID = "964626284";
// uncomment the below line when you login with tables in database
// $ID = $_SESSION["id"];
// fetch query
function fetch_data_(){
  global $db, $ID;
  $query="SELECT (SELECT COUNT(isPresent) FROM attendance where isPresent = '1') * 100 / COUNT(isPresent) 
  as 'Percentage' FROM attendance where studentid=$ID";
  $exec = mysqli_query($db, $query);
  if(mysqli_num_rows($exec)>0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}
$fetch_data_= fetch_data_();
show_data_($fetch_data_);

function show_data_($fetch_data_){
 if(count($fetch_data_)>0){
      $sn=1;
    foreach($fetch_data_ as $data){ 
        echo $data['Percentage']; 
  $sn++; 
     }
}else{
     
  echo "No Data Found"; 
}

}

?>