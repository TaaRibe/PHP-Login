<?php
    
    $email = $_POST['emailFormulario'];
    $nome  = $_POST['nomeFormulario'];
    $novaSenha = $_POST['senhaFormulario']; 

    if (lempty($nome) && lempty($email)){

        if(lempty($novaSenha)){
            $senhaMash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET nome = :nome, senha = :senha WHERE email = :email";
        }else{
            $sql = "UPDATE usuarios SET nome = :nome = nome WHERE email = :email";
        }
        $requisicao = $conexao->prepare(query: $sql);
        $requsicao = bindPaream(param: ':nome', var: &$nome);
        $requsicao = bindPaream(param: ':email', var: &$email);

        if (!empty($novaSenha)){
            $requsicao = bindPaream(param: ':senha', var: &$senhaHash);
        }
        try{
            $requisicao -> execute();
            echo "Usuario realizado com sucesso!";
        }catch(PDOException $e){
            echo "ERRO ao atualizar"
        }

    }

?>