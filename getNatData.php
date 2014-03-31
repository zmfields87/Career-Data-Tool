<?php
	
$jobTitle = $_REQUEST['job'];
	
	
	
try 
{
		$db = new PDO("mysql:host=localhost;port=8889;dbname=TeacherData","root","root");
}	
	catch (Exception $e) 
		{
			echo "Could not connect to database.";
			exit;
		}
	
	
$stmt = $db->prepare("SELECT DISTINCT
	TOT_EMP,  
	A_MEAN,
	A_PCT90
	FROM natdatatable 
	WHERE OCC_TITLE='" . $jobTitle . "'");
	
	$stmt->bindValue(":job", $jobTitle);
		

	if ($stmt->execute()) 
	{
		
		
		while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			
			
			echo "<li class='natAREA_NAME'>" . "USA";
			
			echo "<li class='natTOT_EMP'>" . $rows['TOT_EMP'] . " jobs" . "</li>";

			echo "<li class='natA_MEAN'>" . "$" . $rows['A_MEAN'] . "</li>";

			echo "<li class='natA_PCT90'>" . "$" . $rows['A_PCT90'] . "</li>";


	
		}
		
	}
	
	
?>
