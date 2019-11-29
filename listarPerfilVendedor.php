<?php
    try {
       $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
    
        
       //Consultando banco de dados
    $query =  "SELECT cd_usuario,nm_usuario,url FROM tb_usuario WHERE cd_usuario = 66";   
    $resultado = mysqli_query($conecta, $query);
    $registro = array(
       'pessoa'=>array()
    );  
    $i = 0;
    while($linha = mysqli_fetch_assoc($resultado)){
      $registro['pessoa'][$i] = array(
        'codigo' => $linha['cd_usuario'],
        'nome' => $linha['nm_usuario'],
        'foto' => $linha['url'],
      );
      $i++;
    }
    
    //Passando vetor em forma de json
    echo json_encode($registro);
 
    } catch (Exception $e ) {
        echo "Erro ao buscar: ".$e;
    }
?>