<?php
    try {
       $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
    
        
       //Consultando banco de dados
    $query =  "SELECT U.telefone,U.email,U.nm_usuario,U.url ,U.sg_estado,U.endereco FROM tb_usuario AS U INNER JOIN tb_pedido AS PE ON U.cd_usuario = PE.id_usuario INNER JOIN tb_produto AS P ON P.cd_produto = PE.id_produto WHERE stts = 2 "; 
                  
    $resultado = mysqli_query($conecta, $query);
    $registro = array(
       'contato'=>array()
    );  
    $i = 0;
    while($linha = mysqli_fetch_assoc($resultado)){
      $registro['contato'][$i] = array(
        'email' => $linha['email'],
        'telefone' => $linha['telefone'],
        'nomeUsuario' => $linha['nm_usuario'],
        'fotoUsuario' => $linha['url'],
        'sg_estado' => $linha['sg_estado'],
        'endereco' => $linha['endereco'],
      );
      $i++;
    }
    
    //Passando vetor em forma de json
    echo json_encode($registro);
 
    } catch (Exception $e ) {
        echo "Erro ao buscar: ".$e;
    }
?>