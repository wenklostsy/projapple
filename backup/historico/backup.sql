-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: apple
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acesso`
--

DROP TABLE IF EXISTS `acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acesso` (
  `idacesso` int(11) NOT NULL AUTO_INCREMENT,
  `identificacao` varchar(255) NOT NULL,
  `areaadm` int(11) NOT NULL,
  `areauser` int(11) NOT NULL,
  `lastmodificacao` datetime NOT NULL,
  PRIMARY KEY (`idacesso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Verifica as permissões do usuário';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acesso`
--

LOCK TABLES `acesso` WRITE;
/*!40000 ALTER TABLE `acesso` DISABLE KEYS */;
INSERT INTO `acesso` VALUES (1,'matheus.567a@gmail.com',1,0,'2022-03-07 21:16:12'),(2,'lucas@gmail.com',0,0,'2022-03-19 23:38:31');
/*!40000 ALTER TABLE `acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `idcomentarios` int(11) NOT NULL AUTO_INCREMENT,
  `idpergunta` int(11) NOT NULL,
  `comentario` longtext NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `data_comentario` datetime NOT NULL,
  PRIMARY KEY (`idcomentarios`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (1,1,'Me ajudou muito.','Admin','2022-03-20 20:09:32'),(2,1,'Segue...','Admin','2022-03-20 20:10:09');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entradas`
--

DROP TABLE IF EXISTS `entradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradas` (
  `identradas` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `notafiscal` varchar(45) NOT NULL,
  `fornecedor` varchar(45) NOT NULL,
  `valor_gasto` decimal(10,0) DEFAULT NULL,
  `data_entrada` date NOT NULL,
  `data_cad` date NOT NULL,
  `data_edit` datetime NOT NULL,
  PRIMARY KEY (`identradas`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entradas`
--

LOCK TABLES `entradas` WRITE;
/*!40000 ALTER TABLE `entradas` DISABLE KEYS */;
INSERT INTO `entradas` VALUES (1,'Apple AirPods Pro com Estojo de Carregamento',5,'1-579541','iPhone Brasil',850000,'2022-02-26','2022-03-19','0000-00-00 00:00:00'),(2,'MacBook Pro 13',5,'1-156795','iPhone Brasil',6554157,'2022-02-26','2022-03-19','0000-00-00 00:00:00'),(3,'Apple iPhone 11 (128 GB)',5,'1-568749','iPhone Brasil',3758774,'2022-02-27','2022-03-19','0000-00-00 00:00:00'),(4,'Apple Watch Series 7',5,'1-571547','iPhone Brasil',1654152,'2022-02-28','2022-03-19','0000-00-00 00:00:00'),(5,'Playstation 5',5,'1-244587','Amazon Prime',2756398,'2022-03-01','2022-03-19','0000-00-00 00:00:00'),(6,'PlayStation 4 Mega Pack 17',5,'1-571547','Amazon Prime',257869,'2022-02-28','2022-03-19','0000-00-00 00:00:00'),(7,'Console Xbox Series X',5,'1-568749','Amazon Prime',458769,'2022-03-01','2022-03-19','0000-00-00 00:00:00'),(8,'Echo Dot (4&ordf; Gera&ccedil;&atilde;o): Sma',5,'1-598742','Amazon Prime',35250,'2022-03-02','2022-03-19','0000-00-00 00:00:00'),(9,'Monitor Gamer LG Ultrawide 25UM58G - 25&quot;',5,'1-598742','Amazon Prime',712579,'2022-03-05','2022-03-19','0000-00-00 00:00:00'),(10,'The Last of Us Part II - PlayStation 4',5,'1-125974','Amazon Prime',125000,'2022-03-09','2022-03-19','0000-00-00 00:00:00'),(11,'Cyberpunk 2077 - Edi&ccedil;&atilde;o Padr&at',5,'1-571547','Amazon Prime',12500,'2022-03-03','2022-03-19','0000-00-00 00:00:00'),(12,'Console New Nintendo Switch',5,'1-598742','Amazon Prime',1587599,'2022-02-28','2022-03-19','0000-00-00 00:00:00'),(13,'C&acirc;mera HD - PlayStation 5',5,'1-125974','Amazon Prime',187395,'2022-03-11','2022-03-19','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `entradas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedores` (
  `idfornecedores` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `fone` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `data_cad` date NOT NULL,
  `data_edit` date NOT NULL,
  PRIMARY KEY (`idfornecedores`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedores`
--

LOCK TABLES `fornecedores` WRITE;
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` VALUES (1,'iPhone Brasil','08.890.838/0001','03318000','S&atilde;o Paulo','SP','Rua Serra de Bragan&ccedil;a','Vila Gomes Cardim',352,'NÃ£o informado.','112096-3632','teste@iphonebrasil.com.br','Nenhuma observaÃ§Ã£o','2022-03-05','0000-00-00'),(2,'Amazon Prime','15.436.940/0001-03','07231190','Guarulhos','SP','Rua Munhoz','Cidade Industrial Sat&eacute;lite de S&atilde',49,'NÃ£o informado.','11967840919','teste@amazon.com','Nenhuma observaÃ§Ã£o','2022-03-07','0000-00-00');
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perguntas`
--

DROP TABLE IF EXISTS `perguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perguntas` (
  `idperguntas` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `resposta` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `tag` longtext NOT NULL,
  `data_cad` date NOT NULL,
  PRIMARY KEY (`idperguntas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perguntas`
--

LOCK TABLES `perguntas` WRITE;
/*!40000 ALTER TABLE `perguntas` DISABLE KEYS */;
INSERT INTO `perguntas` VALUES (1,'Quero a segunda via do boleto','','Admin','Se voc&ecirc; precisa de uma segunda via do seu boleto ou do c&oacute;digo de barras pra pagamento, acesse Meus Pedidos encontre sua a compra e clique em imprimir boleto.\r\n\r\nO boleto deve ser pago at&eacute; o vencimento porque depois ele perde a validade e voc&ecirc; n&atilde;o consegue mais imprimir de novo, t&aacute;?\r\n\r\nCom o boleto vencido sem pagamento, a compra tamb&eacute;m &eacute; cancelada, ent&atilde;o voc&ecirc; vai precisar comprar de novo ;)',1,'Boleto, Pagamento, Segunda Via','2022-03-20');
/*!40000 ALTER TABLE `perguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `idprodutos` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `ativo` varchar(3) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `especificacao` mediumtext NOT NULL,
  `estoque` varchar(45) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `principal` varchar(45) NOT NULL,
  `img2` varchar(45) NOT NULL,
  `img3` varchar(45) NOT NULL,
  `promo_ini` date DEFAULT NULL,
  `promo_fim` date DEFAULT NULL,
  `valor_desconto` decimal(10,0) DEFAULT NULL,
  `data_cad` date NOT NULL,
  `data_edit` date NOT NULL,
  PRIMARY KEY (`idprodutos`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Apple AirPods Pro com Estojo de Carregamento','Fones','sim','Cancelamento Ativo de Ru&iacute;do para um som totalmente imersivo\r\nModo Ambiente para ouvir o mundo ao seu redor\r\nAjuste personaliz&aacute;vel para conforto o dia todo\r\nCarregue sem fio, use sem parar','Pilha(s) ou bateria(s):	&lrm;3 &Iacute;on de l&iacute;tio baterias ou pilhas necess&aacute;rias (inclusas).\r\nN&uacute;mero do modelo	&lrm;MWP22AM/A\r\nTecnologia sem fio	&lrm;Bluetooth\r\nTecnologia de conex&atilde;o	&lrm;Sem fio\r\nOutras caracter&iacute;sticas de tela	&lrm;Wireless\r\nCor	&lrm;Branco\r\nN&uacute;mero de unidades	&lrm;1\r\nPeso do produto	&lrm;45.3 g\r\nDimens&otilde;es do produto	&lrm;2.38 x 2.18 x 3.09 cm; 45.36 g\r\nMarca	&lrm;Apple','5',172566,'Ft_produto_621a62f5d3c8b.jpg','Ft_produto_dois_621a633b20f41.jpg','Ft_produto_tres_621a63a57d0ec.jpg','2022-02-26','2022-02-26',0,'2022-02-26','2022-03-01'),(2,'MacBook Pro 13','Computador','sim','Chip M1, 8GB RAM, 256GB SSD - Space Gray\r\nMarca	Apple\r\nUsos espec&iacute;ficos do produto	Jogos, Estudante\r\nTamanho da tela	13.3 Polegadas\r\nSistema operacional	MacOS\r\nEntrada de interface humana	Keyboard\r\nFabricante da CPU	VIA\r\nDescri&ccedil;&atilde;o da','Chip M1 projetado pela Apple para um salto gigante na CPU, GPU e desempenho de aprendizado de m&aacute;quina\r\nFa&aacute;a mais com at&eacute; 20 horas de vida &uacute;til da bateria, o mais longo de todos os tempos em um Mac\r\nA CPU de 8 n&uacute;cleos proporciona desempenho at&eacute; 2,8 vezes mais r&aacute;pido para navegar pelos fluxos de trabalho mais r&aacute;pido do que nunca\r\nGPU de 8 n&uacute;cleos com gr&aacute;ficos at&eacute; 5 vezes mais r&aacute;pidos para aplicativos e jogos com muita frequ&aacute;ncia de gr&aacute;ficos\r\nMotor neural de 16 n&uacute;cleos para aprendizado avan&aacute;ado de m&aacute;quina\r\n8 GB de mem&oacute;ria unificada para que tudo o que voc&aacute; faz seja r&aacute;pido e fluido','5',1252466,'Ft_produto_621ba8f0b123e.jpg','Ft_produto_dois_621a6c354f32b.jpg','Ft_produto_tres_621a6c354f333.jpg','0000-00-00','0000-00-00',0,'2022-02-26','2022-03-01'),(3,'Apple iPhone 11 (128 GB)','Celular','sim','Nome do modelo	IPhone 11\r\nOperadora de celulares e tecnologia sem fio	Desbloqueado\r\nMarca	Apple\r\nFator de forma	N&atilde;o aplicavel\r\nCapacidade de armazenamento da mem&oacute;ria	128 GB','Tela LCD Liquid Retina HD de 6,1 polegadas\r\nResistente a &aacute;gua e p&oacute; (at&eacute; 30 minutos &agrave; profundidade m&aacute;xima de 2 metros, IP68)\r\nSistema de c&acirc;mara dupla de 12 MP (Ultra grande angular, Grande angular e Teleobjetiva); modo Noite, modo Retrato e v&iacute;deos em 4K a 60 fps\r\nSistema de c&acirc;mara frontal de 12 MP com modo Retrato, v&iacute;deos em 4K e c&acirc;mara lenta\r\nFace ID para autentica&ccedil;&atilde;o segura','5',712579,'Ft_produto_621bac4d3e733.jpg','Ft_produto_dois_621ba9bd14ce8.jpg','Ft_produto_tres_621ba9bd14cf1.jpg','0000-00-00','0000-00-00',0,'2022-02-27','2022-03-01'),(4,'Apple Watch Series 7','AppleWatch','sim','Tela Retina Sempre Ativa com quase 20% mais &aacute;rea de Tela do que o Series 6, para deixar tudo mais f&aacute;cil de ler e acessar\r\nA Tela de cristal mais resistente a rachaduras em um Apple Watch, com classifica&ccedil;&atilde;o IP6X de resist&ecirc;','Conte&uacute;do da caixa: Case, pulseira, cabo de carregamento magn&eacute;tico de 1 m\r\nConectividade: Wi-Fi 802.11b/g/n 2.4GHz, Bluetooth 5.0\r\nBateria: At&eacute; 18 horas de tempo de bateria\r\nLargura: 35mm, 38mm\r\nProfundidade: 10,7mm\r\nPeso da caixa: 45mm: 38,8g (Alum&iacute;nio); 41mm: 32,0g (Alum&iacute;nio)\r\nProcessador: Processador S7 SiP de dois n&uacute;cleos de 64 bits &eacute; at&eacute; 20% mais r&aacute;pido que o chip S5 do Apple Watch SE\r\nCapacidade: 32GB','5',312559,'Ft_produto_621bd835f3a8f.png','Ft_produto_dois_621bd835f3d52.jpg','Ft_produto_tres_621bd835f3d5e.jpg',NULL,NULL,NULL,'2022-02-27','2022-03-01'),(5,'Playstation 5','Computador','sim','Marca:	PlayStation\r\nSistema operacional:	Playstation_5\r\nPlataforma de hardware:	PlayStation 5\r\nN&uacute;mero de jogadores:	1\r\nData de publica&ccedil;&atilde;o:	17 novembro 2020','Domine o poder de uma CPU e GPU personalizadas e o SSD com E/S integradas que redefinem as regras do que o console Playstation pode fazer\r\nSSD ultrarr&aacute;pido: Maximize suas sess&otilde;es de jogo com tempos de carregamento praticamente instant&acirc;neos para jogos do PS5 instalados.\r\nE/S integrada: A integra&ccedil;&atilde;o personalizada dos sistemas de console PS5 permite que os criadores extraiam dados do SSD t&atilde;o r&aacute;pido que eles podem desenvolver jogos de formas que antes seriam imposs&iacute;veis.\r\nMaravilhe-se com os gr&aacute;ficos incr&iacute;veis e experimente os recursos do novo PS5\r\nVers&atilde;o com leitor de Blu-ray','5',532500,'Ft_produto_621d6a3c5844c.jpg','Ft_produto_dois_621c30841b368.jpg','Ft_produto_tres_621c30841b370.jpg','0000-00-00','0000-00-00',0,'2022-02-27','2022-03-01'),(6,'PlayStation 4 Mega Pack 17','Computador','sim','Marca	Sony\r\nPlataforma de hardware	PlayStation 4\r\nData de publica&ccedil;&atilde;o	17 agosto 2020','Mais leve e mais fino, o sistema PlayStation 4 tem disco r&iacute;gido de 1 TB para tudo o que h&aacute; de melhor em jogos, m&uacute;sicas e muito mais\r\nO pacote PlayStation Hits oferece jogos incr&iacute;veis que proporcionar&atilde;o entretenimento sem fim com jogos din&acirc;micos e conectados, gr&aacute;ficos e velocidade intensos, personaliza&ccedil;&atilde;o inteligente, recursos sociais integrados intensamente e inovadores recursos de segunda tela\r\nJogos inclusos: Dreams, Spider Man e Infamous Second son\r\nInclui controle DualShock4, assinatura de 3 meses da ps plus','5',500000,'Ft_produto_621edaf893e8a.jpg','Ft_produto_dois_621edaf893e9f.jpg','Ft_produto_tres_621edaf893ea6.jpg',NULL,NULL,NULL,'2022-03-01','0000-00-00'),(7,'Console Xbox Series X','Computador','sim','Marca	Microsoft\r\nSistema operacional	Xbox_series_x\r\nPlataforma de hardware	Xbox Series X\r\nN&uacute;mero de jogadores	1\r\nData de publica&ccedil;&atilde;o	9 novembro 2020','Console Xbox mais r&aacute;pido e poderoso de todos os tempos\r\nJogue milhares de t&iacute;tulos: todos os jogos t&ecirc;m melhor apar&ecirc;ncia e s&atilde;o melhor executados no Xbox Series X\r\nNo cora&ccedil;&atilde;o do Series X est&aacute; a Xbox Velocity Architecture, que combina um SSD personalizado e software integrado para diminuir significativamente os tempos de carregamento dentro e fora do jogo\r\nTroque simultaneamente entre v&aacute;rios jogos em um instante com o Quick Resume','5',412052,'Ft_produto_621edbca76daf.jpg','Ft_produto_dois_621edbca76dc3.jpg','Ft_produto_tres_621edbca76dca.jpg',NULL,NULL,NULL,'2022-03-01','2022-03-01'),(8,'Echo Dot (4&ordf; Gera&ccedil;&atilde;o): Smart Speaker com Alexa','Computador','sim','Conhe&ccedil;a o Echo Dot (4&ordf; Gera&ccedil;&atilde;o): nosso smart speaker com Alexa de maior sucesso ainda melhor. O novo design de &aacute;udio com direcionamento frontal (1 speaker de 1,6&quot;) garante mais graves e um som completo.\r\nControle m&am','Sempre pronta para ajudar: pe&ccedil;a para a Alexa tocar m&uacute;sicas, responder perguntas, ler as not&iacute;cias, checar a previs&atilde;o do tempo, criar alarmes, controlar dispositivos de casa inteligente compat&iacute;veis e muito mais.\r\nControle sua casa inteligente: com sua voz, controle facilmente dispositivos compat&iacute;veis e pe&ccedil;a &agrave; Alexa para acender as luzes, trancar portas e muito mais. &ldquo;Alexa, ligue a TV&rdquo;.','5',57500,'Ft_produto_621edc876dec2.jpeg','Ft_produto_dois_621edc5683727.jpg','Ft_produto_tres_621edc568372f.jpeg',NULL,NULL,NULL,'2022-03-01','2022-03-19'),(9,'Monitor Gamer LG Ultrawide 25UM58G - 25&quot;','Computador','sim','Usos espec&iacute;ficos do produto	Jogos\r\nTaxa de atualiza&ccedil;&atilde;o	75 Hz\r\nMarca	LG\r\nTamanho da tela	25 Polegadas\r\nCaracter&iacute;sticas especiais	Tela Ultrawide','Tenha imagens sem rastros e a&ccedil;&otilde;es mais r&aacute;pidas com o tempo de resposta de 1ms com Motion Blur Reduction.\r\nPropor&ccedil;&atilde;o de imagem de 21:9 do monitor UltraWide torna os jogos e filmes mais envolventes do que nunca.\r\nA nitidez da resolu&ccedil;&atilde;o Full HD de 1080p com IPS faz a diferen&ccedil;a. Simplificando, de qualquer &acirc;ngulo de vis&atilde;o, tudo fica mais n&iacute;tido e detalhado em Full HD.','5',153300,'Ft_produto_621edd5d9565c.jpeg','Ft_produto_dois_621edd5d95673.jpg','Ft_produto_tres_621edd5d95678.jpg',NULL,NULL,NULL,'2022-03-01','0000-00-00'),(10,'The Last of Us Part II - PlayStation 4','Computador','sim','Marca	Sony\r\nFormato	Importado\r\nData de publica&ccedil;&atilde;o	29 maio 2020','Pre-order &amp; receive the following special in-game items:Ammo Capacity Upgrade:Unlock an ammo capacity upgrade for Ellie&#039;s pistol.Crafting Training Manual:Unlock the Crafting Training Manual, which provides access to new crafting recipes and upgrades.\r\nA Complex &amp; Emotional Story-Experience the escalating moral conflicts created by Ellie&#039;s relentless pursuit of vengeance. The cycle of violence left in her wake will challenge your notions of right versus wrong, good versus evil, and hero versus villain.\r\nA Beautiful Yet Dangerous World - Set out on Ellie&#039;s journey, taking her from the peaceful mountains and forests of Jackson to the lush, overgrown ruins of greater Seattle. Encounter new survivor groups, and terrifying evolutions of the infected.','5',25000,'Ft_produto_623687c663bb0.jpg','Ft_produto_dois_621ede15c1678.jpg','Ft_produto_tres_621ede15c1684.jpg','0000-00-00','0000-00-00',0,'2022-03-02','2022-03-02'),(11,'Cyberpunk 2077 - Edi&ccedil;&atilde;o Padr&atilde;o','Computador','sim','Marca	PlayStation\r\nSistema operacional	Playstation_4\r\nPlataforma de hardware	PlayStation 4\r\nG&ecirc;nero	Guerra\r\nData de publica&ccedil;&atilde;o	10 dezembro 2020','JOGUE COMO UM MERCEN&Aacute;RIO FORA DA LEI: Torne-se um cyberpunk - um mercen&aacute;rio urbano equipado com melhorias cibern&eacute;ticas - e construa a sua lenda nas ruas de Night City.\r\nVIVA NA CIDADE DO FUTURO: Entre no enorme mundo aberto de Night City, um lugar que define novos padr&otilde;es no quesito de complexidade, profundidade e visual.\r\nROUBE O IMPLANTE QUE CONCEDE A VIDA ETERNA: Aceite o trabalho mais arriscado da sua vida e corra atr&aacute;s de um prot&oacute;tipo de implante com a chave da imortalidade.','5',12000,'Ft_produto_621edf3324655.jpg','Ft_produto_dois_621edf3324678.jpg','Ft_produto_tres_621edf3324683.jpg',NULL,NULL,NULL,'2022-03-02','2022-03-19'),(12,'Console New Nintendo Switch','Computador','sim','Marca	Nintendo\r\nPlataforma de hardware	Nintendo Switch\r\nData de publica&ccedil;&atilde;o	19 setembro 2020','Modelo com bateria estendida; dura&ccedil;&atilde;o varia de acordo com os jogos ou aplica&ccedil;&otilde;es utilizados; com The Legend of Zelda: Breath of the Wild, por exemplo, a bateria dura aproximadamente 5, 5 horas\r\nSuporta 3 tipos diferentes de jogabilidade: Modo TV, Modo suporte de mesa e Modo port&aacute;til\r\nConecta-se via Wi-Fi para jogos com v&aacute;rios jogadores\r\nProduto bivolt\r\n1 ano de garantia','5',315000,'Ft_produto_621ee10846dab.jpg','Ft_produto_dois_62374a3a5e623.jpg','Ft_produto_tres_62374b08bb404.jpg','0000-00-00','0000-00-00',0,'2022-03-02','2022-03-20'),(13,'C&acirc;mera HD - PlayStation 5','Computador','sim','Marca	Playstation\r\nSistema operacional	Playstation_5\r\nPlataforma de hardware	Playstation 5\r\nN&uacute;mero de jogadores	1\r\nData de publica&ccedil;&atilde;o	19 novembro 2020','N&atilde;o tem sensor de movimento - Indicada para Streaming.\r\nCom duas lentes para captura em 1080p\r\nCapture sua imagem em Full HD com nitidez e fluidez\r\nConsiga aquele &acirc;ngulo perfeito com o suporte ajust&aacute;vel integrado da c&acirc;mera HD.\r\nCom a c&acirc;mera HD, voc&ecirc; pode adicionar sua pr&oacute;pria imagem aos v&iacute;deos de jogos enquanto transmite no modo picture-in-picture\r\nPersonalize a maneira de compartilhar seus jogos com a C&acirc;mera HD para PS5','5',35000,'Ft_produto_62373edeb69aa.jpg','Ft_produto_dois_6237520960a71.jpg','Ft_produto_tres_6237521825e74.jpg',NULL,NULL,NULL,'2022-03-02','2022-03-20');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `telefone` int(11) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `data_cad` datetime NOT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabela de usuarios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin',2147483647,'07230091','Guarulhos','SP','Passagem Particular','Jardim Ottawa','49','matheus.567a@gmail.com','$2y$10$olcL.6Thw3O8KQhSASpod.k/md475cuKh5gAYz7R71FZqfgsETvPq','2022-03-07 21:16:12'),(2,'Lucas Ribeiro',1157649187,'07230081','Guarulhos','SP','Passagem Capistrano','Parque Uirapuru','51','lucas@gmail.com','$2y$10$260xfWjUzg.rj2GU6pVEQeqUsvmYjFT5KaIoS5oa8N9ZUCM.FZwD.','2022-03-19 23:38:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-20 21:14:37
