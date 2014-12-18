<?php
mysql_connect('127.0.0.1', 'root', 'mysql');
mysql_select_db('satya');


class PaginationHelper{
		
	public $totalRecordsCount;
	public $numOfRecordsPerPage;
	public $tableHeader;
	public $tableData;
	public $fileName;
	
	
	public  function displayTable(){
		$tableHtml='<table cellspacing="0" cellpadding="0" border="0" style="width: 100%;" class="list">';
		$tableHtml.="<tr>";
		
		
		foreach($this->tableHeader as $header){
			$tableHtml.="<th>{$header}</th>";
		}
		$tableHtml.="</tr>";
		

		if(count($this->tableData)>0){
			foreach($this->tableData as $key => $values){
				$tableHtml.="<tr>";
				foreach($values as $value){
					$tableHtml.="<td>{$value}</td>";
				}
				$tableHtml.="</tr>";
			}	
		}else{
			$tableHtml.="<tr><td colspan={$noOfHeaderColumns}>No Records</td></tr>";
		}
		$tableHtml.="</table><br/>";
		
		$total_pages = ceil($this->totalRecordsCount / $this->numOfRecordsPerPage);
		for ($i = 1; $i <= $total_pages; $i++) {
		$tableHtml.="<a href='".$this->fileName."?totalRecordsCount=".$this->totalRecordsCount."&page=" . $i . "'>" . $i . "</a> ";
	    };
		
		return $tableHtml;
	}
}


//01 : Number of Records
//put the count in the GET Params
if(isset($_GET['totalRecordsCount'])){
	$totalRecordsCount=$_GET['totalRecordsCount'];
}else{
	$sql = "SELECT * FROM student";
	$totalRecordsResultSet = mysql_query($sql);
	$totalRecordsCount = mysql_num_rows($totalRecordsResultSet);
}	
	

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


$tableHeader=array('ID','Name');
$tableData=array();
while ($row = mysql_fetch_assoc($rs_result)) {
	$tableData[$row['id']]=array();
	$tableData[$row['id']][]=$row['id'];
	$tableData[$row['id']][]=$row['name'];
};
	
	
	
	
	$pagerObject=new PaginationHelper;
	$pagerObject->totalRecordsCount=$totalRecordsCount;
	$pagerObject->numOfRecordsPerPage=$numOfRecordsPerPage;
	$pagerObject->tableHeader=$tableHeader;
	$pagerObject->tableData=$tableData;
	$pagerObject->fileName=$_SERVER['PHP_SELF'];
	
	echo $pagerObject->displayTable();
	
	// Goto last page
?>