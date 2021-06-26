-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 02-Abr-2021 às 17:25
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test`
--

--
-- Estrutura para tabela `amostra`
--

CREATE TABLE `amostra` (
  `amostra_id` int(11) NOT NULL,
  `n_amostras` smallint(6) DEFAULT NULL,
  `forma_envio` text DEFAULT NULL,
  `especie` tinytext DEFAULT NULL,
  `material` tinytext DEFAULT NULL,
  `acondicionamento` tinytext DEFAULT NULL,
  `condicao` tinytext DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `data` varchar(20) DEFAULT NULL,
  `propriedade` varchar(6) DEFAULT NULL,
  `total_animais` smallint(6) DEFAULT NULL,
  `data` varchar(20) DEFAULT NULL,
  `acometidos` smallint(6) DEFAULT NULL,
  `criacao` varchar(13) DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `suspeitas` tinytext DEFAULT NULL,
  `exame_id` int(11) DEFAULT NULL,
  `peso_material` varchar(12) DEFAULT NULL,
  `estimativa` tinyint(4) DEFAULT NULL,
  `laboratorios` varchar(20) DEFAULT NULL,
  `proprietario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
ALTER TABLE `amostra`
  ADD PRIMARY KEY (`amostra_id`);

ALTER TABLE `amostra`
  MODIFY `amostra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;
