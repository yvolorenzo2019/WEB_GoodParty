<?php
    try {
       $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
    
        
       //Consultando banco de dados
    $query =  "SELECT telefone,email,nm_usuario,url ,sg_estado,endereco FROM tb_usuario WHERE cd_usuario = 66 "; 
                  
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