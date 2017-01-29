<!DOCTYPE html>
<html>
<head>
	<title>Patient Records</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="custom.css">
</head>
<body>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-8 col-xs-8">
			<h1>Existing Patients Information</h1>
		</div>
		<div class="col-md-4 col-xs-4 text-right">
			<a href="index.html" type="button pull-right" class="btn btn-info btn-insert">Click here to insert record</a>
		</div>

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dataphi";

		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);

		// Check connection
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM patientinfo";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
    		echo '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by name.."><table id="myTable"><tr><th>First Name</th><th>Last Name</th><th>Age</th><th>DOB</th><th>Gender</th><th>Mobile</th><th>Other</th></tr>';
    		// output data of each row
    		while($row = $result->fetch_assoc()) {
    			echo "
  					<tr>
    					<td>".$row["fname"]."</td>
    					<td>".$row["lname"]." </td>
    					<td>".$row["age"]."</td>
    					<td>".$row["dob"]."</td>
    					<td>".$row["gender"]."</td>
   					 	<td>".$row["mobile"]."</td>
    					<td>".$row["other"]."</td>
  					</tr>";
    			}
    			echo '</table>';
			} else {
    			echo "0 results";
			}
			$conn->close();
	?> 
</div>
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
</body>
</html>