<?php
    try {
        $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
                             
        $quantidade = $_POST['quantidade'];
        $id_produto = $_POST['id_produto'];

        $query = "insert into tb_pedido (stts,id_usuario,id_produto,quantidade) values ('pendente',67,$id_produto,$quantidade )";

        mysqli_query($conecta,$query) or die(mysqli_error($conecta));
        
    } catch (Exception $e ) {
        echo "Erro ao cadastrar: ".$e;
    }