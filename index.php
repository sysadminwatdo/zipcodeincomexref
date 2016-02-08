<?php
include("password_protect.php");
echo "Income Data By Zip Code<br />";
echo "Data from 2000 census.<br />";
echo "Copyright 2016 Daniel Wurzbacher. Distributed under the MIT License.";
echo "<hr />";
?>
<form method="post" action="exportstate.php">
<input type="hidden" name="export" value="yes">
<b>Data Export By State</b><br />
<select name="state">
<option>State</option>
<?php
$db = new mysqli('localhost', 'root', 'PasswordHere', 'ec');
$sql = "select distinct state from censusdata order by state ASC";
$result = $db->query($sql);
while($row = $result->fetch_assoc()){
	echo '<option name="' . $row['state'] . '" value="' . $row['state'] . '">' . $row['state'] . '</option>';
}
?>
</select>
<input type="submit">
</form>

<hr />
<form method="post" action="export.php">
<input type="hidden" name="export" value="yes">
<b>Data Export By State And County</b><br />
<select name="state">
<option>State</option>
<?php 
$db = new mysqli('localhost', 'root', 'PasswordHere', 'ec');
$sql = "select distinct state from censusdata order by state ASC";
$result = $db->query($sql);
while($row = $result->fetch_assoc()){
echo '<option name="' . $row['state'] . '" value="' . $row['state'] . '">' . $row['state'] . '</option>';
}
?>
</select>
<select name="county">
<option>County</option>
<?php
$db = new mysqli('localhost', 'root', 'PasswordHere', 'ec');
$sql = "select distinct county from censusdata order by county ASC";
$result = $db->query($sql);
while($row = $result->fetch_assoc()){
echo '<option value="' . $row['county'] . '">' . $row['county'] . '</option>';
}
?>
</select>
<input type="submit">
</form>
<br />
<form method="post" action="index.php">
2 Letter State Abbrev <input type="text" name="st">
<input type="hidden" name="type" value="lowestmedianbystate">
<br />
Number of zips? <input type="text" name="num">
Lowest income by state <input type="submit">
</form>
<hr />
<form method="post" action="index.php">
2 letter state abbrev <input type="text" name="st">
<input type="hidden" name="type" value="highestpublicassistance">
<br />
Number of zips? <input type="text" name="num">;
Highest % Public Assistance <input type="submit">
</form>
<hr />
<form method="post" action="index.php">
<input type="hidden" name="type" value="twodigit">
<br />
Number of zips? <input type="text" name="num"><br />
First Digits Of Zip <input type="text" name="first"><br />
Lowest Income By 2 or 3 Digit Zip <input type="submit"><br />
Example: Lowest income near Grand Prairie, TX you could enter 750<br />
	</form>
	<hr />


<?php
global $state;
$state = $_POST['st'];
global $num;
$num = $_POST['num'];
if ($_POST['type'] = 'lowestmedianbystate'){
	$db = new mysqli('localhost', 'root', 'PasswordHere', 'ec');
	if($db->connect_errno > 0){ echo $db->connect_error; }
	$sql = "select * from censusdata where state = '$state' order by HH_w_earnings_mean_earnings ASC LIMIT $num";
	$result = $db->query($sql);
	echo "<center><b>Lowest Income Zip Codes</b></center>";
	echo "<table border=1><tr>";
	echo "<th>ID</th>";
	echo "<th>Zip</th>";
	echo "<th>HH Mean Earnings</th>";
	echo "<th>HH W Pub Asst</th>";
	echo "<th>HH Percent W Pub Asst</th>";
	echo "<th>Per Capita - M > 15</th>";
	echo "<th>Per Capita - F > 15</th>";
	echo "<th>Per Capita</th>";
	echo "<th>Town</th>";
	echo "<th>County</th>";
	echo "</tr>";
	while ($row = $result->fetch_assoc()){	
	echo "<tr>";
	$id = $row['id'];
	echo "<td>" . $row['id'] . "</td>";	
	echo "<td>" . $row['ZCTA'] . "</td>";
	echo "<td>$" . $row['HH_w_earnings_mean_earnings'] . "</td>";
	echo "<td>" . $row['HH_num_with_public_assistance_income'] . "</td>";
	echo "<td>" . $row['HH_percent_with_public_assistance_income'] . "%</td>";
	echo "<td>$" . $row['Males_over_15_median_per_capita_income'] . "</td>";
	echo "<td>$" . $row['Females_over_15_median_per_capita_income'] . "</td>";
	echo "<td>$" . $row['per_capita_income'] . "</td>";
	echo "<td>" . $row['town'] . "</td>";
	echo "<td>" . $row['county'] . "</td>";
	echo "</tr>";
	}	
echo "</table>";
}

