<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
  
  padding-top:100px:
  padding-bottom:10px:
  
}

.card {
  padding-top:100px:
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3);
  margin: 8px;
}
.card:hover{
  box-shadow: 0 10px 10px 0 rgba(255, 0, 0, 0.3);
  margin: 8px;
  
}

.dash-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
  
}

.container {
  padding:50px;
  border: 1px solid grey;
}

	

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
  
}



.a {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  text-decoration:none;
}

.a:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
.but{
	padding:5px 10px 5px 10px;
	background-color:black;
	color:#fff;
	class-decoration:none;
}
.but:hover{
	padding:5px 10px 5px 10px;
	background-color:grey;
	color:#000;
	class-decoration:none;
}

</style>


<div id="dash"></div>
<div class="dash-section">
  <h1>ADMIN </h1> 
</div>

<?php
	require_once "admincontroller.php" ;
	$customers = getAllcustomers();
?>
<html>
    <head> 
	     <title>DASHBOARD</title></head>
	<body>
		<center><h1></h1></center>
		      
	<center>			
	<table border="1" style="border-collapse:collapse;">
			<thead>
				<th>Serial</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Address</th>
				<th>Phone Number</th>
				<th>About</th>
				<th>Action</th>
				<th>Action</th>
				
			</thead>
			<tbody>
				<?php
					foreach($customers as $customer)
					{
						echo "<tr>" ;
							echo "<td>".$customer["id"]."</td>" ;
							echo "<td>".$customer["fname"]."</td>" ;
							echo "<td>".$customer["lname"]."</td>" ;
							echo "<td>".$customer["username"]."</td>" ;
							echo "<td>".$customer["gender"]."</td>" ;
							echo "<td>".$customer["email"]."</td>" ;
							echo "<td>".$customer["address"]."</td>" ;
							echo "<td>".$customer["number"]."</td>" ;
							echo "<td>".$customer["about"]."</td>" ;
							echo '<td><a href=" update.php?id='.$customer["id"].'">Edit</a></td>';
							echo '<td><a href=" remove.php?id='.$customer["id"].'">Delete</a></td>';
						echo "</tr>" ;
					}
				?>
		   </tbody>
			
		</table>
		
	<center>    
    </body>
	<table> 
	<tr align="center">
		
			        <td><a  href=" addadmin.php" target="_self" class="but"> ADD &nbsp </a> </td> 
					
				
                    <!--<td><a  href="update.php" target="_self" class="but"> UPDATE &nbsp </a> </td>-->
					
              </tr>
			  </table> 

</html>