<?php

function clean_array($array) 
{
	//
	// this function cleans for SQL Injection on Arrays
	//
	
	foreach ($array as $key => $value) 
	{
		//this array[array] cleaner doesnt quite work
		if(is_array($array[$key])) {			
			foreach ($array[$key] as $subkey => $subvalue) 
			{
				$array[$key][$subkey] = mysql_real_escape_string($subvalue);
			}
		}
		
		else {		
			if(!is_array($key)){$array[$key] = mysql_real_escape_string($value);}
		}
	}	
	return $array;
}

function getDates($max = 25) {
	$result = mysql_query("SELECT DISTINCT date FROM " . $GLOBALS['tblName'] . "Issues ORDER BY date DESC") 
	or die(mysql_error()); 
	$text = "<select id=\"periods\"><option value=''>...</option>";
	while($row = mysql_fetch_array( $result )) {
		$text .= "<option value=\"?getListing=$row[date]\">$row[date]</option>";
	}
	$text .= "</select>";
	return $text;
}

function getIssueData($id) {
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Issues WHERE mantisId='$id'") 
	or die(mysql_error()); 
	
	$row = mysql_fetch_array( $result );
	return $row;
}

function getListing($date, $max = 25)
{
	$result = mysql_query("SELECT * FROM " . $GLOBALS['tblName'] . "Issues WHERE date='$date'") 
	or die(mysql_error()); 
	$text = "<h1>ORB Review | $date</h1><table>
	<tr>
		<th width=\"100\">Mantis ID</th>
		<th>Summary</th>
		<th>Status</th>
		<th>Category</th>	
		<th>Priority</th>
		<th>LOE</th>				
	</tr>";
	while($row = mysql_fetch_array( $result )) {
		$text .= "<tr>
		<td><a href=\"https://www1.sass.gwu.edu/mantis/view.php?id=$row[mantisId]\">$row[mantisId]</a> <small><a href=\"?getListing=$date&editIssue=$row[mantisId]\" style=\"float: right;\">edit</a></small></td>
		<td>$row[summary]</td>
		<td>$row[status]</td>
		<td>$row[category]</td>
		<td>$row[priority]</td>
		<td>$row[loe]</td>
		</tr>";
	}
	$text .= "</table>";
	
	return $text;
}

function addIssue($_POST) //clean post
{
	if(!empty($_POST['id']) && !empty($_POST['summary'])) {
	mysql_query("INSERT INTO " . $GLOBALS['tblName'] . "Issues 
	(mantisId, summary, status, category, date, priority, loe) VALUES('$_POST[id]', '$_POST[summary]', '$_POST[status]', '$_POST[category]', '$_POST[date]', '$_POST[priority]', '$_POST[loe]') ") 
			or die(mysql_error());	
		return "New Issue Inserted!";
	}
	return "You must have the ID and Summary filled.";		
}

function editIssue($_POST) //clean post
{
	if(!empty($_POST['id']) && !empty($_POST['summary'])) {
	mysql_query("UPDATE " . $GLOBALS['tblName'] . "Issues 
	SET mantisId='$_POST[mantisId]', summary='$_POST[summary]', status='$_POST[status]', category='$_POST[category]', date='$_POST[date]', priority='$_POST[priority]', loe='$_POST[loe]' WHERE id='$_POST[id]'") 
			or die(mysql_error());	
		return "Issue Updated!";
	}	
	
	return "You must have the ID and Summary filled.";		
}
?>