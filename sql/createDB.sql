CREATE DATABASE cockamamei;

USE cockamamei;

CREATE TABLE tblAccount
(
  AccountID int NOT NULL AUTO_INCREMENT,
  FirstName varchar(50) NOT NULL,
  LastName varchar(50) NOT NULL,
  EmailAddress varchar(254) NOT NULL,
  PassHashed varchar(512) NOT NULL,
  Salt varchar(512) NOT NULL,
  CreatedOn datetime NOT NULL,
  PRIMARY KEY (AccountID)
);

CREATE TABLE tblEventType
(
  EventTypeID int NOT NULL AUTO_INCREMENT,
  EventTypeName varchar(50) NOT NULL,
  EventTypeDesc varchar(250) NOT NULL,
  PRIMARY KEY (EventTypeID)
);

CREATE TABLE tblEvent
(
  EventID int NOT NULL AUTO_INCREMENT,
  AccountID int NOT NULL,
  EventStart datetime NOT NULL,
  EventEnd datetime NOT NULL,
  LocationString varchar(250),
  EventTypeID int NOT NULL,
  PRIMARY KEY (EventID),
  FOREIGN KEY (AccountID) REFERENCES tblAccount (AccountID),
  FOREIGN KEY (EventTypeID) REFERENCES tblEventType (EventTypeID)
);

CREATE TABLE tblGroup
(
  GroupID int NOT NULL AUTO_INCREMENT,
  GroupName varchar(50) NOT NULL,
  PRIMARY KEY (GroupID)
);

CREATE TABLE tblAccountGroup
(
  AccountGroupID int NOT NULL AUTO_INCREMENT,
  AccountID int NOT NULL,
  GroupID int NOT NULL,
  PRIMARY KEY (AccountGroupID),
  FOREIGN KEY (AccountID) REFERENCES tblAccount (AccountID),
  FOREIGN KEY (GroupID) REFERENCES tblGroup (GroupID)
);
