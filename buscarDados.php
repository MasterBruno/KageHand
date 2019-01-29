<?php
    include_once './mysql.php';

    //  Realiza a busca na base de dados
    $con = new Conexao();
    $link = $con->conexao();

    $cpf = $_POST['keyword'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM hospede WHERE ((cpf) = ('$cpf')) AND senha = '$senha' LIMIT 1;";

    $sql = $link->prepare($query);

    $sql->execute();

    $rs = $sql->fetch(PDO::FETCH_ASSOC);

    if ($rs != null){
        echo '
                <div class="row">
                    <div class="col-md-12">
                    <h2 class="mb-5">Dados</h2>
                        <form action="register.php" method="post">
                            <div class="row">
                                <div class="col-sm-6 form-group">                          
                                    <label for="">CPF</label>
                                    <div style="position: relative;">
                                    <span class="fa fa-address-card icon" style="position: absolute; right: 10px; top: 10px;"></span>
                                    <input type="text" class="form-control" id="cpf" name="cpf" minlength="14" maxlength="14" OnKeyPress="formatar('.'###.###.###-##'.', this)" disabled value="'.$rs['cpf'].'"/>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">                          
                                    <label for="">Senha</label>
                                    <div style="position: relative;">
                                    <span class="fa fa-key icon" style="position: absolute; right: 10px; top: 10px;"></span>
                                    <input type="password" class="form-control" id="cpf" name="cpf" minlength="8" maxlength="16" value="'.$rs['senha'].'"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">                          
                                    <label for="">Nome</label>
                                    <div style="position: relative;">
                                    <span class="fa fa-name icon" style="position: absolute; right: 10px; top: 10px;"></span>
                                    <input type="text" class="form-control" id="nome" name="nome" value="'.$rs['nome'].'"/>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">                          
                                    <label for="">Sobrenome</label>
                                    <div style="position: relative;">
                                    <span class="fa fa-name icon" style="position: absolute; right: 10px; top: 10px;"></span>
                                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="'.$rs['sobrenome'].'"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control " name="email" value="'.$rs['email'].'">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="email">Cartão</label>
                                <input type="text" id="cartao" class="form-control " name="cartao" minlength="19" maxlength="19" OnKeyPress="formatar('.'####-####-####-####'.', this)" value="'.$rs['cartao'].'">
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="card-header text-center">Endereço</div><br>
                            <div class="form-row">
                                <div class="col-md-10">
                                <div class="form-label-group">
                                    <label for="inputRua">Rua</label>
                                    <input type="text" id="inputRua" class="form-control" name="rua" placeholder="Rua" name="rua" required="required" value="'.$rs['rua'].'">
                                </div>
                                </div>
                                <div class="col-md-2">
                                <div class="form-label-group">
                                    <label for="inputNumero">Número</label>
                                    <input type="text" id="inputNumero" class="form-control" name="numero" placeholder="Número" name="numero" required="required" value="'.$rs['numero'].'">
                                </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-4">
                                <div class="form-label-group">
                                    <label for="inputComplemento">Complemento</label>
                                    <input type="text" id="inputComplemento" class="form-control" placeholder="Complemento" name="complemento" value="'.$rs['complemento'].'">
                                </div>
                                </div>
                                <div class="col-md-8">
                                <div class="form-label-group">
                                    <label for="inputBairro">Bairro</label>
                                    <input type="text" id="inputBairro" class="form-control" name="bairro" placeholder="Bairro" name="bairro" required="required" value="'.$rs['bairro'].'">
                                </div>
                                </div>    
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="form-label-group">
                                        <label for="inputCidade">Cidade</label>
                                        <input type="text" id="inputCidade" class="form-control" name="cidade" placeholder="Cidade" name="cidade" required="required" value="'.$rs['cidade'].'">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <label for="inputEstado">Estado</label>
                                        <select class="col-md-12 form-control form-control" name="estado" id="inputEstado" placeholder="Estado">
                                        <option selected disabled="disabled">Estado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <div class="card-header text-center">Dívidas</div><br>
							<div class="form-row">
									<div class="col-md-12">
										<div class="form-label-group">
											<label for="inputDivida">Valor em dívidas</label>
											<input type="text" id="inputDivida" class="form-control" name="divida" placeholder="Rua" required="required" value="'.$rs['divida'].'" disabled>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
                            <div class="form-row">
                            <div class="col-md-6">
                                <input type="submit" value="Alterar Dados" class="btn btn-primary">
							</div>
							<div class="col-md-6">
                                <input type="submit" value="Excluir Cadastro" class="btn btn-danger">
							</div>
							</div>
                        </div>
                    </div>
                </div>
        ';
    } else {
        echo '<h5>Este CPF não consta na base de dados. <a href="cadastrar.php">Cadastra-se.</a></h5>';
    }
?>