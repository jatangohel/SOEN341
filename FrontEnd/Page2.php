<!doctype html>
<html lang="en">
  <head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<style type="text/css">


			#ui{
			background-color: #333;
			padding: 30px;
			margin-top: 100px;
			min-height: 600px;
			border-radius: 30px;
			opacity: 0.7;
			}

			#ui label,h1{
			color:#fff;
			}

		</style>
    <title>Registration</title>
  </head>


  <?php  ?>
  <body>

	<nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top">
		<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
			<span class="navbar-toggler-icon"></span>


		</button>

		<span class="navbar-text">CourseSequence</span>
		<div class="collapse navbar-collapse" id="collapse_target">



		<ul class="navbar-nav">
			<li class="nav-item dropdown>
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">
					Dropdown
					<span class="caret"></span>
				</a>
			<div class="dropdown-menu" aria-labelledby="dropdown_target">
				<ul class="navbar-nav">
				<a class="dropdown-item">Item 1</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item">Item 2</a>
				<a class="dropdown-item">Item 3</a>
				<a class="dropdown-item">Item 4</a>
				</ul>
			</div>
			</li>
			<li class="nav-item>
				<a class="nav-link" href="#">Link 2 </a>
			</li>
			<li class="nav-item>
				<a class="nav-link" href="#">Link 3 </a>
			</li>
			<li class="nav-item>
				<a class="nav-link" href="#">Link 4 </a>
			</li>
		</ul>
		</div>
	</nav>


<div class="view" style="background-image: url('https://www.nationalobserver.com/sites/nationalobserver.com/files/styles/nat_header_full_size/public/img/2018/01/17/100915-concordia-creativecommons-downtown-montreal.jpg?itok=reBqyFyd;') ; background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="container">
		<div class="row">
			<div class="col-log-3"></div>
			<div class="col-log-6">
				<div id="ui">
					<h1 class="text-center">Registration Form</h1>
					<form class="form-group text-center" placeholder="text-left">
						<div class="row">
							<div class="col-lg-6">
								<label>First Name:</label>
								<input type="text" name="fname" class="form-control" placeholder="
								Enter your First Name..">
							</div>

							<div class="col-lg-6">
								<label>Last Name:</label>
								<input type="text" name="lname" class="form-control"placeholder="
								Enter your Last Name..">
							</div>
						</div>
						<br>
						<label>E-mail</label>
						<input type="email" name="email" class="form-control" placeholder="
						Enter your Email..">
						<br>
						<div class="row">
							<div class="col-lg-6">
								<label>Password: </label>
								<input type="text" name="password" class="form-control" placeholder="
								Enter your Password(no less than 6 characters)">
							</div>

							<div class="col-lg-6">
								<label>Password Confirm:</label>
								<input type="text" name="password2" class="form-control"placeholder="
								Confirm your Password..">
							</div>
						</div>
							<br>
						<select class="form-control">
							<option>Choose Gender..</option>
							<option>Male</option>
							<option>Female</option>
							<option>Others</option>
						</select>
						<br>
							<br>
								<br>
									<br>
						<input type="submit" name="submit" value="submit" class="btn btn-primary
						btn-block btn-lg">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="navbar navbar-inverse bg-dark  margin-bottom 0px">
		<div class="navbar-text text-white pull-left">
			<p> Copyright Error404 Team 2019</p>
		</div>
		<div class="navbar-text text-success text-center">
			<p> Please Share this Website to your friends, thanks!</p>
		</div>
		<div class="navbar-text pull-right">
		<a href="#"><i class="fab fa-facebook-square"></i></a>
		<a href="#"><i class="fab fa-google"></i></a>
		<a href="#"><i class="fab fa-twitter-square"></i></a>
		<a href="#"><i class="fas fa-share-square"></i></a>
		</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
