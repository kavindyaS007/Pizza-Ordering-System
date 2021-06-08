<?php  include('php_code.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
<?php //print the order list
	
	$results = mysqli_query($db, "SELECT * FROM orders WHERE Status='New_Order'"); ?>
	<table>
		<h2 align="center">New Orders</h2>
		<thead>
			<tr>
				<th> Customer Name </th>
				<th> Phone Number </th>
				<th> NIC Number </th>
				<th> Delivery Date </th>
				<th> Pizza Type </th>
				<th> Pizza Size </th>
				<th> Quantity </th>
				<th> Status </th>
			</tr>
		</thead>
		
		<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['Cus_name']; ?></td>
				<td><?php echo $row['Phone_no']; ?></td>
				<td><?php echo $row['NIC_no']; ?></td>
				<td><?php echo $row['Delivery_date']; ?></td>
				<td><?php echo $row['Pizza_type']; ?></td>
				<td><?php echo $row['Size']; ?></td>
				<td><?php echo $row['Quantity']; ?></td>
				<td><?php echo $row['Status'] ?></td>
				<td>
					<a href="php_code.php?hide=<?php echo $row['id']; ?>" class="del_btn">Deliverd</a>
				</td>
				
			</tr>
		<?php } ?>
	</table>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
	
<?php //view the order details on a specific date ?>
	
	<form method="post" action="" >
		<h4>View orders</h4>
		<div class="input-group">
			<label>Delivery date</label>
			<input type="date" name="adminDeliveryDate" value="">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="viewOrder" >View Orders</button>
		</div>
		
		<?php if (isset($_POST['viewOrder'])){
		$adminDelDate = $_POST['adminDeliveryDate'];
		$results1 = mysqli_query($db, "SELECT * FROM orders WHERE Delivery_date = '$adminDelDate'");
		?>
		<table>
			<h4 align="center">New Orders (should be delivered on <?php echo $adminDelDate ?>)</h2>
			<thead>
				<tr>
					<th> Customer Name </th>
					<th> Phone Number </th>
					<th> NIC Number </th>
					<th> Delivery Date </th>
					<th> Pizza Type </th>
					<th> Pizza Size </th>
					<th> Quantity </th>
					<th> Status </th>
				</tr>
			</thead>
		
			<?php while ($row = mysqli_fetch_array($results1)) { ?>
				<tr>
					<td><?php echo $row['Cus_name']; ?></td>
					<td><?php echo $row['Phone_no']; ?></td>
					<td><?php echo $row['NIC_no']; ?></td>
					<td><?php echo $row['Delivery_date']; ?></td>
					<td><?php echo $row['Pizza_type']; ?></td>
					<td><?php echo $row['Size']; ?></td>
					<td><?php echo $row['Quantity']; ?></td>
					<td><?php echo $row['Status'] ?></td>
				</tr>
			<?php } ?>
		</table> <?php
	}?>
	</form>


<?php //calculate the revenue of a specific pizza size on a given date. ?>
	
	<form method="post" action="" >
		<h4>The revenue</h4>
		<div class="input-group">
			<label>Pizza Size</label>
			<select name="sizeForRevenue" id="pullDownMenu" size="1" value="<?php echo $size; ?>">
				<option value="large">large</option>
				<option value="medium">medium</option>
				<option value="small">small</option>
			</select>
		</div>
		<div class="input-group">
			<label>Delivery date</label>
			<input type="date" name="deliDateForRevenue" value="">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="calRevenue" > Go &gt;&gt;</button>
		</div>
		
		<?php 
		
		if (isset($_POST['calRevenue'])){
			$unitPrice = "";
			if($_POST['sizeForRevenue'] == 'large'){
			$unitPrice = 800;
		}
		else if($_POST['sizeForRevenue'] == 'medium'){
			$unitPrice = 600;
		}
		else{
			$unitPrice = 500;
		}
			$adminDelDateforRevenue = $_POST['deliDateForRevenue'];
			$adminsizeForRevenue = $_POST['sizeForRevenue'];
			$results3 = mysqli_query($db, "SELECT Size, Sum(Quantity*'$unitPrice') as sum FROM orders WHERE Delivery_date = '$adminDelDateforRevenue' and Size = '$adminsizeForRevenue' group by Size");
			
			
		?>
		<table>
			<h4 align="center">Revenue of sales for <?php echo $adminsizeForRevenue ?> pizza on <?php echo $adminDelDateforRevenue ?></h2>
			<thead>
				<tr>
					<th> Pizza Size </th>
					<th> Revenue </th>
				</tr>
			</thead>
			<?php while ($row = mysqli_fetch_array($results3)) { ?>
				<td><?php echo $row['Size']; ?></td>
				<td><?php echo $row['sum']; ?></td>
				
			<?php } ?>
		</table>
		<?php } ?>
	</form>
	<form method="post" action="" style="border:none;">
		<div style="text-align:center">
			<button class="btn" type="submit" name="logout" >Logout</button>
		</div>
	</form>
</body>
</html>
