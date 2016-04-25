create DATABASE Clothes;
use Clothes;
SHOW DATABASES ;
CREATE TABLE clothes(
  id int AUTO_INCREMENT,
  name varchar(20) not null UNIQUE ,
  phone BIGINT not null UNIQUE ,
  address varchar(100) not null,
  style int(1) not null,
  size int(1) not null,
  design_1 int(1) not null,
  design_2 int(1) not null,
  PRIMARY KEY (id)
);
