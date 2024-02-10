<?php
header('Content-Type:application/json');   //jo bhi third party is api ko asses karega useepehle hi pta lag jayega data jason formate main milega
header('Acess-Control-Allow-Origin:*');//isse hum Acess dete h ki kon kon si website isse acess kare agar hum nahi dege to ye sirf hume hi access karega or kisi ko nahi or * ki jagah hum name bhi de sakte h
header('Acess-Control-Allow-Methods:PUT');
header('Acess-Control-Allow-Headers:Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods,Authorization,X-Requested-With');
$data = json_decode(file_get_contents("php://input",true)); // data read karne k liye function use karte h or is formate k through hum koisa bhi data read kar sakte h and row data ko read karne k liye hum php://input ka use karte h
    $id = $data->id;
    $student_name = $data->student_name; // error de raha tha $data['sid'] per
    $age = $data->age;
    $city = $data->city;
    include("config.php");    
    $sql = "UPDATE students SET student_name = '$student_name', age = $age, city = '$city' WHERE id = $id";
    // echo "<pre>";print_r($sql);die();
    if(mysqli_query($conn, $sql)){
        echo json_encode(array('message' => 'Record is Updated.', 'status' => true));
    } else {
        echo json_encode(array('message' => 'Record is not Updated.', 'status' => false));
    }

?>
