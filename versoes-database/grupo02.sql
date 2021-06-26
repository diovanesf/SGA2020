-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Abr-2021 às 08:50
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.4.16

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
-- Estrutura da tabela `amostra`
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
  `criacao` varchar(12) DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `suspeitas` tinytext DEFAULT NULL,
  `exame_id` int(11) DEFAULT NULL,
  `peso_material` varchar(12) DEFAULT NULL,
  `estimativa` tinyint(4) DEFAULT NULL,
  `laboratorios` varchar(20) DEFAULT NULL,
  `proprietario_id` int(11) NOT NULL,
  `data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `amostra`
--

INSERT INTO `amostra` (`amostra_id`, `n_amostras`, `forma_envio`, `especie`, `material`, `acondicionamento`, `condicao`, `status`, `propriedade`, `total_animais`, `acometidos`, `criacao`, `observacoes`, `suspeitas`, `exame_id`, `peso_material`, `estimativa`, `laboratorios`, `proprietario_id`, `data`) VALUES
(89, 1011, 'correios', 'equina', 'crostas', 'formol', 'coagulado', NULL, 'granja', 600, 358, 'semiextensiv', '555', '5655', 25, NULL, NULL, NULL, 1, '27/04/2021'),
(90, 0, 'rodoviaria', NULL, 'soro', 'congelada', 'hemolisado', NULL, 'haras', 200, 33, 'extensiva', '65567', '54545', 26, NULL, NULL, NULL, 3, '27/04/2021'),
(91, 123, 'transport', 'equina', 'tecidos', 'ambiente', 'putrefacao', NULL, 'haras', 600, 500, 'extensiva', '54574', '8484854', 27, NULL, NULL, NULL, 3, '27/04/2021'),
(92, 1011, 'rodoviaria', 'ovina', 'soro', 'ambiente', 'putrefacao', NULL, 'rural', 200, 355, 'extensiva', '65', '4545', NULL, NULL, NULL, NULL, 3, '27/04/2021');

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
-- Estrutura da tabela `exame`
--

CREATE TABLE `exame` (
  `exame_id` int(11) NOT NULL,
  `tecnica_tratamento_id` int(11) NOT NULL,
  `amostra_id` int(11) NOT NULL,
  `resultado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `exame`
--

