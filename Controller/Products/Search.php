<?php
			$servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "oneshoe";
            // Create connection
            $conn = new mysqli($servername, $username, $password,$dbname);

            $Search = $_POST['Search'];

            $sql = "SELECT * FROM `products` WHERE Details='$Search'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){


?>







<?php }?>