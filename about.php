<?php require_once 'includes/header.php'; ?>
<nav class="navbar navbar-expand-lg  navbar-light bg-dark sticky-top" id="navbar">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto text-light text-uppercase">
			<li>
				<a class="nav-link text-light" href="index.php">Home </a>
			</li>

			<li>
				<a class="nav-link text-light" href="contact.php">Contact Us</a>
			</li>
			<li>
				<a class="nav-link text-light" class="active" href="about.php">About Us</a>
			</li>
			<li>
				<a class="nav-link text-light" href="services.php">Services</a>
			</li>
		</ul>

		<a href="cart.php" class="btn btn-warning ms-3"><i class="fas fa-shopping-cart"></i><span> <?php echo $getFromU->count_product_by_ip($ip_add); ?> items in Cart</span></a>

		<!-- Search Form -->
		<form class="d-flex ms-3" role="search">
			<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="user_query" required="1">
			<button class="btn btn-outline-light" type="submit" name="search">Search</button>
		</form>
	</div>
</nav>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item" aria-current="page">About Us</li>
					</ol>
				</nav>
			</div>
			<?php
			$get_about = $getFromU->viewFromTable('about_us');
			$about_id = $get_about->about_id;
			$about_heading = $get_about->about_heading;
			$about_short_desc = $get_about->about_short_desc;
			$about_desc = $get_about->about_desc;
			?>


			<div class="col-md-12 mb-4">
				<img class="card-img-top" src="admin_area/other_images/about_us.jpg" height="700px">
				<div class="card">
					<div class="card-header text-center">
						<h5 class="mt-4"><?php echo $about_heading; ?></h5>
					</div>
					<div class="card-body text-justify">
						<div class="col-md-12">
							<p class="lead font-italic"><?php echo $about_short_desc; ?></p>
							<p><?php echo $about_desc; ?></p>
						</div>
					</div>
				</div> <!-- Card End -->



			</div> <!-- col-md-9 End -->


		</div> <!-- Row End -->





	</div> <!-- SINGLE PRODUCT ROW END -->

</div>
</div>




<?php require_once 'includes/footer.php'; ?>