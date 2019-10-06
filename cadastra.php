<?php
    try {
        $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
                             
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $complemento = $_POST['complemento'];
        $cpf = $_POST['cpf'];
        $cnpj = $_POST['cnpj'];
        $sg_estado = $_POST['estado'];
        $endereco = $_POST['endereco'];
        /*
        if($_FILES['foto']['name'] != ''){
            $test = explode('.', $_FILES['foto']['name']);
            $extensao = end($test);
            if($extensao == "jpg" || $extensao == "png"){
                $nome = rand(100,9999).'.'.$extensao;
                $local = 'foto/'.$nome;
                move_uploaded_file($_FILES['foto']['tmp_name'], $local);
            }
        } */
        echo $sg_estado;
        $query = "insert into tb_usuario (nm_usuario,telefone,email,senha,sg_estado,endereco,cpf,cnpj,complemento) values ('$nome','$telefone','$email','$senha','$sg_estado','$endereco','$cpf','$cnpj','$complemento')";

        mysqli_query($conecta,$query) or die(mysqli_error($conecta));
        //echo "Cadastro realizado com sucesso";
        //echo $query;
    } catch (Exception $e ) {
        echo "Erro ao cadastrar: ".$e;
    }
