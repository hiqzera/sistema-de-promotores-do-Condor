-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/11/2023 às 23:26
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `base`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `calendario_promocional`
--

CREATE TABLE `calendario_promocional` (
  `id` int(11) NOT NULL,
  `data_promocao` date NOT NULL,
  `descricao_promocao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `calendario_promocional`
--

INSERT INTO `calendario_promocional` (`id`, `data_promocao`, `descricao_promocao`) VALUES
(1, '2023-11-15', 'Feriado'),
(2, '2023-12-25', 'Natal'),
(3, '2023-12-31', 'Ano Novoooo'),
(4, '2023-11-23', 'feriado'),
(5, '2023-11-30', 'Virada do mes'),
(25, '2024-01-01', 'Ano Novo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `produto` varchar(100) DEFAULT NULL,
  `patamar` enum('administrador','funcionario') DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel_acesso` enum('administrador','usuario_padrao') NOT NULL DEFAULT 'usuario_padrao'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `marca`, `produto`, `patamar`, `senha`, `nivel_acesso`) VALUES
(2, 'Henrique', 'henrique300415@gmail.com', '49984287347', 'Nestle', 'CafÃ© em PÃ³', NULL, '$2y$10$Ovl4yKaoA8QIVEDi8qVQXeML3JdF4a7VyWMtZxkevanaVvFaD2kVW', 'administrador'),
(3, 'user', 'user@user.com', '4999999999', 'NestlÃ©', 'CafÃ© em PÃ³', NULL, '$2y$10$PSIPKXEim/4zI19wmOh4M.I4E928SIv2vg84tsr4cOMyh1mu0Y62C', 'usuario_padrao');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `calendario_promocional`
--
ALTER TABLE `calendario_promocional`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `calendario_promocional`
--
ALTER TABLE `calendario_promocional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
