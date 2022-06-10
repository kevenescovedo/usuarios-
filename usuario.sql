-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Maio-2022 às 19:25
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estagio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `login_usuario` varchar(45) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  `orientador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`login_usuario`, `senha`, `data_criacao`, `orientador_id`) VALUES
('alvaro@gmail.com', 'df4ca218445c38ed15d33a516fc248e93245a8d63a3b4cf8a8dcc4edf5654fe5', '2022-05-13 19:22:58', 3),
('anacarolina@gmail.com', '6061a9a2d4b9223f1c26fa193eb3a9648ddceca7c41904c12218e4e774e19068', '2022-05-13 19:17:44', 1),
('dione@gmail.com', '8df9b28e1dca8d433a51ebfbdfa1668d02018878203c4a6ef109b039bb878737', '2022-05-13 19:22:25', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`login_usuario`),
  ADD KEY `fk_usuario_orientador_idx` (`orientador_id`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_orientador` FOREIGN KEY (`orientador_id`) REFERENCES `orientador` (`orientador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
