<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Getinfotoast extends CI_Controller {
	public function index(){
$servername = "localhost";
$username = "username";
$password = "password";

/*
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$array_values = array();
// output data of each row
while($row = $result->fetch_assoc()) {
   $array_values[] = $row;
};
*/
//initialize array
$myArray = array();

//set up the nested associative arrays using literal array notation
$firstArray = array("id" => 1, "data" => 45);
$secondArray = array("id" => 3, "data" => 54);

//push items onto main array with bracket notation (this will result in numbered indexes)
$myArray[] = $firstArray;
$myArray[] = $secondArray;

//convert to json
echo json_encode($myArray);
//$array_values = array("wo0"=>"2","wo1"=>"proton","wo2"=>"bmw");

//echo json_encode($array_values);
//echo "[{name:'Susita'}, {name:'BMW'}]";
//echo '{ "name":"John", "age":30, "city":"New York"}';
//$conn->close();
}
}
?>
