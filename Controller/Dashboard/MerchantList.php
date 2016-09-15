<?php
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";

	        session_start();
	        
			// echo $newformat;
			// // 2003-10-16

	        $conn = new mysqli($servername, $username, $password,$dbname);

	        $sql = "SELECT * FROM `users` WHERE Role='1'";
	        $result = $conn->query($sql);?>

	        <table class="table table-striped">
				<thead>
					<tr>
						<th>MERCHANT</th>
						<th>REPORTS</th>
						<th>STATUS</th>
						<th></th>
					</tr>
				</thead>
				<tbody>


	       <?php while($row = $result->fetch_assoc()){ ?>

			
					<tr>
						<td><?php echo $row['UserName'];?></td>
						<td>

							<form action="../Controller/Order/QuickReports.php" method="post" class="reports">
								<input type="hidden" name="UsersID" value="<?php echo $row['UsersID'];?>"/>
								<button class="btn btn-primary magicbtn" type="submit">REPORTS</button>
							</form>

						</td>
						<td><button class="btn btn-primary magicbtn" disabled="disabled">ACTIVE</button></td>
						<td>
							<form action="../Controller/Users/Delete.php" method="post" id="formdelete">
							<input type="hidden" name="UsersID" value="<?php echo $row['UsersID'];?>"/>
								<button class="btn btn-primary magicbtn" type="submit">DE-ACTIVATE</button>
							</form>
						</td>
					</tr>
					<?php      }?>
				</tbody>
			</table>





