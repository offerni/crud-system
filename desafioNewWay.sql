-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para desafionewway
DROP DATABASE IF EXISTS `desafionewway`;
CREATE DATABASE IF NOT EXISTS `desafionewway` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `desafionewway`;

-- Copiando estrutura para tabela desafionewway.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela desafionewway.categorias: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nome`, `descricao`, `img_url`, `created_at`, `updated_at`) VALUES
	(1, 'Escritório', 'Tudo para seu escritório', 'img/categorias/image_url_7557.jpeg', '2017-11-12 04:48:31', '2017-11-12 04:50:42'),
	(2, 'Games', 'Jogos de Vídeo Game', 'img/categorias/image_url_9438.jpeg', '2017-11-12 04:51:36', '2017-11-12 04:51:36'),
	(3, 'Hardware', 'Peças para upgrade ou substituição', 'img/categorias/image_url_4379.jpeg', '2017-11-12 04:52:46', '2017-11-12 04:52:46'),
	(4, 'Periféricos', 'Acessórios, mouses, teclados, Webcams, etc', 'img/categorias/image_url_7099.jpeg', '2017-11-12 04:53:28', '2017-11-12 04:53:28'),
	(5, 'Notebooks', 'Notebooks', 'img/categorias/image_url_4234.jpeg', '2017-11-12 04:54:06', '2017-11-12 04:54:06');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Copiando estrutura para tabela desafionewway.categoria_produto
CREATE TABLE IF NOT EXISTS `categoria_produto` (
  `categoria_id` int(10) unsigned DEFAULT NULL,
  `produto_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `categoria_produto_categoria_id_foreign` (`categoria_id`),
  KEY `categoria_produto_produto_id_foreign` (`produto_id`),
  CONSTRAINT `categoria_produto_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `categoria_produto_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela desafionewway.categoria_produto: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_produto` DISABLE KEYS */;
INSERT INTO `categoria_produto` (`categoria_id`, `produto_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL),
	(2, 1, NULL, NULL),
	(1, 2, NULL, NULL),
	(2, 3, NULL, NULL),
	(2, 4, NULL, NULL),
	(2, 5, NULL, NULL),
	(3, 5, NULL, NULL),
	(1, 6, NULL, NULL),
	(2, 6, NULL, NULL),
	(4, 6, NULL, NULL),
	(5, 6, NULL, NULL),
	(3, 7, NULL, NULL),
	(1, 12, NULL, NULL),
	(2, 12, NULL, NULL),
	(4, 12, NULL, NULL),
	(1, 13, NULL, NULL),
	(5, 13, NULL, NULL),
	(2, 14, NULL, NULL),
	(3, 14, NULL, NULL),
	(5, 14, NULL, NULL);
/*!40000 ALTER TABLE `categoria_produto` ENABLE KEYS */;

