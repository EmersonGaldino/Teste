
<!DOCTYPE html>
<!--Page Galdino-->
<html>
<head>
<?php include('iConecta.php')?>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body >
<div class="container">
 <form enctype="multipart/form-data" action="Upload.php" method="post">
     
      
  
<?php
$consulta =("SELECT * FROM `Cadastro` WHERE 1 order by ID_Produto DESC LIMIT 3 ");
	$exibe = mysqli_query($conn,$consulta);
        
        
        if(mysqli_num_rows($exibe)>0){
        echo '<div style="width:50%;padding:5px;">
	<table class="table table-hover table-striped table-bordered">
		<tr class="info">
		<td>ID</td>
		<td>Nome</td>
		<td>Descrição do produto</td>
                <td>Imagen</td>
		</tr>';  
        
        while ($row = mysqli_fetch_array($exibe)){
	
        $Codigo = $row['ID_Produto'];	
	$Nome = $row['Nome_Produto'];
        
        
        echo '<tr class="warning">';
		echo '<td>'.$row['ID_Produto'].'</td>';
		echo'<td>'.$row['Nome_Produto'].'</td>';
		echo'<td>'.$row['Descricao_Produto'].'</td>';
                echo '<td><img src="'.$row['Caminho_IMG'].'" width="150" height="120"></td>';
                echo '</tr>';
	
	
        }
        echo '</table> </div>';
      
        }
 else {
     echo "Não há produtos cadastrados";
     
 }
 echo '<div><input type="submit" value="Cadastrar produtos"/></div>';
 
 $consulta =("SELECT * FROM `Cadastro` WHERE 1 order by ID_Produto DESC limit 4  ");
 $exibe = mysqli_query($conn,$consulta);
if(mysqli_num_rows($exibe)>0){
    $Descricao = $row['Descricao_Produto'];
    $Foto = $row['Caminho_IMG'];
   
    while ($row = mysqli_fetch_array($exibe)){
echo '<div class="row">
        <div class="col-sm-9 col-md-3">
            <div class="thumbnail"> 
     <a href="#ModalProduto1" data-toggle="modal" data-target="#ModalProduto1"><img src='.$row['Caminho_IMG'].' alt="Imagem Pequena"></a>
                <div class="caption">
        <h3>'.$row['Nome_Produto'].'</h3>
        <p>'.$row['Descricao_Produto'].'</p>
        <p><a href="#" class="btn btn-primary" role="button" >Comprar</a></p>
      </div>
    </div>
  </div>';

    }
    echo '</div>';
}
?>

</form>
<!--<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a href="#ModalProduto1" data-toggle="modal" data-target="#ModalProduto1"><img src="IMG/Produto01/prod0101.jpg" alt="Imagem Pequena"></a>

      <div class="caption">
        <h3><?php echo $Nome;?></h3>
        <p><?php echo $Descricao?></p>
        <p><a href="#" class="btn btn-primary" role="button" >Comprar</a></p>
      </div>
    </div>
  </div>
</div>-->

<div class="modal fade" id="ModalProduto1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $Nome ?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
        
				<div class="col-xs-6 col-md-3">	
    				
                            <img src="IMG/Produto01/prod0101.jpg" class="thumbnail" width="570" height="380" id="IMGPrincipal">
  				</div>
    				
		  </div>
      </div>
           
      <div class="modal-footer">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
        
    <div class="carousel-inner">
    <div class="item active">          
        <div class="col-xs-6 col-md-3 ">
    <a href="#" class="thumbnail">
        <img src="IMG/Produto01/prod0101.jpg" onclick="TrocarFoto2()">
    </a>
        </div>
        
        <div class="col-xs-6 col-md-3 ">
    <a href="#" class="thumbnail">
        <img src="IMG/Produto01/prod0102.jpg" onclick="TrocarFoto3()">
    </a>
  </div>
        
        <div class="col-xs-6 col-md-3 ">
    <a href="#" class="thumbnail">
        <img src="IMG/Produto01/prod0109.jpg" onclick="TrocarFoto8()">
    </a>
  </div>
        
        <div class="col-xs-6 col-md-3 ">
    <a href="#" class="thumbnail">
        <img src="IMG/Produto01/prod0103.jpg" onclick="TrocarFoto4()">
    </a>
  </div>
  </div>
        
    
  
   <div class="item">      
  <div class="col-xs-6 col-md-3 ">
    <a href="#" class="thumbnail">
        <img src="IMG/Produto01/prod0104.jpg" onclick="TrocarFoto5()">
    </a>
  </div>
       
       <div class="col-xs-6 col-md-3 ">
    <a href="#" class="thumbnail">
        <img src="IMG/Produto01/prod0105.jpg" onclick="TrocarFoto6()">
    </a>
  </div>
       
       <div class="col-xs-6 col-md-3 ">
    <a href="#" class="thumbnail">
        <img src="IMG/Produto01/prod0106.jpg" onclick="TrocarFoto7()">
    </a>
  </div>
       
       <div class="col-xs-6 col-md-3 ">
    <a href="#" class="thumbnail">
        <img src="IMG/Produto01/prod0108.jpg" onclick="TrocarFoto9()">
    </a>
  </div>
   </div>
        
    
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      </div>
    </div>
  </div>
</div>
    <script>
        function TrocarFoto2(){
        document.getElementById('IMGPrincipal').src = "IMG/Produto01/prod0101.jpg"
      }
      function TrocarFoto3(){
        document.getElementById('IMGPrincipal').src = "IMG/Produto01/prod0102.jpg"
      }
      function TrocarFoto4(){
        document.getElementById('IMGPrincipal').src = "IMG/Produto01/prod0103.jpg"
      }
        function TrocarFoto5(){
        document.getElementById('IMGPrincipal').src = "IMG/Produto01/prod0104.jpg"
      }
      function TrocarFoto6(){
        document.getElementById('IMGPrincipal').src = "IMG/Produto01/prod0105.jpg"
      }
      function TrocarFoto7(){
        document.getElementById('IMGPrincipal').src = "IMG/Produto01/prod0106.jpg"
      }
      function TrocarFoto8(){
        document.getElementById('IMGPrincipal').src = "IMG/Produto01/prod0109.jpg"
      }
      function TrocarFoto9(){
        document.getElementById('IMGPrincipal').src = "IMG/Produto01/prod0108.jpg"
      }
      
      //Efeito chamativo no texto ou link
      function EnfeitarLinks() {
        id = document.getElementById("myModalLabel").style;
        if (typeof t == "undefined") t = 0;
          switch (t % 5) {
            case 0: {id.color = "#31F"; id.fontSize = "12px"; break}
            case 1: {id.color = "#33F"; id.fontSize = "13px"; break}
            case 2: {id.color = "#35F"; id.fontSize = "14px"; break}
            case 3: {id.color = "#37F"; id.fontSize = "15px"; break}
            case 4: {id.color = "#39F"; id.fontSize = "16px"; break}
         }
         t = setTimeout("EnfeitarLinks()", 150);
      }
    </script>


</div>
</body>
</html>