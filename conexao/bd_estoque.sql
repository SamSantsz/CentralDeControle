-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Nov-2023 às 12:35
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
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `teamviewer` int NOT NULL,
  `data` datetime NOT NULL,
  `status` text NOT NULL,
  `tecnico` text NOT NULL,
  `resolucao` varchar(255) NOT NULL,
  `dataFin` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_chamado`
--

INSERT INTO `tb_chamado` (`id`, `nome`, `email`, `whatsapp`, `loja`, `setor`, `problema`, `imagem`, `teamviewer`, `data`, `status`, `tecnico`, `resolucao`, `dataFin`) VALUES
(1, 'samuel santos', 'samuelfodarock.666@gmail.com', 91030092, 'Matriz', 'PDV', 'teste', 'Imagem do WhatsApp de 2023-09-22 à(s) 16.23.539.jpg', 1123123123, '2023-10-30 17:01:00', 'Não Impor/Não Urgen', 'Alex Fushi', '', '2023-10-30 17:02:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estoque`
--

DROP TABLE IF EXISTS `tb_estoque`;
CREATE TABLE IF NOT EXISTS `tb_estoque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_item` int NOT NULL,
  `descricaoE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nserieE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lojaE` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `setorE` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pdvE` int NOT NULL,
  `statusE` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_item`
--

DROP TABLE IF EXISTS `tb_item`;
CREATE TABLE IF NOT EXISTS `tb_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricaoI` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagemI` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_item`
--

INSERT INTO `tb_item` (`id`, `descricaoI`, `imagemI`) VALUES
(1, 'samuel santos', 'Imagem do WhatsApp de 2023-09-22 à(s) 16.23.52i.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_manutencao`
--

DROP TABLE IF EXISTS `tb_manutencao`;
CREATE TABLE IF NOT EXISTS `tb_manutencao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_item` int NOT NULL,
  `descricaoM` varchar(255) NOT NULL,
  `nserieM` varchar(255) NOT NULL,
  `fornecedor` text NOT NULL,
  `statusM` text NOT NULL,
  `motivoM` varchar(255) NOT NULL,
  `dataM` date NOT NULL,
  `tecnicoM` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_relatorio`
--

DROP TABLE IF EXISTS `tb_relatorio`;
CREATE TABLE IF NOT EXISTS `tb_relatorio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ipR` varchar(255) NOT NULL,
  `nserieR` varchar(255) NOT NULL,
  `nmacR` varchar(255) NOT NULL,
  `lojaR` text NOT NULL,
  `patrimonioR` int NOT NULL,
  `ramalR` int NOT NULL,
  `ncaixaR` int NOT NULL,
  `numeroR` int NOT NULL,
  `equipR` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_relatorio`
--

INSERT INTO `tb_relatorio` (`id`, `ipR`, `nserieR`, `nmacR`, `lojaR`, `patrimonioR`, `ramalR`, `ncaixaR`, `numeroR`, `equipR`) VALUES
(4, '192.168.0.1', '12345gsdfs', 'd2:22:dd:11', 'Barreira', 0, 0, 11, 0, 'Caixa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
