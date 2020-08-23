<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ikettle</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">


	</head>
	<body>
				<?php include"navbar.php";?><br>
				<img src="img/6021102_sd1.jpg" style="margin-left:90px;" class="sha">

				
			<div id="section">
					<?php include"sidebar.php";?><br><br><br>
					<h3 class="text">Welcome <?php echo $_SESSION["AID"]; ?></h3><br><hr><br>
					<div class="content1">
					
						<h3 > Temperature Details</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{

								$sq = "update orders set temp = {$_POST["sname"]} where order_id=1";
								// $sq = "insert into orders (product_id,kettle_id,temp) values(1,'101',{$_POST["sname"]})";
								// $sq="insert into orders(SNAME) values ('{$_POST["sname"]}')";
								if($db->query($sq))
								{
									echo "<div class='success'>Insert Success..</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed..</div>";
								}
							}
						?>
						
						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						   <label>Give Temperature</label><br>
						   <input type="text" name="sname" required class="input">
						   <button type="submit" class="btn" name="submit">Send Temperature</button>
						</form>


						<div class="currentTemp">
						<label>Current Temperature</label><br>
						<?php
							$s="select temp from orders where order_id=1";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo "
							
										<div>{$r["temp"]}</div>
			
									
									";
									
								}
								
							}
							else
							{
								echo "No Record Found";
							}
						?>
						
						
						</div>
				
				
					</div>
				
				
				<div class="tbox" >
					<h3 style="margin-top:30px;"> Product Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>S.No</th>
							<th>Product Name</th>
						
						</tr>
						<?php
							$s="select * from products";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo "
										<tr>
										<td>{$i}</td>
										<td>{$r["name"]}</td>

										</tr>
									
									";
									
								}
								
							}
							else
							{
								echo "No Record Found";
							}
						?>
						
					</table>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>