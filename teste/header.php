	<script type="text/javascript" src="view/js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		   $(".Deletar").click(function(event) {
		      var apagar = confirm('Deseja realmente excluir este registro?');
		      if (apagar){			
		      }else{
		         event.preventDefault();
		      }	
		   });
		});
	</script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/cssGridLayout.css">
	<link rel="stylesheet" type="text/css" href="css/cssFooter.css">
	<link rel="shortcut icon" href="image/icon.ico">	
</head>
<body>

	<header class="Header">
		<div class="ImageSlogan">
			<a href="index.php">
				<img width="150" height="50" src="image/sloganPrincipal.png">
			</a>
		</div>
		<nav>
			<ul class="Menu Links">
				<li class="Link">
					<a href="rpg.php">O que é RPG?</a>
				</li>
				<li class="Link">
					<a href="comojogar.php">Como Jogar</a>
				</li>
				<li class="Link">
					<a href="download.php">Download</a>
				</li>
				<li>
					<div class="dropdown Link">
						<a href="#">Contato</a>
						<div class="dropdown-content Link">
							<a href="quemsomos.php">Quem Somos</a>
							<a href="contato.php">Fale Conosco</a>
						</div>	
					</div>					
				</li>
				<li>
					<div class="dropdown">
						<button class="LinkBotao">
					<?php if(isset($_SESSION['usuarios'])) {
							echo $_SESSION['usuarios'][0];
						} else { ?>
								<a href="login.php">Entrar</a>
				  <?php } ?>	
						</button>
						<div class="dropdown-content Link">
							 <?php if(isset($_SESSION['usuarios'])){ ?> <a href="userPage.php">Perfil</a> <?php } ?>
							 <?php if(isset($_SESSION['usuarios']) && $_SESSION['usuarios'][1] == 1){ ?> <a href="admPage.php">Administrador</a> <?php } ?>		
							<?php if(isset($_SESSION['usuarios'])){ ?> <a href="model/sair.php">Sair</a> <?php } ?>
						</div>
					</div>					
				</li>	
			</ul>
		</nav>
	</header>