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
</head>

<body>
<?Php
require "config.php";           // All database details will be included here 
$page_name="demo_paging2.php"; //  If you use this code with a different page ( or file ) name then change this 

////// starting of drop down to select number of records per page /////

@$limit=$_GET['limit']; // Read the limit value from query string. 
if(strlen($limit) > 0 and !is_numeric($limit)){
echo "Data Error";
exit;
}

// If there is a selection or value of limit then the list box should show that value , so we have to lock that options //
// Based on the value of limit we will assign selected value to the respective option//
switch($limit)
{
case 2:
$select2="selected";
$select10="";
$select5="";
break;

case 5:
$select5="selected";
$select10="";
$select2="";
break;

default:
$select10="selected";
$select5="";
$select2="";
break;

}

@$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}

echo "Select Number of records per page: <form method=get action=$page_name>
<select name=limit>
<option value=10 $select10>10 Records</option>
<option value=5 $select5>5 Records</option>
<option value=2 $select2>2 Records</option>
</select>
<input type=submit value=GO>";

// You can keep the below line inside the above form, if you want when user selection of number of 
// records per page changes, it should not return to first page. 
// <input type=hidden name=start value=$start>
////////////////////////////////////////////////////////////////////////
//
///// End of drop down to select number of records per page ///////


$eu = ($start - 0); 

if(!$limit > 0 ){ // if limit value is not available then let us use a default value
$limit = 10;    // No of records to be shown per page by default.
}                             
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 


/////////////// Total number of records in our table. We will use this to break the pages///////
$nume = $dbo->query("select count(id) from student")->fetchColumn();
/////// The variable nume above will store the total number of records in the table////

/////////// Now let us print the table headers ////////////////
$bgcolor="#f1f1f1";
echo "<TABLE width=50% align=center  cellpadding=0 cellspacing=0> <tr>";
echo "<td  bgcolor='dfdfdf' >&nbsp;<font face='arial,verdana,helvetica' color='#000000' size='4'>Name</font></td>";
echo "<td  bgcolor='dfdfdf' >&nbsp;<font face='arial,verdana,helvetica' color='#000000' size='4'>Class</font></td>";
echo "<td  bgcolor='dfdfdf'>&nbsp;<font face='arial,verdana,helvetica' color='#000000' size='4'>Mark</font></td></tr>";

////////////// Now let us start executing the query with variables $eu and $limit  set at the top of the page///////////
$query=" SELECT * FROM student  limit $eu, $limit ";
//////////////// Now we will display the returned records in side the rows of the table/////////
foreach ($dbo->query($query) as $row) {

if($bgcolor=='#f1f1f1'){$bgcolor='#ffffff';}
else{$bgcolor='#f1f1f1';}

echo "<tr >";
echo "<td align=left bgcolor=$bgcolor id='title'>&nbsp;<font face='Verdana' size='2'>$row[name]</font></td>"; 
echo "<td align=left bgcolor=$bgcolor id='title'>&nbsp;<font face='Verdana' size='2'>$row[class]</font></td>"; 
echo "<td align=left bgcolor=$bgcolor id='title'>&nbsp;<font face='Verdana' size='2'>$row[mark]</font></td>"; 

echo "</tr>";
}
echo "</table>";
////////////////////////////// End of displaying the table with records ////////////////////////

/////////////// Start the buttom links with Prev and next link with page numbers /////////////////
echo "<table align = 'center' width='50%'><tr><td  align='left' width='30%'>";
//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
if($back >=0) { 
print "<a href='$page_name?start=$back&limit=$limit'><font face='Verdana' size='2'>PREV</font></a>"; 
} 
//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
echo "</td><td align=center width='30%'>";
$i=0;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <a href='$page_name?start=$i&limit=$limit'><font face='Verdana' size='2'>$l</font></a> ";
}
else { echo "<font face='Verdana' size='4' color=red>$l</font>";}        /// Current page is not displayed as link and given font color red
$l=$l+1;
}


echo "</td><td  align='right' width='30%'>";
///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
if($this1 < $nume) { 
print "<a href='$page_name?start=$next&limit=$limit'><font face='Verdana' size='2'>NEXT</font></a>";} 
echo "</td></tr></table>";


?>
 <br><br>
<a href=demo_paging1.php>PHP paging demo I ></a> |
<a href=demo_paging2.php> User managing records per page</a> | <a href=demo_paging4.php>Sorting by column</a> |

<br><br>
<center><a href='http://www.plus2net.com' rel="nofollow">PHP SQL HTML free tutorials and scripts</a></center> 

</body>

</html>
