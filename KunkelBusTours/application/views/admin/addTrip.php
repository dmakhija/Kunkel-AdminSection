zx<?php
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
                            Add New Trip
                        </div>
                        <div class="panel-body">                         
                            <div class="row">
                                <div class="col-lg-12">
                                 <?php  $attributes = array("role" => "form", "id" => "addTripForm", "name" => "addTripForm");
        								echo form_open("admin/trip/add", $attributes);?>
                                     <!-- <form role="form"> -->
                                     
                                        <div class="col-lg-2 form-group">
                                            <label>Name:<span class="asterik">*</span></label>
                                        </div> 
                                        <div class="col-lg-10 form-group"> 
        									<input class="form-control" type="text" id="trip_name" name="trip_name" size="50"> 
                                        </div>
                                        <div class="col-lg-2 form-group">
                                            <label>Origin:<span class="asterik">*</span></label>
                                        </div>
                                        <div class="col-lg-10 form-group">                                                                                                                                       
                                            <select id="origin_country" name="origin_country" class="col-lg-3 destinationlist margin">
                                           
											<option value='-1' <?php echo set_select('origin_country','-1', ( !empty($OriginCountry) && $OriginCountry == "-1" ? TRUE : FALSE ));?> >Select Country</option>
                                            <?php  if(sizeof($countries)>0) 
												{ 
	                                            	foreach($countries as $country)
	                                            	{
	                                            		$countryname=$country->country;
	                                            		if($countryname==$OriginCountry)
	                                            		{
	                                            			//this option selected
	                                            			echo "<option value=".$countryname." selected='selected'>".$countryname."</option>";
	                                            		}
	                                            		else 
														{
															echo "<option value=".$countryname.">".$countryname."</option>";
														} 
	                                            	}
                                            	}
                                            	?>
                                            
                                            </select>
                                            <select id="origin_province" name="origin_province" class="col-lg-3 destinationlist margin">
                                            <?php// if(!isset($provinces))
                                            //{?> 
                                            	<option value='-1' <?php echo set_select('origin_province','-1', ( !empty($OriginProvince) && $OriginProvince == "-1" ? TRUE : FALSE ));?> >Select Province</option>
                                            
											<?php //} ?>
                                             </select>
                                                                                       
                                            <select id="origin_city" name="origin_city" class="col-lg-3 destinationlist margin">
                                            <option value='-1' <?php echo set_select('origin_city','-1', ( !empty($OriginCity) && $OriginCity == "-1" ? TRUE : FALSE ));?> >Select City</option>
                                            </select>
                                        </div>
                                                 
                                           <div class="col-lg-2 form-group">
                                           <label>Destination:<span class="asterik">*</span></label>
                                           </div>   
                                           <div class="col-lg-10 form-group"> 
                                            <select id="destination_country" name="destination_country" class="col-lg-3 destinationlist margin">
                                           		<option value='-1' <?php echo set_select('destination_country','-1', ( !empty($DestinationCountry) && $DestinationCountry == "-1" ? TRUE : FALSE ));?> >Select Country</option>
                                            <?php if(sizeof($countries)>0) 
												{ 
	                                            	foreach($countries as $country)
	                                            	{
	                                            		$countryname=$country->country;
	                                            		if($countryname==$DestinationCountry)
	                                            		{
	                                            			//this option selected
	                                            			echo "<option value=".$countryname." selected='selected'>".$countryname."</option>";
	                                            		}
	                                            		else 
														{
															echo "<option value=".$countryname.">".$countryname."</option>";
														} 
	                                            	}
                                            	}
                                            	?>
                                            
                                            </select>
                                            <select id="destination_province" name="destination_province" class="col-lg-3 destinationlist margin">
                                             <!-- onchange="this.form.submit()" -->
											<option value='-1' <?php echo set_select('destination_province','-1', ( !empty($DestinationProvince) && $DestinationProvince == "-1" ? TRUE : FALSE ));?> >Select Province</option>
                                             </select>
                                                                                       
                                            <select id="destination_city" name="destination_city" class="col-lg-3 destinationlist margin">
                                            <option value='-1' <?php echo set_select('destination_city','-1', ( !empty($DestinationCity) && $DestinationCity == "-1" ? TRUE : FALSE ));?> >Select City</option>                                           
                                            </select>
                                        </div>
                                        
                                       <div class="col-lg-2 form-group">
                                            <label>Duration:<span class="asterik">*</span></label>
                                       </div>
                                       <div class="col-lg-10 form-group">
                                        <div class="col-lg-3">    
                                            <label>Days:<span class="asterik">*</span></label>
        									<input class="destinationlist" type="number" id="trip_days" name="trip_days" min="0" max="10"> 
        								</div>
        								<div class="col-lg-3">
        									<label>Nights:<span class="asterik">*</span></label>
        									<input class="destinationlist" type="number" id="trip_nights" name="trip_nights" min="0" max="10">        									
                                        </div>  
                                       </div>
                                                                            
                                       
                                       <div class="col-lg-2 form-group">
                                            <label>Price:<span class="asterik">*</span></label>
                                       </div>
                                        <div class="col-lg-10 form-group">
                                         <div class="col-lg-3">    
                                            <label>Adult:<span class="asterik">*</span></label>                                            
										    <input class="destinationlist" type="number" id="adult_price" name="adult_price" min="0" max="5000" placeholder="$">										            									 
        								</div>
        								<div class="col-lg-3">    
                                            <label>Child:<span class="asterik">*</span></label>                                            
										    <input class="destinationlist" type="number" id="child_price" name="child_price" min="0" max="5000" placeholder="$">										            									 
        								</div>
                                        </div>
                                      
                                      	<div class="col-lg-2 form-group">
        								<label>Trip Details:<span class="asterik">*</span></label>
        								</div>
                                        <div class="col-lg-10 form-group">
	                                    <textarea rows="" cols="" class="tinyMCE" id="trip_details" name="trip_details"></textarea>                                
	                                        
                                        </div>
                                        <div class="col-lg-12 col-lg-offset-2 form-group">                                        
                                        <a  href='<?php echo site_url('admin/trip/index')?>' class='btn btn-warning' title='Cancel'>
                                      			<i class='fa fa-close fa-fw'></i> Cancel</a>
                                      	<button id="btn_insert" name="btn_insert" type="submit" class="btn btn-info" value="Insert" >
                                        	<i class='fa fa-floppy-o fa-fw'></i> Insert
                                        </button>
                                        </div>
                                         
                                    <!-- </form> -->
                                    <?php echo form_close(); ?>
                                    <div>
                                    <?php if(isset($trip_data) && sizeof($trip_data)>0)
                                    	{
                                    		foreach($trip_data as $item)
                                    		{
                                    			echo $item;
                                    			echo "<br/>";
                                    		}
                                    	}
                                    ?>
                                    </div>
                                     
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
