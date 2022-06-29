-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 juin 2022 à 22:37
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `masante`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `pwd` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `username`, `pwd`) VALUES
(1, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `fiche`
--

CREATE TABLE `fiche` (
  `cin` varchar(60) NOT NULL,
  `inp` varchar(60) DEFAULT NULL,
  `note` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fiche`
--

INSERT INTO `fiche` (`cin`, `inp`, `note`) VALUES
('I343434', '330033', 'état grave '),
('IA12345', '110011', 'en progrès'),
('IA232323', '330033', 'état satisfaisant');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `inp` bigint(20) NOT NULL,
  `nom_complet` varchar(60) DEFAULT NULL,
  `daten` varchar(60) DEFAULT NULL,
  `genre` varchar(60) DEFAULT NULL,
  `specialite` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `tel` varchar(60) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `pwd` varchar(60) DEFAULT NULL,
  `img` varchar(60) NOT NULL,
  `status` varchar(60) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `sign` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`inp`, `nom_complet`, `daten`, `genre`, `specialite`, `email`, `tel`, `adresse`, `username`, `pwd`, `img`, `status`, `desc`, `sign`) VALUES
(110011, 'mohamed karim', '02-02-1992', 'homme', 'generaliste', 'm.karim@gmail.com', '0611223344', 'beni mellal quartier ibn sina n°20', 'med', 'med', '../image/doc-1.jpg', 'hors ligne', 'Diplomé de la faculté de médecine de Oujda\r\nAncien interne à l hopital Marie Grenoble France\r\nAncien Généraliste à l hopital régional Beni Mellal', '../image/signature.png'),
(220022, 'amine karim', '02-02-1992', 'homme', 'cardiologue', 'a.karim@gmail.com', '0611223344', 'quartier doha n°33 rue hassan 2 Khouribga', 'med2', 'med2', '../image/doc-2.jpg', 'hors ligne', 'Diplomé de la faculté de médecine de Lion\r\nAncien interne à l hopital Henry Toulouse France\r\nAncien Cardiologue à l hopital régional Beni Mellal', '../image/signature/sign-1.png'),
(330033, 'taha karim', '02-02-1992', 'homme', 'generaliste', 't.karim@gmail.com', '0611223344', 'quartier zitounia n°20 Beni Mellal', 'med3', 'med3', '../image/doc-3.jpg', 'hors ligne', 'Diplomé de la faculté de médecine de Marrakech\r\nAncien interne à l hopital Lion Paris France\r\nAncien Généraliste à l hopital régional Marrakech', '../image/signature/sign-2.png'),
(440044, 'Meriem Samlaoui', '1995-05-04', 'Femme', 'gynécologue', 'm.samlaoui@gmail.com', '0640404040', 'Quartier Ibn rochd N°42 Beni Mellal', 'med4', 'med4', '../image/doc-7.jpg', 'hors ligne', 'Diplomé de la faculté de médecine de Casablanca\r\nAncien interne à l hopital Carine Paris France\r\nAncien Gynécologue au clinique CKIZ Casablanca', '../image/signature/sign-3.png'),
(550055, 'Oumaima Ablaoui', '1990-05-10', 'Femme', 'Pneumologiste', 'O.Ablaoui@gmail.com', '0655005500', 'Quartier Hassan 2 n°54 Beni Mellal', 'med5', 'med5', '../image/user.png', 'hors ligne', 'Diplomé de la faculté de médecine de Casablanca\r\nAncien interne à l hopital Timone Marselle France\r\nAncien Pneumologiste à l hopital régional Beni Mellal', '../image/signature/sign-4.png');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `inp` varchar(60) NOT NULL,
  `cin` varchar(60) NOT NULL,
  `src` varchar(60) DEFAULT NULL,
  `dest` varchar(60) DEFAULT NULL,
  `msg` text DEFAULT NULL,
  `date_msg` varchar(60) DEFAULT NULL,
  `temps_msg` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `inp`, `cin`, `src`, `dest`, `msg`, `date_msg`, `temps_msg`) VALUES
(20, '110011', 'IA12345', 'IA12345', '110011', 'jiiiii', '0', '0'),
(103, '220022', 'IA12345', 'IA12345', '220022', 'halo ', NULL, NULL),
(105, '330033', 'IA12345', 'IA12345', '330033', 'dddd', NULL, NULL),
(131, '110011', 'IA12345', 'IA12345', '110011', 'halooo', '25-05', '18:51'),
(132, '110011', 'IA12345', '110011', 'IA12345', 'hello zineb', '25-05-22', '21:10'),
(133, '110011', 'IA12345', 'IA12345', '110011', 'hi', '25-05', '21:10'),
(138, '330033', 'I343434', '330033', 'I343434', 'halo', '02-06-22', '16:48'),
(140, '330033', 'I343434', '330033', 'I343434', 'hi', '02-06-22', '16:49'),
(144, '110011', 'x', 'x', '110011', 'dcfvbn,;:!', '03-06', '16:11'),
(145, '110011', 'x', 'x', '110011', 'nn', '03-06', '16:11'),
(146, '110011', 'x', 'x', '110011', 'xxx', '03-06', '16:11'),
(147, '220022', 'IA12345', 'IA12345', '220022', 'Bonjour', '03-06', '18:41'),
(150, '220022', 'IA12345', '220022', 'IA12345', 'Bonjour', '03-06-22', '18:55'),
(152, '330033', 'IA12345', 'IA12345', '330033', 'Bonjour', '03-06', '20:47'),
(153, '330033', 'IA12345', 'IA12345', '330033', 'J ai une question urgente..', '03-06', '20:48'),
(154, '330033', 'IA12345', '330033', 'IA12345', 'Bonjour', '03-06-22', '20:50'),
(155, '330033', 'IA12345', '330033', 'IA12345', 'oui laquelle?', '03-06-22', '20:50');

-- --------------------------------------------------------

--
-- Structure de la table `ord`
--

CREATE TABLE `ord` (
  `ido` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `inp` bigint(20) DEFAULT NULL,
  `cin` varchar(60) DEFAULT NULL,
  `presc` varchar(80) DEFAULT NULL,
  `dose` varchar(60) DEFAULT NULL,
  `frequence` varchar(60) DEFAULT NULL,
  `duree` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ord`
--

INSERT INTO `ord` (`ido`, `id`, `inp`, `cin`, `presc`, `dose`, `frequence`, `duree`) VALUES
(1, 0, 110011, 'IA12345', 'doliprane', '500mg', '1f/jr', '7 jrs'),
(2, 0, 110011, 'IA12345', 'juvatonus', '500mg', '2f/jr', '10 jrs'),
(3, 0, 110011, 'IA12345', 'amoxiciline', '100mg', '1f/jr', '7 jrs'),
(25, 34, 110011, 'IA12345', 'doliprane', '150mg', 'chaque 8hrs', '10jrs'),
(35, 64, 110011, 'x', 'sdfgh', 'cn,bn,', 'cvbn,;', 'cvbn,'),
(37, 66, 330033, 'IA12345', 'doliprane', '100mg', 'chaque 8hrs', '8 jrs'),
(38, 66, 330033, 'IA12345', 'juvatonus', '200mg', '2 fois / jour', '10 jrs'),
(39, 66, 330033, 'IA12345', 'D-Stress', '150mg', '1fois', '8 jrs'),
(40, 72, 330033, 'IA12345', 'doliprane', '100mg', '1 fois/ jr', '8 jrs');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `cin` varchar(40) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `daten` varchar(60) DEFAULT NULL,
  `genre` varchar(60) DEFAULT NULL,
  `nss` int(11) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `tel` varchar(60) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `pwd` varchar(60) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`cin`, `nom`, `prenom`, `daten`, `genre`, `nss`, `email`, `tel`, `adresse`, `username`, `pwd`, `status`) VALUES
('I343434', 'chahid', 'mohamed', '1993-03-05', 'Homme', 34343434, 'c.mohamed@gmail.com', '0634343434', 'quartier taqadoum n°34 beni mellal', '333', '333', 'hors ligne'),
('IA112233', 'Damiati', 'Kawtar', '2001-01-01', 'Femme', 2147483647, 'd.kawtar@gmail.com', '0611221122', 'Quariter taqadoum n°12 Beni Mellal', '121', '121', 'hors ligne'),
('IA121212', 'Habti', 'Safae', '2001-10-04', 'Femme', 1212121212, 'h.safae@gmail.com', '0611221122', 'hay mhirzat n°29 kasba tadla', '111', '111', 'hors ligne'),
('IA12345', 'houmaidi', 'zineb', '06/02/2001', 'femme', 1234567, '  h.zineb@gmail.com', '   06123456789', 'xx rue xx n°xxxxxx', '123', '123', 'hors ligne'),
('IA232323', 'Taiek', 'Maha', '2000-11-01', 'Femme', 23232323, 't.maha@gmail.com', '0623232323', 'hay semouzia n°12 kasba tadla', '222', '222', 'hors ligne'),
('x', 'widad', 'dani', '2022-06-17', 'Homme', 1111124554, 'xc@fgh.vv', '0647852789', '58 kkkk yyyyyy', '000', '000', 'hors ligne');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `id` int(11) NOT NULL,
  `cin` varchar(40) DEFAULT NULL,
  `inp` bigint(20) DEFAULT NULL,
  `date_rdv` varchar(60) DEFAULT NULL,
  `temps` varchar(40) DEFAULT NULL,
  `etat` varchar(40) DEFAULT NULL,
  `prescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `cin`, `inp`, `date_rdv`, `temps`, `etat`, `prescription`) VALUES
(32, 'IA12345', 110011, '12-06-2022', '11:00 AM', 'annulé', NULL),
(44, 'I343434', 110011, '07-07-2022', '11:00 AM', 'confirmé', NULL),
(45, 'I343434', 220022, '08-07-2022', '02:30 PM', 'en demande', NULL),
(46, 'I343434', 330033, '09-07-2022', '01:30 PM', 'confirmé', NULL),
(47, 'IA232323', 110011, '08-07-2022', '11:00 AM', 'en demande', NULL),
(48, 'IA232323', 220022, '02-08-2022', '02:30 PM', 'confirmé', NULL),
(49, 'IA232323', 330033, '15-07-2022', '01:30 PM', 'en demande', NULL),
(64, 'x', 110011, '06-06-2022', '11:00 AM', 'terminé', NULL),
(65, 'IA12345', 220022, '06-06-2022', '02:00 PM', 'confirmé', NULL),
(67, 'IA12345', 440044, '08-06-2022', '08:00 PM', 'en demande', NULL),
(68, 'IA12345', 110011, '06-06-2022', '10:00 AM', 'en demande', NULL),
(72, 'IA12345', 330033, '06-05-2022', '01:00 PM', 'terminé', NULL),
(74, 'IA12345', 330033, '08-07-2022', '01:00 PM', 'en demande', NULL),
(75, 'IA112233', 330033, '10-07-2022', '06:00 PM', 'en demande', NULL),
(76, 'IA112233', 110011, '16-06-2022', '11:00 AM', 'en demande', NULL),
(77, 'IA121212', 330033, '01-07-2022', '01:30 PM', 'en demande', NULL),
(78, 'IA121212', 220022, '10-07-2022', '02:00 PM', 'en demande', NULL),
(79, 'IA121212', 110011, '08-08-2022', '06:00 PM', 'en demande', NULL),
(80, 'IA232323', 330033, '08-07-2022', '06:00 PM', 'confirmé', NULL),
(81, 'I343434', 330033, '13-07-2022', '01:00 PM', 'annulé', NULL),
(82, 'I343434', 220022, '01-07-2022', '02:30 PM', 'en demande', NULL),
(83, 'I343434', 110011, '02-07-2022', '11:00 AM', 'en demande', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `inp` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id`, `nom`, `inp`) VALUES
(3, 'cardiologie', '220022'),
(4, 'médecine générale', '110011'),
(6, 'gynécologie', '440044'),
(8, 'pneumologie', '550055'),
(9, 'pédiatrie', '660066'),
(10, 'pédiatrie', '330033');

