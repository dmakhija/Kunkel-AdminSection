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
                            Edit Bus Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <?php  
                                 if($count!=0)                                
                                 {	                                 
                                 	$attributes = array("role" => "form", "id" => "editBusForm", "name" => "editBusForm");
        								echo form_open("admin/bus/edit/".$bus_details['vin'], $attributes);
        							?>        								
                                     <!-- <form role="form"> -->
                                        <div class="form-group">
                                            <label>VIN:</label>
                                            <label class="asterik">*</label>
                                            <input class="form-control" type="text" id="vin" name="vin" value="<?php echo $bus_details['vin'];?>" disabled>
                                            <input type="hidden" id='hdn_vin' name='hdn_vin' value="<?php echo $bus_details['vin'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Number Plate:</label>
                                             <label class="asterik">*</label>
                                            <input class="form-control" type="text" id="plate" name="plate" value="<?php echo $bus_details['plate'];?>">
                                        </div>
                                        <div class="form-group">                                       
                                            <label>Capacity:</label>
                                             <label class="asterik">*</label>
                                            <input class="form-control" type="number" id="capacity" name="capacity" value="<?php echo $bus_details['capacity'];?>">
                                        </div> 
                                        <div class="form-group">                                        
                                            <label>Bus Status:</label>
                                            <?php if($bus_details['status']=='active'){?>
                                            	<label class="asterik">*</label><br/>
                                            	<label class="radio-inline">
                                            	<input type="radio" name="status" value="active" checked>Active
                                            	</label>
                                            	<label class="radio-inline">
                                            	<input type="radio" name="status" value="inactive">Inactive
                                            	</label>
                                           <?php } 
                                           else {?>
                                            <label class="asterik">*</label><br/>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" value="active">Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" value="inactive" checked>Inactive
                                            </label>
                                            <?php }?>
                                        </div>                                                                                                          
                                        
                						<a href='<?php echo site_url('admin/bus/details')."/".$bus_details['vin']; ?>' class='btn btn-warning' title='Cancel'>
                                      			<i class='fa fa-close fa-fw'></i> Cancel</a>
                                      	<button id="btn_edit" name="btn_edit" type="submit" class="btn btn-info" value="Update" >
                                        	<i class='fa fa-trash-o fa-fw'></i> Update
                                        </button>
                                        
                                    <!-- </form> -->
                                    <?php echo form_close(); 
                                 }
                                 else{?>
									<div class="alert alert-danger" role="alert">Invalid bus details requested.</div>
									<a href='<?php echo site_url('admin/bus/index'); ?>' class='btn btn-warning' title='Cancel'>
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
