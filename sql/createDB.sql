CREATE DATABASE COCKAMAMIE;

USE DATABASE COCKAMAMIE;

CREATE TABLE tblAccount 
(
AccountID int NOT NULL AUTO_INCREMENT,
FirstName varchar(50) NOT NULL,
LastName varchar(50) NOT NULL,
EmailAddress varchar(254) NOT NULL,
PassHashed bit(512) NOT NULL, --USE A SHA2 FUNCTION ON THE "USERPASSWORD + Salt" that returns 512 bit
Salt bit(512) NOT NULL, --RANDOMLY GENERATED STRING SHA2'd that returns 512 bit
PRIMARY KEY (AccountID)
);

CREATE TABLE tblEventType
(
EventTypeID int not null AUTO_INCREMENT,
EventTypeName varchar(50) not null,
EventTypeDesc varchar(250) not null,
PRIMARY KEY (tblEventTypeID)
);

CREATE TABLE tblEvent 
(
EventID int not null AUTO_INCREMENT,
UserID int not null foreign key references tblAccount (AccountID),
EventStart DATETIME NOT NULL,
EventEnd DATETIME NOT NULL,
LocationString varchar(250),
EventTypeID int not null references tblEventType (EventTypeID),
PRIMARY KEY (EventID)
);

CREATE TABLE tblGroup
(
GroupID int not null AUTO_INCREMENT,
GroupName varchar(50) not null,
PRIMARY KEY (GroupID)
);

CREATE TABLE ACCOUNT_GROUP
(
AccountGroupID int not null AUTO_INCREMENT,
AccountID int not null references tblAccount (AccountID),
GroupID int not null references tblGroup (GroupID),
PRIMARY KEY (AccountGroupID)
);