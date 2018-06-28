<?PHP
include('header.php');


if( isset($_GET['id']) )
{
	$id = $_GET['id'];
	
	if( !preg_match("/[a-z]/i", $id))
	{
		
		$qry ="select veh.*, tr.*, art.* from lrsvehicles as veh join transportdata as tr on tr.TransportId=veh.SLNO join articles as art on art.LR_SLNO=tr.SLNO where veh.SLNO=".$id;
		
		
		
		
		
	}
	else
		header("location:view-data.php");
}


?>
<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">Edit data</h1>
                    </div>
                </div>
                
             <div class="row">
            <form id="transport_dataform">


<!-- common for all the lrs of a vechile starts here -->                    

            <div class=" col-md-12 col-sm-12">
            
            <div class="form-group">
                      
                      <div class="col-md-1" style="width:12%">
                        <label for="dated">Date<span class="required">*</span></label>
                        <input type="text" class="form-control <?PHP echo @$daterequired; ?>" id="dated" name="dated" placeholder="date" />
                      </div>
                   
                     <div class="col-md-2" style="width:12%">
                        <label for="Vehicle_No">Vehicle <span class="required">*</span></label>
                        <input type="text" class="form-control" id="Vehicle_No" name="Vehicle_No" placeholder="Number"/>
                      </div>
                      
                      <div class="col-md-1" style="width:9%">
                        <label for="Vehicle_No">Hire <span class="required">*</span></label>
                        <input type="text" class="form-control" id="Vehicle_Hire" name="Vehicle_Hire" placeholder="Hire"  />						
                      </div>
                      
                       <div class="col-md-2">
                        <label for="Vehicle_No">Hamali <span class="required">*</span></label>
                        <input type="text" class="form-control" id="Vehicle_Hamali" name="Vehicle_Hamali" placeholder="Vehicle Hamali"  />						
                      </div>
                      
                      <div class="col-md-2">
                       <label for="Driver_Name">Driver<span class="required">*</span></label>
                        <input type="text" class="form-control" id="Driver_Name" name="Driver_Name" placeholder="Driver Name" value="" />
                      </div>
                   
                    <div class="col-md-2">
                        <label for="FromPlace">From Place<span class="required">*</span></label>
                        <select class="form-control " id="FromPlace" name="FromPlace">
                        	<option value="0">Select From Place</option>
                            <option value="Hyd">Hyderabad</option>
                            <option value="Sec">Secunderabad</option>
                            <option value="Vik">Vikarabad</option>
                            <option value="Hyd-Sec">Hyderabad/Secnderabad</option>
                        </select>
                      </div>
                       <div class="col-md-2">
                        <label for="ToPlace">To Place<span class="required">*</span></label>
                        <select class="form-control <?PHP echo @$ToPlacerequired; ?>" id="ToPlace" name="ToPlace">
                        
                        	<option value="0">Select To Place</option>
                            <option value="Hyd">Hyderabad</option>
                            <option value="Sec">Secunderabad</option>
                            <option value="Vkb">Vikarabad</option>
                            <option value="Hyd-Sec">Hyderabad/Secnderabad</option>
                        
                        </select>

                      </div>
                      
                 
                       <div class="clearfix"> </div>
                    </div>
            <hr />
            
            
            </div>  

<!-- common for all the lrs of a vechile ends here -->          
          
            <div class=" col-md-12 col-sm-12">


                   
                <div class="form-group">
                      
                      <div class="col-md-3">
                        <label for="LRNO">LRNO<span class="required">*</span></label>
                        <input type="text" class="form-control " id="LRNO" name="LRNO" placeholder="LR Number" value="" />
                      </div>
                    
                      
                       <div class="col-md-3">
                        <label for="Consignor">Consignor<span class="required"></span></label>
                        <input type="text" class="form-control" id="Consignor" name="Consignor" placeholder="Consignor" />
                      </div>
                      
                      <div class="col-md-3">
                        <label for="Consignee">Consignee<span class="required">*</span></label>
                        <input type="text" class="form-control" id="Consignee" name="Consignee" placeholder="Consignee"/>
                      </div>
                      
                      <div class="col-md-3">
                        <label for="mobilenumber">Contact number<span class="required"></span></label>
                        <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Contact number" />
                      </div>
                      
                 
                       <div class="clearfix"> </div>
                    </div>

   
                    
                    
                    <div class="form-group">
                      
                      
                       
                      <div class="col-md-3">
                        <label for="noAtricles">Number of Articles<span class="required">*</span></label>
                        <input type="text" class="form-control" id="noAtricles" name="noAtricles" placeholder="Number of Articles" value="1"/>
                      </div>
                      
                      <div class="col-md-9">
                        <label for="remarks">Remarks</label>
                        <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks" />
                      </div><div class="clearfix"> </div>
                    </div>
                    
                <div class="form-group morearticles">
                      
                      
                      
                      <div class="col-md-3">
                        <label for="Articledescription">Article description<span class="required">*</span></label>
                        <input type="text" class="form-control Articledescription" id="Articledescription" name="Articledescription" placeholder="Article description"/>
                      </div>
                      
                      <div class="col-md-1">
                        <label for="Articledescription">Size<span class="required">*</span></label>
                        <input type="text" class="form-control size" id="size" name="size" placeholder="Size"/>
                      </div>
                      
                      <div class="col-md-2">
                        <label for="Articledescription">Dimensions<span class="required">*</span></label>
                        <select name="dimensions" id="dimensions" class="dimensions form-control">
                        	
                            <option value="0">Select Dimension</option>
                            <option value="kgs">Kgs</option>
                            <option value="lts">Liters</option>
                            <option value="pieces">Pieces</option>
                            
                        </select>
                      </div>
                      
                      
                      <div class="col-md-6">
                        
                        <div  style="width:25%; float:left; margin-right:8px " >
                        <label for="Freight"> Paid At</label>

                        <select name="paidat" class="form-control paidat" id="paidat">
                        	<option value="0">Paid At</option>
                            <option value="Hyd">Hyderabad</option>
                            <option value="Sec">Secunderabad</option>                            
                            <option value="Vkb">Vikarabad</option>  
                        </select>
                        </div>
                      
                        <div  style="width:20%; float:left; margin-right:8px;">
                        <label for="Freight">Freight<span class="required"></span></label>
                        <input type="text" class="form-control ToPay" id="ToPay" name="ToPay" placeholder="To Pay"/>
                        </div>
                        <div style="width:25%; float:left; margin-right:8px;">
                        <label for="hamalicharges">Hamali</label>
                        <input type="text" class="form-control hamalicharges" id="hamalicharges" name="hamalicharges" placeholder="Charges"/>
                      </div>
                        
                        <div class='paidcls'  style="width:20%; float:left; margin-right:8px;">
                        <label for="paid">Paid<span class="required"></span></label>
                        <input type="text" class="form-control paid" id="paid" name="paid" placeholder="paid"/>
                        </div>
                        
                        

						
                        <div class="clearfix"></div>
                        
                      </div>
                      
                   
                       <div class="clearfix"> </div>
                    </div>
                    
                    
                
           
           	<div class="col-sm-12">
                    <button type="button" class="btn btn-primary updaelrno_btn">Update LRNO</button>
                    <span class="transport_data_msg text-danger	"> </span>
                </div>
           
               <div class="clearfix"> </div>      
               </div>
               
			</form>	
                
            </div>
              
             
              
              
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <?PHP
		include('footer.php');
	?>