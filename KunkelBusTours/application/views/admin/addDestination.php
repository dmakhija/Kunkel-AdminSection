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
                            Add New Destination
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <?php  $attributes = array("role" => "form", "id" => "addDestinationForm", "name" => "addDestinationForm");
        								echo form_open("admin/destination/add", $attributes);?>
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
                                             <input name="city" id="city" class="form-control" placeholder="Enter City" type='text'>
                                        </div> 
                                        <div class="form-group">                     
                                            <label>Latitude:</label>
                                            <label class="asterik">*</label>                                            
                                            <a id="latitudeLink" name="latitudeLink" href='javascript:void(0);'>Get Coordinates.</a>
                                             <input name="latitude" id="latitude" class="form-control" placeholder="Enter Latitude" type='text'>
                                        </div>  
                                        <div class="form-group">                     
                                            <label>Longitude:</label>
                                            <label class="asterik">*</label>                                            
                                            <a id="longitudeLink" name="longitudeLink" href='javascript:void(0);'>Get Coordinates.</a>
                                             <input name="longitude" id="longitude" class="form-control" placeholder="Enter Longitude" type='text'>
                                        </div>                                          
                                        
                						<a href='<?php echo site_url('admin/destination/index')?>' class='btn btn-warning' title='Cancel'>
                                      			<i class='fa fa-close fa-fw'></i> Cancel</a>
                                      	<button id="btn_insert" name="btn_insert" type="submit" class="btn btn-info" value="Insert" >
                                        	<i class='fa fa-floppy-o fa-fw'></i> Insert
                                        </button>
                                        
                                    <!-- </form> -->
                                    <?php echo form_close(); ?>
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
