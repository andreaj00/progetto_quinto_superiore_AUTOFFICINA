-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 20, 2019 alle 19:13
-- Versione del server: 10.1.36-MariaDB
-- Versione PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autofficinaphp`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `amministrazione`
--

CREATE TABLE `amministrazione` (
  `id_amministrazione` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `codice_fiscale` char(16) NOT NULL,
  `data_nascita` date NOT NULL,
  `fk_id_localita` int(11) NOT NULL,
  `telefono` char(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `licenziato` enum('si','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `amministrazione`
--

INSERT INTO `amministrazione` (`id_amministrazione`, `nome`, `cognome`, `codice_fiscale`, `data_nascita`, `fk_id_localita`, `telefono`, `email`, `licenziato`) VALUES
(1, 'bill', 'gates', 'BILGAT55H28H501A', '1955-10-28', 2, '3331234567', 'billgates@live.it', 'no'),
(2, 'tim', 'cook', 'TIMCOO60H01H501A', '1960-11-01', 3, '3312345678', 'timcook@gmail.com', 'no'),
(3, 'er', 'capo', 'ERCAPOFISCALECOD', '2019-05-15', 27, '9876543210', 'er@capo.it', 'no'),
(4, 'amministratore', 'amministratore', 'AMMINISTRATORE', '2001-01-01', 28, '0123321012', 'amm@inistra.tore', 'no');

-- --------------------------------------------------------

--
-- Struttura della tabella `anagrafica_intervento`
--

CREATE TABLE `anagrafica_intervento` (
  `id_anagrafica_intervento` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `tipo` enum('lavoro su carrozzeria','lavoro impianto elettrico','lavoro impianto meccanico','lavoro su interni') NOT NULL,
  `costo_orario` float(5,2) NOT NULL,
  `tempo_previsto` float(7,2) NOT NULL,
  `descrizione` text,
  `aliquota_da_aggiungere` float(5,2) NOT NULL,
  `percentuale_sconto` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `anagrafica_intervento`
--

INSERT INTO `anagrafica_intervento` (`id_anagrafica_intervento`, `nome`, `tipo`, `costo_orario`, `tempo_previsto`, `descrizione`, `aliquota_da_aggiungere`, `percentuale_sconto`) VALUES
(3, 'cambio motore', 'lavoro su carrozzeria', 50.00, 10.00, '', 1.00, 0.00),
(4, 'cambio pneumatico', 'lavoro su carrozzeria', 60.00, 0.50, '', 0.00, 0.00),
(5, 'fili radio', 'lavoro impianto elettrico', 50.00, 0.25, ' ', 0.00, 0.00),
(6, 'cambio tergicristall', 'lavoro su carrozzeria', 50.00, 0.10, ' ', 0.00, 0.00),
(8, 'cambio specchietto dx', 'lavoro su carrozzeria', 50.00, 0.50, ' ', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome`) VALUES
(8, 'liquido'),
(1, 'olio'),
(2, 'pasticche'),
(4, 'pneumatico'),
(7, 'tergicristalli');

-- --------------------------------------------------------

--
-- Struttura della tabella `citta`
--

