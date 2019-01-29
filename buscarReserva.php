<?php
    include_once './mysql.php';

    //  Realiza a busca na base de dados
    $con = new Conexao();
    $link = $con->conexao();

    $cpf = $_POST['keyword'];
    $senha = $_POST['senha'];

    //  $query = "SELECT * FROM hospede WHERE ((cpf) = ('$cpf')) AND senha = '$senha' LIMIT 1;";
    $query = "SELECT r.dataI_reserva AS 'data', q.cod_quarto AS 'NQuarto', tq.valor_quarto AS 'Valor' FROM hospede h 
              INNER JOIN reserva r ON ((h.cpf) = ('$cpf')) AND h.senha = '$senha' AND h.cod_hospede = r.cod_hospede
              INNER JOIN quarto q ON r.cod_quarto = q.cod_quarto 
              INNER JOIN tipo_quarto tq ON q.cod_tipoQ = tq.cod_tipoQ;";

    $sql = $link->prepare($query);

    if ($sql->execute()){
        echo '
                    <div class="row">
                        <div class="col-md-12">
                        <h2 class="mb-5">Quadro de Reservas</h2>
                        <div class="card mb-3">
                            <div class="card-header">
                            <i class="fas fa-history"></i>
                            Histórico de Reservas
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Data</th>
                                        <th>Nº do Quarto</th>
                                        <th>Valor</th>
                                    </tr>
                                    </thead>
                                    <tbody>';
                                    while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){
                                        $dataI = new DateTime($rs['data']);
                                        $data = $dataI->format('d/m/Y');
                                        echo '
                                            <td>'.$data.'</td>
                                            <td>'.$rs['NQuarto'].'</td>
                                            <td>'.$rs['Valor'].'</td>
                                            </tr>
                                        ';
                                    }
        echo '
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            <div class="card-footer small text-muted col-md-12">Atualizado às '. date('H:i') .'</div>
                        </div>
                        </div>
                    </div>
        ';
    } else {
        echo '<h5>Este CPF não consta na base de dados. <a href="cadastrar.php">Cadastra-se.</a></h5>';
    }
?>