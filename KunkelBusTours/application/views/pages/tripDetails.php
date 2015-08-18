<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include 'templates/header.php'; ?>

<!--SERVICE SECTION START-->
<section id="tripDetails" >
<div class="container">
<div class="row text-center header">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
<h3>MONTREAL QUEBEC OTTAWA BUS TOUR FROM TORONTO</h3>
<h4>3 days / 2 nights package</h4>
<hr />
</div>
</div>

<div class="row pad-bottom animate-in" data-anim-type="fade-in-up">
<div>
<img id="img1" src="<?php echo base_url();?>assets/img/montreal.jpg" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pad-bottom"/>
<!-- class="col-xs-12 col-sm-4 col-md-6 col-lg-8 animate-in" data-anim-type="fade-in-up" -->
</div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pad-bottom">

<div class="panel-group" id="tripDetailsAccordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title details-title">
          <a data-toggle="collapse" data-parent="#tripDetailsAccordion" href="#price">Prices</a>
        </h4>
      </div>
      <div id="price" class="panel-collapse collapse in">
        <div class="panel-body">
        <h2>$500</h2><h4>Per Person</h4>plus taxes.
        <div id="order_container">
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="seller1@ilgonkim.com">
<input type="hidden" name="item_name" value="MONTREAL QUEBEC OTTAWA BUS TOUR FROM TORONTO(3 Days/2Nights Package)">
<input type="hidden" name="item_number" value="NY32507725">
<input type="hidden" name="amount" value="500">
<input type="hidden" name="tax" value="65">
<input type="hidden" name="quantity" value="1">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="CAD">

<!-- Enable override of buyers's address stored with PayPal . -->
<input type="hidden" name="address_override" value="1">
<!-- Set variables that override the address stored with PayPal. -->
<input type="hidden" name="first_name" value="John">
<input type="hidden" name="last_name" value="Doe">
<input type="hidden" name="address1" value="345 Lark Ave">
<input type="hidden" name="city" value="San Jose">
<input type="hidden" name="state" value="CA">
<input type="hidden" name="zip" value="95121">
<input type="hidden" name="country" value="US">
<input type="image" name="submit" border="0"
src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="PayPal - The safer, easier way to pay online">
</form>
    </div>
    </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#tripDetailsAccordion" href="#collapse2">Itinerary</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#tripDetailsAccordion" href="#collapse3">Hotels</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#tripDetailsAccordion" href="#collapse3">PickUp Points</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
	
  </div>

</div>


</div>

</div>
</section>

<?php include 'templates/footer.php'; ?>
