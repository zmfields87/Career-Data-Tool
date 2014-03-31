<? 
$state = $_REQUEST['state'];
$city = $_REQUEST['city'];
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
	FROM masterdatatable 
	WHERE PRIM_STATE='" . $state . "' 
	AND AREA_NAME='" . $city . "' 
	AND OCC_TITLE='" . $jobTitle . "'");
	
	$stmt->bindValue(":state", $state);
	$stmt->bindValue(":city", $city);
	$stmt->bindValue(":job", $jobTitle);
	

	if ($stmt->execute()) 
	{
		while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
		{		

echo "<li class='localAREA_NAME'>" . $city . "</li>";

echo "<li class='localTOT_EMP'>" . $rows['TOT_EMP'] . " jobs" . "</li>";

echo "<li class='localJOBS_1000'>" . $rows['JOBS_1000'] . "</li>";

echo "<li class='localA_MEAN'>" . "$" . $rows['A_MEAN'] . "</li>";

echo "<li class='localA_PCT90'>" . "$" . $rows['A_PCT90'] . "</li>";



	}
}


	
?>
