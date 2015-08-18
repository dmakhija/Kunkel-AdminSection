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
                            Edit Destination Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <?php  
                                 if($count!=0)                                
                                 {	                                 
                                 	$attributes = array("role" => "form", "id" => "editDestinationForm", "name" => "editDestinationForm");
        								echo form_open("admin/destination/edit/".$destination_details['id'], $attributes);
        							?>   
        							 <input type="hidden" id='hdn_id' name='hdn_id' value="<?php echo $destination_details['id'];?>">
        							   <input type="hidden" id='selCountry' name='selCountry' value="<?php echo $destination_details['country'];?>">
        							    <input type="hidden" id='selState' name='selState' value="<?php echo $destination_details['province'];?>">    								
                                     <!-- <form role="form"> -->
                                     <div class="form-group">                     
                                            <label>Select Country:</label>
                                            <label class="asterik">*</label>
                                            <select id="country" name="country" class="form-control">
                                            </select>  
                                        </div>
                                         <div class="form-group">                     
                                            <label>Select Province:</label>
                                            <label class="asterik">*</label>
                                            <select name="state" id="state" class="form-control">
                                            </select>
                                        </div>
                                         <div class="form-group">                     
                                            <label>City:</label>
                                            <label class="asterik">*</label>
                                             <input name="city" id="city" class="form-control" placeholder="Enter City" type='text' value="<?php echo $destination_details['city'];?>" />
                                        </div> 
                                          <div class="form-group">                     
                                            <label>Latitude:</label>
                                            <label class="asterik">*</label>
                                             <input name="latitude" id="latitude" class="form-control" placeholder="Enter latitude" type='text' value="<?php echo $destination_details['latitude'];?>" />
                                        </div> 
                                          <div class="form-group">                     
                                            <label>Longitude:</label>
                                            <label class="asterik">*</label>
                                             <input name="longitude" id="longitude" class="form-control" placeholder="Enter longitude" type='text' value="<?php echo $destination_details['longitude'];?>" />
                                        </div>                                                                                                                                     
                                        
                						<a href='<?php echo site_url('admin/destination/details')."/".$destination_details['id']; ?>' class='btn btn-warning' title='Cancel'>
                                      			<i class='fa fa-close fa-fw'></i> Cancel</a>
                                      	<button id="btn_edit" name="btn_edit" type="submit" class="btn btn-info" value="Update" >
                                        	<i class='fa fa-trash-o fa-fw'></i> Update
                                        </button>
                                        
                                    <!-- </form> -->
                                    <?php echo form_close(); 
                                 }
                                 else{?>
									<div class="alert alert-danger" role="alert">Invalid destination details requested.</div>
									<a href='<?php echo site_url('admin/destination/index'); ?>' class='btn btn-warning' title='Cancel'>
                                      			<i class='fa fa-close fa-fw'></i> Cancel</a>
                                 <?php }?>
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
