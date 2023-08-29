<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Novena- Health Care &amp; Medical template</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Health Care Medical Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Novena HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png" />

  <!-- 
  Essential stylesheets
  =====================================-->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

  <script src="js/fetch.js"></script>
</head>

<body id="top">

<?php
include('conexion.php');
session_start();

?>
<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>support@novena.com</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Ta-134/A, New York, USA </li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890">
							<span>Call Now : </span>
							<span class="h4">823-4565-13456</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">
				<img src="images/logo.png" alt="" class="img-fluid">
			</a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
				aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icofont-navigation-menu"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarmain">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
					<!-- BUTTON as Paciente -->
					<?php
					if (isset($_SESSION['nivel']) && $_SESSION['nivel'] !== 'Paciente') {?>
							<li class="nav-item"><a class="nav-link" href="javascript:cargarContenido('Create_ficha_interface.php')">Ficha</a></li>
						<?php   
					}?>
					<li class="nav-item"><a class="nav-link" href="#">Services</a></li>
					<!-- BUTTON as Administrador -->
					<?php
					if (isset($_SESSION['nivel']) && $_SESSION['nivel'] !== 'Administrador') {?>
							<li class="nav-item"><a class="nav-link" href="javascript:cargarContenido('readMedico.php')">Medicos</a></li>
						<?php
					}?>
					<?php
					if (isset($_SESSION['nivel']) && $_SESSION['nivel'] !== 'Medico') {?>
							<li class="nav-item"><a class="nav-link" href="javascript:cargarContenido('Read_Citas_Medico.php')">Citas Agendadas</a></li>
						<?php
					}?>
					<?php
					if (isset($_SESSION['nivel']) && $_SESSION['nivel'] !== 'Administrador') {?>
							<li class="nav-item"><a class="nav-link" href="javascript:cargarContenido('Read_Paciente_Admin.php')">Pacietes</a></li>
						<?php
					}?>
					<?php
					if (isset($_SESSION['nivel'])) {?>
							<li class="nav-item"><a class="nav-link" href="javascript:cerrarSession()">Cerrar sesión</a></li>
						<?php
					}?>
					<!-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="department.html" id="dropdown02" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Department <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown02">
							<li><a class="dropdown-item" href="department.html">Departments</a></li>
							<li><a class="dropdown-item" href="department-single.html">Department Single</a></li>
                    
							<li class="dropdown dropdown-submenu dropright">
								<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0301" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>
			
								<ul class="dropdown-menu" aria-labelledby="dropdown0301">
									<li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
									<li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
								</ul>
							</li>
						</ul>
					</li> -->

					<!-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="doctor.html" id="dropdown03" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Doctors <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown03">
							<li><a class="dropdown-item" href="doctor.html">Doctors</a></li>
							<li><a class="dropdown-item" href="doctor-single.html">Doctor Single</a></li>
							<li><a class="dropdown-item" href="appoinment.html">Appoinment</a></li>

							<li class="dropdown dropdown-submenu dropleft">
								<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0501" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>
						
								<ul class="dropdown-menu" aria-labelledby="dropdown0501">
									<li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
									<li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
								</ul>
							</li>
						</ul>
					</li> -->

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="blog-sidebar.html" id="dropdown05" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Blog <i class="icofont-thin-down"></i></a>
						<ul class="dropdown-menu" aria-labelledby="dropdown05">
							<li><a class="dropdown-item" href="blog-sidebar.html">Blog with Sidebar</a></li>
							<li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
						</ul>
					</li>
					<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
					<?php
					if (!isset($_SESSION['nivel'])) {?>
						<div class="btn-container ">
							<!-- bootones para el login y singup -->
							<button type="button" class="btn btn-main-2 btn-icon btn-round-full" data-toggle="modal" data-target="#modal_login">Log In</button>
							<button button="button" class="btn btn-main-2 btn-icon btn-round-full" data-toggle="modal" data-target="#modal_singUp">Sign UP </button>
							<!-- Modal LOGIN-->
							<div class="modal fade" id="modal_login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">LOG IN</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form action="javascript: loginFetch()" id="formLogin">
												<div class="mb-3">
													<label for="email" class="form-label">Email</label>
													<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
												</div>
												<div class="mb-3">
													<label for="password" class="form-label">Password</label>
													<input type="password" class="form-control" id="password" name="password">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Log in</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal SingUP-->
							<div class="modal fade" id="modal_singUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">SING UP</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form>
												<div class="mb-3">
													<label for="email" class="form-label">Email</label>
													<input type="email" class="form-control" id="email_sign_up" aria-describedby="emailHelp">
												</div>
												<div class="mb-3">
													<label for="password" class="form-label">Password</label>
													<input type="password" class="form-control" id="password_sing_up">
												</div>
												<div class="mb-3">
													<label for="name" class="form-label">Name</label>
													<input type="text" class="form-control" id="name">
												</div>
												<div class="mb-3">
													<label for="phone_number" class="form-label">Phone Number</label>
													<input type="number" class="form-control" id="phone_number">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary">Register</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php
					}?>
				</ul>
			</div>
		</div>
	</nav>
