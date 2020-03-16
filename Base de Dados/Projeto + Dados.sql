-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Mar-2020 às 14:33
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetojestor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perfil`
--

CREATE TABLE `tb_perfil` (
  `ID_Perfil` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `DataModifcacao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_perfil`
--

INSERT INTO `tb_perfil` (`ID_Perfil`, `Nome`, `DataModifcacao`) VALUES
(1, 'Administrador', '2020-03-09 16:36:08'),
(2, 'Cliente', '2020-03-09 18:13:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status`
--

CREATE TABLE `tb_status` (
  `ID_Status` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `DataModficacao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_status`
--

INSERT INTO `tb_status` (`ID_Status`, `Nome`, `DataModficacao`) VALUES
(1, 'Finalizado', '2020-03-09 19:43:09'),
(2, 'Pendente', '2020-03-09 19:43:16'),
(3, 'Em Andamento', '2020-03-09 19:43:22'),
(4, 'A Iniciar', '2020-03-09 22:12:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ticket`
--

CREATE TABLE `tb_ticket` (
  `ID_Ticket` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Status` int(11) NOT NULL,
  `Titulo` varchar(90) NOT NULL,
  `Descricao` varchar(255) NOT NULL,
  `DataCriacao` datetime NOT NULL,
  `Slug` varchar(60) NOT NULL,
  `DataModificacao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `ID_Perfil` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Senha` varchar(45) NOT NULL,
  `Slug` varchar(60) NOT NULL,
  `DataModficacao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`ID_Usuario`, `ID_Perfil`, `Nome`, `Email`, `Senha`, `Slug`, `DataModficacao`) VALUES
(27, 1, 'Administrador Jestor', 'adm@jestor.com.br', '1fd1ab249ed15da82fb5f6e157f5f93a', 'administrador-jestor-27', '2020-03-10 09:34:22'),
(33, 2, 'Cliente Jestor', 'cliente@jestor.com.br', '1fd1ab249ed15da82fb5f6e157f5f93a', 'cliente-jestor-33', '2020-03-10 09:54:04');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_perfil`
--
ALTER TABLE `tb_perfil`
  ADD PRIMARY KEY (`ID_Perfil`);

--
-- Índices para tabela `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`ID_Status`);

--
-- Índices para tabela `tb_ticket`
--
ALTER TABLE `tb_ticket`
  ADD PRIMARY KEY (`ID_Ticket`,`ID_Usuario`,`ID_Status`),
  ADD KEY `fk_TB_Ticket_TB_Status` (`ID_Status`),
  ADD KEY `fk_TB_Ticket_TB_Usuario1` (`ID_Usuario`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`ID_Usuario`,`ID_Perfil`),
  ADD KEY `fk_TB_Usuario_TB_Perfil1` (`ID_Perfil`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_perfil`
--
ALTER TABLE `tb_perfil`
  MODIFY `ID_Perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `ID_Status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_ticket`
--
ALTER TABLE `tb_ticket`
  MODIFY `ID_Ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_ticket`
--
ALTER TABLE `tb_ticket`
  ADD CONSTRAINT `fk_TB_Ticket_TB_Status` FOREIGN KEY (`ID_Status`) REFERENCES `tb_status` (`ID_Status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_Ticket_TB_Usuario1` FOREIGN KEY (`ID_Usuario`) REFERENCES `tb_usuario` (`ID_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_TB_Usuario_TB_Perfil1` FOREIGN KEY (`ID_Perfil`) REFERENCES `tb_perfil` (`ID_Perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