-- Copiando estrutura para tabela desafionewway.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `produto_id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_produto_id_foreign` (`produto_id`),
  CONSTRAINT `images_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela desafionewway.images: ~36 rows (aproximadamente)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `produto_id`, `url`, `created_at`, `updated_at`) VALUES
	(1, 1, 'img/produtos/image_5124.jpeg', '2017-11-12 04:56:37', '2017-11-12 04:56:37'),
	(2, 1, 'img/produtos/image_7541.jpeg', '2017-11-12 04:57:14', '2017-11-12 04:57:14'),
	(3, 1, 'img/produtos/image_6621.jpeg', '2017-11-12 04:57:15', '2017-11-12 04:57:15'),
	(4, 1, 'img/produtos/image_5595.jpeg', '2017-11-12 04:57:53', '2017-11-12 04:57:53'),
	(5, 1, 'img/produtos/image_7136.jpeg', '2017-11-12 04:58:22', '2017-11-12 04:58:22'),
	(6, 1, 'img/produtos/image_7141.jpeg', '2017-11-12 04:58:23', '2017-11-12 04:58:23'),
	(7, 1, 'img/produtos/image_1590.jpeg', '2017-11-12 04:58:23', '2017-11-12 04:58:23'),
	(8, 2, 'img/produtos/image_9314.jpeg', '2017-11-12 05:00:29', '2017-11-12 05:00:29'),
	(9, 2, 'img/produtos/image_4140.jpeg', '2017-11-12 05:00:29', '2017-11-12 05:00:29'),
	(10, 2, 'img/produtos/image_7037.jpeg', '2017-11-12 05:00:29', '2017-11-12 05:00:29'),
	(11, 2, 'img/produtos/image_9681.jpeg', '2017-11-12 05:00:30', '2017-11-12 05:00:30'),
	(12, 3, 'img/produtos/image_5424.jpeg', '2017-11-12 05:03:38', '2017-11-12 05:03:38'),
	(13, 3, 'img/produtos/image_8895.png', '2017-11-12 05:03:38', '2017-11-12 05:03:38'),
	(14, 3, 'img/produtos/image_6299.jpeg', '2017-11-12 05:03:38', '2017-11-12 05:03:38'),
	(15, 4, 'img/produtos/image_6492.jpeg', '2017-11-12 05:05:21', '2017-11-12 05:05:21'),
	(16, 4, 'img/produtos/image_6228.png', '2017-11-12 05:05:21', '2017-11-12 05:05:21'),
	(17, 4, 'img/produtos/image_3718.jpeg', '2017-11-12 05:05:21', '2017-11-12 05:05:21'),
	(18, 4, 'img/produtos/image_4730.png', '2017-11-12 05:05:21', '2017-11-12 05:05:21'),
	(19, 5, 'img/produtos/image_9139.jpeg', '2017-11-12 05:07:34', '2017-11-12 05:07:34'),
	(20, 5, 'img/produtos/image_1851.png', '2017-11-12 05:07:34', '2017-11-12 05:07:34'),
	(21, 5, 'img/produtos/image_8009.png', '2017-11-12 05:07:34', '2017-11-12 05:07:34'),
	(22, 6, 'img/produtos/image_6372.jpeg', '2017-11-12 05:09:39', '2017-11-12 05:09:39'),
	(23, 6, 'img/produtos/image_4644.png', '2017-11-12 05:09:40', '2017-11-12 05:09:40'),
	(24, 6, 'img/produtos/image_9402.png', '2017-11-12 05:09:40', '2017-11-12 05:09:40'),
	(25, 7, 'img/produtos/image_8523.jpeg', '2017-11-12 05:12:01', '2017-11-12 05:12:01'),
	(26, 7, 'img/produtos/image_4457.jpeg', '2017-11-12 05:12:01', '2017-11-12 05:12:01'),
	(27, 7, 'img/produtos/image_4440.jpeg', '2017-11-12 05:12:01', '2017-11-12 05:12:01'),
	(28, 12, 'img/produtos/image_2290.jpeg', '2017-11-12 05:16:29', '2017-11-12 05:16:29'),
	(29, 12, 'img/produtos/image_1541.jpeg', '2017-11-12 05:16:29', '2017-11-12 05:16:29'),
	(30, 13, 'img/produtos/image_8566.jpeg', '2017-11-12 05:18:42', '2017-11-12 05:18:42'),
	(31, 13, 'img/produtos/image_9417.jpeg', '2017-11-12 05:18:43', '2017-11-12 05:18:43'),
	(32, 13, 'img/produtos/image_7663.jpeg', '2017-11-12 05:18:43', '2017-11-12 05:18:43'),
	(33, 14, 'img/produtos/image_4272.jpeg', '2017-11-12 05:20:41', '2017-11-12 05:20:41'),
	(34, 14, 'img/produtos/image_3980.jpeg', '2017-11-12 05:20:41', '2017-11-12 05:20:41'),
	(35, 14, 'img/produtos/image_4533.jpeg', '2017-11-12 05:20:41', '2017-11-12 05:20:41'),
	(36, 14, 'img/produtos/image_6692.jpeg', '2017-11-12 05:20:41', '2017-11-12 05:20:41');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Copiando estrutura para tabela desafionewway.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela desafionewway.migrations: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(13, '2014_10_12_000000_create_users_table', 1),
	(14, '2014_10_12_100000_create_password_resets_table', 1),
	(15, '2017_10_25_181514_create_produtos_table', 1),
	(16, '2017_10_25_190118_create_categorias_table', 1),
	(17, '2017_10_25_190149_create_images_table', 1),
	(18, '2017_11_06_021752_create_categoria_produto', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela desafionewway.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela desafionewway.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela desafionewway.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela desafionewway.produtos: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `nome`, `descricao`, `created_at`, `updated_at`) VALUES
	(1, 'mesa para videogame', 'Descrição da mesa para videogame', '2017-11-12 04:56:36', '2017-11-12 04:56:36'),
	(2, 'Mesa para escritório', 'descrição da Mesa para escritório', '2017-11-12 05:00:29', '2017-11-12 05:00:29'),
	(3, 'God of war', 'Descrição jogo God of war', '2017-11-12 05:03:37', '2017-11-12 05:03:37'),
	(4, 'Final Fantasy', 'Descrição Final Fantasy', '2017-11-12 05:05:21', '2017-11-12 05:05:21'),
	(5, 'Placa de Video', 'Placa de Video para games', '2017-11-12 05:07:33', '2017-11-12 05:07:33'),
	(6, 'Mouse', 'Mouse gamer', '2017-11-12 05:09:39', '2017-11-12 05:09:39'),
	(7, 'Motherboard', 'Descrição da Motherboard', '2017-11-12 05:12:01', '2017-11-12 05:12:01'),
	(12, 'Monitor', 'Monitor bom para games, edição de video e outros trabalhos gráficos', '2017-11-12 05:16:29', '2017-11-12 05:16:29'),
	(13, 'Notebook para escritório', 'Notebook mediano', '2017-11-12 05:18:42', '2017-11-12 05:18:42'),
	(14, 'Notebook gamer', 'Notebook gamer', '2017-11-12 05:20:40', '2017-11-12 05:20:40');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela desafionewway.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela desafionewway.users: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Diego Offerni', 'drofferni@gmail.com', '$2y$10$DKwYy.zmeop3gAc7VsnZnO8dmYDa58pOV4xS9JgiSlz.waXQjpnM6', 'Fv7Ca2XKzofGGcjBJ1kYQp87doamW0JBq7OGzufgOXLaiQOwaTnrEe50shhg', '2017-11-12 04:47:50', '2017-11-13 00:28:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
