-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Jul-2021 às 09:39
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd_desangue`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_campanha`
--

CREATE TABLE IF NOT EXISTS `tb_campanha` (
`id_campanha` int(11) NOT NULL,
  `fk_hospital` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descricao` varchar(1150) NOT NULL,
  `img_campanha` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_campanha`
--

INSERT INTO `tb_campanha` (`id_campanha`, `fk_hospital`, `titulo`, `descricao`, `img_campanha`, `data`) VALUES
(1, 1, 'Doe Vida', 'Devido aos numeros de requesicoes efectuadas na plataforma "DeSangue" realizou se uma campanha de doacoes', 'fotos/campanha1.jfif', '2021-04-12'),
(2, 2, 'Dia Mundia de Doacoes de Sangue', 'Realizou-se uma campanha para a melhor colheita, tecnicas de como sera o futuro da plataforma', 'fotos/campanha3.jfif', '2021-05-28'),
(3, 3, 'Doacao nas escolas ', 'Realizou-se muitos testes e encontrou-se muitos doadores nas escola. Notou-se que muitos estudantes nao estao atualizados consoante as doacoes', 'fotos/campanha4.jfif', '2021-06-01'),
(4, 4, 'Doacoes nas Igrejas', 'Obtivemos uma parceria muito boa com algumas religioes consoante as doacoes, muitos fieis um deles Anderson Kiole alegando fazer o bem pra Deus nesse ', 'fotos/fieis.jfif', '2021-06-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_doacaoexpontanea`
--

CREATE TABLE IF NOT EXISTS `tb_doacaoexpontanea` (
`id_doacaoExpo` int(11) NOT NULL,
  `fk_hospital` int(11) NOT NULL,
  `fk_doador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_doacoes`
--

CREATE TABLE IF NOT EXISTS `tb_doacoes` (
`id_doacao` int(11) NOT NULL,
  `fk_hospital` int(11) NOT NULL,
  `fk_doador` int(11) NOT NULL,
  `beneficiario` varchar(100) NOT NULL,
  `data_doacao` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_doacoes`
--

INSERT INTO `tb_doacoes` (`id_doacao`, `fk_hospital`, `fk_doador`, `beneficiario`, `data_doacao`, `hora`) VALUES
(1, 3, 1, 'Carla Miranda', '0000-00-00', '00:00:00'),
(2, 1, 1, 'Júlio Manada', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_doador`
--

CREATE TABLE IF NOT EXISTS `tb_doador` (
`id_doador` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `id_grpsanguineo` int(11) NOT NULL,
  `fk_religiao` int(11) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `telefone_principal` int(9) NOT NULL,
  `telefone_secundario` int(9) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `motivo` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_doador`
--

INSERT INTO `tb_doador` (`id_doador`, `id_endereco`, `id_grpsanguineo`, `fk_religiao`, `genero`, `data_nascimento`, `nome`, `sobrenome`, `email`, `senha`, `telefone_principal`, `telefone_secundario`, `estado`, `motivo`) VALUES
(1, 27, 7, 0, 'Masculino', '1999-03-06', 'Eduardo', 'Kiassucumuca', 'edkiassu@hotmail.com', 'ed1226kiassu', 930340539, 993584031, 1, ''),
(2, 2, 2, 0, 'Feminino', '1992-09-02', 'Cassandra', 'Salvador', '', '', 921223311, 993234433, 0, ''),
(3, 26, 5, 0, 'Feminino', '0000-00-00', 'dudeira', 'dudeira', '', '', 912323343, 912323343, 0, ''),
(4, 27, 6, 0, 'Feminino', '0000-00-00', 'Katia', 'SebastiÃ£o', '', '', 923002233, 911121212, 0, ''),
(6, 29, 4, 0, 'Masculino', '0000-00-00', 'Emanuel', 'Tunga', '', '', 921221112, 992332211, 0, ''),
(7, 30, 4, 0, 'Masculino', '0000-00-00', 'Emanuel', 'Tunga', '', '', 921221112, 992332211, 0, ''),
(8, 31, 4, 0, 'Masculino', '0000-00-00', 'Emanuel', 'Tunga', '', '', 921221112, 992332211, 0, ''),
(9, 32, 4, 0, 'Masculino', '0000-00-00', 'Emanuel', 'Tunga', '', '', 921221112, 992332211, 0, ''),
(10, 1, 7, 0, 'Masculino', '0000-00-00', 'Mario Camavunda', 'Soares', '', '', 921344534, 912333343, 0, ''),
(11, 36, 8, 0, '', '0000-00-00', 'Marcio', 'Kiassu', 'kiassucristiano@hotmail.com', '', 930340539, 2, 0, ''),
(12, 36, 5, 0, '', '0000-00-00', 'Silva', 'Ndala', 'dudeira@hotmail.com', '123ab', 912323343, 3, 0, ''),
(13, 0, 5, 0, '', '0000-00-00', 'kjjj', 'jkho', 'kiassucristiano@hotmail.com', '123ab', 930340539, 8, 1, ''),
(14, 0, 5, 0, '', '0000-00-00', 'kjjj', 'jkho', 'kiassucristiano@hotmail.com', '123ab', 930340539, 8, 1, ''),
(15, 36, 0, 0, '', '0000-00-00', '', '', '', '123ab', 0, 0, 1, ''),
(34, 36, 5, 0, '', '0000-00-00', 'dudeira', 'dudeira', 'dudeira@hotmail.com', '123ab', 912323343, 912323343, 1, ''),
(35, 36, 8, 0, '', '0000-00-00', 'duda', 'duda', 'duda@hotmail.com', '123ab', 912986689, 913323343, 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

CREATE TABLE IF NOT EXISTS `tb_endereco` (
`id_endereco` int(11) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `localizacao_area` varchar(500) NOT NULL,
  `estado_provincia` varchar(10) NOT NULL,
  `telefone` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_endereco`
--

INSERT INTO `tb_endereco` (`id_endereco`, `cidade`, `provincia`, `rua`, `bairro`, `localizacao_area`, `estado_provincia`, `telefone`) VALUES
(1, 'Luanda', 'Luanda', '1', 'Primeiro congresso do MPLA', '', '', 0),
(2, 'Sambizanga', 'Bengo', '123', 'Sambizanga', '', '', 0),
(27, 'Benguela', 'Luanda', '0', 'Avenida C.ValÃ³dia', '', '', 0),
(28, 'Sambizanga', 'Uíge', '0', 'Viana', '', '', 0),
(29, 'Luanda', 'Luanda', 'Futungo do Belas', 'Murro Bento', '', '', 0),
(30, 'Luanda', 'Kwanza-Sul', '0', 'Kilamba', '', '', 0),
(31, 'Luanda', 'Luanda', 'Comandante Gika 225', 'Alvalade, Maianga', '', '', 0),
(32, 'Luanda', 'Benguela', 'Rua 31 de Janeiro 666', 'Salina', '', '', 0),
(33, 'Luanda', 'Lunda-Sul', '0', 'Kilamba', '', '', 0),
(34, 'Luanda', 'Lobito', '0', 'Avenida comandante valÃ³dia', '', '', 0),
(35, 'Luanda', 'Luanda', 'Largo Josina Machel', 'Maianga', '', '', 0),
(36, 'Nenhuma', 'Nenhuma', 'Nenhuma', 'Nenhuma', 'Nenhuma', 'Nenhum', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_feedback`
--

CREATE TABLE IF NOT EXISTS `tb_feedback` (
`id_feedback` int(11) NOT NULL,
  `nome_visitante` varchar(100) NOT NULL,
  `descricao_visitante` varchar(900) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_feedback`
--

INSERT INTO `tb_feedback` (`id_feedback`, `nome_visitante`, `descricao_visitante`) VALUES
(1, '', 'Eu Eduardo Kiassucumuca tive um filho no hospital que precisava de sangue urgente e nÃ£o sabia onde encontrar mas depois de ter com um amigo encontrei essa plataforma que salvou a vida do meu filho, grato estou. Obrigado.'),
(2, '', 'Eu Mirian Hamate tive um filho no hospital que precisava de sangue urgente e nÃ£o sabia onde encontrar mas depois de ter com um amigo encontrei essa plataforma que salvou a vida do meu filho, grato estou. Obrigado.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grpsanguineo`
--

CREATE TABLE IF NOT EXISTS `tb_grpsanguineo` (
`id_grpsanguineo` int(11) NOT NULL,
  `tipo_sanguineo` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_grpsanguineo`
--

INSERT INTO `tb_grpsanguineo` (`id_grpsanguineo`, `tipo_sanguineo`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B-'),
(4, 'B+'),
(5, 'AB-'),
(6, 'AB+'),
(7, 'O-'),
(8, 'O+');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_hospital`
--

CREATE TABLE IF NOT EXISTS `tb_hospital` (
`id_hospital` int(11) NOT NULL,
  `nome_hospital` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fk_endereco` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_hospital`
--

INSERT INTO `tb_hospital` (`id_hospital`, `nome_hospital`, `fk_endereco`) VALUES
(1, 'Hospital Josina Maria Pia', 35),
(2, 'INS', 2),
(3, 'Clinica Multiperfil', 29),
(4, 'Clinica Girassol', 31),
(5, 'Hospital De Benguela', 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_necessidades`
--

CREATE TABLE IF NOT EXISTS `tb_necessidades` (
`id_necessidade` int(11) NOT NULL,
  `fk_hospital` int(11) NOT NULL,
  `fk_doador` int(11) NOT NULL,
  `grupo_sanguineo` varchar(50) NOT NULL,
  `img_hospital` varchar(100) NOT NULL,
  `observacao` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_necessidades`
--

INSERT INTO `tb_necessidades` (`id_necessidade`, `fk_hospital`, `fk_doador`, `grupo_sanguineo`, `img_hospital`, `observacao`, `data`, `hora`) VALUES
(1, 1, 0, 'O-, A+', 'fotos/maria3.jfif', 'Urgente', '0000-00-00', '00:00:00'),
(3, 3, 0, 'A-, B+', 'fotos/multiperfil.jfif', '', '0000-00-00', '00:00:00'),
(4, 4, 11, 'B-, O+', 'fotos/girassol3.jfif', '', '2021-07-17', '14:00:00'),
(5, 5, 12, 'AB-, AB+, O+', 'fotos/benguela.jfif', '', '2021-07-16', '12:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_religião`
--

CREATE TABLE IF NOT EXISTS `tb_religião` (
`id_religiao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_campanha`
--
ALTER TABLE `tb_campanha`
 ADD PRIMARY KEY (`id_campanha`);

--
-- Indexes for table `tb_doacaoexpontanea`
--
ALTER TABLE `tb_doacaoexpontanea`
 ADD PRIMARY KEY (`id_doacaoExpo`);

--
-- Indexes for table `tb_doacoes`
--
ALTER TABLE `tb_doacoes`
 ADD PRIMARY KEY (`id_doacao`);

--
-- Indexes for table `tb_doador`
--
ALTER TABLE `tb_doador`
 ADD PRIMARY KEY (`id_doador`);

--
-- Indexes for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
 ADD PRIMARY KEY (`id_endereco`);

--
-- Indexes for table `tb_feedback`
--
ALTER TABLE `tb_feedback`
 ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `tb_grpsanguineo`
--
ALTER TABLE `tb_grpsanguineo`
 ADD PRIMARY KEY (`id_grpsanguineo`);

--
-- Indexes for table `tb_hospital`
--
ALTER TABLE `tb_hospital`
 ADD PRIMARY KEY (`id_hospital`);

--
-- Indexes for table `tb_necessidades`
--
ALTER TABLE `tb_necessidades`
 ADD PRIMARY KEY (`id_necessidade`);

--
-- Indexes for table `tb_religião`
--
ALTER TABLE `tb_religião`
 ADD PRIMARY KEY (`id_religiao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_campanha`
--
ALTER TABLE `tb_campanha`
MODIFY `id_campanha` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_doacaoexpontanea`
--
ALTER TABLE `tb_doacaoexpontanea`
MODIFY `id_doacaoExpo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_doacoes`
--
ALTER TABLE `tb_doacoes`
MODIFY `id_doacao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_doador`
--
ALTER TABLE `tb_doador`
MODIFY `id_doador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tb_feedback`
--
ALTER TABLE `tb_feedback`
MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_grpsanguineo`
--
ALTER TABLE `tb_grpsanguineo`
MODIFY `id_grpsanguineo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_hospital`
--
ALTER TABLE `tb_hospital`
MODIFY `id_hospital` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_necessidades`
--
ALTER TABLE `tb_necessidades`
MODIFY `id_necessidade` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_religião`
--
ALTER TABLE `tb_religião`
MODIFY `id_religiao` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
