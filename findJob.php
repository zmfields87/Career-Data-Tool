<? 
$state = $_REQUEST['state'];
$city = $_REQUEST['city'];

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
	OCC_TITLE 
	FROM masterdatatable 
	WHERE PRIM_STATE='$state' 
	AND AREA_NAME='$city' ORDER BY OCC_TITLE ASC");
	
	$stmt->bindValue(":state", $state);
	$stmt->bindValue(":city", $city);

?>


<select name="job" id="select3" class="required" onChange="getJobData('<?=$state?>','<?=$city?>',this.value);getStateData('<?=$state?>',this.value);getNatData(this.value);getMSAdata('<?=$state?>',this.value);getNMSAdata('<?=$state?>',this.value)">
<option value="">Select a Job</option>
<? if ($stmt->execute()) {
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{  ?>
<option value='<?=$row['OCC_TITLE']?>'><?=$row['OCC_TITLE']?></option>
<? } } ?>		  
</select>
