<?php
$nob=$_POST["nos5"];
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="db";
$check=0;
$n="Charminar";
$conn= new mysqli($host,$dbusername,$dbpassword,$dbname);

$SELECT = "Select seats from train_log where Train_name = '".$n."'";
// $stmt2 = $conn->prepare($SELECT); 
// $stmt2->bind_param("s",$n);
// $stmt2->execute();
if($stmt2 = mysqli_query($conn, $SELECT)){
// $stmt2->store_result();
// $result = mysqli_fetch_array($stmt2,MYSQLI_NUM);
	while ($row = mysqli_fetch_assoc($stmt2)) {
            $check=$row["seats"];
    }
}

// $stmt2->bind_result($check);
// $stmt2->store_result();
// echo $check;
if($check - $nob >= 0 ){
	$UPDATE="UPDATE train_log Set Seats=Seats-(?) where Train_name = (?)";
	$stmt=$conn->prepare($UPDATE);
	$stmt->bind_param("is",$nob,$n);
	$stmt->execute();
	echo "Reserved";
}
else{
 	echo "bookings unavailable";
}
?>
