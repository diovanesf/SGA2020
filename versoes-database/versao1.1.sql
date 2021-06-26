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
  `status` varchar(12) DEFAULT NULL,
  `propriedade` varchar(6) DEFAULT NULL,
  `total_animais` smallint(6) DEFAULT NULL,
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
-- Despejando dados para a tabela `amostra`
--

INSERT INTO `amostra` (`amostra_id`, `n_amostras`, `forma_envio`, `especie`, `material`, `acondicionamento`, `condicao`, `status`, `propriedade`, `total_animais`, `acometidos`, `criacao`, `observacoes`, `suspeitas`, `exame_id`, `peso_material`, `estimativa`, `laboratorios`, `proprietario_id`) VALUES
(60, 15, 'rodoviaria', 'bovina', 'neoplasias', '', 'coagulado', 'aceito', 'rural', 0, 0, NULL, 'é sobre isso.', 'asdadasd', NULL, '66', 12, 'labvir', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `amostra`
--
ALTER TABLE `amostra`
  ADD PRIMARY KEY (`amostra_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amostra`
--
ALTER TABLE `amostra`
  MODIFY `amostra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;


-- --------------------------------------------------------

--
-- Estrutura da tabela `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `path` text DEFAULT NULL,
  `view` text DEFAULT NULL,
  `alt` text DEFAULT NULL,
  `amostra_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `upload`
--

INSERT INTO `upload` (`id`, `path`, `view`, `alt`, `amostra_id`) VALUES
(72, 'upload/1723200446607cdf5cec4f4.PNG', NULL, 'qeqweqeqeqew', 60),
(76, 'upload/1058245309607cfcaac212c.png', NULL, 'dws', 60),
(77, 'upload/397790185607cfcfcc23aa.mp4', NULL, 'sada', 60);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

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

CREATE TABLE `proprietario` (
  `proprietario_id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cidade` text NOT NULL,
  `estado` varchar(2) NOT NULL,
  `endereco` text NOT NULL,
  `cep` int(11) NOT NULL,
  `telefone` text NOT NULL,
  `email` text NOT NULL,
  `gps` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `exame`
--

CREATE TABLE `exame` (
  `soroneutralizacao` varchar(4) DEFAULT NULL,
  `imunoabsorcao` varchar(4) DEFAULT NULL,
  `polimerase` varchar(6) DEFAULT NULL,
  `imunocromatografia` varchar(9) DEFAULT NULL,
  `exame_id` int(11) NOT NULL,
  `imunofluorescencia` varchar(3) DEFAULT NULL,
  `hemaglutinacao` varchar(9) DEFAULT NULL,
  `isolamento` varchar(4) DEFAULT NULL,
  `gel_agar` varchar(3) DEFAULT NULL,
  `microscopia` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `exame`
--

INSERT INTO `exame` (`soroneutralizacao`, `imunoabsorcao`, `polimerase`, `imunocromatografia`, `exame_id`, `imunofluorescencia`, `hemaglutinacao`, `isolamento`, `gel_agar`, `microscopia`) VALUES
('idr', NULL, NULL, NULL, 0, NULL, NULL, 'ibr', NULL, 'rota');

ALTER TABLE `exame`
  MODIFY `exame_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;



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

-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `proprietario`
  ADD PRIMARY KEY (`proprietario_id`);

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
