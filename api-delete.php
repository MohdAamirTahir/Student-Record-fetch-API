<?php
header('Content-Type:application/json');
header('Acess-Control-Allow-Origin:*');
header('Acess-Control-Allow-Methods:DELETE');
header('Acess-Control-Allow-Headers:Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods,Authorization,X-Requested-With');

$data = json_decode(file_get_contents("php://input",true));
    $id = $data->id; // error de raha tha $data['sid'] per
    // echo "<pre>";print_r($id);die();
    include("config.php");
    $sql = "DELETE FROM students Where id = $id";
if(mysqli_query($conn,$sql)){
    echo json_encode(array('message'=>'Data is deleted.','status'=>True));

}else{
    echo json_encode(array('message'=>'Data is not deleted.','status'=>false));
}
?>