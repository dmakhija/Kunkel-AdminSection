<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/menu.php'; ?>

<div id="page-wrapper">
	<div class="row">
	<div class="col-lg-12">
	<h1 class="page-header">Buses</h1>
	
	</div>
	<!-- /.col-lg-12 -->
	</div>
	
	<!-- /.row -->                       
                        
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Buses
                        </div> 
                        <!-- /.panel-heading -->
                        <div class="panel-body">    
                        
	                        <a class="btn btn-success btn-margin" href='<?php echo site_url('admin/bus/add');?>'>
	    					<i class="fa fa-plus-circle fa-fw"></i> Add</a>
	                        <?php if (sizeof($bus_data)>0) {?>                  
                            <div class="table-responsive">                            
                                <table class="table table-striped1 table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>VIN</th>
                                            <th>Plate</th>
                                            <th>Capacity</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										for($i=0; $i<sizeof($bus_data); $i++)
										{
											$row=$bus_data[$i];	
											$status=$row->status;
											if($status=='inactive')
											{
												echo "<tr class='inactive-row'>";
											}
											else 
											{
												echo "<tr>";
											}
										?>											
                                            <td><?php echo ($i+1); ?></td>
                                            <td><?php echo $row->vin; ?></td>
                                            <td><?php echo $row->plate; ?></td>
                                            <td><?php echo $row->capacity; ?></td>                                            
                                            <td><?php echo $row->status; ?></td>
                                            <td><span class='btn-group'>
                                            <a href='<?php echo site_url('admin/bus/details')."/".$row->vin; ?>' class='btn btn-primary btn-margin' title='Details'>
												<i class='fa fa-info fa-fw'></i> Details</a>
										
                                            </span>
                                            </td>
                                        </tr>
										<?php } ?>
										                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
							<?php } else {?>
								<div class="alert alert-info" role="alert">No buses found. Add a new bus to the fleet now.</div>								
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