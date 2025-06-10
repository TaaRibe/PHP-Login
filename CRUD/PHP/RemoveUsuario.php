<?php

    require_once 'Conexao.php';

    $email = $_POST('emailFormulario')

    if(empty($email)){

        $sql = "DELETE FROM usuario WHERE email = :email";

        $rquisicao = $conexao ->prepare(query: $sql);
        $requisicao ->bindParam(param: ':email', var: &$email);

        try{
            $requisicao->execute();
            if($requisicao->rowCount() > 0){
                echo "Usuario removido com exito";
            }else{
                echo "Usuario não existe";
            }catch{

            }

        }

    }else{
        echo "Digite um e-mail para remove algum usuario"
    }

?>