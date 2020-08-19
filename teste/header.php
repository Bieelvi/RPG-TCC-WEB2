	<script type="text/javascript" src="view/js/jquery.min.js"></script>
	<script type="text/javascript" src="view/js/script.js"></script>
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
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/cssGridLayout.css">	
</head>
<body>

	<section class="grid grid-template-areasUm">
		<div class="Teste Um">

				<a class="ImageSlogan" href="index.php">
					<img width="150" height="50" src="image/sloganPrincipal.png">
				</a>

			<div class="Links">
				<a href="#">O que é RPG?</a>
				<a href="#">Como Jogar</a>
				<a href="download.php">Download</a>
				
				<div class="dropdown">
					Contato
					<div class="dropdown-content">
						<a href="#">Quem Somos</a>
						<a href="#">Fale Conosco</a>
					</div>				
				</div>
				<div class="dropdown">
					<button class="LinkBotao">
					<?php if(isset($_SESSION['usuarios'])) {
							echo $_SESSION['usuarios'][0];
						} else { ?>
								<a href="login.php">Entrar</a>
				<?php   }	?>	
					</button>
					<div class="dropdown-content">
				  <?php if(isset($_SESSION['usuarios'])){ ?> <a href="userPage.php">Perfil</a> <?php } ?>		
				  <?php if(isset($_SESSION['usuarios']) && $_SESSION['usuarios'][1] == 1){ ?> <a href="admPage.php">Administrador</a> <?php } ?>		
				  <?php if(isset($_SESSION['usuarios'])){ ?> <a href="sair.php">Sair</a> <?php } ?>
					</div>
				</div>	
			</div>
		</div>
	</section>