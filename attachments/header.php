<?PHP
ob_start();
session_start();

function dbconn()
{
		mysql_connect("localhost","root","");
		mysql_select_db("transport");
}

if( !isset($_SESSION['Admin']))
{
	header('location:index.php');
}

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?PHP
function base_url($param='')
{
	$baseuri = "http://localhost/transport-app/";
	
	if(trim($param)=='')
		return $baseuri ;	
	else
		return $baseuri.$param;
	
}
function findurisegment()
{
	$uri =  $_SERVER['REQUEST_URI'];
	$uri=explode("/",$uri);
	return end($uri);
	
}
?>
<base href="<?PHP echo base_url();?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transport-web-app</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="resources/template-assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="resources/template-assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="resources/template-assets/css/style.css" rel="stylesheet" />
      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="resources/custom-assests/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="resources/custom-assests/css/jquery-ui.css" />


</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="navbar-brand" href="<?PHP echo base_url('dashboard')?>">Transport App </a>
            </div>

            <div class="notifications-wrapper" >
<ul class="nav">
       
              
                <li class="dropdown" style="float:right; width:12%">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="float:right">
                        <i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?PHP echo base_url('change-password.php');?>"><i class="fa fa-user-plus"></i>Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?PHP echo base_url('logout.php');?>"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
               
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="resources/template-assets/img/transport.png" class="img-circle" />

                           
                        </div>

                    </li>
                     <li>
                        <a > <strong> <?PHP echo $_SESSION['Role'];?> </strong></a>
                    </li>

                    <li>
                        <a style="cursor:pointer"><i class="fa fa-users "></i>Transport form<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level <?PHP if(findurisegment()=="add-data.php" || findurisegment()=='view-data.php' || findurisegment()=='view-lrs.php' || findurisegment()=='edit-data.php' ){echo 'collapse in';} ?>">
                            <li>
                        <a class="<?PHP if( findurisegment()=="add-data.php" || findurisegment()=='edit-data.php'){ echo 'active-menu';} ?>" href="<?PHP echo base_url('add-data.php'); ?>">Add transport data</a>
                        
                    </li>
                             <li>
                        <a class="<?PHP if( findurisegment()=="view-data.php" || findurisegment()=='edit-data.php' ){ echo 'active-menu';} ?>"  href="<?PHP echo base_url('view-data.php'); ?>">View transport data</a>
                        
                    </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a  style="cursor:pointer"><i class="fa fa-rupee "></i>Add Payment<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level <?PHP if( findurisegment()=="add-customer-payment.php" || findurisegment()=='view-outstandings.php'){echo 'collapse in';} ?>">
                            <li>
                        <a class="<?PHP if( findurisegment()=="add-customer-payment.php"){ echo 'active-menu';} ?>" href="<?PHP echo base_url('add-customer-payment.php'); ?>">Add payment</a>
                        
                    </li>
                   <li>
                        <a class="<?PHP if( findurisegment()=="view-outstandings.php"){ echo 'active-menu';} ?>"  href="<?PHP echo base_url('view-outstandings.php'); ?>">View outstanding</a>
                        
                    </li>
                            
                        </ul>
                    </li>
                    
                   
                    
                  
                </ul>
            </div>

        </nav>