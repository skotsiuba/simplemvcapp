CREATE TABLE `authors` (
                           `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                           `name` varchar(256) NOT NULL,
                           UNIQUE KEY `id` (`id`),
                           UNIQUE KEY `authors_id_uindex` (`id`)
)
