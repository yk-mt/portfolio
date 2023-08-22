/* ユーザー作成とDB作成もいる？ */
CREATE USER 'test-user@localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON * . * TO 'test-user'@'localhost';
FLUSH PRIVILEGES;
alter user 'test-user@localhost' identified with mysql_native_password by 'password';
alter user 'root' identified with mysql_native_password by 'password';

/* 使用するデータベースを作成、指定 */
CREATE DATABASE IF NOT EXISTS db;
USE db;

/* テーブル作成 */
CREATE TABLE posts (
  post_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  post_body TEXT NOT NULL,
  post_name VARCHAR(255) DEFAULT NULL
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE tags (
  tag_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  tag_name TEXT NOT NULL,
  post_id INT(10) NOT NULL
) DEFAULT CHARSET=utf8mb4;