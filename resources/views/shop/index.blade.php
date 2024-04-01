<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

	<link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick-theme.css">

	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	<link rel="icon" href="{{asset('img/loco.jpg')}}">

	<link rel="stylesheet" href="{{asset('css/style.css')}}">


	<title>tvplus</title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<img src="{{asset('img/loco.jpg' )}}" alt="" width="30px">
			<a class="navbar-brand" href="#">Tvplus</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house-fill"></i>Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="#">Favoritos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="#">Los más vistos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="#">Estrenos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="#">Tv en vivo</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Categorias
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">

							<li><a class="dropdown-item" href="#">Acción</a></li>
							<li><a class="dropdown-item" href="#">animación</a></li>
							<li><a class="dropdown-item" href="#">Animes</a></li>
							<li><a class="dropdown-item" href="#">Aventuras</a></li>
							<li><a class="dropdown-item" href="#">Ciencia Ficción</a></li>
							<li><a class="dropdown-item" href="#">Comedia</a></li>
							<li><a class="dropdown-item" href="#">Crimen</a></li>
							<li><a class="dropdown-item" href="#">Cristianas</a></li>
							<li><a class="dropdown-item" href="#">Doramas</a></li>
							<li><a class="dropdown-item" href="#">Dramas</a></li>
							<li><a class="dropdown-item" href="#">Educativos</a></li>
							<li><a class="dropdown-item" href="#">Familiar</a></li>
							<li><a class="dropdown-item" href="#">Fantasia</a></li>
							<li><a class="dropdown-item" href="#">Historia</a></li>
							<li><a class="dropdown-item" href="#">Misterio</a></li>
							<li><a class="dropdown-item" href="#">Novelas</a></li>


						</ul>
					</li>
				</ul>
				<div class="d-flex">

					<button class="btn btn-outline-primary" type="submit">Iniciar Sesión</button>
				</div>
			</div>
		</div>
	</nav>

	<div class="container">
		<center>
			<h1 class="titulo1 animate__animated animate__bounceInDown animate__delay-1s">tvplus</h1>
			<button class="btn btn-primary btn-lg btn-facebook animate__animated animate__bounceInLeft animate__delay-2s"><i class="bi bi-facebook"></i></button>
			<button class="btn btn-default btn-lg btn-whatsapp animate__animated animate__bounceInRight animate__delay-2s"><i class="bi bi-whatsapp"></i></button>
			<br><br>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<form class="d-flex">
						<label for=""><b style="color: white;font-size: 25px;text-shadow: 0.1em 0.1em 0.2em black;">Buscar</b></label>
					<input class="form-control me-2" type="search" placeholder="Nombre de la pelicula" aria-label="Search">
					<button class="btn btn-info" type="submit">
						<i class="bi bi-search"></i>
					</button>
				</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</center>
	</div>

	<br><br>

	<div class="container" style="background-color: #f6f6f6; border-radius: 10px;">
		<h3><p style="text-align: center;"><b>Los más vistos</b></p></h3>
		<div class="row">
			<section class="regular slider" style="margin-top: 0px;">
				<div>
					<img src="https://cdn.pixabay.com/photo/2019/04/14/13/36/scam-4126798_1280.jpg" width="10px" height="200px">
				</div>
				<div>
					<img src="https://media.istockphoto.com/id/1386179512/es/foto/hacker-de-computadora-robar-datos-de-un-ordenador-port%C3%A1til.jpg?s=1024x1024&w=is&k=20&c=ktaZxrwKuOWqdbr0wXieo5v8IbGc_1Lzwk7PM4VQs0E=" width="10px" height="200px">
				</div>

				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
			</section>

		</div>
	</div>


	<br><br>

	<div class="container" style="background-color: #f6f6f6; border-radius: 10px;">
		<h3><p style="text-align: center;"><b>Animacion</b></p></h3>
		<div class="row">
			<section class="regular slider" style="margin-top: 0px;">
				<div>
					<img src="https://cdn.pixabay.com/photo/2019/04/14/13/36/scam-4126798_1280.jpg" width="10px" height="200px">
				</div>
				<div>
					<img src="https://media.istockphoto.com/id/1386179512/es/foto/hacker-de-computadora-robar-datos-de-un-ordenador-port%C3%A1til.jpg?s=1024x1024&w=is&k=20&c=ktaZxrwKuOWqdbr0wXieo5v8IbGc_1Lzwk7PM4VQs0E=" width="10px" height="200px">
				</div>

				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
				<div>
					<img src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/7XMYKT2MPBFE5JTRNV4LB34JLI.png" width="10px" height="200px">
				</div>
			</section>

		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<script src="https://kenwheeler.github.io/slick/slick/slick.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).on('ready', function() {

			$(".regular").slick({
				dots: true,
				infinite: true,
				slidesToShow: 6,
				slidesToScroll: 6
			});

		});
	</script>
</body>
</html>
