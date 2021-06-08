<?php  include('php_code.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>Pizza Ordering System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php $results = mysqli_query($db, "SELECT * FROM orders"); ?>

	
	<form method="post" action="php_code.php" >
		<h2>Order your pizza!!!</h2>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		
		<div class="input-group">
			<label>Customer Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Phone Number</label>
			<input type="text" name="phoneNo" value="<?php echo $phoneNo; ?>">
		</div>
		<div class="input-group">
			<label>NIC number</label>
			<input type="text" name="NIC" value="<?php echo $NIC; ?>">
		</div>
		<div class="input-group">
			<label>Delivery Date</label>
			<input type="date" name="deliveryDate" value="<?php echo $deliveryDate; ?>">
		</div>
		<div class="input-group">
			<label>Pizza Type</label>
			<select name="type" id="pullDownMenu" size="1" value="<?php echo $type; ?>">
				<option value="Veg">Veg</option>
				<option value="nonVeg">Non Veg</option>
			</select>
		</div>
		<div class="input-group">
			<label>Pizza Size</label>
			<select name="size" id="pullDownMenu" size="1" value="<?php echo $size; ?>">
				<option value="large">large</option>
				<option value="medium">medium</option>
				<option value="small">small</option>
			</select>
		</div>
		<div class="input-group">
			<label>Quantity</label>
			<input type="number" name="quantity" value="<?php echo $quantity; ?>">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="save" >Save</button>
			<button class="btn" type="submit" name="logout" >Logout</button>
		</div>
	</form>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>



</body>
</html>
