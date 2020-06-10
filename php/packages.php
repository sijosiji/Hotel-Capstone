<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vacation Packages</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
  	<div class="container">
	<?php include "php/header.php"?>
		<div class='jumbotron' style='background-color:khaki'>
			<div class='row'>
        		<div class='col-sm-1'></div>
        		<div class='col-sm-8'>
          			<div class="input-group mb-3">
            			<div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">Destination:</span></div>
            			<input type="text" class="form-control" placeholder="Search for destination" id="myInput" onkeyup="myFunction()">
          			</div>
        		</div>
        	</div>
    	</div>
  </div>
  <?php include "php/footer.php"?>
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
</script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
