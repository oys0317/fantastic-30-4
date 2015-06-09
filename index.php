<?php echo 'Hello World'; ?> 	
	<?php 
	try{
		$db = new PDO("mysql:host=localhost;dbname=test;port=3306","root");
		$db->query('
			DROP TABLE IF EXISTS CanTakeCareOf;
			DROP TABLE IF EXISTS AccommodationRequest;
			DROP TABLE IF EXISTS SitterAvailability;
			DROP TABLE IF EXISTS OwnsPet;
			DROP TABLE IF EXISTS PetSitter;
			DROP TABLE IF EXISTS PetOwner;
			DROP TABLE IF EXISTS User;
			');

		$db->query('CREATE TABLE User
			(UserID 	INTEGER, 
			 Name 		CHAR(20), 
			 Address 	CHAR(20) NOT NULL,
			 PhoneNum 	CHAR(10),
			 primary key (UserID));

			CREATE TABLE PetOwner
			(OwnerID INTEGER,
			primary key (OwnerID),
			foreign key (OwnerID) references User(UserID));

			CREATE TABLE PetSitter
			(SitterID INTEGER,
			 primary key (SitterID),
			 foreign key (SitterID) references User(UserID));

			CREATE TABLE OwnsPet
 			(OwnerID 	INTEGER, 
			 PetID 		CHAR(20), 
			 PetName 	CHAR(20) NOT NULL,
			 Size 		CHAR(20) NOT NULL,
			 Species	CHAR(20) NOT NULL,
			 primary key (OwnerID,PetID),
			 foreign key(OwnerID) references PetOwner(OwnerID));

			CREATE TABLE SitterAvailability
			(SitterID	INTEGER,
			 AvailabilityID 	INTEGER,
			 StartDate 	DATE NOT NULL,
			 EndDate 	DATE NOT NULL,
			 primary key(SitterID, AvailabilityID),
			 foreign key(SitterID) references PetSitter(SitterID));
	
			CREATE TABLE CanTakeCareOf
			(Size 		CHAR(20) NOT NULL,
			 Species 	CHAR(20) NOT NULL,
			 SitterID 	INTEGER,
			 AvailabilityID 	INTEGER,
			 primary key (Size, Species),
			 foreign key (SitterID,AvailabilityID) references SitterAvailability(SitterID,AvailabilityID));

			CREATE TABLE AccommodationRequest
			(OwnerID       	INTEGER,
			 PetID 			INTEGER, 
			 RequestID 		INTEGER,
			 WithinDistance 		REAL NOT NULL, 
			 StartDate 		DATE NOT NULL, 
			 EndDate 		DATE NOT NULL, 
			 SitterID 		INTEGER,
			 AvailabilityID 		INTEGER,
			 Compensation 		REAL,
			 primary key(PetID, RequestID),
			 foreign key(OwnerID, PetID) references OwnsPet(OwnerID, PetID),
			 foreign key(SitterID, AvailabilityID) references SitterAvailability(SitterID, AvailabilityID));
		
			');
		$stmt = $db->prepare("INSERT INTO User(UserID,Name,Address,PhoneNum) VALUES(:UserID,:Name,:Address,:PhoneNum)");
		$stmt->execute(array(':UserID' => 1, ':Name' => 'Jenny Song', ':Address' => '2573 West Mall, Vancouver', ':PhoneNum' => '778-123-3413'));
		$stmt->execute(array(':UserID' => 2, ':Name' => 'Youn Oh', ':Address' => '3920 Wesbrook Mall, Vancouver', ':PhoneNum' => '778-492-2832'));
		$stmt->execute(array(':UserID' => 3, ':Name' => 'Magnus Hvidsten', ':Address' => '12304 10ave, Vancouver', ':PhoneNum' => '778-391-3829'));
		$stmt->execute(array(':UserID' => 4, ':Name' => 'Alyssa Lerner', ':Address' => '3920 4ave, Vancouver', ':PhoneNum' => '604-123-2345'));
		$stmt->execute(array(':UserID' => 5, ':Name' => 'Harrison ford', ':Address' => '4922 41ave, Vancouver', ':PhoneNum' => '604-593-3922'));
		$stmt->execute(array(':UserID' => 6, ':Name' => 'Lucia Ahn', ':Address' => '867 Hamilton st, Vancouver', ':PhoneNum' => '604-500-9464'));
		

		$stmt = $db->prepare("INSERT INTO PetOwner(OwnerID) VALUES(:OwnerID)");
		$stmt->execute(array(':OwnerID' => 1));
		$stmt->execute(array(':OwnerID' => 2));
		$stmt->execute(array(':OwnerID' => 3));
		
		$stmt = $db->prepare("INSERT INTO PetSitter(SitterID) VALUES(:SitterID)");
		$stmt->execute(array(':SitterID' => 4));
		$stmt->execute(array(':SitterID' => 5));
		$stmt->execute(array(':SitterID' => 6));
		
		$stmt = $db->prepare("INSERT INTO OwnsPet(OwnerID,PetID,PetName,Size,Species) VALUES(:OwnerID,:PetID,:PetName,:Size,:Species)");
		$stmt->execute(array(':OwnerID' => 1, ':PetID' => 1, ':PetName' => 'Rupy', ':Size' => 'small',':Species' => 'cat'));
		$stmt->execute(array(':OwnerID' => 1, ':PetID' => 2, ':PetName' => 'Zoro', ':Size' => 'small',':Species' => 'cat'));
		$stmt->execute(array(':OwnerID' => 2, ':PetID' => 3, ':PetName' => 'Max', ':Size' => 'big',':Species' => 'dog'));
		$stmt->execute(array(':OwnerID' => 2, ':PetID' => 4, ':PetName' => 'Mickey', ':Size' => 'medium',':Species' => 'dog'));
		$stmt->execute(array(':OwnerID' => 3, ':PetID' => 5, ':PetName' => 'Minnie', ':Size' => 'medium',':Species' => 'dog'));

		$stmt = $db->prepare("INSERT INTO SitterAvailability(SitterID,AvailabilityID,StartDate,EndDate) VALUES(:SitterID,:AvailabilityID,:StartDate,:EndDate)");
		$stmt->execute(array(':SitterID' => 4, ':AvailabilityID' => 192, ':StartDate' => '15/06/01', ':EndDate' => '15/06/30'));
		$stmt->execute(array(':SitterID' => 4, ':AvailabilityID' => 193, ':StartDate' => '15/07/01', ':EndDate' => '15/07/31'));
		$stmt->execute(array(':SitterID' => 5, ':AvailabilityID' => 194, ':StartDate' => '15/06/03', ':EndDate' => '15/06/10'));
		$stmt->execute(array(':SitterID' => 5, ':AvailabilityID' => 195, ':StartDate' => '15/06/15', ':EndDate' => '15/08/01'));
		$stmt->execute(array(':SitterID' => 6, ':AvailabilityID' => 196, ':StartDate' => '15/07/20', ':EndDate' => '15/08/10'));
		

		$stmt = $db->prepare("INSERT INTO AccommodationRequest(OwnerID,PetID,RequestID,WithinDistance,StartDate,EndDate,SitterID,AvailabilityID,Compensation) VALUES(:OwnerID,:PetID,:RequestID,:WithinDistance,:StartDate,:EndDate,:SitterID,:AvailabilityID,:Compensation)");
		$stmt->execute(array(':OwnerID' => 1, ':PetID' => 1, ':RequestID' => 111, ':WithinDistance' => 10.0, ':StartDate' => '15/06/1', ':EndDate' => '15/06/30', ':SitterID' => 4, ':AvailabilityID' => 192, ':Compensation' => 40));
		$stmt->execute(array(':OwnerID' => 1, ':PetID' => 2, ':RequestID' => 112, ':WithinDistance' => 10.0, ':StartDate' => '15/07/1', ':EndDate' => '15/07/31', ':SitterID' => 4, ':AvailabilityID' => 193, ':Compensation' => 40));
		


		$affected_rows = $stmt->rowCount();		



		var_dump($db);
	} catch(Exception $e){
		echo "Could not connect to the database";
		exit;
	}
	echo "Hello";
	echo "it worked!";
	?>
