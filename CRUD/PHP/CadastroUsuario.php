<?php
require_once 'Conexao.php';

    $email = $_POST['emailFormulario'];
    $nome  = $_POST['nomeFormulario'];
    $senha = $_POST['senhaFormulario']; 


    
    if(!empty($email) && !empty($nome) && !empty($senha)){
        
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    
        $sql = "INSERT INTO usuarios (email, nome, senha) VALUES (:email, :nome, :senha)";

       
        $requisicao = $conexao->prepare($sql);

        $requisicao->bindParam(':email', $email);
        $requisicao->bindParam(':nome', $nome);
        $requisicao->bindParam(':senha', $senhaHash);

        try{
            $requisicao->execute();
            echo 'Usuário cadastrado com sucesso!';
        }catch(PDOException $e){
            echo 'Erro ao cadastrar: ' . $e->getMessage();
        }

    }else{
        echo '<p style="color:red;">Preencha todos os campos. </p>';
    }
?>