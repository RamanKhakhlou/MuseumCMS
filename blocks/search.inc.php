<?
	//Connecting to database
	include("connection.inc.php");
	
	$q = $_POST['query'];
	$resultExhibit = array();
	$resultNews = array();

	$exhibits = mysql_query("SELECT vid.id, vid.namerus, vid.namelat, eksponat.vid, eksponat.itemname FROM vid, eksponat WHERE vid.namelat LIKE \"%" . $q . "%\" OR vid.namerus LIKE \"%" . $q . "%\" AND vid.id = eksponat.vid");
	$news = mysql_query("SELECT id, news FROM news WHERE news LIKE \"%" . $q . "%\"");
	
	while($rowExhibit = mysql_fetch_assoc($exhibits))
	{
		$resultExhibit[] = array("id" => $rowExhibit['id'],
								 "rus" => $rowExhibit['namerus'], 
								 "lat" => $rowExhibit['namelat'],
								 "imgSrc" => $rowExhibit['itemname']);
	}

	while($rowNews = mysql_fetch_assoc($news))
	{
		$resultNews[] = array("id" => $rowNews['id'],
							  "news" => $rowNews['news']);
	}
	
	$result = array("exhibits" => $resultExhibit, 
					"news" => $resultNews);
	
	echo json_encode($result);
?>