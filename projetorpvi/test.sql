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

-- --------------------------------------------------------

--
-- Estrutura da tabela `amostra`
--

CREATE TABLE `amostra` (
  `amostra_id` int(11) NOT NULL,
  `nome` text DEFAULT NULL,
  `data` text DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `amostra`
--

INSERT INTO `amostra` (`amostra_id`, `nome`, `data`, `descricao`) VALUES
(56, '0', NOW(), '4324');

-- --------------------------------------------------------

--
-- Estrutura da tabela `amostra_qtd`
--

CREATE TABLE `amostra_qtd` (
  `amostra_qtd_id` int(11) NOT NULL,
  `identificador` text DEFAULT NULL,
  `amostra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `amostra_qtd`
--

INSERT INTO `amostra_qtd` (`amostra_qtd_id`, `identificador`, `amostra_id`) VALUES
(17, '324324', 56),
(24, '', 53),
(25, '4324423', 53),
(26, '', 53),
(27, '', 53),
(28, '', 53),
(29, '', 53),
(30, '4324', 53),
(31, '43245', 53),
(56, '4321', 47),
(57, '4324', 47),
(58, '324', 47);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `institution` varchar(1000) DEFAULT NULL,
  `lattes_address` varchar(1000) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `role`, `status`, `institution`, `lattes_address`, `created_at`, `updated_at`) VALUES
(1, 'teste@teste.com', '698dc19d489c4e4db73e28a713eab07b', 'Administrador', '0', 1, 'UNIPAMPA', 'www.lattes.com', NULL, '2021-04-02 10:27:04'),
(2, 'teste2@teste.com', '698dc19d489c4e4db73e28a713eab07b', 'Aluno 1', '2', 1, 'UNIPAMPA', 'www.lattes.com', NULL, '2021-04-02 10:27:09'),
(3, 'teste3@teste.com', '698dc19d489c4e4db73e28a713eab07b', 'Professor 1', '1', 1, 'UNIPAMPA', 'www.lattes.com', NULL, '2021-01-30 01:24:06');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `amostra`
--
ALTER TABLE `amostra`
  ADD PRIMARY KEY (`amostra_id`);

--
-- Índices para tabela `amostra_qtd`
--
ALTER TABLE `amostra_qtd`
  ADD PRIMARY KEY (`amostra_qtd_id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amostra`
--
ALTER TABLE `amostra`
  MODIFY `amostra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `amostra_qtd`
--
ALTER TABLE `amostra_qtd`
  MODIFY `amostra_qtd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
