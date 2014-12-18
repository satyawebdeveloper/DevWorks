<?Php
//****************************************************************************
////////////////////////Downloaded from  www.plus2net.com   //////////////////////////////////////////
///////////////////////  Visit www.plus2net.com for more such script and codes.
////////                    Read the readme file before using             /////////////////////
//////////////////////// You can distribute this code with the link to www.plus2net.com ///
/////////////////////////  Please don't  remove the link to www.plus2net.com ///
//////////////////////////
//*****************************************************************************
?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>Plus2net.com paging script in PHP</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<?Php
require "config.php";           // All database details will be included here 

$page_name="demo_paging1.php"; //  If you use this code with a different page ( or file ) name then change this 
$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}


$eu = ($start - 0); 
$limit = 10;                                 // No of records to be shown per page.
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 


/////////////// Total number of records in our table. We will use this to break the pages///////
$nume = $dbo->query("select count(id) from student")->fetchColumn();
/////// The variable nume above will store the total number of records in the table////

/////////// Now let us print the table headers ////////////////

echo "<TABLE class='t1'>";
echo  "<tr><th>ID</th><th>Name</th><th>Class</th><th>Mark</th></tr>";

////////////// Now let us start executing the query with variables $eu and $limit  set at the top of the page///////////
$query=" SELECT * FROM student  limit $eu, $limit ";

//////////////// Now we will display the returned records in side the rows of the table/////////
foreach ($dbo->query($query) as $row) {
$m=$i%2; // required for alternate color of rows matching to style class 
$i=$i+1;   //  increment for alternate color of rows

echo "<tr class='r$m'><td>$row[id]</td><td>$row[name]</td><td>$row[class]</td><td>$row[mark]</td></tr>";
}
echo "</table>";
////////////////////////////// End of displaying the table with records ////////////////////////

/////////////////////////////// 
if($nume > $limit ){ // Let us display bottom links if sufficient records are there for paging

/////////////// Start the bottom links with Prev and next link with page numbers /////////////////
echo "<table align = 'center' width='50%'><tr><td  align='left' width='30%'>";
//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
if($back >=0) { 
print "<a href='$page_name?start=$back'><font face='Verdana' size='2'>PREV</font></a>"; 
} 
//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
echo "</td><td align=center width='30%'>";
$i=0;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <a href='$page_name?start=$i'><font face='Verdana' size='2'>$l</font></a> ";
}
else { echo "<font face='Verdana' size='4' color=red>$l</font>";}        /// Current page is not displayed as link and given font color red
$l=$l+1;
}


echo "</td><td  align='right' width='30%'>";
///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
if($this1 < $nume) { 
print "<a href='$page_name?start=$next'><font face='Verdana' size='2'>NEXT</font></a>";} 
echo "</td></tr></table>";

}// end of if checking sufficient records are there to display bottom navigational link. 
?>
 <br><br>
<a href=demo_paging1.php>PHP paging demo I ></a> |
<a href=demo_paging2.php> User managing records per page</a> | <a href=demo_paging4.php>Sorting by column</a> |

<br><br>
<center><a href='http://www.plus2net.com' rel="nofollow">PHP SQL HTML free tutorials and scripts</a></center> 
</body>

</html>
