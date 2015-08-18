<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/menu.php'; ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Trip</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Trip Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12"> 
                                <!--                              
                                <?php //if(sizeof($bus_details)==0){?>
                                	<div class="alert alert-danger" role="alert">Invalid trip details requested.</div>
                                	<span class='btn-group'>
                                		<a href='<?php echo site_url('admin/trip/index'); ?>' class='btn btn-warning btn-margin' title='Cancel'>
                                      			<i class='fa fa-close fa-fw'></i> Cancel</a>
                                    </span>
                                    -->
                                <?php //}
                                //else { 					
								?>
								 <!-- Modal -->
							  <div class="modal fade" id="dialog-confirm">
							    <div class="modal-dialog">    
							      <!-- Modal content-->
							      <div class="modal-content alert-danger">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h3><i class="fa fa-warning fa-fw"></i> Attention </h3> 
							        </div>
							        <div class="modal-body">
							          <h4>Are you sure you want to delete this record?</h4>
							        </div>
							        <div class="modal-footer">							        
							        <a href='<?php //echo site_url('admin/trip/delete')."/".$bus_details['vin']; ?>' class='btn btn-danger' title='Yes'>Yes</a>
							        <a href='javascript:void(0);' class='btn btn-warning' data-dismiss="modal" title='No'>No</a>
							       
							        </div>
							      </div>
							      </div>
							      </div>
								
                                  <form role="form"> 
                                        <div class="col-lg-2 form-group">
                                            <label>Name:</label>
                                        </div> 
                                        <div class="col-lg-10 form-group"> 
        									<input class="form-control" type="text" id="trip_name" name="trip_name" readonly> 
                                        </div>
                                        <div class="col-lg-2 form-group">
                                            <label>Origin:</label>
                                        </div>
                                        <div class="col-lg-10 form-group"> 
        									<input class="form-control" type="text" id="origin" name="origin" readonly> 
                                        </div>
                                        <div class="col-lg-2 form-group">                                       
                                            <label>Destination:</label>
                                        </div>
                                         <div class="col-lg-10 form-group"> 
        									<input class="form-control" type="text" id="destination" name="destination" readonly> 
                                        </div>
                                             <div class="col-lg-2 form-group">
                                            <label>Duration:</label>
                                       </div>
                                       <div class="col-lg-10 form-group">
                                        <div class="col-lg-3">                                         	  
                                            <label>Days:</label>
                                            <input class="destinationlist disabled-color" type="number" id="trip_nights" name="trip_nights" min="1" max="10" readonly>     									 
        								</div>
        								<div class="col-lg-3">
        									<label>Nights:</label>
        									<input class="destinationlist disabled-color" type="number" id="trip_nights" name="trip_nights" min="0" max="10" readonly>        									
                                        </div>  
                                       </div>
                                                                            
                                       
                                       <div class="col-lg-2 form-group">
                                            <label>Price:</label>
                                       </div>
                                        <div class="col-lg-10 form-group">
                                         <div class="col-lg-3">    
                                            <label>Adult:</label>                                            
										    <input class="destinationlist disabled-color" type="number" id="adult_price" name="adult_price" min="0" max="5000" placeholder="$" readonly>										            									 
        								</div>
        								<div class="col-lg-3">    
                                            <label>Child:</label>                                            
										    <input class="destinationlist disabled-color" type="number" id="child_price" name="child_price" min="0" max="5000" placeholder="$" readonly>										            									 
        								</div>
                                        </div>
                                        
                                        <div class="col-lg-2 form-group">
        								<label>Trip Details:</label>
        								</div>
                                        <div class="col-lg-10 form-group">
	                                        <input class="form-control" type="text" id="trip_details" name="trip_details" readonly>
	                                   <!-- 
	                                    <textarea rows="" cols="" class="tinyMCE disabled-color" id="trip_details" name="trip_details" readonly></textarea>                                
	                                      -->  
                                        </div>             						
                                      </form>
                                     
                                      <span class='btn-group'>
                                      <a href='<?php //echo site_url('admin/bus/index'); ?>' class='btn btn-warning btn-margin' title='Cancel'>
                                      			<i class='fa fa-close fa-fw'></i> Cancel</a>
                                      <a href='<?php //echo site_url('admin/bus/edit')."/".$bus_details['vin']; ?>' class='btn btn-info btn-margin' title='Edit'>
												<i class='fa fa-pencil fa-fw'></i> Edit</a>
                                      <a href='javascript:void(0);' id="btn_delete" name="btn_delete" class='btn btn-danger btn-margin' title='Delete'>
												<i class='fa fa-trash-o fa-fw'></i> Delete</a>									
                                      </span>
                                       <?php // } ?>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    
        
<?php include 'templates/footer.php'; ?>	
