<?php
    include_once './mysql.php';

    //  Realiza a busca na base de dados
    $con = new Conexao();
    $link = $con->conexao();

    $data = '%'.$_POST['data'].'%';
    $tipoQ = $_POST['tipoQ'];

	$query = "SELECT * FROM quarto WHERE (cod_tipoQ = $tipoQ) ORDER BY cod_tipoQ;";

	$sql = $link->prepare($query);
    
    $sql->bindParam(':keyword', $keyword, PDO::PARAM_STR);

    $sql->execute();
    
    $list = $sql->fetchAll();

    if ($list != null){
        foreach ($list as $rs) {
            // add new option
			echo '<option value="'. $rs['cod_quarto'] .'">'. $rs['cod_quarto'] .'</option>';
        }
    } else {
		echo '<option value="" disabled>Não há Quartos!</option>';
    }
?>