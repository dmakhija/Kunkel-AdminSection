<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/menu.php'; ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Destination</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-offset-0 col-lg-6 col-sm-6 well">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Destination Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">                               
                                <?php if(sizeof($destination_details)==0){?>
                                	<div class="alert alert-danger" role="alert">Invalid destination details requested.</div>
                                	<span class='btn-group'>
                                		<a href='<?php echo site_url('admin/destination/index'); ?>' class='btn btn-warning btn-margin' title='Cancel'>
                                      			<i class='fa fa-close fa-fw'></i> Cancel</a>
                                    </span>
                                <?php }
                                else { 					
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
							        <a href='<?php echo site_url('admin/destination/delete')."/".$destination_details['id']; ?>' class='btn btn-danger' title='Yes'>Yes</a>
							        <a href='javascript:void(0);' class='btn btn-warning' data-dismiss="modal" title='No'>No</a>
							        </div>
							      </div>
							      </div>
							   </div>
								
                                  <form role="form"> 
                                        <div class="form-group">
                                            <label>Country:</label>
                                            <label class="form-control" disabled><?php echo $destination_details['country'];?></label>
                                            <input type="hidden" id="hdn_id" id="hdn_id" value="<?php echo $destination_details['id'];?>" />  
                                        </div>
                                        <div class="form-group">
                                            <label>Province:</label>
                                             <label class="form-control" disabled><?php echo $destination_details['province'];?></label>
                                        </div>
                                        <div class="form-group">                                       
                                            <label>City:</label>
                                             <label class="form-control" disabled><?php echo $destination_details['city'];?></label>
                                        </div>
                                        <div class="form-group">                                       
                                            <label>Latitude:</label>
                                             <label class="form-control" disabled><?php echo $destination_details['latitude'];?></label>
                                        </div>
                                        <div class="form-group">                                       
                                            <label>Longitude:</label>
                                             <label class="form-control" disabled><?php echo $destination_details['longitude'];?></label>
                                        </div>                                                       						
                                   </form>                                     
                                      <span class='btn-group'>
                                      <a href='<?php echo site_url('admin/destination/index'); ?>' class='btn btn-warning btn-margin' title='Cancel'>
                                      			<i class='fa fa-close fa-fw'></i> Cancel</a>
                                      <a href='<?php echo site_url('admin/destination/edit')."/".$destination_details['id']; ?>' class='btn btn-info btn-margin' title='Edit'>
												<i class='fa fa-pencil fa-fw'></i> Edit</a>
                                      <a href='javascript:void(0);' id="btn_delete" name="btn_delete" class='btn btn-danger btn-margin' title='Delete'>
												<i class='fa fa-trash-o fa-fw'></i> Delete</a>									
                                      </span>
                                       <?php } ?>
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