INSERT INTO `exame` (`exame_id`, `tecnica_tratamento_id`, `amostra_id`, `resultado`) VALUES
(25, 18, 82, 0),
(26, 18, 82, 0),
(27, 23, 82, 0),
(28, 4, 85, 0),
(29, 26, 85, 0),
(30, 22, 85, 1),
(31, 19, 86, 0),
(32, 25, 86, 0),
(33, 17, 86, 0),
(34, 24, 86, 0),
(35, 15, 89, 0),
(36, 24, 89, 0),
(37, 18, 91, 0),
(38, 18, 89, 0),
(39, 18, 89, 0),
(40, 4, 89, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietario`
--

CREATE TABLE `proprietario` (
  `nome` text NOT NULL,
  `cidade` text NOT NULL,
  `estado` varchar(2) NOT NULL,
  `endereco` text NOT NULL,
  `cep` int(11) NOT NULL,
  `telefone` text NOT NULL,
  `email` text NOT NULL,
  `gps` text NOT NULL,
  `proprietario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `proprietario`
--

INSERT INTO `proprietario` (`nome`, `cidade`, `estado`, `endereco`, `cep`, `telefone`, `email`, `gps`, `proprietario_id`) VALUES
('Tacio', 'Cidade Alta', '17', 'Rua Piau 123', 32341, '', 'propietario1@propietario.com', '', 1),
('Rafael Diovaner', '', '0', 'Quintal 123', 0, '(23) 231231-2313', 'propietario2@hotmail.com', '', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnica`
--

CREATE TABLE `tecnica` (
  `tecnica_id` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tecnica`
--

INSERT INTO `tecnica` (`tecnica_id`, `nome`) VALUES
(1, 'Soroneutralização'),
(2, 'Ensaio de Imunoabsorção Enzimática'),
(3, 'Reação em Cadeia da Polimerase'),
(4, 'Imunocromatografia'),
(5, 'Imunofluorescência'),
(6, 'Inibição da Hemaglutinação'),
(7, 'Isolamento Viral'),
(8, 'Imunodifusão em Gel de Agar'),
(9, 'Microscopia Eletrônica'),
(10, 'Vacina Autógena');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnica_tratamento`
--

CREATE TABLE `tecnica_tratamento` (
  `tecnica_tratamento_id` int(11) NOT NULL,
  `tecnica_id` int(11) NOT NULL,
  `tratamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tecnica_tratamento`
--

INSERT INTO `tecnica_tratamento` (`tecnica_tratamento_id`, `tecnica_id`, `tratamento_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 5),
(8, 3, 1),
(9, 3, 2),
(10, 3, 6),
(11, 3, 3),
(12, 3, 7),
(13, 3, 8),
(14, 3, 9),
(15, 3, 10),
(16, 4, 6),
(17, 4, 11),
(18, 5, 12),
(19, 6, 13),
(20, 7, 1),
(21, 7, 2),
(22, 7, 14),
(23, 7, 15),
(24, 8, 5),
(25, 9, 16),
(26, 9, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tratamento`
--

CREATE TABLE `tratamento` (
  `tratamento_id` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tratamento`
--

INSERT INTO `tratamento` (`tratamento_id`, `nome`) VALUES
(1, 'BVDV'),
(2, 'IBR'),
(3, 'EHV'),
(4, 'EAV'),
(5, 'LEB'),
(6, 'CDV'),
(7, 'AIE'),
(8, 'FCM'),
(9, 'BoHV-5'),
(10, 'ORFV'),
(11, 'FIV/FELV'),
(12, 'RABV'),
(13, 'Influenza equina'),
(14, 'CPV'),
(15, 'BRSV'),
(16, 'Coronavírus'),
(17, 'Rotavírus');

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
(77, 'upload/397790185607cfcfcc23aa.mp4', NULL, 'sada', 60),
(78, 'upload/378817282607dcfca36b3d.PNG', NULL, 'dsad', 60),
(79, 'upload/1351414077607f5c208ff59.png', NULL, 'gtgtg', 60),
(80, 'upload/1912578785607f6fa11ffda.mp4', NULL, 'Horarios reuniões', 60);

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
(1, 'teste2@teste.com', '698dc19d489c4e4db73e28a713eab07b', 'Aluno', '1', 1, 'UNIPAMPA', 'www.lattes.com', NULL, '2021-04-23 16:50:09'),
(3, 'teste@teste.com', '698dc19d489c4e4db73e28a713eab07b', 'Veterinario', '2', 1, 'UNIPAMPA', 'www.lattes.com', NULL, '2021-04-23 16:50:58'),
(24, 'veterinario@veterinario.com', '96053ccf5bd5ec52e88119ad09935fb6', 'Veterinario Diotacioel', '0', 1, NULL, NULL, NULL, '2021-04-23 16:55:48');

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
-- Índices para tabela `exame`
--
ALTER TABLE `exame`
  ADD PRIMARY KEY (`exame_id`);

--
-- Índices para tabela `proprietario`
--
ALTER TABLE `proprietario`
  ADD PRIMARY KEY (`proprietario_id`);

--
-- Índices para tabela `tecnica`
--
ALTER TABLE `tecnica`
  ADD PRIMARY KEY (`tecnica_id`);

--
-- Índices para tabela `tecnica_tratamento`
--
ALTER TABLE `tecnica_tratamento`
  ADD PRIMARY KEY (`tecnica_tratamento_id`);

--
-- Índices para tabela `tratamento`
--
ALTER TABLE `tratamento`
  ADD PRIMARY KEY (`tratamento_id`);

--
-- Índices para tabela `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `amostra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de tabela `amostra_qtd`
--
ALTER TABLE `amostra_qtd`
  MODIFY `amostra_qtd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `exame`
--
ALTER TABLE `exame`
  MODIFY `exame_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `proprietario`
--
ALTER TABLE `proprietario`
  MODIFY `proprietario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tecnica`
--
ALTER TABLE `tecnica`
  MODIFY `tecnica_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tecnica_tratamento`
--
ALTER TABLE `tecnica_tratamento`
  MODIFY `tecnica_tratamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tratamento`
--
ALTER TABLE `tratamento`
  MODIFY `tratamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
