<? 
$state=$_REQUEST['state'];

try 
{
	$db = new PDO("mysql:host=localhost;port=8889;dbname=TeacherData","root","root");
}	catch (Exception $e) 
	{
		echo "Could not connect to database.";
		exit;
	}
		
$stmt = $db->prepare("SELECT DISTINCT AREA_NAME 
		FROM masterdatatable 
		WHERE PRIM_STATE='$state'
		ORDER BY AREA_NAME ASC");
		
		$stmt->bindValue(":state", $state);

?>
<select id="select2" class="required" name="city" onChange="getJob('<?=$state?>',this.value); getJobData('<?=$state?>', this.value,'');getStateData(this.value,'');getNatData('');getMSAdata(this.value,'');getNMSAdata(this.value,'')">
<option value="">Select City</option>
<? if ($stmt->execute()) {
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
<option value='<?=$row['AREA_NAME']?>'><?=$row['AREA_NAME']?></option>
<? } }?>
</select>
