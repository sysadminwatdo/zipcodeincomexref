<?php
header("Refresh:1");
echo "Fixing a state.<br />";
$db = new mysqli('localhost', 'root', 'PasswordHere', 'ec');
$sql = "select * from censusdata where county IS NULL limit 1";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()){
	global $id;
	global $zcta;
	$id = $row['id'];
	$zcta = $row['ZCTA'];
}
echo "ID: " . $id . " ZCTA: " . $zcta;
$sql = "select zipcode, town, state_abbr, county from zipxref where zipcode = '$zcta'";
$result = $db->query($sql);
# if(!$result){
#	echo "Not a state.";
#	$sql = "update censusdata set state = 'NO' where id = '$id'";
#	$result = $db->query($sql);
# }
while ($row = $result->fetch_assoc()){
	print_r($row);
	global $zipcode;
	$zipcode = $row['zipcode'];
	global $town;
	$town = $row['town'];
	global $stateabbr;
	$stateabbr = $row['state_abbr'];
	global $county;
	$county = $row['county'];
	echo "<br />Zip: " . $zipcode . " Town: " . $town . "State: " . $stateabbr . " County: " . $county . "<br />";
}
	$sql = "update censusdata set state = '$stateabbr' where id = '$id'";
	$result = $db->query($sql);
	$sql = "update censusdata set county = '$county' where id = '$id'";
	$result = $db->query($sql);
	$sql = "update censusdata set town = '$town' where id = '$id'";
	$result = $db->query($sql);
?>
