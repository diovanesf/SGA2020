-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 11/04/2021 às 23:03
-- Versão do servidor: 10.4.18-MariaDB
-- Versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `grupo02`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `amostra`
--

CREATE TABLE `amostra` (
  `amostra_id` int(11) NOT NULL,
  `nome` text DEFAULT NULL,
  `data` text DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `amostra`
--

INSERT INTO `amostra` (`amostra_id`, `nome`, `data`, `descricao`) VALUES
(56, NULL, NULL, 'NAO ACREDITA EM MIM'),
(59, '0', '', 'bb'),
(60, '0', '', 'dfa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `amostra_qtd`
--

CREATE TABLE `amostra_qtd` (
  `amostra_qtd_id` int(11) NOT NULL,
  `identificador` text DEFAULT NULL,
  `amostra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `amostra_qtd`
--

INSERT INTO `amostra_qtd` (`amostra_qtd_id`, `identificador`, `amostra_id`) VALUES
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
(58, '324', 47),
(60, '324324', 56);

-- --------------------------------------------------------

--
-- Estrutura para tabela `proprietario`
--

CREATE TABLE `proprietario` (
  `nome` text NOT NULL,
  `cidade` text NOT NULL,
  `estado` int(2) NOT NULL,
  `endereco` text NOT NULL,
  `cep` int(11) NOT NULL,
  `telefone` text NOT NULL,
  `email` text NOT NULL,
  `gps` text NOT NULL,
  `proprietario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `proprietario`
--

INSERT INTO `proprietario` (`nome`, `cidade`, `estado`, `endereco`, `cep`, `telefone`, `email`, `gps`, `proprietario_id`) VALUES
('Cleiton Silva', 'Cleitoncity', 0, '', 135151, '31515', 'cleiton@email.com', '5435151', 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
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
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `role`, `status`, `institution`, `lattes_address`, `created_at`, `updated_at`) VALUES
(1, 'teste@teste.com', '698dc19d489c4e4db73e28a713eab07b', 'Veterinario', '2', 1, 'UNIPAMPA', 'www.lattes.com', NULL, '2021-04-10 20:49:00'),
(2, 'teste2@teste.com', '698dc19d489c4e4db73e28a713eab07b', 'Aluno', '1', 1, 'UNIPAMPA', 'www.lattes.com', NULL, '2021-04-02 10:27:09'),
(3, 'arthurmb10@gmail.com', '5a3a3d942e21b80bbf23f613a611a0bb', 'Professor 1', '1', 1, 'UNIPAMPA', 'www.lattes.com', NULL, '2021-04-06 16:07:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `amostra`
--
ALTER TABLE `amostra`
  ADD PRIMARY KEY (`amostra_id`);

--
-- Índices de tabela `amostra_qtd`
--
ALTER TABLE `amostra_qtd`
  ADD PRIMARY KEY (`amostra_qtd_id`);

--
-- Índices de tabela `proprietario`
--
ALTER TABLE `proprietario`
  ADD PRIMARY KEY (`proprietario_id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amostra`
--
ALTER TABLE `amostra`
  MODIFY `amostra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `amostra_qtd`
--
ALTER TABLE `amostra_qtd`
  MODIFY `amostra_qtd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `proprietario`
--
ALTER TABLE `proprietario`
  MODIFY `proprietario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
