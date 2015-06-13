--
-- 	Database Table Creation
--
--  First drop any existing tables. Any errors are ignored.

DROP TABLE IF EXISTS CanTakeCareOf;
DROP TABLE IF EXISTS AccommodationRequest;
DROP TABLE IF EXISTS SitterAvailability;
DROP TABLE IF EXISTS OwnsPet;
DROP TABLE IF EXISTS PetSitter;
DROP TABLE IF EXISTS PetOwner;
DROP TABLE IF EXISTS User;
-- CREATE TABLES
CREATE TABLE User
(UserID 	CHAR(20),
 Password 	CHAR(20) NOT NULL, 
 Name 		CHAR(20), 
 Address 	CHAR(20) NOT NULL,
 PhoneNum 	CHAR(10),
 primary key (UserID));

CREATE TABLE PetOwner
(OwnerID Char(20),
primary key (OwnerID),
foreign key (OwnerID) references User(UserID));

CREATE TABLE PetSitter
(SitterID Char(20),
 primary key (SitterID),
 foreign key (SitterID) references User(UserID));

CREATE TABLE OwnsPet
	(OwnerID 	Char(20), 
 PetID 		INTEGER, 
 PetName 	CHAR(20) NOT NULL,
 Size 		CHAR(20) NOT NULL,
 Species	CHAR(20) NOT NULL,
 primary key (OwnerID,PetID),
 foreign key(OwnerID) references PetOwner(OwnerID));

CREATE TABLE SitterAvailability
(SitterID	Char(20),
 AvailabilityID 	INTEGER,
 StartDate 	DATE NOT NULL,
 EndDate 	DATE NOT NULL,
 primary key(SitterID, AvailabilityID),
 foreign key(SitterID) references PetSitter(SitterID));

CREATE TABLE CanTakeCareOf
(Size 		CHAR(20) NOT NULL,
 Species 	CHAR(20) NOT NULL,
 SitterID 	Char(20),
 AvailabilityID 	INTEGER,
 primary key (SitterID,AvailabilityID),
 foreign key (SitterID,AvailabilityID) references SitterAvailability(SitterID,AvailabilityID));

CREATE TABLE AccommodationRequest
(OwnerID       	Char(20),
 PetID 			INTEGER, 
 RequestID 		INTEGER,
 WithinDistance 		REAL NOT NULL, 
 StartDate 		DATE NOT NULL, 
 EndDate 		DATE NOT NULL, 
 SitterID 		Char(20),
 AvailabilityID 		INTEGER,
 Compensation 		REAL,
 primary key(PetID, RequestID),
 foreign key(OwnerID, PetID) references OwnsPet(OwnerID, PetID),
 foreign key(SitterID, AvailabilityID) references SitterAvailability(SitterID, AvailabilityID));

-- Insert to User
INSERT INTO User VALUES('jennysong','jen123','Jenny Song','2573 West Mall, Vancouver','778-123-3413');
INSERT INTO User VALUES('younoh','you123','Youn Oh','3920 Wesbrook Mall, Vancouver','778-492-2832');
INSERT INTO User VALUES('magnushvidsten','mag123','Magnus Hvidsten','12304 10ave, Vancouver','778-391-3829');
INSERT INTO User VALUES('alyssalerner','aly123','Alyssa Lerner','3920 4ave, Vancouver','604-123-2345');
INSERT INTO User VALUES('harrisonf','har123','Harrison ford','4922 41ave, Vancouver','604-593-3922');
INSERT INTO User VALUES('luciaa','luc123','Lucia Ahn','867 Hamilton st, Vancouver','604-500-9464');

-- Insert to PetOwner
INSERT INTO PetOwner VALUES('jennysong');
INSERT INTO PetOwner VALUES('younoh');
INSERT INTO PetOwner VALUES('magnushvidsten');

--Insert to PetSitter
INSERT INTO PetSitter VALUES('alyssalerner');
INSERT INTO PetSitter VALUES('harrisonf');
INSERT INTO PetSitter VALUES('luciaa');

-- Insert to OwnsPet
INSERT INTO OwnsPet VALUES('jennysong',1,'Rupy','small','cat');
INSERT INTO OwnsPet VALUES('jennysong',2,'Zoro','small','cat');
INSERT INTO OwnsPet VALUES('younoh',3,'Max','big','dog');
INSERT INTO OwnsPet VALUES('younoh',4,'Mickey','medium','dog');
INSERT INTO OwnsPet VALUES('magnushvidsten',5,'Minnie','medium','dog');

-- Insert to SitterAvailability
INSERT INTO SitterAvailability() VALUES('alyssalerner',192,'15/06/01','15/06/30');
INSERT INTO SitterAvailability VALUES('alyssalerner',193,'15/07/01','15/07/31');
INSERT INTO SitterAvailability VALUES('harrisonf',194,'15/06/03','15/06/10');
INSERT INTO SitterAvailability VALUES('harrisonf',195,'15/06/15','15/08/01');
INSERT INTO SitterAvailability VALUES('luciaa',196,'15/07/20','15/08/10');

-- Insert to AccommodationRequest
INSERT INTO AccommodationRequest VALUES('jennysong',1,111,10.0,'15/06/1','15/06/30','alyssalerner',192,40);
INSERT INTO AccommodationRequest VALUES('jennysong',2,112,10.0,'15/06/1','15/06/30','alyssalerner',193,40);
INSERT INTO AccommodationRequest VALUES('younoh',3,113,10.0,'15/06/1','15/06/30','harrisonf',194,40);
INSERT INTO AccommodationRequest VALUES('younoh',4,114,10.0,'15/06/1','15/06/30','harrisonf',195,40);
INSERT INTO AccommodationRequest VALUES('magnushvidsten',5,115,10.0,'15/06/1','15/06/30','luciaa',196,40);

-- Insert to CanTakeCareOf
INSERT INTO CanTakeCareOf VALUES('small','cat','alyssalerner',192);
INSERT INTO CanTakeCareOf VALUES('small','cat','alyssalerner',193);
INSERT INTO CanTakeCareOf VALUES('big','dog','harrisonf',194);
INSERT INTO CanTakeCareOf VALUES('medium','dog','harrisonf',195);
INSERT INTO CanTakeCareOf VALUES('medium','dog','luciaa',196);