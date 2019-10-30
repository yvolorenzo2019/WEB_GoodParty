<?php
session_start();
 try { 

 
     $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
 
 $email = $_POST['email'];
 $senha = $_POST['senha'];
 $senhaCriptografada = md5($senha);
 
 /* VERIFICANDO SE O USUARIO E SENHA REALMENTE EXISTEM */
  $query=" SELECT 1 as logado FROM tb_usuario WHERE email = '$email' AND senha = '$senhaCriptografada'";
        
    $resultado = mysqli_query($conecta,$query);
    
    $logado = "0";
    while($row = $resultado->fetch_assoc()) {
       $logado = $row['logado'];
    }
    /* CASO O USUARIO EXISTA O LOGIN SERA IGUAL A 1  E SERA FEITA A VERIFICAÇÃO SE ELE É CLIENTE OU VENDEDOR */
    if($logado == "1")
    {
       $queryVerificaVendedor = " SELECT 1 as cliente FROM tb_usuario WHERE email = '$email' AND senha = '$senhaCriptografada' AND nivel = 'Comprador' ";
       

       $resultado2 = mysqli_query($conecta,$queryVerificaVendedor);
       
       while($row = $resultado2->fetch_assoc()) {
       $cliente = $row['cliente'];
       
       /* SE CLIENTE FOR IGUAL A 1 ELE SERA COMPRADOR , ENTÃO SERA = 1 E VAI SER DIRECIONADO PARA PAGINA DE COMPRADOR */
        if($cliente == "1"){
          echo "Bem vindo de volta !" ;
        }
        /* SE CLIENTE FOR DIFERENTE DE 1 ELE SERA VENDEDOR , ENTÃO SERA = 1 E VAI SER DIRECIONADO PARA PAGINA DE VENDEDOR */
          else{
               echo "2";
          }
        }  
       
      /* CASO O  LOGIN DE DIFERENTE DE 1 ELE NÃO EXISTIRA */
    } else {

        echo "Usuario Não Existe :/";
    }
    
    $linhas = mysqli_num_rows($resultado);
  
     }catch (Exception $e ) {
        echo "0";
        
    }
?>