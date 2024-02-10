<?php
header('Content-Type:application/json');   //jo bhi third party is api ko asses karega useepehle hi pta lag jayega data jason formate main milega
header('Acess-Control-Allow-Origin:*');//isse hum Acess dete h ki kon kon si website isse acess kare agar hum nahi dege to ye sirf hume hi access karega or kisi ko nahi or * ki jagah hum name bhi de sakte h
// $data = json_decode(file_get_contents("php://input",true)); // data read karne k liye function use karte h or is formate k through hum koisa bhi data read kar sakte h and row data ko read karne k liye hum php://input ka use karte h
// $search_value = $data->search;
// or
$search_value = isset($_GET['search'])? $_GET['search']:die();  //ye url se data get karta h
include("config.php");
$sql = "SELECT * FROM students Where student_name LIKE '%$search_value%'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
   $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
   echo json_encode($output);
}else{
    echo json_encode(array('message'=>'No Record Found.','status'=>false));
}
?>