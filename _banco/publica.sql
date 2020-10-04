-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 04-Out-2020 às 02:03
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

DROP TABLE IF EXISTS `jogador`;
CREATE TABLE IF NOT EXISTS `jogador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogador`
--

INSERT INTO `jogador` (`id`, `nome`, `time`) VALUES
(1, 'Maria', 1),
(2, 'Sabrina', 2),
(3, 'Samantha', 3),
(4, 'Vanessa', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `partida`
--

DROP TABLE IF EXISTS `partida`;
CREATE TABLE IF NOT EXISTS `partida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jogo` int(11) NOT NULL,
  `id_jogador` int(11) NOT NULL,
  `placar` int(11) NOT NULL,
  `min_temporada` int(11) NOT NULL,
  `max_temporada` int(11) NOT NULL,
  `qrecorde_min` int(11) NOT NULL,
  `qrecorde_max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `partida`
--

INSERT INTO `partida` (`id`, `id_jogo`, `id_jogador`, `placar`, `min_temporada`, `max_temporada`, `qrecorde_min`, `qrecorde_max`) VALUES
(1, 1, 1, 12, 12, 12, 0, 0),
(2, 2, 1, 24, 12, 24, 0, 1),
(3, 3, 1, 10, 10, 24, 1, 1),
(4, 4, 1, 24, 10, 24, 1, 1),
(5, 5, 1, 15, 10, 24, 1, 1),
(6, 6, 1, 17, 10, 24, 1, 1),
(7, 7, 1, 9, 9, 24, 2, 1),
(8, 8, 1, 26, 9, 26, 2, 2),
(9, 1, 2, 15, 15, 15, 0, 0),
(10, 2, 2, 8, 8, 15, 1, 0),
(11, 3, 2, 20, 8, 20, 1, 1),
(12, 4, 2, 28, 8, 28, 1, 2),
(13, 1, 3, 20, 20, 20, 0, 0),
(14, 2, 3, 28, 20, 28, 0, 1),
(15, 3, 3, 30, 20, 30, 0, 2),
(16, 4, 3, 25, 20, 30, 0, 2),
(17, 5, 3, 12, 12, 30, 1, 2),
(18, 6, 3, 13, 12, 30, 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
