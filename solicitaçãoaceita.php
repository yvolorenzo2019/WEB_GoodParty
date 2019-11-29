<?php
session_start();
 try { 

    $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
 
     $codigo = $_POST['id_pedido'];
        
     $query=" UPDATE tb_pedido set stts= 'aceita' where cd_pedido = $codigo ";
        
     mysqli_query($conecta,$query) or die(mysqli_error($conecta));
  
     }catch (Exception $e ) {
        echo "0";
        
    }
?>