-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Abr-2023 às 01:17
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `produtos-like`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `id` int(11) NOT NULL,
  `nomeCliente` varchar(45) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id`, `nomeCliente`, `data`) VALUES
(1, 'João', '2023-04-06'),
(5, 'Anderson', '2022-06-15'),
(6, 'Thomas', '2023-04-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `subcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `valor`, `subcategoria`) VALUES
(1, 'IPHONE 14', '5100.59', 15),
(2, 'IPHONE 13', '3800.55', 15),
(3, 'Playstation 4', '3250.80', 2),
(5, 'Playstation 5', '4300.54', 2),
(15, 'Geladeira consul inverter', '3100.00', 35),
(16, 'Lavadora eletrolux', '2450.55', 35),
(17, 'TV AOC', '1690.99', 34),
(18, 'TV LG', '2400.50', 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtosorcamento`
--

CREATE TABLE `produtosorcamento` (
  `produto` int(11) NOT NULL,
  `orcamento` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtosorcamento`
--

INSERT INTO `produtosorcamento` (`produto`, `orcamento`, `quantidade`) VALUES
(1, 1, 2),
(2, 5, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `nome`) VALUES
(2, 'Eletrônico'),
(15, 'Smartphones'),
(34, 'Televisões'),
(35, 'Eletrodoméstico');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategoria` (`subcategoria`);

--
-- Índices para tabela `produtosorcamento`
--
ALTER TABLE `produtosorcamento`
  ADD PRIMARY KEY (`produto`,`orcamento`),
  ADD KEY `orcamento` (`orcamento`);

--
-- Índices para tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`subcategoria`) REFERENCES `subcategoria` (`id`);

--
-- Limitadores para a tabela `produtosorcamento`
--
ALTER TABLE `produtosorcamento`
  ADD CONSTRAINT `produtosorcamento_ibfk_1` FOREIGN KEY (`orcamento`) REFERENCES `orcamento` (`id`),
  ADD CONSTRAINT `produtosorcamento_ibfk_2` FOREIGN KEY (`produto`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
