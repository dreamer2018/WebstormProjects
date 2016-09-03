DROP DATABASE IF EXISTS SQLInjection;
CREATE DATABASE SQLInjection;
USE SQLInjection;

CREATE TABLE login (
  id   INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(20),
  passwd VARCHAR(20)
);

INSERT INTO login(name,passwd) VALUES ('xiaoming','xm');
INSERT INTO login(name,passwd) VALUES ('lihua','lh');