CREATE TABLE `User`(
	User_ID char(36), 
	Email varchar(50), 
	Username varchar(50), 
	Gender char(1),
	Account_Type integer,
	Profile_Directory varchar(200), 
	Verification varchar(50), 
	Password varchar(256),
	
	CONSTRAINT pKey_u PRIMARY KEY (User_ID)
);

CREATE TABLE Game(
	Game_ID char(36), 
	Name varchar(50), 
	Description varchar(300),
	GType varchar(10),
	Game_Directory varchar(200), 
	Developer_ID char(36), 
	Admin_ID char(36), 
	How_to_play varchar(800), 
	Rating integer, 
	Verification char(1),
	
	CONSTRAINT pKey_g PRIMARY KEY (Game_ID),
	CONSTRAINT fKey1_g FOREIGN KEY (Developer_ID) REFERENCES `User`(User_ID),
	CONSTRAINT fKey2_g FOREIGN KEY (Admin_ID) REFERENCES `User`(User_ID)
);

CREATE TABLE Advertisement(
	Ad_ID char(36),
	Package integer,
	User_ID char(36),
	Admin_ID char(36), 
	Name varchar(50), 
	Verification char(1), 
	Expiration date, 
	Directory varchar(200),
	
	CONSTRAINT pKey_a PRIMARY KEY (Ad_ID),
	CONSTRAINT fKey1_a FOREIGN KEY (User_ID) REFERENCES `User`(User_ID),
	CONSTRAINT fKey2_a FOREIGN KEY (Admin_ID) REFERENCES `User`(User_ID)
);

CREATE TABLE Scoreboard(
	ID integer,
	Score integer,
	
	CONSTRAINT pKey_s PRIMARY KEY (ID)
);


CREATE TABLE User_Scoreboard (
	ID integer,
	User_ID char(36),
	
	CONSTRAINT pKey_us PRIMARY KEY (ID, User_ID),
	CONSTRAINT fKey_us FOREIGN KEY (User_ID) REFERENCES `User`(User_ID)
);

CREATE TABLE Game_Scoreboard (
	ID integer,
	Game_ID char(36),
	
	CONSTRAINT pKey_gs PRIMARY KEY (ID, Game_ID),
	CONSTRAINT fKey_gs FOREIGN KEY (Game_ID) REFERENCES Game(Game_ID)
);

CREATE TABLE Subscribed(
	User_ID char(36), 
	Game_ID char(36),
	
	CONSTRAINT pKey_su PRIMARY KEY (User_ID, Game_ID),
	CONSTRAINT fKey1_su FOREIGN KEY (User_ID) REFERENCES `User`(User_ID),
	CONSTRAINT fKey2_su FOREIGN KEY (Game_ID) REFERENCES Game(Game_ID)
);