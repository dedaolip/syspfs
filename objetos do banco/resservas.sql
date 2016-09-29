-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Set-2016 às 15:29
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resservas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `laptops`
--

CREATE TABLE `laptops` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `patrimony` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dtaacquisition` date NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `laptops`
--

INSERT INTO `laptops` (`id`, `name`, `brand`, `model`, `patrimony`, `dtaacquisition`, `status`, `created_at`, `updated_at`) VALUES
(0, 'Nenhum', ' ', ' ', ' ', '2016-09-01', 'A', NULL, NULL),
(1, 'Notebook 1', '1', '1', '1', '1212-12-12', 'A', '2016-09-28 03:28:00', '2016-09-28 03:28:00'),
(2, 'Notebook 2', 'Asus', 'As550', '1231231', '1212-12-12', 'A', '2016-09-29 03:10:57', '2016-09-29 03:10:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `microphones`
--

CREATE TABLE `microphones` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `patrimony` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dtaacquisition` date NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `microphones`
--

INSERT INTO `microphones` (`id`, `name`, `brand`, `model`, `patrimony`, `dtaacquisition`, `status`, `created_at`, `updated_at`) VALUES
(0, 'Nenhum', ' ', ' ', ' ', '2016-09-01', 'A', NULL, NULL),
(1, 'Microfone 1', '1', '1', '1', '0000-00-00', 'A', '2016-09-28 03:28:20', '2016-09-28 03:28:20'),
(2, 'Microfone 2', 'asd', 'asd', 'asd', '1212-12-12', 'A', '2016-09-29 03:11:15', '2016-09-29 03:11:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_26_222537_create_romms_table', 1),
('2016_09_26_222619_create_laptops_table', 1),
('2016_09_26_222644_create_projectors_table', 1),
('2016_09_26_222707_create_sounds_table', 1),
('2016_09_26_222747_create_microphones_table', 1),
('2016_09_27_234644_create_reserves_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projectors`
--

CREATE TABLE `projectors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `patrimony` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dtaacquisition` date NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `projectors`
--

INSERT INTO `projectors` (`id`, `name`, `brand`, `model`, `patrimony`, `dtaacquisition`, `status`, `created_at`, `updated_at`) VALUES
(0, 'Nenhum', ' ', ' ', ' ', '2016-09-01', 'A', NULL, NULL),
(1, 'Projetor 1', '1', '1', '1', '1111-11-11', 'A', '2016-09-28 03:28:31', '2016-09-28 03:28:31'),
(2, 'Projetor 2', 'wsdfa', 'asdf', 'asdf', '3322-02-23', 'A', '2016-09-29 03:11:29', '2016-09-29 03:11:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserves`
--

CREATE TABLE `reserves` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `id_romm` int(10) UNSIGNED DEFAULT NULL,
  `id_mic` int(10) UNSIGNED DEFAULT NULL,
  `id_proj` int(10) UNSIGNED DEFAULT NULL,
  `id_not` int(10) UNSIGNED DEFAULT NULL,
  `id_sound` int(10) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `hbegin` time NOT NULL,
  `hend` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `reserves`
--

INSERT INTO `reserves` (`id`, `id_user`, `id_romm`, `id_mic`, `id_proj`, `id_not`, `id_sound`, `date`, `hbegin`, `hend`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 1, 1, 1, '2016-09-28', '09:00:00', '11:00:00', NULL, NULL),
(3, 1, 1, 1, 1, 1, 1, '2016-09-28', '05:00:00', '06:00:00', NULL, NULL),
(4, 1, 1, 1, 1, 1, 1, '2016-09-29', '07:00:00', '10:00:00', NULL, NULL),
(5, 2, 2, 2, 2, 2, 2, '2016-09-29', '07:00:00', '09:00:00', NULL, NULL),
(6, 3, 1, 1, 2, 1, 2, '2016-09-29', '12:00:00', '13:00:00', NULL, NULL),
(9, 1, 0, 0, 0, 0, 0, '2016-09-30', '13:13:00', '14:14:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `romms`
--

CREATE TABLE `romms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `romms`
--

INSERT INTO `romms` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(0, 'Nenhuma', 'A', NULL, NULL),
(1, 'Sala 1', 'A', '2016-09-28 03:27:44', '2016-09-28 03:27:44'),
(2, 'Sala 2', 'A', '2016-09-29 03:10:21', '2016-09-29 03:10:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sounds`
--

CREATE TABLE `sounds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `patrimony` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dtaacquisition` date NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `sounds`
--

INSERT INTO `sounds` (`id`, `name`, `brand`, `model`, `patrimony`, `dtaacquisition`, `status`, `created_at`, `updated_at`) VALUES
(0, 'Nenhum', ' ', ' ', ' ', '2016-09-01', 'A', NULL, NULL),
(1, 'Aparelho de Som 1', '1', '1', '1', '0000-00-00', 'A', '2016-09-28 03:28:51', '2016-09-28 03:28:51'),
(2, 'Aparelho de Som 2', 'lçksdf', 'lksjdf', 'kljsdf', '1212-12-20', 'A', '2016-09-29 03:11:44', '2016-09-29 03:11:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `office` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `cpf`, `office`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Felipe Novaes Medeiros', '34101023883', 1, 'felipenovaesmedeiros@gmail.com', '$2y$10$v85Ve/P4S4hDAfdwJQ79weOYodX5gRHg/Acs3dmm3n7LqLUbYiuua', 'QYj1Q7YS6dXDR1SI3ZL3hwQJlAFXPBYLmgQABBe014WKw8IqDtTdJPykOLjR', '2016-09-28 03:25:23', '2016-09-29 14:07:05'),
(2, 'Professor 1', '12312312312', 2, 'professor1@professor.com', '$2y$10$vDKpRHdkbeWQpWgkZ9cO5.fY2j4MeBfgqSX7kZ.dlBcmP9mS4cf7.', 'yPRBpKzbkLzCqLeCoJC4QvsIpsIdvXjkIv1pKaP8qrsp3ekwkou7ZWVam2YH', '2016-09-28 03:27:26', '2016-09-29 14:20:33'),
(3, 'Professor 2', '25632545118', 2, 'professor2@professor.com', '$2y$10$wTmIgwczCgDfe3j1jDRsIu1uV.M8hynGESlfKLtASjUK78RMfPlTu', '3yktSOJzTP63mxOVn9ZV9tCAXdl21Bz71LF9YKjI2S0WLqQeMjEm967rdMpV', '2016-09-29 14:04:06', '2016-09-29 14:05:08'),
(4, 'Joao Luiz Santana', '65465465487', 3, 'joao@teste.com', '$2y$10$Cwswcq2BJK.E0G0WnF76Pu67kWrkLk3YUUJ9h0iUKTHvsVGdbNE9W', '0wz172eXJeozoqGFyl0uv3sp6PJEzg7bjdtSdbxB797EcqC7WkPMuInInwLD', '2016-09-29 14:06:58', '2016-09-29 14:33:04');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_reservas`
--
CREATE TABLE `v_reservas` (
`id_usuario` int(10) unsigned
,`usuario` varchar(60)
,`id_sala` int(10) unsigned
,`sala` varchar(40)
,`id_projetor` int(10) unsigned
,`projetor` varchar(40)
,`id_notebook` int(10) unsigned
,`notebook` varchar(40)
,`id_som` int(10) unsigned
,`som` varchar(40)
,`id_microfone` int(10) unsigned
,`microfone` varchar(40)
,`data` date
,`inicio` time
,`fim` time
);

-- --------------------------------------------------------

--
-- Structure for view `v_reservas`
--
DROP TABLE IF EXISTS `v_reservas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_reservas`  AS  select `b`.`id` AS `id_usuario`,`b`.`name` AS `usuario`,`c`.`id` AS `id_sala`,`c`.`name` AS `sala`,`d`.`id` AS `id_projetor`,`d`.`name` AS `projetor`,`e`.`id` AS `id_notebook`,`e`.`name` AS `notebook`,`f`.`id` AS `id_som`,`f`.`name` AS `som`,`g`.`id` AS `id_microfone`,`g`.`name` AS `microfone`,`a`.`date` AS `data`,`a`.`hbegin` AS `inicio`,`a`.`hend` AS `fim` from ((((((`reserves` `a` join `users` `b`) join `romms` `c`) join `projectors` `d`) join `laptops` `e`) join `sounds` `f`) join `microphones` `g`) where ((`a`.`id_user` = `b`.`id`) and (`a`.`id_romm` = `c`.`id`) and (`a`.`id_proj` = `d`.`id`) and (`a`.`id_not` = `e`.`id`) and (`a`.`id_sound` = `f`.`id`) and (`a`.`id_mic` = `g`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `microphones`
--
ALTER TABLE `microphones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `projectors`
--
ALTER TABLE `projectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserves_id_user_foreign` (`id_user`),
  ADD KEY `reserves_id_romm_foreign` (`id_romm`),
  ADD KEY `reserves_id_mic_foreign` (`id_mic`),
  ADD KEY `reserves_id_proj_foreign` (`id_proj`),
  ADD KEY `reserves_id_not_foreign` (`id_not`),
  ADD KEY `reserves_id_sound_foreign` (`id_sound`);

--
-- Indexes for table `romms`
--
ALTER TABLE `romms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sounds`
--
ALTER TABLE `sounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cpf_unique` (`cpf`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `microphones`
--
ALTER TABLE `microphones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `projectors`
--
ALTER TABLE `projectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `romms`
--
ALTER TABLE `romms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sounds`
--
ALTER TABLE `sounds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `reserves_id_mic_foreign` FOREIGN KEY (`id_mic`) REFERENCES `microphones` (`id`),
  ADD CONSTRAINT `reserves_id_not_foreign` FOREIGN KEY (`id_not`) REFERENCES `laptops` (`id`),
  ADD CONSTRAINT `reserves_id_proj_foreign` FOREIGN KEY (`id_proj`) REFERENCES `projectors` (`id`),
  ADD CONSTRAINT `reserves_id_romm_foreign` FOREIGN KEY (`id_romm`) REFERENCES `romms` (`id`),
  ADD CONSTRAINT `reserves_id_sound_foreign` FOREIGN KEY (`id_sound`) REFERENCES `sounds` (`id`),
  ADD CONSTRAINT `reserves_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
