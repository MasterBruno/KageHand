-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 28/01/2019 às 06:03
-- Versão do servidor: 10.1.37-MariaDB
-- Versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-03:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `KageHand`
--
DROP DATABASE IF EXISTS `KageHand`;
CREATE DATABASE IF NOT EXISTS `KageHand` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `KageHand`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta`
--

DROP TABLE IF EXISTS `conta`;
CREATE TABLE `conta` (
  `cod_conta` int(11) NOT NULL,
  `valor_conta` double(10,2) NOT NULL,
  `descricao_conta` varchar(30) NOT NULL,
  `quitado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta_produto`
--

DROP TABLE IF EXISTS `conta_produto`;
CREATE TABLE `conta_produto` (
  `cod_conta` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `desp_motel`
--

DROP TABLE IF EXISTS `desp_motel`;
CREATE TABLE `desp_motel` (
  `cod_despM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `desp_quarto`
--

DROP TABLE IF EXISTS `desp_quarto`;
CREATE TABLE `desp_quarto` (
  `cod_despQ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `hospede`
--

DROP TABLE IF EXISTS `hospede`;
CREATE TABLE `hospede` (
  `cod_hospede` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(16) DEFAULT '12345678',
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `cartao` varchar(19) NOT NULL,
  `rua` varchar(30) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(15) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(2) NOT NULL,
  `divida` double(10,2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `hospede`
--

INSERT INTO `hospede` (`cod_hospede`, `cpf`, `senha`, `nome`, `sobrenome`, `email`, `cartao`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES
(1, '123.456.789-00', '12345678', 'Rodolfo', 'Sousa', 'rsousa@email.com', '1234-5678-9123-4567', 'Campos Altos', 10, 'Apt.', 'Campo Belo', 'Londrina', 'MG'),
(2, '123.456.789-02', '12345678', 'Roldolfo', 'Soares', 'susa@email.com', '1234-5678-9123-4567', 'Garimpo', 10, 'Apt.', 'Centro', 'Londrina', 'MG'),
(3, '123.456.789-01', '12345678', 'Rodolfo', 'Santos', 'susa1@email.com', '1234-5678-9123-4567', 'Garimpo', 11, 'Apt.', 'Goleito', 'Londrina', 'MG');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `cod_produto` int(11) NOT NULL,
  `nome_produto` varchar(30) NOT NULL,
  `cod_tipoP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `quarto`
--

DROP TABLE IF EXISTS `quarto`;
CREATE TABLE `quarto` (
  `cod_quarto` int(11) NOT NULL,
  `cod_tipoQ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `quarto`
--

INSERT INTO `quarto` (`cod_quarto`, `cod_tipoQ`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE `reserva` (
  `cod_reserva` int(11) NOT NULL,
  `dataI_reserva` date NOT NULL,
  `horaE_reserva` time DEFAULT '19:00:00',
  `cod_hospede` int(11) NOT NULL,
  `cod_quarto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `reserva`
--

INSERT INTO `reserva` (`cod_reserva`, `dataI_reserva`, `horaE_reserva`, `cod_hospede`, `cod_quarto`) VALUES
(8, '2019-01-28', '19:00:00', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserva_conta`
--

DROP TABLE IF EXISTS `reserva_conta`;
CREATE TABLE `reserva_conta` (
  `cod_reserva` int(11) NOT NULL,
  `cod_conta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_produto`
--

DROP TABLE IF EXISTS `tipo_produto`;
CREATE TABLE `tipo_produto` (
  `cod_tipoP` int(11) NOT NULL,
  `tipo_tipoP` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_quarto`
--

DROP TABLE IF EXISTS `tipo_quarto`;
CREATE TABLE `tipo_quarto` (
  `cod_tipoQ` int(11) NOT NULL,
  `desc_quarto` varchar(15) NOT NULL,
  `valor_quarto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tipo_quarto`
--

INSERT INTO `tipo_quarto` (`cod_tipoQ`, `desc_quarto`, `valor_quarto`) VALUES
(1, 'Plus', 200),
(2, 'Luxo', 300);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`cod_conta`);

--
-- Índices de tabela `conta_produto`
--
ALTER TABLE `conta_produto`
  ADD PRIMARY KEY (`cod_conta`,`cod_produto`),
  ADD KEY `cod_produto` (`cod_produto`);

--
-- Índices de tabela `desp_motel`
--
ALTER TABLE `desp_motel`
  ADD PRIMARY KEY (`cod_despM`);

--
-- Índices de tabela `desp_quarto`
--
ALTER TABLE `desp_quarto`
  ADD PRIMARY KEY (`cod_despQ`);

--
-- Índices de tabela `hospede`
--
ALTER TABLE `hospede`
  ADD PRIMARY KEY (`cod_hospede`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`cod_produto`),
  ADD KEY `cod_tipoP` (`cod_tipoP`);

--
-- Índices de tabela `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`cod_quarto`),
  ADD KEY `cod_tipoQ` (`cod_tipoQ`);

--
-- Índices de tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`cod_reserva`),
  ADD KEY `cod_hospede` (`cod_hospede`),
  ADD KEY `cod_quarto` (`cod_quarto`);

--
-- Índices de tabela `reserva_conta`
--
ALTER TABLE `reserva_conta`
  ADD PRIMARY KEY (`cod_reserva`,`cod_conta`),
  ADD KEY `cod_conta` (`cod_conta`);

--
-- Índices de tabela `tipo_produto`
--
ALTER TABLE `tipo_produto`
  ADD PRIMARY KEY (`cod_tipoP`);

--
-- Índices de tabela `tipo_quarto`
--
ALTER TABLE `tipo_quarto`
  ADD PRIMARY KEY (`cod_tipoQ`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `cod_conta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `hospede`
--
ALTER TABLE `hospede`
  MODIFY `cod_hospede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `quarto`
--
ALTER TABLE `quarto`
  MODIFY `cod_quarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `cod_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tipo_produto`
--
ALTER TABLE `tipo_produto`
  MODIFY `cod_tipoP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_quarto`
--
ALTER TABLE `tipo_quarto`
  MODIFY `cod_tipoQ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `conta_produto`
--
ALTER TABLE `conta_produto`
  ADD CONSTRAINT `conta_produto_ibfk_1` FOREIGN KEY (`cod_conta`) REFERENCES `conta` (`cod_conta`),
  ADD CONSTRAINT `conta_produto_ibfk_2` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod_produto`);

--
-- Restrições para tabelas `desp_motel`
--
ALTER TABLE `desp_motel`
  ADD CONSTRAINT `desp_motel_ibfk_1` FOREIGN KEY (`cod_despM`) REFERENCES `conta` (`cod_conta`);

--
-- Restrições para tabelas `desp_quarto`
--
ALTER TABLE `desp_quarto`
  ADD CONSTRAINT `desp_quarto_ibfk_1` FOREIGN KEY (`cod_despQ`) REFERENCES `conta` (`cod_conta`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`cod_tipoP`) REFERENCES `tipo_produto` (`cod_tipoP`);

--
-- Restrições para tabelas `quarto`
--
ALTER TABLE `quarto`
  ADD CONSTRAINT `quarto_ibfk_1` FOREIGN KEY (`cod_tipoQ`) REFERENCES `tipo_quarto` (`cod_tipoQ`);

--
-- Restrições para tabelas `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`cod_hospede`) REFERENCES `hospede` (`cod_hospede`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`cod_quarto`) REFERENCES `quarto` (`cod_quarto`);

--
-- Restrições para tabelas `reserva_conta`
--
ALTER TABLE `reserva_conta`
  ADD CONSTRAINT `reserva_conta_ibfk_1` FOREIGN KEY (`cod_reserva`) REFERENCES `reserva` (`cod_reserva`),
  ADD CONSTRAINT `reserva_conta_ibfk_2` FOREIGN KEY (`cod_conta`) REFERENCES `desp_quarto` (`cod_despQ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
