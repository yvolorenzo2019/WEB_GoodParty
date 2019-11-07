<?php
session_start();
 try { 

    $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
 
     $codigo = $_POST['codigo'];
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
        
     $query=" UPDATE tb_produto set nm_produto='$nomeProduto',descri='$text',valor='$preco',tipo_quantidade='$quantidade',url_img='$local' where cd_produto = $codigo ";
        
     mysqli_query($conecta,$query) or die(mysqli_error($conecta));
  
     }catch (Exception $e ) {
        echo "0";
        
    }
?>