</header>


<div class="container"id="contenido">

</div>

<!-- footer Start -->
<footer class="footer section gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<div class="logo mb-4">
						<img src="images/logo.png" alt="" class="img-fluid">
					</div>
					<p>Tempora dolorem voluptatum nam vero assumenda voluptate, facilis ad eos obcaecati tenetur veritatis eveniet distinctio possimus.</p>

					<ul class="list-inline footer-socials mt-4">
						<li class="list-inline-item">
							<a href="https://www.facebook.com/themefisher"><i class="icofont-facebook"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="https://twitter.com/themefisher"><i class="icofont-twitter"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="https://www.pinterest.com/themefisher/"><i class="icofont-linkedin"></i></a>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Department</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="#!">Surgery </a></li>
						<li><a href="#!">Wome's Health</a></li>
						<li><a href="#!">Radiology</a></li>
						<li><a href="#!">Cardioc</a></li>
						<li><a href="#!">Medicine</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Support</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="#!">Terms & Conditions</a></li>
						<li><a href="#!">Privacy Policy</a></li>
						<li><a href="#!">Company Support </a></li>
						<li><a href="#!">FAQuestions</a></li>
						<li><a href="#!">Company Licence</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget widget-contact mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Get in Touch</h4>
					<div class="divider mb-4"></div>

					<div class="footer-contact-block mb-4">
						<div class="icon d-flex align-items-center">
							<i class="icofont-email mr-3"></i>
							<span class="h6 mb-0">Support Available for 24/7</span>
						</div>
						<h4 class="mt-2"><a href="mailto:support@email.com">Support@email.com</a></h4>
					</div>

					<div class="footer-contact-block">
						<div class="icon d-flex align-items-center">
							<i class="icofont-support mr-3"></i>
							<span class="h6 mb-0">Mon to Fri : 08:30 - 18:00</span>
						</div>
						<h4 class="mt-2"><a href="tel:+23-345-67890">+23-456-6588</a></h4>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-btm py-4 mt-5">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<div class="copyright">
						Copyright &copy; 2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="subscribe-form text-lg-right mt-5 mt-lg-0">
						<form action="#" class="subscribe">
							<input type="text" class="form-control" placeholder="Your Email address" required>
							<button type="submit" class="btn btn-main-2 btn-round-full">Subscribe</button>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<a class="backtop scroll-top-to" href="#top">
						<i class="icofont-long-arrow-up"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>
   

    <!-- 
    Essential Scripts
    =====================================-->
    <script src="plugins/jquery/jquery.js"></script>
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="plugins/shuffle/shuffle.min.js"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA"></script>
    <script src="plugins/google-map/gmap.js"></script>
    
    <script src="js/script.js"></script>

  </body>
  </html>