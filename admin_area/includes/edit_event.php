<?php require_once 'includes/header.php'; ?>

<?php

if (isset($_GET['edit_enevt'])) {
	$enevt_id 			= $_GET['edit_enevt'];

	$view_enevt 		= $getFromU->view_enevt_By_enevt_ID($enevt_id);

	$enevt_title 		= $view_enevt->enevt_title;
	$enevt_desc 		= $view_enevt->enevt_desc;
	$the_enevt_img1 = $view_enevt->enevt_img1;
}

?>

<?php

if (isset($_POST['update_enevt'])) {
	$enevt_title 		= $_POST['enevt_title'];
	$enevt_desc 		= $_POST['enevt_desc'];
	$enevt_img1 		= $_FILES['enevt_img1']['name'];

	$temp_name1 			= $_FILES['enevt_img1']['tmp_name'];

	if (empty($enevt_img1)) {
		$enevt_img1 = $the_enevt_img1;
	}


	move_uploaded_file($temp_name1, "enevt_images/$enevt_img1");

	$update_enevt = $getFromU->update_enevt("events", $enevt_id, array("add_date" => date("Y-m-d H:i:s"), "enevt_title" => $enevt_title, "enevt_img1" => $enevt_img1, "enevt_desc" => $enevt_desc));

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