CREATE TABLE `citta` (
  `id_citta` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `fk_id_regione` int(11) NOT NULL,
  `fk_id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `citta`
--

INSERT INTO `citta` (`id_citta`, `nome`, `fk_id_regione`, `fk_id_provincia`) VALUES
(34, '	Fumone', 1, 2),
(37, '	Rocca d Arce', 1, 2),
(6, 'ANZIO', 1, 1),
(30, 'Aquino', 1, 2),
(31, 'Atina', 1, 2),
(14, 'Barbarano Romano', 1, 5),
(15, 'Blera', 1, 5),
(18, 'BlMontefiasconeera', 1, 5),
(20, 'Bolsena', 1, 5),
(9, 'BRACCIANO', 1, 1),
(16, 'Capodimonte', 1, 5),
(32, 'Cassino', 1, 2),
(33, 'Cervaro', 1, 2),
(7, 'CERVETERI', 1, 1),
(4, 'CIAMPINO', 1, 1),
(35, 'Fiuggi', 1, 2),
(5, 'FIUMICINO', 1, 1),
(3, 'FRASCATI', 1, 1),
(29, 'frosinone', 1, 2),
(17, 'Gradoli', 1, 5),
(21, 'Graffignano', 1, 5),
(10, 'GROTTA FERRATA', 1, 1),
(28, 'Monte Romano', 1, 5),
(8, 'MONTE ROTONDO', 1, 1),
(22, 'Monterosi', 1, 5),
(27, 'Nepi', 1, 5),
(11, 'NETTUNO', 1, 1),
(26, 'Orte', 1, 5),
(36, 'Pastena', 1, 2),
(41, 'Pontecorvo', 1, 2),
(12, 'ROCCA DI PAPA', 1, 1),
(1, 'ROMA', 1, 1),
(25, 'Ronciglione', 1, 5),
(38, 'Serrone', 1, 2),
(24, 'Sutri', 1, 5),
(19, 'Tarquinia', 1, 5),
(2, 'TIVOLI', 1, 1),
(40, 'Vallerotonda', 1, 2),
(23, 'Vetralla', 1, 5),
(39, 'Villa Latina', 1, 2),
(13, 'VITERBO', 1, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `codice_fiscale` char(16) NOT NULL,
  `data_nascita` date NOT NULL,
  `fk_id_localita` int(11) DEFAULT NULL,
  `telefono` char(10) NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cognome`, `codice_fiscale`, `data_nascita`, `fk_id_localita`, `telefono`, `email`) VALUES
(1, 'nessun', 'possessore', 'nessunpossessore', '2000-01-01', 25, '0000000000', NULL),
(11, 'mario', 'rossi', 'MROROS60H01H000A', '1960-04-01', NULL, '3333333333', 'mariorossi@gmail.com'),
(12, 'luigi', 'verdi', 'LUIVER65H21H501A', '1965-01-21', NULL, '3333333334', 'luigiverdi@gmail.com'),
(13, 'nome', 'cognome', 'CODFIS00H01H501A', '2000-01-01', NULL, '963852014', 'nomecognome@gmail.com'),
(14, 'simona', 'castella', 'SIMCAS00H01H501A', '2019-05-17', NULL, '1024563201', 'simonacastella@gmail.com'),
(15, 'cliente', 'prova', 'CODICEFISCALE', '2019-05-19', NULL, '9999999999', 'em@ai.l');

-- --------------------------------------------------------

--
-- Struttura della tabella `comporre`
--

