-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jul-2022 às 01:25
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ifbag`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `matricula`, `nome`, `email`, `created_at`, `updated_at`) VALUES
(1, '201916360026', 'Hevelin de Jesus Freitas', 'hevelinfreitas21@gmail.com', '2022-07-05 15:44:23', '2022-07-05 15:44:23'),
(2, '201916360028', 'Luis Henrique Merces Santana', 'luis.marx@outlook.com', '2022-07-06 03:09:40', '2022-07-06 03:09:40'),
(3, '201916360029', 'Paula dos Santos Vieira', 'paula@gmial.com', '2022-07-06 03:09:58', '2022-07-06 03:09:58'),
(4, '201916360030', 'José Antônio dos Santos', 'jose@gmail.com', '2022-07-06 03:10:29', '2022-07-06 03:10:29'),
(5, '201916360026', 'julia', 'julia@gmail.com', '2022-07-14 05:54:27', '2022-07-14 05:54:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_turmas`
--

CREATE TABLE `alunos_turmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `turmas_id` bigint(20) UNSIGNED NOT NULL,
  `alunos_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alunos_turmas`
--

INSERT INTO `alunos_turmas` (`id`, `turmas_id`, `alunos_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 1, '2022-07-06 04:56:35', '2022-07-06 04:56:35'),
(3, 5, 4, '2022-07-06 04:56:55', '2022-07-06 04:56:55'),
(4, 2, 1, '2022-07-13 19:02:21', '2022-07-13 19:02:21'),
(5, 6, 3, NULL, NULL),
(6, 7, 1, '2022-07-14 02:23:12', '2022-07-14 02:23:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cod_disciplina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semestre` int(11) NOT NULL,
  `ementa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `cod_disciplina`, `nome`, `semestre`, `ementa`, `created_at`, `updated_at`) VALUES
(1, '1234', 'Programação orientada a objetos', 55, 'um teste de ementa', '2022-07-03 20:43:14', '2022-07-03 21:04:05'),
(3, '1236', 'Redes de Computadores', 1, 'Essa é a ementa', '2022-07-06 02:54:55', '2022-07-06 02:54:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_03_143218_create_alunos_table', 1),
(6, '2022_07_03_165837_create_disciplina_table', 1),
(7, '2022_07_03_181538_create_professores_table', 2),
(8, '2022_07_05_134211_create_turmas_table', 3),
(9, '2022_07_05_135627_create_turmas_alunos_table', 4),
(10, '2022_07_05_210221_create_aluno_turma_table', 5),
(11, '2022_07_05_212136_create_alunos_turmas_table', 6),
(12, '2022_07_06_020640_create_notas_table', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `turma_id` bigint(20) UNSIGNED NOT NULL,
  `id_aluno` bigint(20) UNSIGNED NOT NULL,
  `nota01` double(8,2) NOT NULL,
  `nota02` double(8,2) NOT NULL,
  `nota03` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `notas`
--

INSERT INTO `notas` (`id`, `turma_id`, `id_aluno`, `nota01`, `nota02`, `nota03`, `created_at`, `updated_at`) VALUES
(1, 6, 3, 5.50, 6.00, 8.00, NULL, '2022-07-22 03:09:58'),
(3, 7, 1, 5.50, 5.00, 5.00, '2022-07-14 05:14:03', '2022-07-14 05:14:03'),
(4, 2, 5, 6.00, 6.00, 9.00, NULL, NULL),
(5, 6, 5, 9.00, 9.00, 9.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `matricula`, `nome`, `email`, `created_at`, `updated_at`) VALUES
(1, '201916360030', 'João Paulo Santosd', 'joao@gmail.com', '2022-07-03 21:51:21', '2022-07-05 15:23:21'),
(3, '201916360026', 'Hevelin Freitas', 'hevelinfreitas21@gmail.com', '2022-07-05 15:23:31', '2022-07-05 15:23:31'),
(12, '201916360026', 'Luis Henrqiue', 'luis.marx@outlook.com', '2022-07-13 04:30:30', '2022-07-13 04:30:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cod_turma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disciplina_id` bigint(20) UNSIGNED NOT NULL,
  `professores_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `cod_turma`, `disciplina_id`, `professores_id`, `created_at`, `updated_at`, `semestre`) VALUES
(2, '123', 1, 3, NULL, NULL, 2),
(3, '12345', 1, 1, '2022-07-06 03:20:45', '2022-07-06 03:20:45', 5),
(4, '123455', 3, 3, '2022-07-06 03:22:56', '2022-07-06 03:22:56', 5),
(5, '12345', 1, 1, '2022-07-06 03:25:31', '2022-07-06 03:25:31', 5),
(6, '123', 1, 12, '2022-07-13 18:28:38', '2022-07-13 18:28:38', 2),
(7, '123455', 3, 12, '2022-07-13 18:28:47', '2022-07-13 18:28:47', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissao` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `id_usuario`, `name`, `email`, `email_verified_at`, `password`, `permissao`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Admin', 'admin', NULL, '$2y$10$wGVd4973DjeCntqIaCQS0uDSWREhyC4Mj1Mgf8eMbMvC8ahvJrWTG', 0, NULL, '2022-07-13 02:33:50', '2022-07-13 02:33:50'),
(4, 12, 'Luis Henrqiue', 'luis.marx@outlook.com', NULL, '$2y$10$IrJRzUFT.1hlGlNIu7S82u9H7fvX4ujeMeY1KjvhaxgDl8zLAFIae', 1, NULL, '2022-07-13 04:30:30', '2022-07-13 04:30:30'),
(5, 5, 'julia', 'julia@gmail.com', NULL, '$2y$10$o8Pg3Xz.b23iRqFcsAse3ObiW3yGFc6BKYGoKPxe8f5vaWP3MTW22', 2, NULL, '2022-07-14 05:54:27', '2022-07-14 05:54:27');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `alunos_turmas`
--
ALTER TABLE `alunos_turmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alunos_turmas_id_turma_foreign` (`turmas_id`),
  ADD KEY `alunos_turmas_id_aluno_foreign` (`alunos_id`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notas_id_turma_foreign` (`turma_id`),
  ADD KEY `notas_id_aluno_foreign` (`id_aluno`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turmas_id_disciplina_foreign` (`disciplina_id`),
  ADD KEY `turmas_id_professor_foreign` (`professores_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `alunos_turmas`
--
ALTER TABLE `alunos_turmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alunos_turmas`
--
ALTER TABLE `alunos_turmas`
  ADD CONSTRAINT `alunos_turmas_id_aluno_foreign` FOREIGN KEY (`alunos_id`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `alunos_turmas_id_turma_foreign` FOREIGN KEY (`turmas_id`) REFERENCES `turmas` (`id`);

--
-- Limitadores para a tabela `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_id_aluno_foreign` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `notas_id_turma_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_id_disciplina_foreign` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`),
  ADD CONSTRAINT `turmas_id_professor_foreign` FOREIGN KEY (`professores_id`) REFERENCES `professores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
