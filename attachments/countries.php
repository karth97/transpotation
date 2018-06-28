<?PHP
mysql_connect('localhost','root','');
mysql_select_db('transportapp');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Countries</title>
</head>

<body>
<?PHP

$qry = mysql_query("select country_code, country_name from countries");

$pages = mysql_num_rows($qry);
$limit=10;

$totalPages = ceil($pages/$limit);

#echo $totalPages;

if(  isset($_GET['start']) )
	{
	
		if($_GET['start'])
		{
			$start = $_GET['start'];
			
			if($start==0)
				$start=0;
			else
			$start = ($start-1)*10;
			}	
			else
			$start=0;
		}
	else
	$start=0;
		


$links="<a href='countries.php'>First</a>";

if($_GET['start']<=$totalPages)
{

	if($start>1)
	{
		$prev=$_GET['start']-1;
	
		if($prev<=0)
			$prev=1;
		
		$links=$links."&nbsp;&nbsp;<a href='countries.php?start=$prev'>Prev</a>&nbsp;";
	}
	
}



for ($i = $_GET['start']-5; $i<10+$_GET['start']-5; $i++) 
{

/*

-3,-2,-1,0,1

1



*/
		
		   if($i>0 && $i<=$totalPages)
		   {
		   if($_GET['start']==1)
		   $start=1;
		   else
		   	$start=$_GET['start'];
		   
			$links .= ($i != $_GET['start'] ) ? "<a href='countries.php?start=$i'> $i</a> " : "$start ";
			
		   }
}



if($_GET['start']<$totalPages)
{
	if(isset($_GET['start']))
		$next=$_GET['start']+1;
	else
		$next=2;
		
		if($next<0)
		 {
		 	$next=2;
		 }
		$links=$links."&nbsp;&nbsp;<a href='countries.php?start=$next'>Next</a>";
		
}

else
{

		$next=$_GET['start']+1;
		
		if($next>$totalPages)
		{
			$next=$totalPages;
		}
		$links=$links."&nbsp;&nbsp;<a href='countries.php?start=$next'>Next</a>";
}



echo $links;
/*


$qry1 = mysql_query("select country_code, country_name from countries limit $start,$limit");

if(mysql_num_rows($qry1)>0)
{
while( $country = mysql_fetch_object($qry1))
{
	echo $country->country_name."<br>";
}

}
else
{
	echo "No records found";
}

*/
?>
</body>
</html>
