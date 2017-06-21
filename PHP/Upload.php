<!DOCTYPE html>
<!--Page Galdino-->
<html>
<head>
<?php include('iConecta.php');
?>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body onload="carregar()">
<div class="container">
<?php
$PHP_SELF = null;
 
include 'iConecta.php';
//Diretório aonde ficará os arquivos
$dir = "IMG/Produto01/";

 
//Extensões permitidas
$ext = array("gif","jpg","png");
 
//Quant. de campos do tipo FILE
$campos = 7;
 
//Formulário
echo '<h1>Selecione as imagens desejadas</h1>';
echo '<h3>Voce poderá selecionar até 6 imagens para cada produto</h3>';
echo '<form method="post" action="'.$PHP_SELF.'" enctype="multipart/form-data">
<div class="container">  
    <div class="col-sm-6 col-md-4">
    
    <label for="">Nome do produto:</label><input name="nome_produto" required class="form-control" type="text" placeholder="Nome Produto" />

      <label for="comment">Descrição:</label>
      <textarea class="form-control" rows="5" name="descricao_produto" ></textarea>
    
    <div><label>Quantidade de IMG:</label><select id="slcQuant">
            <option value ="0" onload="carregar()" selected>Selecione</option>
            <option value ="1" onclick="mostrar()"> 1 </option>
            <option value ="2" onclick="mostrar2()"> 2 </option>
            <option value ="3" onclick="mostrar3()"> 3 </option>
            <option value ="4" onclick="mostrar4()"> 4 </option>
            <option value ="5" onclick="mostrar5()"> 5 </option>
            <option value ="6" onclick="mostrar6()"> 6 </option>
        </select>
</div>
    
   
 IMG Principal <small>(Obrigatório):</small> <input type="file" name="file[]" id="Princi">
 
 <div id="Um" name="Um">Arquivo: <input type="file" name="file[]"></div>
 
 <div id="Dois" name="Dois">Arquivo: <input type="file" name="file[]"></div>
 
 <div id="Tres" name="Tres">Arquivo: <input type="file" name="file[]"></div>
 
 <div id="Quatro" name="Qautro">Arquivo: <input type="file" name="file[]"></div>
 
 <div id="Cinco" name="Cinco">Arquivo: <input type="file" name="file[]"></div>
 
 <div id="Seis" name="Seis">Arquivo: <input type="file" name="file[]"></div>
 
 <input type="submit" name="submit" value=" Cadastrar " onclick="validar();">
 </form>';
 
  
