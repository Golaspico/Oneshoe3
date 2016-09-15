<?php
			$servername = "127.0.0.1";
	        $username = "root";
	        $password = "";
	        $dbname = "oneshoe";

	        session_start();
	        
			// echo $newformat;
			// // 2003-10-16

	        $conn = new mysqli($servername, $username, $password,$dbname);

	        $sql = "SELECT * FROM `users` WHERE Role='0'";
	        $result = $conn->query($sql);?>

	        <table class="table table-striped">
				<thead>
					<tr>
						<th>USER ID</th>
						<th>USER NAME</th>
						<th>EMAIL ADDRESS</th>
						<th>ADDRESS</th>
						<th>DATE REGISTERED</th>
					</tr>
				</thead>
				<tbody>


	       <?php while($row = $result->fetch_assoc()){ ?>

			
					<tr>
						<td><?php echo $row['UsersID'];?></td>
						<td><?php echo $row['UserName'];?></td>
						<td><?php echo $row['Email'];?></td>
						<td><?php echo $row['Address'];?></td>
						<td><?php echo $row['Date'];?></td>
					</tr>
					<?php      }?>
				</tbody>
			</table>





