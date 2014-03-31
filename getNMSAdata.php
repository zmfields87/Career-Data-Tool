<?php
	
$state = $_REQUEST['state'];
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
	JOBS_1000,
	A_MEAN,
	A_PCT90
	FROM nonmsacomp 
	WHERE PRIM_STATE='" . $state . "' 
	AND OCC_TITLE='" . $jobTitle . "'");
	
	$stmt->bindValue(":state", $state);
	$stmt->bindValue(":job", $jobTitle);
		

	if ($stmt->execute()) 
	{
		
		
		while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			

			
			echo "<li class='nonmetroAREA_NAME'>" . "Non-Metro Area (Rural/Country)";
			
			echo "<li class='nonmetroTOT_EMP'>" . $rows['TOT_EMP'] . " jobs" . "</li>";

			echo "<li class='nonmetroJOBS_1000'>" . $rows['JOBS_1000'] . "</li>";

			echo "<li class='nonmetroA_MEAN'>" . "$" . $rows['A_MEAN'] . "</li>";

			echo "<li class='nonmetroA_PCT90'>" . "$" . $rows['A_PCT90'] . "</li>";

	
		}
		
	}
	
	
?>
