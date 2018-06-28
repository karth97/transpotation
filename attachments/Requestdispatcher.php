<?php

if( isset($_GET['func']))
{

$callfunction = $_GET['func'];

if(isset($_GET['term']))
$term = $_GET['term'];
else
	$term='';
	
$callfunction($term);

}
else
echo "<h2>  !!!! Invalid request !!!! </h2>";


function dbconn()
{
	date_default_timezone_set("Asia/Kolkata");
	
	mysql_connect("localhost","root","");
	mysql_select_db("transport");
}

function getvechilenumber($wildcard)
{
	#echo "hey i will serve u with vechile nujmbers";
	
	dbconn();

	$qry = mysql_query("select `VechileNo` from vechiles where `VechileNo` like '".$wildcard."%'");
	
	if( mysql_num_rows($qry)>0)
	{
		$output=array();
		
		while($row = mysql_fetch_object($qry) )
		{
			$output[] = $row->VechileNo;
		}
	} 
	echo json_encode($output);
}


function getcustomers($wildcard)
{
	
	dbconn();

	$qry = mysql_query("select distinct `Consignee` from  transportdata where `Consignee` like '".$wildcard."%'");
	
	if( mysql_num_rows($qry)>0)
	{
		$output=array();
		
		while($row = mysql_fetch_object($qry) )
		{
			$output[] = $row->Consignee;
		}
	} 
	echo json_encode($output);

}

function adddata()
{
	extract($_POST);
	dbconn();
	
	//please trim the data
	//strip tags 
	//escape strings
	
	
	///insert data into lrsvehicle
	
	$dated = date_create($dated);
	$dated = date_format($dated,"Y-m-d");
	
	$qry = mysql_query("insert into lrsvehicles values('','".$dated."','".$Vehicle_No."','".$Vehicle_Hire."','".$Vehicle_Hamali."','".$Driver_Name."','".$FromPlace."','".$ToPlace."','".time()."')");
	
	if( mysql_insert_id() > 0 )	
	{
		$TransportId = mysql_insert_id();
		
		//insert data into transportdata table
		$qry = "";
		$qry = mysql_query("insert into transportdata values('',$TransportId,'".$LRNO."','".$dated."','".$Consignor."','".$Consignee."','".$mobilenumber."',$noAtricles,'".$remarks."','".date('Y-m-d H:i:s')."','".time()."')");
		

		if(mysql_insert_id()>0)
		{
			$LR_SLNO = mysql_insert_id();
			
			if($paid=='')
				$paid=0;
			if($ToPay=='')
				$ToPay='0';
			
			$qry="";
			$qry = mysql_query("insert into articles values('',$TransportId,$LR_SLNO,'".$LRNO."','".$dated."','".$Articledescription."',$size,'".$dimensions."','".$hamalicharges."','".$ToPay."','".$paid."','".$paidat."','".date('Y-m-d H:i:s')."','".time()."')");			
			
			if(mysql_insert_id()>0)
			echo "1";
			else
				echo "0";
		}
		else
		{
			mysql_query("DELETE FROM `lrsvehicles` WHERE SLNO=".$TransportId);
			echo "0";
		}
	}

}


function getcustomerdue()
{
	extract($_POST);
	dbconn();
	
	$qry = mysql_query("select sum(art.ToPay) as totalamount from articles as art join transportdata as tr on tr.SLNO=art.Transportid where tr.Consignee='".$_POST['Customer']."'");
	
#	echo "select sum(art.ToPay) as totalamount from articles as art join transportdata as tr on tr.SLNO=art.Transportid where tr.Consignee='".$_POST['Customer']."'";
	
	$output = '';
	
	if( mysql_num_rows($qry)>0 )
	{
		$data = mysql_fetch_object($qry);
		
		 $output.=$data->totalamount;
		 
		 //get the due amount of the customer
		 
		 $qrey = mysql_query("select AmountDue from customerpayments where Customer='".$_POST['Customer']."' order by PaymentId desc limit 1");
		 
		 if( mysql_num_rows($qrey) >0)
		 {
		 	$pay = mysql_fetch_object($qrey);
			$output.="::".$pay->AmountDue;
		 }
		 else
		 	$output.="::$output";
	
	//get the payment history of the customer
	
	
	$qrey = mysql_query("select AmountDue, AmountPaid, Flat_Percentage, DiscountFigure, PainOn from customerpayments where Customer='".$_POST['Customer']."' order by PaymentId desc ");
	
	if( mysql_num_rows($qrey)>0)
	{
		$paymenthistory='<div class="prevPaid"><h3>Payment history </h3>';
		
		while($hist = mysql_fetch_object($qrey))
		{
			$paymenthistory.='<div style="margin-bottom:25px">';
			$paymenthistory.='<span class="lab">Dueamount:</span> <span class="paidamount">'.$hist->AmountDue.'</span>';
			$paymenthistory.='<span class="lab">Paid:</span> <span class="paidamount">'.$hist->AmountPaid.'</span>';
			$paymenthistory.='<span class="lab">Discount Amount:</span> <span class="paidamount">'.$hist->DiscountFigure.'</span>';
			$paymenthistory.='<span class="lab">Discount:</span> <span class="paidamount">'.$hist->Flat_Percentage.'</span>';
			$paymenthistory.='<span class="lab">Paid On:</span> <span class="paidamount">'.$hist->PainOn.'</span>';
		}
		
		$paymenthistory.='</div><div class="clear-fix"></div></div>';
		$output.="::".$paymenthistory;
	}
	else
		$output.="::0";
		
		echo $output;
	
	}
	else
		echo "0";
	
	
}


//addpayment starts here

function addpayment()
{
	
	dbconn();
	extract($_POST);
	
	$Customer = $bycustomer;
	$TotalAmount = $dueamount;
	$AmountPaid = $payingAmount;
	
	$PainOn = date('Y-m-d h:i:s a');
	
	if($discount_in!='0')
	{
		
		if($discount_in=='flat')
		{
			$AmountDue = $TotalAmount-($payingAmount+$discount);
		}
		else if($discount_in=='percentage')
		{
			
			$percentage = ($discount/100)*($TotalAmount);
			$AmountDue = $TotalAmount-($payingAmount+$percentage);		
		}
	
	}
	else
		$AmountDue = $TotalAmount-$payingAmount;
	
	$Cash_Cheque= $Cash_Cheque;
	$Bank=$bank;
	$ChequeNumber=$chequeno;
	
	$Flat_Percentage = $discount_in;
	
	$DiscountFigure =$discount;
	$Lastupdate = time();
	

mysql_query("insert into customerpayments values('','".$Customer."','".$TotalAmount."','".$AmountPaid."','".$AmountDue."','".$PainOn."','".$Cash_Cheque."','".$Bank."','".$ChequeNumber."','".$Flat_Percentage."','".$DiscountFigure."','".$Lastupdate."')");


if( mysql_insert_id())
	echo "1";
else	
	echo "0";

}


// ends here
?>