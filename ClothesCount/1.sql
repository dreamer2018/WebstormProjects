create DATABASE Clothes;
use Clothes;
SHOW DATABASES ;
CREATE TABLE clothes(
  id int AUTO_INCREMENT,
  name varchar(20)  ,
  phone BIGINT ,
  address varchar(200),
  style int(1),
  size int(1),
  design_1 int(1),
  design_2 int(1),
  PRIMARY KEY (id)
);
SELECT * from clothes;