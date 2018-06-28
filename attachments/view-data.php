<?PHP	include('header.php'); ?>
<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">View Transport data</h1>
                    </div>
                </div>
                
             <div class="row">
				
               <?PHP
			   if(	isset( $_POST['search_fromto']) )
			   {
				   	extract($_POST);
			   }
			   ?>
                
                
                
                
                 <form method="post">
                  <div class="col-md-2 filterzone" style="width:16%">
                     <input type="text" class="form-control customers" name="searchby_cust" placeholder="By customer" value="<?PHP echo @$searchby_cust;?>" /> 
                     </div>
                 
                 <div class="col-md-2 filterzone" style="width:12%">
                     <input type="text" class="form-control frmdate" name="frmdate" id="frmdate" placeholder="From Date"  value="<?PHP echo @$frmdate; ?>"   /> 
                     </div>

                 <div class="col-md-2 filterzone" style="width:12%">
                     <input type="text" class="form-control todate" name="todate" id="todate" placeholder="To Date"  value="<?PHP echo @$todate; ?>"   /> 
                     </div>
                 
                     
                      <div class="col-md-1 filterzone">
                     <input type="submit" class="btn btn-primary" name="search_fromto" value="search"  /> 
                     </div>   
                 </form>  
                  
                <div class="col-md-12">
                
                     <!--    Hover Rows  -->
                    
                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Transport-data
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

	
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Slno</th>
                                            <th>Vechile Number</th>
                                            <th>LR Date</th>
                                               <th>LR Number</th>
                                            <th>Customer</th>
                                            <th>From Place</th>
                                            <th>To Place</th>
                                            <th>Action</th>
                                        </tr>
                                        
                                        <tbody>
                                        <?PHP
										dbconn();
										
										if( isset($_POST['search_fromto']) )			
										{
											
											
											if( trim($_POST['searchby_cust'])!='' && (trim($_POST['frmdate'])=='' && trim($_POST['todate'])=='') )
											{
												$qry = mysql_query( "select veh.SLNO as SLNO, veh.Vehicle_No, date_format(veh.TransportDate,'%d-%m-%Y') as TransportDate , tr.LRNO as LRNO, tr.Consignee as customer, veh.FromPlace, veh.ToPlace from lrsvehicles as veh join transportdata as tr on tr.TransportId=veh.SLNO where tr.Consignee='".$_POST['searchby_cust']."'" );	 
												
											}
											else if( ( trim($_POST['frmdate'])!='' && trim($_POST['todate'])!='' )  && trim($_POST['searchby_cust'])=='' )
											{
											

												$frmdtd = date_create(trim($_POST['frmdate']));
												$frmdtd = date_format($frmdtd,"Y-m-d");
												
												$todtd = date_create(trim($_POST['todate']));
												$todtd = date_format($todtd,"Y-m-d");
												
												
												$qry = mysql_query( "select veh.SLNO as SLNO, veh.Vehicle_No, date_format(veh.TransportDate,'%d-%m-%Y') as TransportDate , tr.LRNO as LRNO, tr.Consignee as customer, veh.FromPlace, veh.ToPlace from lrsvehicles as veh join transportdata as tr on tr.TransportId=veh.SLNO where tr.LRDATE>='".$frmdtd."' and tr.LRDATE<='".$todtd."' " );	 
												//echo  "select veh.SLNO as SLNO, veh.Vehicle_No, date_format(veh.TransportDate,'%d-%m-%Y') as TransportDate , tr.LRNO as LRNO, tr.Consignee as customer, veh.FromPlace, veh.ToPlace from lrsvehicles as veh join transportdata as tr on tr.TransportId=veh.SLNO where tr.LRDATE>='".$frmdtd."' and tr.LRDATE<='".$todtd."' " ; 
												
													
													
											}
											else if( ( trim($_POST['frmdate'])!='' && trim($_POST['todate'])!='' )  && trim($_POST['searchby_cust'])!='' )
												{
												$frmdtd = date_create(trim($_POST['frmdate']));
												$frmdtd = date_format($frmdtd,"Y-m-d");
												
												$todtd = date_create(trim($_POST['todate']));
												$todtd = date_format($todtd,"Y-m-d");
												
												
												$qry = mysql_query( "select veh.SLNO as SLNO, veh.Vehicle_No, date_format(veh.TransportDate,'%d-%m-%Y') as TransportDate , tr.LRNO as LRNO, tr.Consignee as customer, veh.FromPlace, veh.ToPlace from lrsvehicles as veh join transportdata as tr on tr.TransportId=veh.SLNO where (tr.LRDATE>='".$frmdtd."' and tr.LRDATE<='".$todtd."') and ( tr.Consignee='".$_POST['searchby_cust']."') " );		
												}
												else
												{
													$qry = mysql_query( "select veh.SLNO as SLNO, veh.Vehicle_No, date_format(veh.TransportDate,'%d-%m-%Y') as TransportDate , tr.LRNO as LRNO, tr.Consignee as customer, veh.FromPlace, veh.ToPlace from lrsvehicles as veh join transportdata as tr on tr.TransportId=veh.SLNO " );
												}
											}
										else
										$qry = mysql_query( "select veh.SLNO as SLNO, veh.Vehicle_No, date_format(veh.TransportDate,'%d-%m-%Y') as TransportDate , tr.LRNO as LRNO, tr.Consignee as customer, veh.FromPlace, veh.ToPlace from lrsvehicles as veh join transportdata as tr on tr.TransportId=veh.SLNO " );
										
										if( mysql_num_rows($qry)>0)
										{
											$slno=0;
											while( $row = mysql_fetch_object($qry) )
											{
												$slno++;
												?>
                                                
                                                <tr>
                                                	<td><?PHP echo $slno;?> </td>
                                                    <td><?PHP echo $row->Vehicle_No?> </td>
                                                    <td><?PHP echo $row->TransportDate?> </td>
                                                    <td><?PHP echo $row->LRNO?> </td>
                                                    
                                                    <td><?PHP echo $row->customer?>  </td>
                                                    <td><?PHP echo $row->FromPlace?>  </td>
                                                    <td><?PHP echo $row->ToPlace?>  </td>
                                                    <td><a href="<?PHP echo base_url("edit-data.php?id=".$row->SLNO)?>" class="btn btn-danger btn-sm">Edit</a> </td>
                                                    
                                                </tr>
                                                <?PHP
											}
										}
										else
										{
											?>
                                            <tr>
                                            
                                            	<td colspan=8>No data found </td>
                                            </tr>
                                            <?PHP
										}
										
										?>    
                                              <tr>
                                	<td colspan="12"><?PHP echo @$pagination_string;?> </td>
                                    <td> </td>
                                </tr>   
                                        </tbody>
                                        
                                        
                                    </thead>
                                    
                                    
                                </table>
                                <?PHP
								
								
								?>			
								
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                    
                   
                </div>
                 <div class="clearfix"></div>
                
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <?PHP	include('footer.php'); ?>