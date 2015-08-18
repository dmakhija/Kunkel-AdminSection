<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/menu.php'; ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Upload Images</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-offset-0 col-lg-6 col-sm-6 well">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Upload Destination Images
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">   
                                <?php if(isset($status) && $status->success==FALSE) 
                                {?>
                                   	<div class="alert alert-danger" role="alert">
                                   		<?php echo $status->message; ?>
                                   	</div>
                                   	<span class='btn-group'>
                                		<a href='<?php echo site_url('admin/destination/index'); ?>' class='btn btn-warning btn-margin' title='Cancel'>
                                      			<i class='fa fa-close fa-fw'></i> Cancel</a>
                                    </span>
                                 <?php }?>
                                 
                                 <?php if(isset($status) && $status->success==TRUE) 
	                                {?>
	                                   	<div class="alert alert-success" role="alert">
	                                   		<?php echo $status->message; ?>
	                                   	</div>
	                                   	<span class='btn-group'>
	                                		<a href='<?php echo site_url('admin/destination/index'); ?>' class='btn btn-warning btn-margin' title='Cancel'>
	                                      			<i class='fa fa-close fa-fw'></i> Cancel</a>
	                                    </span>
	                                 <?php }?>                                 					
									
								<?php  $attributes = array("role" => "form", "id" => "uploadDestinationImagesForm", "name" => "uploadDestinationImagesForm");
        								echo form_open_multipart("admin/destination/upload/".$id, $attributes);?>
        								<!-- 
        								<div class="form-group">
        								<input type="hidden" id="hdnId" name="hdnId" value=<?php echo $id; ?>/>
        								</div>                                   
                                        <div class="form-group">
                                            <label>Select Image File:</label>
                                           <input type='file' id="image1" name='image1' size='20' />
                                        </div>
                                        <div class="form-group">
                                          <button id="btn_upload1" name="btn_upload1" type="submit" class="btn btn-info" value="upload" >
                                        	<i class='fa fa-upload fa-fw'></i> Upload
                                        </button>
                                        </div>   
                                        -->  
                                         <div class="form-group">
                                            <label>Select Image File:</label>
                                        </div>
                                        <input id="uploadFile" placeholder="Choose File" disabled />
										<div class="fileUpload btn btn-info">
										    <span><i class='fa fa-upload fa-fw'></i>Upload</span>
										    <input id="uploadBtn" type="file" class="upload" />										    
										</div> 
										<a class="fileUpload btn btn-warning" href='<?php echo site_url('admin/destination/index'); ?>' title='Cancel'>										    
										   <i class='fa fa-close fa-fw'></i> Cancel									    
										</a> 
										    						
                                  <?php echo form_close(); 
                                  	
                                  if(isset($uploaded_file)){
									echo "<ul>";
            						foreach ($uploaded_file as $item=>$value)
            						{
            							echo "<li>";
            							echo $item." : ".$value;
            							echo "</li>";
            						}
            						echo "</ul>"; 
            						}              
        						?>
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
