CREATE DATABASE cockamamei;

USE DATABASE cockamamei;

CREATE TABLE tblAccount 
(
  AccountID int NOT NULL AUTO_INCREMENT,
  FirstName varchar(50) NOT NULL,
  LastName varchar(50) NOT NULL,
  EmailAddress varchar(254) NOT NULL,
  PassHashed varchar(512) NOT NULL,
  Salt varchar(512) NOT NULL,
  CreatedOn DATETIME NOT NULL,
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
  UserID int NOT NULL FOREIGN KEY REFERENCES tblAccount (AccountID),
  EventStart DATETIME NOT NULL,
  EventEnd DATETIME NOT NULL,
  LocationString varchar(250),
  EventTypeID int NOT NULL REFERENCES tblEventType (EventTypeID),
  PRIMARY KEY (EventID)
);

CREATE TABLE tblGroup
(
  GroupID int NOT NULL AUTO_INCREMENT,
  GroupName varchar(50) NOT NULL,
  PRIMARY KEY (GroupID)
);

CREATE TABLE accountGroup
(
  AccountGroupID int NOT NULL AUTO_INCREMENT,
  accountid int NOT NULL REFERENCES tblAccount (AccountID),
  GroupID int NOT NULL REFERENCES tblGroup (GroupID),
  PRIMARY KEY (AccountGroupID)
);
