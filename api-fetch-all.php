<?php
header('Content-Type:application/json');   //jo bhi third party is api ko asses karega useepehle hi pta lag jayega data jason formate main milega
header('Acess-Control-Allow-Origin:*');//isse hum Acess dete h ki kon kon si website isse acess kare agar hum nahi dege to ye sirf hume hi access karega or kisi ko nahi or * ki jagah hum name bhi de sakte h
include("config.php");
$sql = "SELECT * FROM students ";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
   $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
   echo json_encode($output);
}else{
    echo json_encode(array('message'=>'No Record Found.','status'=>false));
}
?>