//Se for enviado
if (isset($_POST['submit'])) {
$Nome = $_POST['nome_produto'];
$Descricao = $_POST['descricao_produto'];

 
//Obtendo info. dos arquivos
$f_name = $_FILES['file']['name'];
$f_tmp = $_FILES['file']['tmp_name'];
$f_type = $_FILES['file']['type'];
#$_UP['tamanho'] = 1024 * 1024 * 2;
 
 
//Contar arquivos enviados
$cont=0;
 
//Repetindo de acordo com a quantidade de campos FILE
for($i=0;$i<$campos;$i++){
 
//Pegando o nome
$name = $f_name[$i];


//Verificando se o campo contem arquivo
  if ( ($name!="") and (is_file($f_tmp[$i])) and (in_array(substr($name, -3),$ext)) ) {
     
    if ($cont==0) {
      echo "<b><br>Arquivo(s) enviados:
</b>";
    }
      echo $name." - ";
      #echo $dir.$name;
 
      //Movendo arquivo's do upload
      $up = move_uploaded_file($f_tmp[$i], $dir.$name);
      
$img_01 = $_POST['Um'];
$img_02 = $_POST['Dois'];
$img_03 = $_POST['Tres'];
$img_04 = $_POST['Quatro'];
$img_05 = $_POST['Cinco'];
$img_06 = $_POST['Seis'];
              $insert = ("INSERT INTO Cadastro (Nome_Produto,Descricao_Produto,Caminho_IMG,img_01,img_02,img_03,img_04,img_05,img_06) values ('$Nome','$Descricao','$dir$name','$img_01','$img_02','$img_03','$img_04','$img_05','$img_06')");
              $sql_ins = mysqli_query($conn,$insert) or die ("Não foi possivel salvar no banco");
        //Status
        if ($up==true):
            echo  "<i><span class='label label-primary'>Enviado!</span></i>";
              $cont++;
              
              
        else:
            echo "<i>Falhou!</i>";
        endif;
 
      echo "
";
  }
 
}
 
echo ($cont!=0) ? "<br><i>Total de arquivos enviados: </i>".$cont : "<br><span class='label label-danger'>Nenhum arquivo foi enviado!</span> </div>";
}
?>
    
    <script>
        function mostrar(){
            valor = document.getElementById('slcQuant').value;
            //alert(valor);
             if(valor == 1){
                document.getElementById('Um').style.display = 'block';
                document.getElementById('Dois').style.display = 'none';
                document.getElementById('Tres').style.display = 'none';
                document.getElementById('Quatro').style.display = 'none';
                document.getElementById('Cinco').style.display = 'none';
                document.getElementById('Seis').style.display = 'none';
            }
        }
        function mostrar2(){
            valor = document.getElementById('slcQuant').value;
            if(valor == 2){
                document.getElementById('Um').style.display = 'block';
                document.getElementById('Dois').style.display = 'block';
                document.getElementById('Tres').style.display = 'none';
                document.getElementById('Quatro').style.display = 'none';
                document.getElementById('Cinco').style.display = 'none';
                document.getElementById('Seis').style.display = 'none';
            }
        }
        function mostrar3(){
            valor = document.getElementById('slcQuant').value;
            if(valor == 3){
                document.getElementById('Um').style.display = 'block';
                document.getElementById('Dois').style.display = 'block';
                document.getElementById('Tres').style.display = 'block';
                document.getElementById('Quatro').style.display = 'none';
                document.getElementById('Cinco').style.display = 'none';
                document.getElementById('Seis').style.display = 'none';
            }
        }
        function mostrar4(){
            valor = document.getElementById('slcQuant').value;
            //alert(valor);
            if(valor == 4){
                document.getElementById('Um').style.display = 'block';
                document.getElementById('Dois').style.display = 'block';
                document.getElementById('Tres').style.display = 'block';
                document.getElementById('Quatro').style.display = 'block';
                document.getElementById('Cinco').style.display = 'none';
                document.getElementById('Seis').style.display = 'none';
            }
        }
        function mostrar5(){
            valor = document.getElementById('slcQuant').value;
            if(valor == 5){
                document.getElementById('Um').style.display = 'block';
                document.getElementById('Dois').style.display = 'block';
                document.getElementById('Tres').style.display = 'block';
                document.getElementById('Quatro').style.display = 'block';
                document.getElementById('Cinco').style.display = 'block';
                document.getElementById('Seis').style.display = 'none';
            }
        }
        function mostrar6(){
            valor = document.getElementById('slcQuant').value;
             if(valor == 6){
                document.getElementById('Um').style.display = 'block';
                document.getElementById('Dois').style.display = 'block';
                document.getElementById('Tres').style.display = 'block';
                document.getElementById('Quatro').style.display = 'block';
                document.getElementById('Cinco').style.display = 'block';
                document.getElementById('Seis').style.display = 'block';
            }
            
        }
        function carregar(){
            valor = document.getElementById('slcQuant').value;
            //alert(valor);
             if(valor == 0){
                document.getElementById('Um').style.display = 'none';
                document.getElementById('Dois').style.display = 'none';
                document.getElementById('Tres').style.display = 'none';
                document.getElementById('Quatro').style.display = 'none';
                document.getElementById('Cinco').style.display = 'none';
                document.getElementById('Seis').style.display = 'none';
            }
            
        }
    function validar(){
        Nome = document.getElementById('Name').value;
        Desc = document.getElementById('Descr').value;
        alert('teste');
        if(Nome == ""){
            alert('Preencher nome do produto.');
        }
        if(Desc == ""){
            alert('Preencher descrição do produto.');
        }
    }
    
    
    </script>
        
</div>
</body>
</html>