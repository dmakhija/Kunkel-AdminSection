<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/menu.php'; ?>

<div id="page-wrapper">
	<div class="row">
	<div class="col-lg-12">
	<h1 class="page-header">Trips</h1>
	
	</div>
	<!-- /.col-lg-12 -->
	</div>
	
	<!-- /.row -->                       
                        
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Trips
                        </div> 
                        <!-- /.panel-heading -->
                        <div class="panel-body">    
                        
	                        <a class="btn btn-success btn-margin" href='<?php echo site_url('admin/trip/add');?>'>
	    					<i class="fa fa-plus-circle fa-fw"></i> Add</a>
	                        <?php if (sizeof($trip_data)>0) {?>                  
                            <div class="table-responsive">                            
                                <table class="table table-striped1 table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Duration</th>
                                            <th>Origin</th>
                                            <th>Destination</th>
                                            <th>Adult Price(CDN $)</th>
                                            <th>Details</th>
                                             <th>Images</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										for($i=0; $i<sizeof($trip_data); $i++)
										{
											$row=$trip_data[$i];
										?>											
                                            <td><?php echo  $i+1; //$row->id; ?></td>
                                            <td><?php echo $row->name; ?></td>
                                            <td><?php echo $row->days." days / ".$row->nights." Nights"; ?></td>
                                            <td><?php echo $row->originCity; ?></td>                                            
                                            <td><?php echo $row->destinationCity;?></td>
                                            <td><?php echo $row->adultPrice.".00";?></td>
                                            <td><span class='btn-group'>
                                            <a href='<?php echo site_url('admin/trip/details')."/".$row->id; ?>' class='btn btn-primary btn-margin' title='Details'>
												<i class='fa fa-info fa-fw'></i> Details</a></span></td>
										  	<td><span class='btn-group'><a href='' class='btn btn-info btn-margin' title='Upload Images'>
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
								<div class="alert alert-info" role="alert">No trips found. Add a new trip now.</div>								
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