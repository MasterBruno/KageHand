<?php
    include_once './mysql.php';

    //  Realiza a busca na base de dados
    $con = new Conexao();
    $link = $con->conexao();

    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $data = isset($_POST['arrival_date']) ? $_POST['arrival_date'] : '';
    $cod_quarto = isset($_POST['Quarto']) ? $_POST['Quarto'] : '';
    $hora = "18:00";

    $query = "SELECT * FROM hospede WHERE ((cpf) LIKE (:keyword)) LIMIT 1;";
    $sql = $link->prepare($query);
    $sql->bindParam(':keyword', $cpf, PDO::PARAM_STR);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    $cod_hospede = $result['cod_hospede'];

    $query = "INSERT INTO `reserva`(`dataI_reserva`, `cod_hospede`, `cod_quarto`)
              VALUE (:dataI, :cod_hosp, :cod_quarto);";
    
    $sql = $link->prepare($query);
    
    $sql->bindParam(':dataI', $data);
    $sql->bindParam(':cod_hosp', $cod_hospede);
    $sql->bindParam(':cod_quarto', $cod_quarto);
    
    if($sql->execute()){
        echo "<script language= "."'JavaScript'".">
                alert('Sucesso!');
                location.href="."'booknow.php'".";
              </script>";
    } else {
        echo "<script language= "."'JavaScript'".">
                alert('Error!');
                location.href="."'booknow.php'".";
              </script>";
    }
 
?>