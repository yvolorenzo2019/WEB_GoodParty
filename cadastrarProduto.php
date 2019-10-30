<?php
    try {
        $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
                             
        $nomeProduto = $_POST['nome'];
        $text = $_POST['text'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        if($_FILES['foto']['name'] != ''){
            $test = explode('.', $_FILES['foto']['name']);
            $extensao = end($test);
            if($extensao == "jpg" || $extensao == "jpeg" || $extensao == "png"){
                $nome = rand(100,9999).'.'.$extensao;
                $local = 'foto/'.$nome;
                move_uploaded_file($_FILES['foto']['tmp_name'], $local);
            }
        } 

        $query = "insert into tb_produto (nm_produto,descri,valor,url_img,tipo_quantidade) values ('$nomeProduto','$text','$preco','$local','$quantidade')";

        mysqli_query($conecta,$query) or die(mysqli_error($conecta));
        
    } catch (Exception $e ) {
        echo "Erro ao cadastrar: ".$e;
    }