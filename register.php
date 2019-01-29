<?php
    include_once './mysql.php';

    //  Realiza a busca na base de dados
    $con = new Conexao();
    $link = $con->conexao();

    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $cartao = isset($_POST['cartao']) ? $_POST['cartao'] : '';
    $rua = isset($_POST['rua']) ? $_POST['rua'] : '';
    $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
    $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    
	$query = "CALL inserirHosp('$cpf', '$nome', '$sobrenome', '$email', '$cartao', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";
    //$query = "INSERT INTO hospede(`cpf`, `nome`, `sobrenome`, `email`, `cartao`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`)
    //          VALUES ('$cpf', '$nome', '$sobrenome', '$email', '$cartao', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado');";
    
    $sql = $link->prepare($query);
    
    if($sql->execute()){
        echo "<script language= "."JavaScript".">
                alert('Sucesso!');
                location.href="."'booknow.php'".";
              </script>";
    } else {
        echo "<script language= "."JavaScript".">
                alert('Error!');
                location.href="."'cadastrar.php'".";
              </script>";
    }
 
?>