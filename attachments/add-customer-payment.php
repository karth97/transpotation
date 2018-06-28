<?PHP include('header.php'); ?>
<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                
                <div class="col-md-12" style="border-bottom:1px solid #ccc">
       
	   
       
                 <form method="post" id="bymultipledates">
                 
                 <div class="col-md-6"> 
                            <div class="col-md-4 filterzone" style="width:30%">
                            <input type="text" class="form-control bycustomer customers" name="searchby_cust" placeholder="By customer" /> 
                            </div>
                            
                      <!--      <div class="col-md-4 filterzone" style="width:30%">
                            <input type="text" class="form-control frmdate" name="frmdate" id="frmdate" placeholder="From Date"  /> 
                            </div>
                            
                            <div class="col-md-4 filterzone" style="width:30%">
                            <input type="text" class="form-control todate" name="todate" id="todate" placeholder="To Date"     /> 
                            </div>
                      -->      
                            
                            <div class="col-md-1 filterzone">
                            <input type="button" class="btn btn-primary search_fromto" name="search_fromto" value="search"  /> 
                            </div>   
                     
                  </div>   
                 </form>  
                 
                
            </div>
            
            <div class="row">
            	
                <div class="col-md-12 transportdetails">

                <span class="lab">Customer Name: </span> <span class="customername"></span>
                
              <div class="notyetpaid" style="display:none">
               	

<!--
                <span><strong>Total Amount:</strong></span>
                <span class="duration-total-amount"></span>
                <br />-->
                <span><strong>Total Due Amount:</strong></span>
                <span class="Nill-due-amount"></span>
               </div>
               
              <div class="paidhistory" >
             
			 
              </div>
               
               <div class="clear-fix"> </div>
               
                </div>
                
            </div>
            
            
            <div class="row ">
            	<form id="payment_form">
                <input type="hidden" id="fiters" />
                <input type="hidden" id="dueamount" />
                <div class="col-md-12">
                        <h3 class="page-head-line h3title" style="margin-top:0px; border-top:none">Add customer payment</h3>
                    </div>
                
                <!--<div class="col-md-12">
                         	<div class="col-md-4">
                                <label for="Totalamount">Amount</label>
								<input type="text" class="form-control" name="Totalamount" id="Totalamount"  />
                           	</div>
                          </div>-->
                          
                          <div class="col-md-12">
                         	<div class="col-md-4">
                                <label for="discount">Discount</label>
								<input type="text" class="form-control discount" id="discount" placeholder="Discount"  />
                           	</div>
                          </div>
                          
                          <div class="col-md-12">
                         	<div class="col-md-4">
                                <label for="discount_in">Discount in</label>
								<select name="discount_in" id="discount_in" class="form-control">
                                <option value="0" >Select disccount in </option>
                                
                                <option value="flat">Flat</option>
                                <option value="percentage">Percentage</option>
                                </select>
                           	</div>
                          </div>
                          
                          
                          <div class="col-md-12">
                         	<div class="col-md-4">
                                <label for="afterdiscount">Paying amount</label>
								<input type="text" class="form-control discount" id="Totalamount"  />
                           	</div>
                          </div>
                          
                          
                          <div class="col-md-12 cashCheque">
                         	<div class="col-md-4">
                                <label for="Cash_Cheque">Cash/Cheque</label><br />
								<input type="radio" name="Cash_Cheque" class="Cash_Cheque" value="cash" />Cash
                                <input type="radio" name="Cash_Cheque" class="Cash_Cheque" value="cheque" />Cheque 	
                           	</div>
                          
                          </div>
                          <div class="cash-cheque-err"></div>
                          
                          <div class="col-md-12 chequedetails">
                         	
                            <div class="col-md-4">
                                <label for="chequeno">Cheque Number</label>
								<input type="text" class="form-control chequeno" id="chequeno" placeholder="Cheque Number"  />
                           	</div>
                            
                            <div class="col-md-4">
                                <label for="bank">Bank</label>
								<input type="text" class="form-control bank" id="bank" placeholder="Bank Name"  />
                               
                           	</div>
                             <div class="clearfix"> </div>
                          </div>
                          
                          <div class="col-md-12" style="margin-top:10px;">
                         	
                            <div class="col-md-4">
                                <label for=""></label>
								<input type="button" class="btn btn-primary" id="adpayment_btn" value="Add payment">
                                <span class="pay_msg"> </span>
                           	</div>
                            
                          </div>
                          
                          <div class="clearfix"> </div>
              
               </form> 
                
            </div>
            
            <div class="clear-fix"></div>
            
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <?PHP include('footer.php'); ?>