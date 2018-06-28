<?PHP include('header.php'); ?>
<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">View Customer payments</h1>
                    </div>
                </div>
                
             <div class="row">
     	
                  
                  
                <div class="col-md-12">
                
                     <!--    Hover Rows  -->
                    
                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Payment by customer
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                           				
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Slno</th>
                                            <th>Customer</th>
                                            <th>Total Amount</th>
                                               <th>Amount Paid</th>
                                            <th>Amount Balance</th>
                                            <th>Discount</th>
                                            <th>Action</th>
                                        </tr>
                                        
                                        <tbody>
                                       <?PHP
										
										for($i=1;$i<10;$i++)
										{

										?>
                                       <tr>
                                       		<td><?PHP echo $i; ?> </td>
                                            <td><?PHP echo 'Customer'; ?> </td>
                                            <td><?PHP echo 'TotalAmount'; ?> </td>
                                            <td><?PHP echo 'PaidAmount'; ?> </td>
                                            <td> <?PHP echo 'DueAmount'; ?></td>
                                            <td><?PHP echo 'Discount';  ?> </td>
                                            <td> <a href='' class="btn btn-sm btn-success">View More Info </a> </td>
                                       </tr>
                                      <?PHP } ?>
                                       
											
                                             
                                              <tr>
                                	<td colspan="6"><?PHP echo @$pagination_string;?> </td>
                                    <td> </td>
                                </tr>   
                                        </tbody>
                                        
                                        
                                    </thead>
                                    
                                    
                                </table>
                              	
								
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
    <?PHP include('footer.php'); ?>