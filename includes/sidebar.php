<?php
$aMan = array();
$aPCat = array();
$aCat = array();

// / Manufacturers Code Starts ///

if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {
  foreach ($_REQUEST['man'] as $sKey => $sVal) {
    if ((int)$sVal != 0) {
      $aMan[(int)$sVal] = (int)$sVal;
    }
  }
}

// / Manufacturers Code Ends ///
// / events Categories Code Starts ///

if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {
  foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {
    if ((int)$sVal != 0) {
      $aPCat[(int)$sVal] = (int)$sVal;
    }
  }
}

// / events Categories Code Ends ///
// / Categories Code Starts ///

if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {
  foreach ($_REQUEST['cat'] as $sKey => $sVal) {
    if ((int)$sVal != 0) {
      $aCat[(int)$sVal] = (int)$sVal;
    }
  }
}

// / Categories Code Ends ///

?>




<div class="card sidebar-menu">
  <div class="card-header">
    Manufacturers
    <div class="float-right">
      <a href="#" class="text-dark"><span class="nav-toggle1 hide-show1" style="font-size: 10px"><i class="fas fa-minus"></i></span></a>
    </div>
  </div>
  <div class="panel-collapse1 collapse-data1">
    <div class="card-body">
      <div class="input-group">
        <input type="text" class="form-control" name="" id="dev-table-filter" data-action="filter" data-filter="#dev-manufacturer" placeholder="Filter Manufacturer" aria-describedby="basic-addon1">
        <div class="input-group-prepend">
          <a href="#" class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></a href="#">
        </div>
      </div>
    </div>
    <div class="card-body scroll-menu">
      <ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer">
        <?php
        $get_manufacturers = $getFromU->selectTopManufacturer();
        foreach ($get_manufacturers as $get_manufacturer) {
          $manufacturer_id = $get_manufacturer->customer_id;
          $manufacturer_title = $get_manufacturer->customer_name;
          $manufacturer_image = $get_manufacturer->customer_image;

          if ($manufacturer_image == "") {
          } else {
            $manufacturer_image = " <img src='customer/assets/customer_images/$manufacturer_image' width='20px' height='20px'> &nbsp;";
          }
        ?>

          <li class="checkbox checkbox-primary form-control mb-2 bg-light">
            <a>
              <div class="custom-control custom-checkbox mr-sm-2" style="top: 15px">
                <input type="checkbox" <?php (isset($aMan[$manufacturer_id])) ? print "checked='checked' " : ""; ?> name="manufacturer" value="<?php echo $manufacturer_id; ?>" class="custom-control-input get_manufacturer" id="manufac[<?php echo $manufacturer_id; ?>]">
                <label class="custom-control-label" for="manufac[<?php echo $manufacturer_id; ?>]"><span><?php echo $manufacturer_image; ?></span> <span><?php echo $manufacturer_title; ?></span><br></label>
              </div>
            </a>
          </li>

        <?php   } ?>


      </ul>
    </div>
  </div>

</div>




<div class="card sidebar-menu">
  <div class="card-header">
    Categories
    <div class="float-right">
      <a href="#" class="text-dark"><span class="nav-toggle3 hide-show3" style="font-size: 10px"><i class="fas fa-minus"></i></span></a>
    </div>
  </div>
  <div class="panel-collapse3 collapse-data3">
    <div class="card-body">
      <div class="input-group">
        <input type="text" class="form-control" name="" id="dev-table-filter" data-action="filter" data-filter="#dev-cats" placeholder="Filter Categories" aria-describedby="basic-addon2">
        <div class="input-group-prepend">
          <a href="#" class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></a href="#">
        </div>
      </div>
    </div>

  </div>

</div>