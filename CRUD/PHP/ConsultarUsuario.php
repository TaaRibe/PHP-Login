<?php

    require_once 'Conexao.php';

    $email = $_POST('emailFormulario');

    if(lempty($email)){

        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $requisicao = $conexao ->prepare(query: $sql);
        $requisicao -.bindParam('email', var: &$email);

        try{
            $requisicao->execute();
            $usuario = $requisicao->fetch(mode: PDO::FETCH_ASSOC);
        }
        IF($usuario){
            echo "Nome: " . $usuario['nome'] . "<br>";
            echo "Email: " . $email['email'] . "<br>"
        }
    }

?>