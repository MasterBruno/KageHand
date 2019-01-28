<?php
    include_once './mysql.php';

    //  Realiza a busca na base de dados
    $con = new Conexao();
    $link = $con->conexao();

    $keyword = $_POST['keyword'];

    $query = "SELECT * FROM hospede WHERE ((cpf) LIKE (:keyword)) LIMIT 1;";
    
    $sql = $link->prepare($query);
    
    $sql->bindParam(':keyword', $keyword, PDO::PARAM_STR);

    $sql->execute();
    
    $list = $sql->fetch(PDO::FETCH_ASSOC);

    if ($list != null){
        echo '
            <div class="row">
                <div class="col-sm-12 form-group">                          
                    <label for="">Nome</label>
                    <div style="position: relative;">
                        <span class="fa fa-name icon" style="position: absolute; right: 10px; top: 10px;"></span>
                        <input type="text" class="form-control" id="nome" name="nome" value="'. $list['nome'] . " " . $list['sobrenome'] .'" disabled/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">                          
                    <label for="">Data de Entrada</label>
                    <div style="position: relative;">
                        <span class="fa fa-calendar icon" style="position: absolute; right: 10px; top: 10px;"></span>
                        <input type="date" class="form-control" id="arrival_date" name="arrival_date" onBlur="verificaData()"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                <label for="">Tipo do Quarto</label>
                <select type="checkbox" name="" id="tipoQ" class="form-control" onBlur="verificaDisp()">
                    <option value="" selected disabled>Selecione...</option>';
                    //  Realiza a busca na base de dados
                    $con = new Conexao();
                    $link = $con->conexao();
                    
                    $query = "SELECT * FROM tipo_quarto ORDER BY cod_tipoQ;";
                    
                    $sql = $link->prepare($query);
                    
                    $sql->execute();
            
                    $list = $sql->fetchAll();

                    if ($list != null){
                        foreach ($list as $rs) {
                        if($rs['cod_tipoQ'] == 1) {
                            echo '<option value="'. $rs['cod_tipoQ'] .'">Luxo</option>';
                        } else {
                            echo '<option value="'. $rs['cod_tipoQ'] .'">Plus</option>';
                        }
                        }
                    } else {
                        echo '<option value="" disabled>Sem Quartos</option>';
                    }
        echo '
                </select>
            </div>
                <div class="col-md-6 form-group">
                    <label for="nQuarto">Nº do Quarto</label>
                    <select name="Quarto" id="nQuarto" class="form-control">  
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                <label for="message">Deixe uma observação, caso necessário:</label>
                <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                <input type="submit" value="Reserve Agora" class="btn btn-primary">
                </div>
            </div>
        </div>
        ';
    } else {
        echo 'Este CPF não consta na base de dados. <a href="cadastrar.php">Cadastra-se.</a>';
    }
?>