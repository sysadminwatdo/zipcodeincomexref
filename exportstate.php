<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=export_zip_state.csv');
$db = new mysqli('localhost', 'root', 'PasswordHere', 'ec');
        if($db->connect_errno > 0){ echo $db->connect_error; }
        $state = $_POST['state'];
        $sql = "select * from censusdata where state = '$state'";
        $result = $db->query($sql);
	$output = fopen('php://output', 'w');
	fputcsv($output, array('id', 'ZCTA', 'HH_w_earnings_mean_earnings', 'HH_num_with_public_assistance_income', 'HH_percent_with_public_assistance_income', 'HH_with_public_assistance_income_mean_amount', 'Males_over_15_median_per_capita_income', 'Females_over_15_median_per_capita_income', 'per_capita_income', 'state', 'town', 'county'));
	while ($row = $result->fetch_assoc()){					
	fputcsv($output, $row);
	}
?>
