<?php
    session_start();
 try { 

 
     $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
 
 $email = $_POST['email'];
 $senha = $_POST['senha'];
 $senhaCriptografada = md5($senha);
 
 /* VERIFICANDO SE O USUARIO E SENHA REALMENTE EXISTEM */
  $query=" SELECT cd_usuario ,nivel , email , senha FROM tb_usuario  WHERE email = '$email' AND senha = '$senhaCriptografada';";
       
    $resultado = mysqli_query($conecta,$query);
     
    if (mysqli_num_rows  ($resultado) > 0){
     
       $dados = mysqli_fetch_assoc($resultado);
       $usuario = array(
            'cd_usuario' => $dados['cd_usuario'],
             'email' => $dados['email'],
              'senha' => $dados['senha'],
                'nivel' => $dados['nivel'],
           );
         
          
         echo json_encode($usuario);
    }
  
     }catch (Exception $e ) {
        echo "0";
        
    }
?>