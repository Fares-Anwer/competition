<?php

// / getevents function Code Starts ///

$aWhere = array();

// / Manufacturers Code Starts ///

if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {
	foreach ($_REQUEST['man'] as $sKey => $sVal) {
		if ((int)$sVal != 0) {
			$aWhere[] = 'customer_id=' . (int)$sVal;
		}
	}
}

// / Manufacturers Code Ends ///
// / events Categories Code Starts ///

if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {
	foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {
		if ((int)$sVal != 0) {
			$aWhere[] = 'cat_id=' . (int)$sVal;
		}
	}
}

// / events Categories Code Ends ///
// / Categories Code Starts ///

if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {
	foreach ($_REQUEST['cat'] as $sKey => $sVal) {
		if ((int)$sVal != 0) {
			$aWhere[] = 'cat_id=' . (int)$sVal;
		}
	}
}

// / Categories Code Ends ///

$per_page = 6;

if (isset($_GET['page'])) {

	$page = $_GET['page'];
} else {
	$page = 1;
}

$start_from = ($page - 1) * $per_page;
$sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
$sWhere = (count($aWhere) > 0 ? ' WHERE ' . implode(' or ', $aWhere) : '') . $sLimit;

$get_events = $getFromU->selectAllevents($sWhere);

foreach ($get_events as $get_product) {
	$product_id = $get_product->product_id;
	$product_title = $get_product->product_title;
	$product_price = $get_product->product_price;
	$product_img1 = $get_product->product_img1;
	$product_label   = $get_product->product_label;


?>


	<div class="col-sm-6 col-md-4 justify-content-center single">
		<div class="product mb-4">
			<div class="card">
				<a href="details.php?product_id=<?php echo $product_id; ?>"><img class="card-img-top img-fluid p-3" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Card image cap"></a>
				<div class="card-body text-center pt-0">
					<p class="btn btn-sm btn-info mb-0">Mnf By : <?php echo $manufacturer_title; ?></p>
					<hr>
					<div class="row">
						<div class="col-md-6  pr-1 pb-2">
							<a href="details.php?product_id=<?php echo $product_id; ?>" class="btn btn-outline-info form-control">Details</a>
						</div>
						<div class="col-md-6 pr-lg-3 pr-1">
							<a href="details.php?product_id=<?php echo $product_id; ?>" class="btn btn-success form-control"><i class="fas fa-shopping-cart"></i> Add</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php if (!empty($product_label)) : ?>
			<a class="label sale" style="color: black">
				<div class="thelabel"><?php echo $product_label; ?></div>
				<div class="label-background"></div>
			</a>
		<?php endif ?>

	</div> <!-- SINGLE PRODUCT END -->

<?php  } // / getevents function Code Ends /// 
?>