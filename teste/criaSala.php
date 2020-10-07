<?php 
	session_start();

	include("model/ConexaoDataBase.php");
	include("model/Pilha.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo $nomeUsuario; ?> - Roll and Play GENG</title>
<?php include("header.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form name="formCadastroFoto" action="lib/adicionaMidia.php" enctype="multipart/form-data" method="post">
					<div class="CenterTitulo">
						<span>IMAGENS</span><br>
					</div>
					<input type="file" name="imagem[]" multiple>
					<input type="submit" name="addImagem" value="Adicionar">
				</form>			
				<div>
					<?php if(isset($_SESSION['vericaUpload']) AND $_SESSION['vericaUpload'] == 1){
							echo "Upaload da imagem foi um sucesso!";
							unset($_SESSION['vericaUpload']);
					}
					if(isset($_SESSION['vericaUpload']) AND $_SESSION['vericaUpload'] == 0){
							echo "Não";
							unset($_SESSION['vericaUpload']);
					} ?>
				</div>
			</div>
			<div class="col-md-6">	
				<form name="formCadastroMusica" action="lib/adicionaMidia.php" enctype="multipart/form-data" method="post">
					<div class="CenterTitulo">
						<span>MÚSICAS</span><br>
					</div>
					<input type="file" name="musica[]" multiple>
					<input type="submit" name="addMusica" value="Adicionar">
				</form>
				<div>
					
				</div>
			</div>	
		</div>
	</div>


<?php include("footer.php"); ?>