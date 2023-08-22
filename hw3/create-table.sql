
alter user 'root' identified with mysql_native_password by 'password';

/* 使用するデータベースを作成、指定 */
CREATE DATABASE IF NOT EXISTS db;
USE db;

/* テーブル作成 */
CREATE TABLE inquirys (
  inquiry_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  inquiry_body TEXT NOT NULL,
  inquiry_name VARCHAR(255) DEFAULT NULL,
  inquiry_email VARCHAR(255) DEFAULT NULL,
  created_at DATETIME DEFAULT current_timestamp
) DEFAULT CHARSET=utf8mb4;
