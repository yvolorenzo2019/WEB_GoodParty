<?php
    try {
       $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
    
        
       //Consultando banco de dados
    $query =  "SELECT P.tipo_quantidade,U.endereco,U.sg_estado,PE.id_produto,PE.id_usuario,U.nm_usuario,U.url,P.nm_produto,P.url_img,PE.quantidade,PE.stts ,PE.cd_pedido
               FROM tb_usuario AS U 
               INNER JOIN tb_pedido AS PE 
                  ON U.cd_usuario = PE.id_usuario 
               INNER JOIN tb_produto AS P
                  ON P.cd_produto = PE.id_produto;"; 
                  
    $resultado = mysqli_query($conecta, $query);
    $registro = array(
       'solicitacao'=>array()
    );  
    $i = 0;
    while($linha = mysqli_fetch_assoc($resultado)){
      $registro['solicitacao'][$i] = array(
        'codigoProduto' => $linha['id_produto'],
        'codigoUsuario' => $linha['id_usuario'],
        'cd_pedido' => $linha['cd_pedido'],
        'nomeUsuario' => $linha['nm_usuario'],
        'fotoUsuario' => $linha['url'],
        'nomeProduto' => $linha['nm_produto'],
        'fotoProduto' => $linha['url_img'],
        'quantidade' => $linha['quantidade'],
        'tipo_quantidade' => $linha['tipo_quantidade'],
        'sg_estado' => $linha['sg_estado'],
        'endereco' => $linha['endereco'],
        'stts' => $linha['stts'],
      );
      $i++;
    }
    
    //Passando vetor em forma de json
    echo json_encode($registro);
 
    } catch (Exception $e ) {
        echo "Erro ao buscar: ".$e;
    }
?>