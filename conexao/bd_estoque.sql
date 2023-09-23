-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Set-2023 às 21:46
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_chamado`
--

DROP TABLE IF EXISTS `tb_chamado`;
CREATE TABLE IF NOT EXISTS `tb_chamado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `whatsapp` int NOT NULL,
  `loja` text NOT NULL,
  `setor` text NOT NULL,
  `problema` varchar(255) NOT NULL,
  `teamviewer` int NOT NULL,
  `data` datetime NOT NULL,
  `status` text NOT NULL,
  `tecnico` text NOT NULL,
  `resolucao` varchar(255) NOT NULL,
  `dataFin` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_chamado`
--

INSERT INTO `tb_chamado` (`id`, `nome`, `email`, `whatsapp`, `loja`, `setor`, `problema`, `teamviewer`, `data`, `status`, `tecnico`, `resolucao`, `dataFin`) VALUES
(2, 'samuel santos', 'samuelfodarock.666@gmail.com', 2147483647, 'Matriz', 'F.Loja', 'teste de cadastro do formulário', 1123123123, '2023-09-07 00:00:00', 'Finalizado', 'Samuel Santos', 'teste feito', '2023-09-12 15:08:00'),
(3, 'Sam Santsz', 'samuelfodarock.666@gmail.com', 2147483647, 'Filial', 'Salão', 'segundo teste de cadastro do formulário', 1321123321, '2023-09-07 00:00:00', 'Não Impor/Urgente', '', '', '0000-00-00 00:00:00'),
(4, 'mari', 'samuelsantosqueiroz@gmail.com', 2147483647, 'Conceito', 'Recebimento', 'terceiro teste de cadastro do formulário', 1123321123, '2023-09-07 00:00:00', 'Importante/Não Urgen', '', '', '0000-00-00 00:00:00'),
(5, 'pani', 'samuelsantosqueiroz@gmail.comds', 991030092, 'Matriz', 'F.Loja', 'teste de numero', 1222333444, '2023-09-07 00:00:00', 'Importante/Não Urgen', '', '', '0000-00-00 00:00:00'),
(6, 'Cris', 'samuelsantosqueiroz@gmail.', 85991, 'Matriz', 'F.Loja', 'teste de nume', 2147483647, '2023-09-07 00:00:00', 'Finalizado', '', '', '0000-00-00 00:00:00'),
(7, 'Cris', 'samuelfodarocadk.666@gmail.com', 91030092, 'Matriz', 'F.Loja', 'tes whatsaapp', 22222, '2023-09-07 00:00:00', 'Importante/Urgente', '', '', '0000-00-00 00:00:00'),
(8, 'samuel santos', 'samuelfodarock.666@gmail.com', 91030092, 'Filial', 'F.Loja', 'teste de prioridade', 1123456789, '2023-09-08 00:00:00', 'Importante/Não Urgen', '', '', '0000-00-00 00:00:00'),
(9, 'samuel santos', 'samuelfodarock.666@gmail.com', 98888889, 'Conceito', 'Recebimento', 'teste de status', 2147483647, '2023-09-08 00:00:00', 'Não Impor/Não Urgen', 'Samuel Santos', 'feito', '2023-09-13 13:45:00'),
(10, 'samuel santos', 'samuelfodarock.666@gmail.com', 123432453, 'Filial', 'Recebimento', 'tes', 124325, '2023-09-09 00:00:00', 'Finalizado', 'Lucas Lima', '', '2023-09-20 09:47:00'),
(11, 'samuel santos', 'samuelfodarock.666@gmail.com', 12345, 'Filial', 'F.Loja', 'ttt', 1122, '2023-09-12 00:00:00', 'Triagem', '', '', '0000-00-00 00:00:00'),
(12, 'samuel santos', 'samuelfodarock.666@gmail.com', 12345, 'Filial', 'F.Loja', 'ttt', 1122, '2023-09-12 00:00:00', 'Triagem', '', '', '0000-00-00 00:00:00'),
(13, 'samuel santos', 'samuelfodarock.666@gmail.com', 918835556, 'Matriz', 'Recebimento', 'teste de hora', 887951985, '2023-09-12 14:29:00', 'Triagem', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estoque`
--

DROP TABLE IF EXISTS `tb_estoque`;
CREATE TABLE IF NOT EXISTS `tb_estoque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `nserie` varchar(255) NOT NULL,
  `loja` text NOT NULL,
  `setor` text NOT NULL,
  `pdv` int NOT NULL,
  `situacao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_estoque`
--

INSERT INTO `tb_estoque` (`id`, `descricao`, `nserie`, `loja`, `setor`, `pdv`, `situacao`) VALUES
(1, 'tes', '123', 'Matriz', 'TI', 0, 'Funcionando'),
(2, 'samuel santos', '1234', 'São Francisco', 'Chegue Pague', 0, 'Funcionando'),
(3, 'tt', '123', 'Coneito', 'Financeiro', 0, 'Funcionando'),
(4, 'samuel santos', '23', 'Coneito', 'Padaria', 0, 'Funcionando'),
(5, 'ta', '23', 'Coneito', 'Padaria', 0, 'Funcionando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_item`
--

DROP TABLE IF EXISTS `tb_item`;
CREATE TABLE IF NOT EXISTS `tb_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagem` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_item`
--

INSERT INTO `tb_item` (`id`, `descricao`, `imagem`) VALUES
(39, 'samuel santos', 'logo.jpeg'),
(38, 'samuel santos', 'wp2993413.jpg'),
(36, 'samuel santos', 'unnamed.jpg'),
(34, 'samuel santos', 'OIP.jfif'),
(35, 'samuel santos', 'R (2).jpg'),
(32, 'samuel santos', 'Imagem do WhatsApp de 2023-08-12 à(s) 16.08.35.jpg'),
(33, 'samuel santos', 'R.jfif'),
(31, 'samuel santos', 'ef62714203e333859f3133538adc418e.jpg'),
(40, 'nova img', 'Imagem do WhatsApp de 2023-08-30 à(s) 10.58.26.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
