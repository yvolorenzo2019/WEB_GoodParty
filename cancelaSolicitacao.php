<?php
session_start();
 try { 

    $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
 
     $codigo = $_POST['codigo'];
 
     echo "$codigo";
     
     $query=" Delete  FROM  tb_pedido where cd_pedido = $codigo ";
        
     mysqli_query($conecta,$query) or die(mysqli_error($conecta));
  
  
    echo "arquivo deletado " . $_POST['codigo'];
  
     }catch (Exception $e ) {
        echo "0";
        
    }
?>