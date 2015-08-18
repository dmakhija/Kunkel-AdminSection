<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/menu.php'; ?>

<div id="page-wrapper">
	<div class="row">
	<div class="col-lg-12">
	<h1 class="page-header">Destinations</h1>
	
	</div>
	<!-- /.col-lg-12 -->
	</div>
	
	<!-- /.row -->                       
                        
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Destinations
                        </div> 
                        <!-- /.panel-heading -->
                        <div class="panel-body">    
                        
	                        <a class="btn btn-success btn-margin" href='<?php echo site_url('admin/destination/add');?>'>
	    					<i class="fa fa-plus-circle fa-fw"></i> Add</a>
	                        <?php if (sizeof($destination_data)>0) {?>                  
                            <div class="table-responsive">                            
                                <table class="table table-striped1 table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>City</th>
                                            <th>Province</th>
                                            <th>Country</th>
                                            <th>Details</th>
                                            <th>Images</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										for($i=0; $i<sizeof($destination_data); $i++)
										{
											$row=$destination_data[$i];	
											$country=$row->country;
											if($country=='USA')
											{
												echo "<tr class='inactive-row'>";
											}
											else 
											{
												echo "<tr>";
											}
										?>											
                                            <td><?php echo ($i+1); ?></td>
                                            <td><?php echo $row->city; ?></td>
                                            <td><?php echo $row->province; ?></td>
                                            <td><?php echo $row->country; ?></td>
                                            <td><span class='btn-group'>
                                            <a href='<?php echo site_url('admin/destination/details')."/".$row->id; ?>' class='btn btn-primary btn-margin' title='Details'>
												<i class='fa fa-info fa-fw'></i> Details</a>
										
                                            </span>
                                            </td>
                                            <td><span class='btn-group'><a href='<?php echo site_url('admin/destination/upload')."/".$row->id; ?>' class='btn btn-info btn-margin' title='Upload Images'>
												<i class='fa fa-upload fa-fw'></i> Upload</a>
										
                                            </span>
                                            </td>
                                        </tr>
										<?php } ?>
										                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
							<?php } else {?>
								<div class="alert alert-info" role="alert">No destinations found. Add a new destination now.</div>								
							<?php }
							?>
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