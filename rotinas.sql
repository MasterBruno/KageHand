--  Triggers --


--  Atualiza dívida --
DROP TRIGGER trg_AtualDivida;
DELIMITER / 
CREATE TRIGGER trg_AtualDivida BEFORE INSERT ON reserva
FOR EACH ROW
BEGIN
	DECLARE valor DOUBLE;
    DECLARE cod INT;

	SELECT h.cod_hospede, tq.valor_quarto 
    INTO cod, valor
    FROM hospede h, reserva r, quarto q, tipo_quarto tq
    WHERE h.cod_hospede = r.cod_hospede
    AND r.cod_quarto = q.cod_quarto
    AND q.cod_tipoQ = tq.cod_tipoQ;
    
	UPDATE hospede 
    SET divida = divida + valor
    WHERE cod_hospede = cod;
END /


--  Store Procedure --

--  Deleta Hospede -- 
DELIMITER /
CREATE PROCEDURE sp_apagarHosp(CPF varchar(14))
BEGIN
	DECLARE cod INT;
    
    SELECT h.cod_hospede INTO cod 
    FROM hospede h
    WHERE h.cpf LIKE CPF;
	
    DELETE FROM reserva
    WHERE cod_hospede = cod;
    
    DELETE FROM hospede
    WHERE cod_hospede = cod;
END /
CALL sp_apagarHosp('123.456.789-01');

--  Inserir Hospede --
DELIMITER /
CREATE PROCEDURE sp_inserirHosp(cpf varchar(14),
  senha varchar(16),
  nome varchar(30),
  sobrenome varchar(30),
  email varchar(30),
  cartao varchar(19),
  rua varchar(30),
  numero int(11),
  complemento varchar(15),
  bairro varchar(30),
  cidade varchar(30),
  estado varchar(2))
BEGIN
	INSERT INTO hospede(`cpf`, `nome`, `sobrenome`, `email`, `cartao`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`)
              VALUES (cpf, nome, sobrenome, email, cartao, rua, numero, complemento, bairro, cidade, estado);
END /


-- Function --
DELIMITER /
CREATE FUNCTION f_existeCPF(CPF varchar(14)) RETURNS INT
BEGIN
	DECLARE result INT;
    
    SELECT cod_hospede INTO result 
    FROM hospede
    WHERE cpf LIKE CPF;
    
    RETURN result;
END /

SELECT f_existeCPF('123.456.789-03');