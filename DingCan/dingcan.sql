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


INSERT into info(name,balance) VALUES ('周攀',50);
INSERT into info(name,balance) VALUES ('杜仑',50);
INSERT into info(name,balance) VALUES ('杨博东',50);
INSERT into info(name,balance) VALUES ('校园',50);
INSERT into info(name,balance) VALUES ('杨龙飞',50);
INSERT into info(name,balance) VALUES ('张明瑞',50);
INSERT into info(name,balance) VALUES ('师毅',50);
INSERT into info(name,balance) VALUES ('李余通',50);
INSERT into info(name,balance) VALUES ('王瑞欣',50);
INSERT into info(name,balance) VALUES ('胡兴菊',50);
INSERT into info(name,balance) VALUES ('杨理茹',50);
INSERT into info(name,balance) VALUES ('张根',50);
INSERT into info(name,balance) VALUES ('朱新全',50);
INSERT into info(name,balance) VALUES ('胡嘉辉',50);
INSERT into info(name,balance) VALUES ('朱紫钰',50);
INSERT into info(name,balance) VALUES ('蒙祺殷',50);
INSERT into info(name,balance) VALUES ('康艺杰',50);
INSERT into info(name,balance) VALUES ('何攀',50);
INSERT into info(name,balance) VALUES ('闫钰晨',50);
INSERT into info(name,balance) VALUES ('楚东方',50);
INSERT into info(name,balance) VALUES ('冯鑫',50);
INSERT into info(name,balance) VALUES ('董孟愿',50);
INSERT into info(name,balance) VALUES ('李东林',50);
INSERT into info(name,balance) VALUES ('杜肖',50);
INSERT into info(name,balance) VALUES ('董恒毅',50);
INSERT into info(name,balance) VALUES ('祝一迪',50);
INSERT into info(name,balance) VALUES ('宫展京',50);
INSERT into info(name,balance) VALUES ('于海',50);
INSERT into info(name,balance) VALUES ('宗进',50);
INSERT into info(name,balance) VALUES ('梁梦迪',50);
INSERT into info(name,balance) VALUES ('卢晓丹',0);
INSERT into info(name,balance) VALUES ('寇梦真',0);
INSERT into info(name,balance) VALUES ('王一妃',0);
INSERT into info(name,balance) VALUES ('王博',100);

INSERT INTO recharge(user_id,money,balance,time) VALUES (1,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (2,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (3,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (4,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (5,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (6,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (7,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (8,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (9,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (10,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (11,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (12,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (13,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (14,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (15,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (16,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (17,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (18,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (19,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (20,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (21,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (22,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (23,50,50,'20160718000000');
/*
INSERT INTO recharge(user_id,money,balance,time) VALUES (24,50,50,'20160718000000');
*/
INSERT INTO recharge(user_id,money,balance,time) VALUES (25,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (26,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (27,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (28,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (29,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (30,50,50,'20160718000000');
/*
INSERT INTO recharge(user_id,money,balance,time) VALUES (31,50,50,'20160718000000');
INSERT INTO recharge(user_id,money,balance,time) VALUES (32,50,50,'20160718000000');
*/
/*
INSERT INTO recharge(user_id,money,balance,time) VALUES (33,50,50,'20160719000000');
 */
INSERT INTO recharge(user_id,money,balance,time) VALUES (34,100,100,'20160718000000');