<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/menu.php'; ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bus</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-offset-0 col-lg-6 col-sm-6 well">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Bus
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <?php  $attributes = array("role" => "form", "id" => "addBusForm", "name" => "addBusForm");
        								echo form_open("admin/bus/add", $attributes);?>
                                     <!-- <form role="form"> -->
                                        <div class="form-group">
                                            <label>VIN:</label>
                                            <label class="asterik">*</label>
                                            <input class="form-control" type="text" id="vin" name="vin">
                                            <label class="form-error"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Number Plate:</label>
                                             <label class="asterik">*</label>
                                            <input class="form-control" type="text" id="plate" name="plate">
                                        </div>
                                        <div class="form-group">                                       
                                            <label>Capacity:</label>
                                             <label class="asterik">*</label>
                                            <input class="form-control" type="number" id="capacity" name="capacity">
                                        </div> 
                                        <div class="form-group">                                        
                                            <label>Bus Status:</label>
                                            <label class="asterik">*</label><br/>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" value="active" checked>Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" value="inactive">Inactive
                                            </label>
                                        </div>
                                        
                						<a href='<?php echo site_url('admin/bus/index')?>' class='btn btn-warning' title='Cancel'>
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
