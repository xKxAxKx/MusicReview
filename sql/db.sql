CREATE DATABASE `music_review`;

use music_review;

-- 基本情報
CREATE TABLE `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(100) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB;

-- データのインサート

INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("My Lost City", "cero", now(), now());
INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("Obscure Ride", "cero", now(), now());
INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("WORLD RECORD", "cero", now(), now());
INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("FANTASMA", "Cornelius", now(), now());
INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("Point", "Cornelius", now(), now());
INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("COSMIC EXPLORER", "Perfume", now(), now());
INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("LEVEL3", "Perfume", now(), now());
INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("A Moon Shaped Pool", "Radiohead", now(), now());
INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("Kid A", "Radiohead", now(), now());
INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("OK Computer", "Radiohead", now(), now());
INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("Blood Sugar Sex Magik", "Red Hot Chili Peppers", now(), now());
INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("By The Way", "Red Hot Chili Peppers", now(), now());
INSERT INTO `records` (`title`, `artist`, `created`, `updated`) VALUES ("ぶっ生き返す", "マキシマム ザ ホルモン", now(), now());


-- あとでやる
alter table records add record_photo varchar(255) DEFAULT NULL;
alter table records add record_photo_dir varchar(255) DEFAULT NULL;


-- ユーザテーブルの作成
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `icon_photo` varchar(255) DEFAULT NULL,
  `icon_photo_dir` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB;

-- Listensテーブルの作詞絵
CREATE TABLE `listens` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  FOREIGN KEY(`user_id`) REFERENCES `users`(`id`),
  `record_id` int(11) NOT NULL,
  FOREIGN KEY(`record_id`) REFERENCES `records`(`id`)
) ENGINE=InnoDB;
