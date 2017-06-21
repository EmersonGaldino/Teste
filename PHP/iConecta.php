<?php
$banco = "Treinamento";
$senha = "123456";
$username = "sa";

	if(!($conn = mysqli_connect("localhost",$username,$senha))) {	
	#echo "Não foi possivel estabelecer uma conexão com o banco";
}
	if(!($con= mysqli_select_db($conn,$banco))) {
		echo "Não foi possivel estabelecer uma conexão com o banco";}
		else {
			#echo "Conexao efetuada com sucesso!!!";
			#echo "<h2> Registros </h2>";
			}
			
	

?>