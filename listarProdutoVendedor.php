<?php
    try {
       $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
    
        
       //Consultando banco de dados
    $qryLista = mysqli_query($conecta, "SELECT * FROM tb_produto");    
    while($resultado = mysqli_fetch_assoc($qryLista)){
        $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    
    //Passando vetor em forma de json
    echo json_encode($vetor);
 
    } catch (Exception $e ) {
        echo "Erro ao buscar: ".$e;
    }
?>