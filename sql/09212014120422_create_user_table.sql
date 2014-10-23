CREATE table user(
  id int(11) NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  created_on DATETIME NOT NULL,

  PRIMARY KEY (id)
)ENGINE=innodb