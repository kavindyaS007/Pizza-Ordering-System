<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'PizzaOrders');

	// initialize variables
	$name = "";
	$phoneNo = "";
	$NIC = "";
	$deliveryDate = "";
	$type = "";
	$size = "";
	$quantity = "";
	$orderStatus = "";
	
	
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$phoneNo = $_POST['phoneNo'];
		$NIC = $_POST['NIC'];
		$deliveryDate = $_POST['deliveryDate'];
		$type = $_POST['type'];
		$size = $_POST['size'];
		$quantity = $_POST['quantity'];
		$orderStatus = "New_Order";

		mysqli_query($db, "INSERT INTO orders (Cus_name, Phone_no, NIC_no, Delivery_date, Pizza_type, Size, Quantity, Status) VALUES ('$name', '$phoneNo', '$NIC','$deliveryDate','$type','$size','$quantity','$orderStatus')"); 
		$_SESSION['message'] = "Order successfully sent!!!"; 
		header('location: customer.php');
	}
	
	if (isset($_POST['logout'])) {
		header('location: login.php');
	}
	
	if (isset($_GET['hide'])) {
		$id = $_GET['hide'];
		$orderStatus = "Delivered";
		mysqli_query($db,"UPDATE orders SET Status='$orderStatus' WHERE id=$id");
		$_SESSION['message'] = "Order has delivered!"; 
		header('location: admin.php');
	}
	
	if (isset($_POST['guest'])) {
		header('location: customer.php');
	}
	
	if (isset($_POST['admin'])){
		$user = $_POST['username'];
		$pw = $_POST['password'];
		$results4 = mysqli_query($db, "Select * from Admin_Login where Username='$user' and Password='$pw'");
		$count = mysqli_num_rows($results4);
		?> 
		
			<?php while ($row = mysqli_fetch_array($results4)) { 
					$row['Username']; 
					$row['Password']; 
					if($count==1) {
						header('location:admin.php');
					}
			 } 
	}
?>