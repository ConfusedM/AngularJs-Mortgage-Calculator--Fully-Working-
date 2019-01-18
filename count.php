<?php

$pri = $_POST["pri"];
$yr1 = $_POST["int1"];
$yr2 = $_POST["int2"];
$yr3 = $_POST["int3"];
$yr4 = $_POST["int4"];
$yr5 = $_POST["int5"];
$yrs = $_POST["yrs"];


function monrate($x){

	return $x/1200;

}

function countinterest($pri,$int){

	return round(monrate($int) * $pri,2) ;

}

function powerof($monrate, $periodleft){

	return pow(1 + $monrate,$periodleft);

}

function mthpay($pri, $yr1, $yrs){

	return round(($pri * monrate($yr1) * powerof(monrate($yr1), $yrs)) / (powerof(monrate($yr1), $yrs) - 1),2);

}

function buildtable($pri, $yr1, $yr2, $yr3, $yr4, $yr5, $yrs){

	$ppaid = 0;

	for($x=1; $x <= 12; $x++){

		echo "<tr>";

			//month
			echo "<td>" . $x . "</td>";

			//payment
			echo "<td>" . mthpay($pri, $yr1, ($yrs*12)-($x-1)) . "</td>";

			//beginning principal
			echo "<td>" . $pri . "</td>";

			//interest
			echo "<td>" . countinterest($pri,$yr1) . "</td>";

			$ppaid = $ppaid + mthpay($pri, $yr1, ($yrs*12)-($x-1)) - countinterest($pri,$yr1);

			//principal paid
			echo "<td>" . $ppaid . "</td>";

			$pri = $pri - $ppaid;

			//final principal
			echo "<td>" . $pri . "</td>";

		echo "</tr>";


	}


}

echo mthpay($pri, $yr1, $yrs*12);




?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table>
		<tr>
			<th>Month</th>
			<th>Payment</th>
			<th>Beginning Principal</th>
			<th>Interest</th>
			<th>Principal Paid</th>
			<th>Final Principal</th>
		</tr>

		<?php

			buildtable($pri, $yr1, $yr2, $yr3, $yr4, $yr5, $yrs);

		?>
	</table>

</body>
</html>