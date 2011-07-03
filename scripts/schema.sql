ALTER TABLE `User` DROP FOREIGN KEY FKUser284650;
ALTER TABLE `User` DROP FOREIGN KEY FKUser298435;
ALTER TABLE NC DROP FOREIGN KEY Focal;
ALTER TABLE NC DROP FOREIGN KEY FKNC419225;
ALTER TABLE file DROP FOREIGN KEY attached;
ALTER TABLE NC DROP FOREIGN KEY FKNC44575;
ALTER TABLE LogItem DROP FOREIGN KEY FKLogItem312473;
ALTER TABLE NC DROP FOREIGN KEY FKNC249221;
ALTER TABLE LogItem DROP FOREIGN KEY FKLogItem837771;
ALTER TABLE NC DROP FOREIGN KEY initiator;
ALTER TABLE `User` DROP FOREIGN KEY FKUser48184;
DROP TABLE IF EXISTS `User`;
DROP TABLE IF EXISTS Department;
DROP TABLE IF EXISTS Post;
DROP TABLE IF EXISTS NC;
DROP TABLE IF EXISTS Supplier;
DROP TABLE IF EXISTS `Order`;
DROP TABLE IF EXISTS file;
DROP TABLE IF EXISTS Category;
DROP TABLE IF EXISTS NC_type;
DROP TABLE IF EXISTS Status;
DROP TABLE IF EXISTS LogItem;
DROP TABLE IF EXISTS Log;

CREATE TABLE `User` (
  user_id       int(10) NOT NULL AUTO_INCREMENT,
  user_name     varchar(10) NOT NULL,
  password      varchar(32) NOT NULL,
  first_name    varchar(25) NOT NULL,
  last_name     varchar(50) NOT NULL,
  email         varchar(50) NOT NULL,
  init_level    int(1) NOT NULL,
  focal_level   int(1) NOT NULL,
  qa_level      int(1) NOT NULL,
  post_id       int(10),
  department_id int(10),
  access_level  int(10),
  internal      int(1),
  phone_nbr     varchar(10),
  Supplier_id   int(10),
  PRIMARY KEY (user_id));
CREATE TABLE Department (
  dept_id     int(10) NOT NULL AUTO_INCREMENT,
  name        varchar(50) NOT NULL,
  description varchar(100),
  PRIMARY KEY (dept_id));
CREATE TABLE Post (
  post_id     int(10) NOT NULL AUTO_INCREMENT,
  name        varchar(50) NOT NULL,
  description varchar(100),
  PRIMARY KEY (post_id));
CREATE TABLE NC (
  nc_id        int(10) NOT NULL AUTO_INCREMENT,
  initiator_id int(10) NOT NULL,
  init_date    date NOT NULL,
  category_id  int(10) NOT NULL,
  focal_id     int(10) NOT NULL,
  dept_id      int(11),
  nc_type_id   int(11) NOT NULL,
  qty          int(10),
  status_id    int(11) NOT NULL,
  summary      varchar(100),
  details      varchar(500),
  iso_l1       int(11),
  iso_l2       int(11),
  iso_l3       int(11),
  PRIMARY KEY (nc_id));
CREATE TABLE Supplier (
  supplier_id int(10) NOT NULL AUTO_INCREMENT,
  name        varchar(50) NOT NULL,
  phone_nbr   varchar(10),
  PRIMARY KEY (supplier_id));
CREATE TABLE `Order` (
  purchase_order_id int(11),
  `Column`          int(10));
CREATE TABLE file (
  file_id   int(11) NOT NULL AUTO_INCREMENT,
  car_id    int(11) NOT NULL,
  file_name int(11),
  PRIMARY KEY (file_id));
CREATE TABLE Category (
  category_id int(10) NOT NULL AUTO_INCREMENT,
  name        varchar(25) NOT NULL,
  description varchar(50),
  PRIMARY KEY (category_id));
CREATE TABLE NC_type (
  nc_type_id  int(11) NOT NULL AUTO_INCREMENT,
  name        varchar(25) NOT NULL,
  description varchar(50),
  PRIMARY KEY (nc_type_id));
CREATE TABLE Status (
  status_id   int(11) NOT NULL AUTO_INCREMENT,
  name        varchar(25) NOT NULL,
  description varchar(100),
  PRIMARY KEY (status_id));
CREATE TABLE LogItem (
  Loglog_id   int(10) NOT NULL,
  NCnc_id     int(10) NOT NULL,
  `date`      datetime NOT NULL,
  Description varchar(100) NOT NULL,
  PRIMARY KEY (Loglog_id,
  NCnc_id));
CREATE TABLE Log (
  log_id int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (log_id));
ALTER TABLE `User` ADD INDEX FKUser284650 (post_id), ADD CONSTRAINT FKUser284650 FOREIGN KEY (post_id) REFERENCES Post (post_id);
ALTER TABLE `User` ADD INDEX FKUser298435 (department_id), ADD CONSTRAINT FKUser298435 FOREIGN KEY (department_id) REFERENCES Department (dept_id);
ALTER TABLE NC ADD INDEX Focal (focal_id), ADD CONSTRAINT Focal FOREIGN KEY (focal_id) REFERENCES `User` (user_id);
ALTER TABLE NC ADD INDEX FKNC419225 (nc_type_id), ADD CONSTRAINT FKNC419225 FOREIGN KEY (nc_type_id) REFERENCES NC_type (nc_type_id);
ALTER TABLE file ADD INDEX attached (), ADD CONSTRAINT attached FOREIGN KEY () REFERENCES NC ();
ALTER TABLE NC ADD INDEX FKNC44575 (status_id), ADD CONSTRAINT FKNC44575 FOREIGN KEY (status_id) REFERENCES Status (status_id);
ALTER TABLE LogItem ADD INDEX FKLogItem312473 (NCnc_id), ADD CONSTRAINT FKLogItem312473 FOREIGN KEY (NCnc_id) REFERENCES NC (nc_id);
ALTER TABLE NC ADD INDEX FKNC249221 (category_id), ADD CONSTRAINT FKNC249221 FOREIGN KEY (category_id) REFERENCES Category (category_id);
ALTER TABLE LogItem ADD INDEX FKLogItem837771 (Loglog_id), ADD CONSTRAINT FKLogItem837771 FOREIGN KEY (Loglog_id) REFERENCES Log (log_id);
ALTER TABLE NC ADD INDEX initiator (initiator_id), ADD CONSTRAINT initiator FOREIGN KEY (initiator_id) REFERENCES `User` (user_name);
ALTER TABLE `User` ADD INDEX FKUser48184 (Supplier_id), ADD CONSTRAINT FKUser48184 FOREIGN KEY (Supplier_id) REFERENCES Supplier (supplier_id);