if ($_POST['type'] = 'highestpublicassistance'){
	        $db = new mysqli('localhost', 'root', 'PasswordHere', 'ec');
		        if($db->connect_errno > 0){ echo $db->connect_error; }
		        $sql = "select * from censusdata where state = '$state' order by HH_percent_with_public_assistance_income DESC LIMIT $num";
		        $result = $db->query($sql);
			        echo "<center><b>Zip Code With Highest % Public Assistance Income</b></center>";
			        echo "<table border=1><tr>";
				echo "<th>ID</th>";
			        echo "<th>Zip</th>";
			        echo "<th>HH Mean Earnings</th>";
				echo "<th>HH W Pub Asst</th>";
			        echo "<th>HH Percent W Pub Asst</th>";
			        echo "<th>Per Capita - M > 15</th>";
				echo "<th>Per Capita - F > 15</th>";
			        echo "<th>Per Capita</th>";
				echo "<th>Town</th>";
			        echo "<th>County</th>";
				echo "</tr>";
			        while ($row = $result->fetch_assoc()){
				        echo "<tr>";
				        $id = $row['id'];
	 			        echo "<td>" . $row['id'] . "</td>";
				        echo "<td>" . $row['ZCTA'] . "</td>";
				        echo "<td>$" . $row['HH_w_earnings_mean_earnings'] . "</td>";
				        echo "<td>" . $row['HH_num_with_public_assistance_income'] . "</td>";
				        echo "<td>" . $row['HH_percent_with_public_assistance_income'] . "%</td>";
				        echo "<td>$" . $row['Males_over_15_median_per_capita_income'] . "</td>";
				        echo "<td>$" . $row['Females_over_15_median_per_capita_income'] . "</td>";
				        echo "<td>$" . $row['per_capita_income'] . "</td>";
					echo "<td>" . $row['town'] . "</td>";
					echo "<td>" . $row['county'] . "</td>";					
					echo "</tr>";
				        }
				echo "</table>";
}

if ($_POST['type'] = 'twodigit'){
	        $db = new mysqli('localhost', 'root', 'PasswordHere', 'ec');
		if($db->connect_errno > 0){ echo $db->connect_error; }
			$zcta = $_POST['first'];
			$sql = "select * from censusdata where ZCTA LIKE '$zcta%' order by HH_w_earnings_mean_earnings ASC LIMIT $num";
			echo $sql;
		        $result = $db->query($sql);
			echo "<center><b>Lowest Income By Partial Zip</b></center>";
			echo "<table border=1><tr>";
		        echo "<th>ID</th>";
		        echo "<th>Zip</th>";
		        echo "<th>HH Mean Earnings</th>";
		        echo "<th>HH W Pub Asst</th>";
		        echo "<th>HH Percent W Pub Asst</th>";
	                echo "<th>Per Capita - M > 15</th>";
		        echo "<th>Per Capita - F > 15</th>";
		        echo "<th>Per Capita</th>";
			echo "<th>Town</th>";
			echo "<th>County</th>";
			echo "</tr>";
		        while ($row = $result->fetch_assoc()){
			      echo "<tr>";
			      $id = $row['id'];
			      echo "<td>" . $row['id'] . "</td>";
			      echo "<td>" . $row['ZCTA'] . "</td>";
			      echo "<td>$" . $row['HH_w_earnings_mean_earnings'] . "</td>";
			      echo "<td>" . $row['HH_num_with_public_assistance_income'] . "</td>";
		              echo "<td>" . $row['HH_percent_with_public_assistance_income'] . "%</td>";
		              echo "<td>$" . $row['Males_over_15_median_per_capita_income'] . "</td>";
			      echo "<td>$" . $row['Females_over_15_median_per_capita_income'] . "</td>";
      		              echo "<td>$" . $row['per_capita_income'] . "</td>"; 
			      echo "<td>" . $row['town'] . "</td>";
                              echo "<td>" . $row['county'] . "</td>";
			      echo "</tr>";
				}
			echo "</table>";
}

?>