-- --------------------------------------------------------

--
-- Structure de la table `valabilite`
--

CREATE TABLE `valabilite` (
  `id` int(11) NOT NULL,
  `inp` bigint(20) DEFAULT NULL,
  `date_valable` varchar(40) DEFAULT NULL,
  `temps_valable` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `valabilite`
--

INSERT INTO `valabilite` (`id`, `inp`, `date_valable`, `temps_valable`) VALUES
(1, 110011, '20-07-2022', '10:00 AM'),
(2, 110011, '20-07-2022', '11:00 AM'),
(4, 220022, NULL, '02:00 PM'),
(5, 220022, NULL, '02:30 PM'),
(6, 330033, NULL, '01:00 PM'),
(7, 330033, NULL, '01:30 PM'),
(8, 330033, NULL, '06:00 PM'),
(11, 440044, NULL, '08:00 PM'),
(12, 440044, NULL, '07:00 PM'),
(13, 550055, NULL, '06:00 PM'),
(14, 550055, NULL, '07:00 PM'),
(15, 220022, NULL, '01:00 PM'),
(16, 110011, NULL, '06:00 PM');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fiche`
--
ALTER TABLE `fiche`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`inp`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`ido`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `valabilite`
--
ALTER TABLE `valabilite`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT pour la table `ord`
--
ALTER TABLE `ord`
  MODIFY `ido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `valabilite`
--
ALTER TABLE `valabilite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
