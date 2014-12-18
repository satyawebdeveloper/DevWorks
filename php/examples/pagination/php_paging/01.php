<?php
mysql_connect('127.0.0.1', 'root', 'mysql');
mysql_select_db('satya');


$numOfRecordsPerPage = 2;  //number of Records Per page to show

if (isset($_GET["page"])) {
  $page = $_GET["page"];
} 
else {
  $page = 1;
}

$startFrom = ($page - 1) * $numOfRecordsPerPage;
$sql = "SELECT * FROM student LIMIT $startFrom, $numOfRecordsPerPage";
$rs_result = mysql_query($sql);
//run the query
?> 


<table>
<tr><td>Name</td><td>Phone</td></tr>
<?php 
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>            
            </tr>
<?php
				};
			?> 
</table>



<?php

    //Total Records Count
	$sql = "SELECT * FROM student";
	$totalRecordsResultSet = mysql_query($sql);
	$total_records = mysql_num_rows($totalRecordsResultSet);
	$total_pages = ceil($total_records / $numOfRecordsPerPage);
	
	echo "<a href='01.php?page=1'>" . '|<' . "</a> ";
	// Goto 1st page
	for ($i = 1; $i <= $total_pages; $i++) {
		echo "<a href='01.php?page=" . $i . "'>" . $i . "</a> ";
	};
	echo "<a href='01.php?page=$total_pages'>" . '>|' . "</a> ";
	// Goto last page
?>