<?php require_once 'includes/header.php'; ?>

<?php

if (isset($_GET['edit_enevt'])) {
	$enevt_id 			= $_GET['edit_enevt'];

	$view_enevt 		= $getFromU->view_enevt_By_enevt_ID($enevt_id);

	$enevt_title 		= $view_enevt->enevt_title;
	$cat_id 				= $view_enevt->cat_id;
	$enevt_price 		= $view_enevt->enevt_price;
	$enevt_psp_price = $view_enevt->enevt_psp_price;
	$enevt_desc 		= $view_enevt->enevt_desc;
	$enevt_keywords = $view_enevt->enevt_keywords;
	$the_enevt_img1 = $view_enevt->enevt_img1;
	$enevt_label 		= $view_enevt->enevt_label;
	$the_status 		  = $view_enevt->status;
	$customer_id = $view_enevt->customer_id;
	$view_p_category 	= $getFromU->view_All_By_cat_id($cat_id);

	$view_category 		= $getFromU->view_All_By_cat_ID($cat_id);
	$the_cat_title 		= $view_category->cat_title;
}

?>

<?php

if (isset($_POST['update_enevt'])) {
	$enevt_title 		= $_POST['enevt_title'];
	$cat_id 					= $_POST['cat'];
	$enevt_price 		= $_POST['enevt_price'];
	$enevt_psp_price = $_POST['enevt_psp_price'];
	$enevt_desc 		= $_POST['enevt_desc'];
	$enevt_keywords = $_POST['enevt_keywords'];
	$enevt_label    = $_POST['enevt_label'];
	$status    				= $_POST['status'];
	$customer_id 		= $_POST['customer_id'];
	$enevt_img1 		= $_FILES['enevt_img1']['name'];

	$temp_name1 			= $_FILES['enevt_img1']['tmp_name'];

	if (empty($enevt_img1)) {
		$enevt_img1 = $the_enevt_img1;
	}


	move_uploaded_file($temp_name1, "enevt_images/$enevt_img1");

	$update_enevt = $getFromU->update_enevt("events", $enevt_id, array("cat_id" => $cat_id, "add_date" => date("Y-m-d H:i:s"), "enevt_title" => $enevt_title, "enevt_img1" => $enevt_img1, "enevt_price" => $enevt_price, "enevt_psp_price" => $enevt_psp_price, "enevt_desc" => $enevt_desc, "enevt_keywords" => $enevt_keywords, "enevt_label" => $enevt_label, "status" => $status));

	if ($update_enevt) {
		$_SESSION['enevt_update_msg'] = "enevt has been Updated Sucessfully";
		header('Location: index.php?view_enevts');
	} else {
		echo '<script>alert("enevt has not added")</script>';
	}
}
echo $customer_id;
?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update enevts</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Update enevts</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-row mb-3">
						<div class="col-md-9">
							<input type="hidden" name="enevt_id" value="<?php echo $enevt_id; ?>" required>
						</div>
					</div>
					<div class="form-row mb-3">
						<div class="col-3">
							<label for="enevt_title">enevt Title</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="enevt_title" class="form-control" id="enevt_title" value="<?php echo $enevt_title; ?>" placeholder="enevt Title" required>
							<div class="invalid-feedback">
								Please provide a enevt Title.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3">
							<label for="enevt_cat">enevt Manufacturer</label>
						</div>
						<div class="col-md-9">
							<select name="customer_id" id="manufacturer_id" class="form-control" required>
								<?php
								$customer = $getFromU->view_customer_by_id($customer_id);
								$customer_name = $customer->customer_name;
								// if ($manufacturer_title == $customer_id) {

								?>
								<option value="<?php echo htmlspecialchars($mcustomer_id);
												echo htmlspecialchars($customer_name); ?>"><?php echo htmlspecialchars($customer_name); ?></option>
							</select>
							<div class="invalid-feedback">
								Please select a enevt Manufacturer.
							</div>
						</div>
					</div>


					<div class="form-row mb-3">
						<div class="col-md-3">
							<label for="cat">Categories</label>
						</div>
						<div class="col-md-9">
							<select name="cat" id="cat" class="form-control" required>
								<option value="<?php echo $cat_id; ?>"><?php echo $the_cat_title; ?></option>
								<?php
								$categories = $getFromU->viewAllFromTable("categories");
								foreach ($categories as $category) {
									$cat_id = $category->cat_id;
									$cat_title = $category->cat_title;
									if ($cat_title == $the_cat_title) {
										continue;
									}
								?>
									<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">
								Please select a Categories.
							</div>
						</div>
					</div>


					<div class="form-row mb-3">
						<div class="col-md-3">
							<label for="enevt_img1">enevt Image 1</label>
						</div>
						<div class="col-md-9">
							<input type="file" name="enevt_img1" id="enevt_img1">
							<img src="enevt_images/<?php echo $the_enevt_img1; ?>" width="30" height="30">
							<div class="invalid-feedback">
								Please provide a enevt Image 1.
							</div>
						</div>
					</div>
					<div class="form-row mb-3">
						<div class="col-md-3">
							<label for="enevt_price">enevt Price</label>
						</div>
						<div class="col-md-9">
							<input type="number" name="enevt_price" class="form-control" id="enevt_price" value="<?php echo $enevt_price; ?>" placeholder="Enter enevt Price" required>
							<div class="invalid-feedback">
								Please provide a enevt Price.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-md-3">
							<label for="enevt_psp_price">enevt Sale Price</label>
						</div>
						<div class="col-md-9">
							<input type="number" name="enevt_psp_price" class="form-control" id="enevt_psp_price" value="<?php echo $enevt_psp_price; ?>" placeholder="Enter enevt Sale Price" required>
							<div class="invalid-feedback">
								Please provide a enevt Sale Price.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-md-3 ">
							<label for="enevt_desc">enevt Tabs</label>
						</div>
						<div class="col-md-9">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">enevt Description</a>
								</li>

							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
									<textarea name="enevt_desc" class="form-control summernote" rows="15" id="enevt_desc" placeholder="Enter enevt Description" required><?php echo $enevt_desc; ?></textarea>
									<div class="invalid-feedback">
										Please provide enevt Description.
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3 ">
							<label for="enevt_keywords">enevt Keyword</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="enevt_keywords" class="form-control" value="<?php echo $enevt_keywords; ?>" id="enevt_keywords" placeholder="Enter enevt Keyword" required>
							<div class="invalid-feedback">
								Please provide enevt Keyword.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-3 ">
							<label for="enevt_label">enevt Label</label>
						</div>
						<div class="col-md-9">
							<select name="enevt_label" id="enevt_label" class="form-control" required>
								<option value="<?php echo $enevt_label; ?>"><?php echo $enevt_label; ?></option>
								<option value="New">New</option>
								<option value="Sale">Sale</option>
								<option value="Gift">Gift</option>
							</select>
							<div class="invalid-feedback">
								Please Select enevt Label.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-md-3">
							<label for="status">Status</label>
						</div>
						<div class="col-md-9">
							<select name="status" id="status" class="form-control" required>
								<option value="<?php echo $the_status; ?>"><?php echo ucwords($the_status); ?></option>
								<?php
								$view_statuses = $getFromU->view_distinct_status();
								foreach ($view_statuses as $view_status) {
									$status = $view_status->status;
									if ($status == $the_status) {
										continue;
									}
								?>
									<option value="<?php echo $status; ?>"><?php echo ucwords($status); ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">
								Please select a Categories.
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-12 mt-4">
							<button class="btn btn-info form-control" name="update_enevt" type="submit"><i class="fas fa-edit"></i> Update enevt</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<script>
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
				'use strict';
				window.addEventListener('load', function() {
					// Fetch all the forms we want to apply custom Bootstrap validation styles to
					var forms = document.getElementsByClassName('needs-validation');
					// Loop over them and prevent submission
					var validation = Array.prototype.filter.call(forms, function(form) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
					});
				}, false);
			})();
		</script>
	</div>
</div>





<?php require_once 'includes/footer.php'; ?>

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script>
	$(document).ready(function() {
		$('.summernote').summernote();
	});
</script>