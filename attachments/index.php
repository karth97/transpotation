<?PHP
ob_start();
session_start();
if( isset($_SESSION['Admin']) && $_SESSION['Admin']!='' )
{
	header('location:add-data.php');
}
else
{

	if( isset($_POST['loginBtn'] ))
	{
	
		mysql_connect("localhost","root","");
		mysql_select_db('transport');
		
		extract($_POST);
		
		$UserId = trim($UserId);
		$Password = trim($Password);
		
		$UserId = strip_tags($UserId);
		$Password = strip_tags($Password);
		
		$UserId = mysql_escape_string($UserId);
		$Password = mysql_escape_string($Password);
		
		
		$Password = md5($Password);
		
		$qry = mysql_query("select UserId, SLNO, Role from users where UserId='".$UserId."' and Password='".$Password."'");
		
		if( mysql_num_rows($qry))
		{
			while($data = mysql_fetch_object($qry) )
			{
				$_SESSION['Admin'] = $data->UserId;
				
				$_SESSION['SLNO'] = $data->SLNO;
				
				$_SESSION['Role'] = $data->Role;
				
				
				header('location:add-data.php');
			}
		}
		else
		{
			$invalid_credntials = "Check your login credentials";
		}
		
		
	}
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?PHP
function base_url()
{
	return "http://localhost/transport-app/";	
}
?>
<base href="<?PHP echo base_url();?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin-Login</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="resources/template-assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="resources/template-assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="resources/template-assets/css/style.css" rel="stylesheet" />
    <link href="resources/custom-assests/css/style.css" rel="stylesheet" />
    
      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
    
    
    
    
    
                    <div class="col-md-12" style="margin-top:5px">
                    
                    <div class="main_log">
                    
                    <div class="lor_logo">
                            							<!--<div class="space-20"></div>
-->
								<h1 style="margin-top:60px;">
									
                                    
                                    Transport App
                                    
									
								</h1>
								<!--<h4 class="blue" id="id-company-text">&copy; Company Name</h4>-->
							</div>
                            <div class="ad_panel">
                        <div class="panel panel-default">
                        <div class="panel-heading  text-center">
                        <strong><span class="adm1"> Admin Login</span></strong>
                        </div>
                        <div class="panel-body col-md-12">
                            <form id="login_form" name="login" method="post" action="">

                                <div class="form-group ">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" class="form-control" name="UserId" id="userid" placeholder="Enter userid"  value="<?PHP if(isset($UserId)) echo $UserId; else echo "";?>"/>
                                <span class="err-msg" id="userid_err" > </span>
                                </div>

                                <div class="form-group ">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="password" name="Password" placeholder="Password" value="" />
                                <span class="err-msg" id="pwd_err">  </span>
                                </div>
                                
	                            <button type="submit" id="login_btn" name="loginBtn" class="btn btn-primary pull-right cli">Click Here Login</button>
                            <span id="validate_msg" style="color:#FF0000"><?PHP if( isset($invalid_credntials) ) echo $invalid_credntials;?></span>
                            
                            </form>
                          
                            </div>
                            
                            </div>
                             <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                    </div>

    </div>
    
     </div>
    <!-- /. WRAPPER  -->
   
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
    <script>var base_url="<?PHP echo base_url();?>"  </script>
    <script src="resources/template-assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="resources/template-assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="resources/template-assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="resources/template-assets/js/custom.js"></script>
    
    <script src="resources/custom-assests/js/Jquery.js"> </script>
        <script src="resources/custom-assests/js/new-scripts.js"> </script>


</body>
</html>
