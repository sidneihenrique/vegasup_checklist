-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jun-2024 às 20:44
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vegasup_checklist`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `colecao_de_testes`
--

CREATE TABLE `colecao_de_testes` (
  `id` int(11) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `titulo` varchar(180) NOT NULL,
  `programado` tinyint(1) NOT NULL,
  `executado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `colecao_de_testes`
--

INSERT INTO `colecao_de_testes` (`id`, `id_projeto`, `titulo`, `programado`, `executado`) VALUES
(3, 0, 'Cadastro de Instrutor', 0, 0),
(4, 0, 'Cadastro de Lojista', 0, 0),
(5, 0, 'Cadastro de Praticante', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(180) NOT NULL,
  `data_contrato` date NOT NULL,
  `porcentagem` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id`, `titulo`, `data_contrato`, `porcentagem`) VALUES
(1, 'Go It', '2024-06-10', 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `testes`
--

CREATE TABLE `testes` (
  `id` int(11) NOT NULL,
  `id_colecao` int(11) NOT NULL,
  `titulo` varchar(240) NOT NULL,
  `descricao` longtext NOT NULL,
  `programado` tinyint(1) NOT NULL,
  `executado` tinyint(1) NOT NULL,
  `aprovado` tinyint(1) NOT NULL,
  `arquivo_erro` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `testes`
--

INSERT INTO `testes` (`id`, `id_colecao`, `titulo`, `descricao`, `programado`, `executado`, `aprovado`, `arquivo_erro`) VALUES
(1, 3, 'CT1 - Cadastro de instrutor com dados válidos', '	Acessar: localhost/goit\n	Na home do sistema, clicar no link \"Cadastre-se aqui\"\n	Na tela de Cadastro-> Seleção de usuário, selecione a opção \"Instrutor\", em seguida clique no botão próximo\n	Preencher todos os campos do formulário de cadastro com dados válidos, em seguida clique no botão \"Cadastrar\"\n	Clicar em \"Ok\" no pop-up do cadastro', 0, 0, 0, ''),
(2, 3, 'CT2 - Cadastro de instrutor com cadastur indisponível', 'Acessar: localhost/goit\n	Na home do sistema, clicar no link \"Cadastre-se aqui\"\n	Na tela de Cadastro-> Seleção de usuário, selecione a opção \"Instrutor\", em seguida clique no botão próximo\n	Preencher todos os campos do formulário de cadastro com dados válidos exceto o de \"Apelido\", neste campo insira um apelido indisponível (que já está cadastrado no sistema), em seguida clique no botão \"Cadastrar\"', 0, 0, 0, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `colecao_de_testes`
--
ALTER TABLE `colecao_de_testes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `testes`
--
ALTER TABLE `testes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `colecao_de_testes`
--
ALTER TABLE `colecao_de_testes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `testes`
--
ALTER TABLE `testes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