CREATE TABLE `comporre` (
  `fk_id_operazione` int(11) NOT NULL,
  `fk_id_intervento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `comportare`
--

CREATE TABLE `comportare` (
  `fk_id_smaltimento` int(11) NOT NULL,
  `fk_id_intervento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `fattura`
--

CREATE TABLE `fattura` (
  `id_fattura` int(11) NOT NULL,
  `data_emissione` date NOT NULL,
  `importo_iniziale` float(7,2) NOT NULL,
  `importo_iva` float(7,2) NOT NULL,
  `importo_sconto` float(7,2) NOT NULL,
  `importo_finale` float(7,2) NOT NULL,
  `fk_id_operazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `intervento`
--

CREATE TABLE `intervento` (
  `id_intervento` int(11) NOT NULL,
  `stato` enum('in attesa','in esecuzione','finito') NOT NULL DEFAULT 'in attesa',
  `note_aggiuntive` text,
  `fk_id_anagrafica_intervento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `localita`
--

CREATE TABLE `localita` (
  `id_localita` int(11) NOT NULL,
  `via` varchar(30) NOT NULL,
  `civico` varchar(6) NOT NULL,
  `cap` char(5) NOT NULL,
  `fk_id_citta` int(11) NOT NULL,
  `fk_id_provincia` int(11) NOT NULL,
  `fk_id_regione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `localita`
--

INSERT INTO `localita` (`id_localita`, `via`, `civico`, `cap`, `fk_id_citta`, `fk_id_provincia`, `fk_id_regione`) VALUES
(1, 'via pollenza', '105', '00156', 1, 1, 1),
(2, 'casal tidei', '100', '00156', 1, 1, 1),
(3, 'casal san basilio', '1', '00156', 1, 1, 1),
(22, 'via jose', '1', '00100', 1, 1, 1),
(24, 'liceziolandia', '1', '11111', 1, 1, 1),
(25, 'nessunutente', '0', '00000', 1, 1, 1),
(26, 'simona', '0', '12301', 1, 1, 1),
(27, 'provacliente', '1', '11111', 1, 1, 1),
(28, 'amministratore', '1', '1', 10, 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `marca`
--

INSERT INTO `marca` (`id_marca`, `nome`) VALUES
(6, 'BMW'),
(11, 'bugatti'),
(9, 'Citroen'),
(10, 'Daihatsu'),
(2, 'Dongfeng Motor'),
(5, 'Fiat'),
(3, 'General Motors'),
(7, 'GMC'),
(4, 'Honda'),
(1, 'Kenworth'),
(8, 'Seat');

-- --------------------------------------------------------

--
-- Struttura della tabella `meccanico`
--

CREATE TABLE `meccanico` (
  `id_meccanico` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `codice_fiscale` char(16) NOT NULL,
  `data_nascita` date NOT NULL,
  `fk_id_localita` int(11) NOT NULL,
  `telefono` char(10) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `licenziato` enum('si','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `meccanico`
--

INSERT INTO `meccanico` (`id_meccanico`, `nome`, `cognome`, `codice_fiscale`, `data_nascita`, `fk_id_localita`, `telefono`, `email`, `licenziato`) VALUES
(2, 'jose', 'rodriguez', 'JOSROD50H01H501A', '1950-02-01', 22, '3124567989', 'joserodriguez@gmail.com', 'no'),
(4, 'da', 'licenziare', 'AAAAAAAAAAAAAAAA', '2019-05-05', 24, '00000000', 'aaaaa@aaa.it', 'si');

-- --------------------------------------------------------

--
-- Struttura della tabella `modello`
--

CREATE TABLE `modello` (
  `id_modello` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `tipo` enum('berlina','monovolume','station wagon','pick_up','coupé','cabriolet','roadster','SUV','furgone','autotreno','motoveicolo','utilitaria') NOT NULL,
  `peso` float(7,2) NOT NULL,
  `cambio_automatico` bit(1) NOT NULL,
  `alimentazione` enum('elettrica','gpl','metano','benzina','diesel','ibrida') NOT NULL,
  `cilindrata` float(2,1) NOT NULL,
  `fk_id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `modello`
--

INSERT INTO `modello` (`id_modello`, `nome`, `tipo`, `peso`, `cambio_automatico`, `alimentazione`, `cilindrata`, `fk_id_marca`) VALUES
(1, 'X5', 'monovolume', 2000.00, b'1', 'diesel', 2.0, 6),
(2, 'panda', 'utilitaria', 1000.00, b'1', 'diesel', 1.0, 5),
(3, 'punto', 'utilitaria', 1500.00, b'1', 'diesel', 2.5, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `operazione`
--

CREATE TABLE `operazione` (
  `id_operazione` int(11) NOT NULL,
  `data_inizio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_fine_prevista` datetime NOT NULL,
  `data_fine_effettiva` datetime DEFAULT NULL,
  `data_ritiro` datetime DEFAULT NULL,
  `fk_targa` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `id_prodotto` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `costo` float(7,2) NOT NULL,
  `descrizione` text NOT NULL,
  `fk_id_categoria` int(11) DEFAULT NULL,
  `percentuale_sconto` float(5,2) NOT NULL,
  `aliquota_da_aggiungere` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`id_prodotto`, `nome`, `costo`, `descrizione`, `fk_id_categoria`, `percentuale_sconto`, `aliquota_da_aggiungere`) VALUES
(2, 'olio motore', 10.00, 'olio per il motore', 1, 0.50, 0.00),
(3, 'olio lubrificante', 5.00, 'olio per lubrificare', 1, 0.00, 0.00),
(4, 'pneumatico pirelli', 50.00, '', 4, 0.00, 0.00),
(5, 'refrigerante', 5.00, 'refrigerante motore', 8, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Struttura della tabella `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `fk_id_regione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nome`, `fk_id_regione`) VALUES
(77, 'Agrigento', 15),
(58, 'Alessandria', 12),
(51, 'Ancona', 10),
(100, 'Aosta', 19),
(86, 'Arezzo', 16),
(52, 'Ascoli Piceno', 10),
(59, 'Asti', 12),
(17, 'Avellino', 5),
(66, 'Bari', 13),
(67, 'Barletta', 13),
(101, 'Belluno', 20),
(18, 'Benevento', 5),
(39, 'Bergamo', 9),
(60, 'Biella', 12),
(22, 'Bologna', 6),
(96, 'Bolzano', 17),
(40, 'Brescia', 9),
(68, 'Brindisi', 13),
(72, 'Cagliari', 14),
(78, 'Caltanissetta', 15),
(56, 'Campobasso', 11),
(19, 'Caserta', 5),
(79, 'Catania', 15),
(12, 'Catanzaro', 4),
(6, 'Chieti', 2),
(41, 'Como', 9),
(13, 'Cosenza', 4),
(42, 'Cremona', 9),
(14, 'Crotone', 4),
(61, 'Cuneo', 12),
(80, 'Enna', 15),
(53, 'Fermo', 10),
(23, 'Ferrara', 6),
(87, 'Firenze', 16),
(69, 'Foggia', 13),
(24, 'Forli-Cesena', 6),
(2, 'Frosinone', 1),
(35, 'Genova', 8),
(31, 'Gorizia', 7),
(88, 'Grosseto', 16),
(36, 'Imperia', 8),
(57, 'Isernia', 11),
(7, 'L\'Aquila', 2),
(37, 'La Spezia', 8),
(3, 'Latina', 1),
(70, 'Lecce', 13),
(43, 'Lecco', 9),
(89, 'Livorno', 16),
(44, 'Lodi', 9),
(90, 'Lucca', 16),
(54, 'Macerata', 10),
(45, 'Mantova', 9),
(91, 'Massa-Carrara', 16),
(11, 'Matera', 3),
(81, 'Messina', 15),
(46, 'Milano', 9),
(25, 'Modena', 6),
(47, 'Monza/Brienza', 9),
(20, 'Napoli', 5),
(62, 'Novara', 12),
(73, 'Nuoro', 14),
(74, 'Oristano', 14),
(102, 'Padova', 20),
(82, 'Palermo', 15),
(26, 'Parma', 6),
(48, 'Pavia', 9),
(98, 'Perugia', 18),
(55, 'Pesaro e Urbino', 10),
(8, 'Pescara', 2),
(27, 'Piacenza', 6),
(92, 'Pisa', 16),
(93, 'Pistoia', 16),
(32, 'Pordenone', 7),
(10, 'Potenza', 3),
(94, 'Prato', 16),
(83, 'Ragusa', 15),
(28, 'Ravenna', 6),
(15, 'Reggio Calabria', 4),
(29, 'Reggio Emilia', 6),
(4, 'Rieti', 1),
(30, 'Rimini', 6),
(1, 'ROMA', 1),
(103, 'Rovigo', 20),
(21, 'Salerno', 5),
(75, 'Sassari', 14),
(38, 'Savona', 8),
(95, 'Siena', 16),
(84, 'Siracusa', 15),
(49, 'Sondrio', 9),
(76, 'Sud Sardegna', 14),
(71, 'Taranto', 13),
(9, 'Teramo', 2),
(99, 'Terni', 18),
(63, 'Torino', 12),
(85, 'Trapani', 15),
(97, 'Trento', 17),
(104, 'Treviso', 20),
(33, 'Trieste', 7),
(34, 'Udine', 7),
(50, 'Varese', 9),
(105, 'Venezia', 20),
(64, 'Verbano', 12),
(65, 'Vercelli', 12),
(106, 'Verona', 20),
(16, 'Vibo Valentia', 4),
(107, 'Vicenza', 20),
(5, 'Viterbo', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `regione`
--

CREATE TABLE `regione` (
  `id_regione` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `regione`
--

INSERT INTO `regione` (`id_regione`, `nome`) VALUES
(1, 'LAZIO'),
(2, 'Abruzzo'),
(3, 'Basilicata'),
(4, 'Calabria'),
(5, 'Campania'),
(6, 'Emilia-Romagna'),
(7, 'Friuli'),
(8, 'Liguria'),
(9, 'Lombardia'),
(10, 'Marche'),
(11, 'Molise'),
(12, 'Piemonte'),
(13, 'Puglia'),
(14, 'Sardegna'),
(15, 'Sicilia'),
(16, 'Toscana'),
(17, 'Trentino-Alto Adige'),
(18, 'Umbria'),
(19, 'Valle d\'Aosta'),
(20, 'Veneto');

-- --------------------------------------------------------

--
-- Struttura della tabella `registrazione_amministrazione`
--

CREATE TABLE `registrazione_amministrazione` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fk_id_amministrazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `registrazione_amministrazione`
--

INSERT INTO `registrazione_amministrazione` (`username`, `password`, `fk_id_amministrazione`) VALUES
('billgates', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
('timcook', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
('ercapo', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
('amministratore', '5f4dcc3b5aa765d61d8327deb882cf99', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `registrazione_cliente`
--

CREATE TABLE `registrazione_cliente` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fk_id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `registrazione_cliente`
--

INSERT INTO `registrazione_cliente` (`username`, `password`, `fk_id_cliente`) VALUES
('mariorossi', '5f4dcc3b5aa765d61d8327deb882cf99', 11),
('luigi', '5f4dcc3b5aa765d61d8327deb882cf99', 12),
('nome', '5f4dcc3b5aa765d61d8327deb882cf99', 13),
('simona', '5f4dcc3b5aa765d61d8327deb882cf99', 14),
('prova', '5f4dcc3b5aa765d61d8327deb882cf99', 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `smaltimento`
--

CREATE TABLE `smaltimento` (
  `id_smaltimento` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descrizione` text,
  `costo` float(7,2) NOT NULL,
  `tipo` enum('batteria','liquido','ricambi','filtri','utensili') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `smaltimento`
--

INSERT INTO `smaltimento` (`id_smaltimento`, `nome`, `descrizione`, `costo`, `tipo`) VALUES
(4, 'batteria auto', 'smaltimento batteria auto', 10.00, 'batteria'),
(7, 'filtro nafta', '', 20.00, 'filtri');

-- --------------------------------------------------------

--
-- Struttura della tabella `svolgere`
--

CREATE TABLE `svolgere` (
  `fk_id_intervento` int(11) NOT NULL,
  `fk_id_meccanico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `utilizzare`
--

CREATE TABLE `utilizzare` (
  `fk_id_intervento` int(11) NOT NULL,
  `fk_id_prodotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `veicolo`
--

CREATE TABLE `veicolo` (
  `targa` char(7) NOT NULL,
  `fk_id_cliente` int(11) NOT NULL,
  `fk_id_modello` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `veicolo`
--

INSERT INTO `veicolo` (`targa`, `fk_id_cliente`, `fk_id_modello`) VALUES
('AA000AA', 12, 1),
('BB000BB', 12, 1),
('EE444EE', 12, 2),
('PR000VA', 15, 3),
('RP000VA', 15, 2),
('SI000NA', 14, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `amministrazione`
--
ALTER TABLE `amministrazione`
  ADD PRIMARY KEY (`id_amministrazione`),
  ADD UNIQUE KEY `codice_fiscale` (`codice_fiscale`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_id_localita` (`fk_id_localita`);

--
-- Indici per le tabelle `anagrafica_intervento`
--
ALTER TABLE `anagrafica_intervento`
  ADD PRIMARY KEY (`id_anagrafica_intervento`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indici per le tabelle `citta`
--
ALTER TABLE `citta`
  ADD PRIMARY KEY (`id_citta`),
  ADD UNIQUE KEY `nome` (`nome`,`fk_id_regione`,`fk_id_provincia`),
  ADD KEY `fk_id_provincia` (`fk_id_provincia`),
  ADD KEY `fk_id_regione` (`fk_id_regione`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `codice_fiscale` (`codice_fiscale`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_id_localita` (`fk_id_localita`);

--
-- Indici per le tabelle `comporre`
--
ALTER TABLE `comporre`
  ADD PRIMARY KEY (`fk_id_operazione`,`fk_id_intervento`),
  ADD KEY `fk_id_intervento` (`fk_id_intervento`);

--
-- Indici per le tabelle `comportare`
--
ALTER TABLE `comportare`
  ADD PRIMARY KEY (`fk_id_smaltimento`,`fk_id_intervento`),
  ADD KEY `fk_id_intervento` (`fk_id_intervento`);

--
-- Indici per le tabelle `fattura`
--
ALTER TABLE `fattura`
  ADD PRIMARY KEY (`id_fattura`),
  ADD UNIQUE KEY `fk_id_operazione_2` (`fk_id_operazione`),
  ADD KEY `fk_id_operazione` (`fk_id_operazione`);

--
-- Indici per le tabelle `intervento`
--
ALTER TABLE `intervento`
  ADD PRIMARY KEY (`id_intervento`),
  ADD KEY `fk_id_anagrafica_intervento` (`fk_id_anagrafica_intervento`);

--
-- Indici per le tabelle `localita`
--
ALTER TABLE `localita`
  ADD PRIMARY KEY (`id_localita`),
  ADD KEY `localita_ibfk_1` (`fk_id_regione`),
  ADD KEY `localita_ibfk_2` (`fk_id_provincia`),
  ADD KEY `fk_id_citta` (`fk_id_citta`);

--
-- Indici per le tabelle `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indici per le tabelle `meccanico`
--
ALTER TABLE `meccanico`
  ADD PRIMARY KEY (`id_meccanico`),
  ADD UNIQUE KEY `codice_fiscale` (`codice_fiscale`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_id_localita` (`fk_id_localita`);

--
-- Indici per le tabelle `modello`
--
ALTER TABLE `modello`
  ADD PRIMARY KEY (`id_modello`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `fk_id_marca` (`fk_id_marca`);

--
-- Indici per le tabelle `operazione`
--
ALTER TABLE `operazione`
  ADD PRIMARY KEY (`id_operazione`),
  ADD KEY `fk_targa` (`fk_targa`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id_prodotto`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `fk_id_categoria` (`fk_id_categoria`);

--
-- Indici per le tabelle `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`),
  ADD UNIQUE KEY `nome` (`nome`,`fk_id_regione`),
  ADD KEY `fk_id_regione` (`fk_id_regione`);

--
-- Indici per le tabelle `regione`
--
ALTER TABLE `regione`
  ADD PRIMARY KEY (`id_regione`);

--
-- Indici per le tabelle `registrazione_amministrazione`
--
ALTER TABLE `registrazione_amministrazione`
  ADD PRIMARY KEY (`fk_id_amministrazione`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indici per le tabelle `registrazione_cliente`
--
ALTER TABLE `registrazione_cliente`
  ADD PRIMARY KEY (`fk_id_cliente`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indici per le tabelle `smaltimento`
--
ALTER TABLE `smaltimento`
  ADD PRIMARY KEY (`id_smaltimento`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indici per le tabelle `svolgere`
--
ALTER TABLE `svolgere`
  ADD PRIMARY KEY (`fk_id_intervento`,`fk_id_meccanico`),
  ADD KEY `fk_meccanico` (`fk_id_meccanico`);

--
-- Indici per le tabelle `utilizzare`
--
ALTER TABLE `utilizzare`
  ADD KEY `fk_id_intervento` (`fk_id_intervento`),
  ADD KEY `fk_id_prodotto` (`fk_id_prodotto`);

--
-- Indici per le tabelle `veicolo`
--
ALTER TABLE `veicolo`
  ADD PRIMARY KEY (`targa`),
  ADD KEY `fk_id_modello` (`fk_id_modello`),
  ADD KEY `fk_id_cliente` (`fk_id_cliente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `amministrazione`
--
ALTER TABLE `amministrazione`
  MODIFY `id_amministrazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `anagrafica_intervento`
--
ALTER TABLE `anagrafica_intervento`
  MODIFY `id_anagrafica_intervento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `citta`
--
ALTER TABLE `citta`
  MODIFY `id_citta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT per la tabella `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `fattura`
--
ALTER TABLE `fattura`
  MODIFY `id_fattura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT per la tabella `intervento`
--
ALTER TABLE `intervento`
  MODIFY `id_intervento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT per la tabella `localita`
--
ALTER TABLE `localita`
  MODIFY `id_localita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT per la tabella `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `meccanico`
--
ALTER TABLE `meccanico`
  MODIFY `id_meccanico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `modello`
--
ALTER TABLE `modello`
  MODIFY `id_modello` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `operazione`
--
ALTER TABLE `operazione`
  MODIFY `id_operazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id_prodotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT per la tabella `regione`
--
ALTER TABLE `regione`
  MODIFY `id_regione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `smaltimento`
--
ALTER TABLE `smaltimento`
  MODIFY `id_smaltimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `amministrazione`
--
ALTER TABLE `amministrazione`
  ADD CONSTRAINT `amministrazione_ibfk_1` FOREIGN KEY (`fk_id_localita`) REFERENCES `localita` (`id_localita`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `citta`
--
ALTER TABLE `citta`
  ADD CONSTRAINT `citta_ibfk_1` FOREIGN KEY (`fk_id_provincia`) REFERENCES `provincia` (`id_provincia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `citta_ibfk_2` FOREIGN KEY (`fk_id_regione`) REFERENCES `regione` (`id_regione`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`fk_id_localita`) REFERENCES `localita` (`id_localita`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `comporre`
--
ALTER TABLE `comporre`
  ADD CONSTRAINT `comporre_ibfk_1` FOREIGN KEY (`fk_id_intervento`) REFERENCES `intervento` (`id_intervento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comporre_ibfk_2` FOREIGN KEY (`fk_id_operazione`) REFERENCES `operazione` (`id_operazione`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `comportare`
--
ALTER TABLE `comportare`
  ADD CONSTRAINT `comportare_ibfk_1` FOREIGN KEY (`fk_id_intervento`) REFERENCES `intervento` (`id_intervento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comportare_ibfk_2` FOREIGN KEY (`fk_id_smaltimento`) REFERENCES `smaltimento` (`id_smaltimento`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `fattura`
--
ALTER TABLE `fattura`
  ADD CONSTRAINT `fattura_ibfk_1` FOREIGN KEY (`fk_id_operazione`) REFERENCES `operazione` (`id_operazione`);

--
-- Limiti per la tabella `intervento`
--
ALTER TABLE `intervento`
  ADD CONSTRAINT `intervento_ibfk_1` FOREIGN KEY (`fk_id_anagrafica_intervento`) REFERENCES `anagrafica_intervento` (`id_anagrafica_intervento`);

--
-- Limiti per la tabella `localita`
--
ALTER TABLE `localita`
  ADD CONSTRAINT `localita_ibfk_1` FOREIGN KEY (`fk_id_regione`) REFERENCES `regione` (`id_regione`) ON UPDATE CASCADE,
  ADD CONSTRAINT `localita_ibfk_2` FOREIGN KEY (`fk_id_provincia`) REFERENCES `provincia` (`id_provincia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `localita_ibfk_3` FOREIGN KEY (`fk_id_citta`) REFERENCES `citta` (`id_citta`);

--
-- Limiti per la tabella `meccanico`
--
ALTER TABLE `meccanico`
  ADD CONSTRAINT `meccanico_ibfk_1` FOREIGN KEY (`fk_id_localita`) REFERENCES `localita` (`id_localita`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `modello`
--
ALTER TABLE `modello`
  ADD CONSTRAINT `modello_ibfk_1` FOREIGN KEY (`fk_id_marca`) REFERENCES `marca` (`id_marca`);

--
-- Limiti per la tabella `operazione`
--
ALTER TABLE `operazione`
  ADD CONSTRAINT `operazione_ibfk_1` FOREIGN KEY (`fk_targa`) REFERENCES `veicolo` (`targa`);

--
-- Limiti per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  ADD CONSTRAINT `prodotto_ibfk_1` FOREIGN KEY (`fk_id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Limiti per la tabella `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`fk_id_regione`) REFERENCES `regione` (`id_regione`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `registrazione_amministrazione`
--
ALTER TABLE `registrazione_amministrazione`
  ADD CONSTRAINT `registrazione_amministrazione_ibfk_1` FOREIGN KEY (`fk_id_amministrazione`) REFERENCES `amministrazione` (`id_amministrazione`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `registrazione_cliente`
--
ALTER TABLE `registrazione_cliente`
  ADD CONSTRAINT `registrazione_cliente_ibfk_1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `svolgere`
--
ALTER TABLE `svolgere`
  ADD CONSTRAINT `svolgere_ibfk_1` FOREIGN KEY (`fk_id_intervento`) REFERENCES `intervento` (`id_intervento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `svolgere_ibfk_2` FOREIGN KEY (`fk_id_meccanico`) REFERENCES `meccanico` (`id_meccanico`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `utilizzare`
--
ALTER TABLE `utilizzare`
  ADD CONSTRAINT `utilizzare_ibfk_1` FOREIGN KEY (`fk_id_intervento`) REFERENCES `intervento` (`id_intervento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `utilizzare_ibfk_2` FOREIGN KEY (`fk_id_prodotto`) REFERENCES `prodotto` (`id_prodotto`);

--
-- Limiti per la tabella `veicolo`
--
ALTER TABLE `veicolo`
  ADD CONSTRAINT `veicolo_ibfk_1` FOREIGN KEY (`fk_id_modello`) REFERENCES `modello` (`id_modello`) ON UPDATE CASCADE,
  ADD CONSTRAINT `veicolo_ibfk_2` FOREIGN KEY (`fk_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
