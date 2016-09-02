CREATE DATABASE IF NOT EXISTS dingcan;
USE dingcan;
DROP TABLE IF EXISTS info;
drop TABLE IF EXISTS book;
DROP TABLE IF EXISTS recharge;
CREATE TABLE info(
  id int  AUTO_INCREMENT PRIMARY KEY ,
  name VARCHAR(20) UNICODE,
  balance DOUBLE DEFAULT 0
);
CREATE TABLE book(
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id int NOT NULL ,
  type1 int DEFAULT 0,
  type2 int DEFAULT 0,
  balance DOUBLE DEFAULT 0,
  time CHAR(14) not NULL
);

CREATE TABLE recharge(
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id int NOT NULL ,
  money DOUBLE NOT NULL ,
  balance DOUBLE DEFAULT 0,
  time CHAR(14) NOT NULL
);


INSERT into info(name,balance) VALUES ('周',50);
INSERT into info(name,balance) VALUES ('杜',20);
INSERT into info(name,balance) VALUES ('杨',40);
INSERT into info(name,balance) VALUES ('校',60);
INSERT into info(name,balance) VALUES ('刘',70);
INSERT into info(name,balance) VALUES ('张',50);
INSERT into info(name,balance) VALUES ('师',10);
INSERT into info(name,balance) VALUES ('李',0);
INSERT into info(name,balance) VALUES ('王',40);
INSERT into info(name,balance) VALUES ('胡',80);


INSERT INTO recharge(user_id,money,balance,time) VALUES (1,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (2,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (3,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (4,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (6,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (5,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (7,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (8,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (9,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (10,50,50,'20160718000000');