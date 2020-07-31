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
	<link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/cssresponsivo.css">	
</head>
<body>
	<div class="Menu">
		<div class="ImageSlogan">
			<a href="index.php">
				<img width="150" height="50" src="image/sloganPrincipal.png">
			</a>
		</div>
		<div class="Links">

			<?php 
			if(isset($_SESSION['usuarios'][0])) {
				if(isset($_SESSION['usuarios'][1]) == 1){ ?>
					<a href="userPage.php"><?php echo $_SESSION['usuarios'][0]; ?></a>
					<a href="admPage.php">ADM</a>
		<?php	} else { ?>
					<a href="userPage.php"><?php echo $_SESSION['usuarios'][0]; ?></a>	
	    <?php 	}
	    	} ?>

			<a href="#">O que é RPG?</a>
			<a href="#">Como Jogar</a>
			<a href="#">Quem Somos</a>
			<a href="#">Contato</a>

			<?php if(isset($_SESSION['usuarios'])){ ?>
				<a href="sair.php">Sair</a>
			<?php } else { ?>
				<a href="login.php">Entrar</a>
			<?php } ?>

			<a href="download.php" class="LinkBotao">Download</a>
		</div>
	</div>