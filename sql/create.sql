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

INSERT INTO `User`(User_ID, Email, Username, Gender, Account_Type, Profile_Directory, Verification, Password) 
VALUES('u0000000-0000-0000-0000-000000000000', 'educosliit@gmail.com', 'EDUCO', 'M', '3', 'users/u0000000-0000-0000-0000-000000000000/', 'V', 0);


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
	CONSTRAINT fKey1_g FOREIGN KEY (Developer_ID) REFERENCES `User`(User_ID) ON DELETE SET NULL,
	CONSTRAINT fKey2_g FOREIGN KEY (Admin_ID) REFERENCES `User`(User_ID)
);

INSERT INTO Game(Game_ID, Name, Description, GType, Game_Directory, Developer_ID, Admin_ID, How_to_play, Rating, Verification) 
VALUES('g0000000-0000-0000-0000-000000000000', 'DEFAULT', 'DEFUALT', 'DEFAULT', 'games/approved/g0000000-0000-0000-0000-000000000000', 'u0000000-0000-0000-0000-000000000000', 'u0000000-0000-0000-0000-000000000000', 'DAFAULT', 0, 'A');


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
	CONSTRAINT fKey1_a FOREIGN KEY (User_ID) REFERENCES `User`(User_ID) ON DELETE SET NULL,
	CONSTRAINT fKey2_a FOREIGN KEY (Admin_ID) REFERENCES `User`(User_ID)
);

CREATE TABLE Scoreboard(
	ID integer,
	Score integer,
	
	CONSTRAINT pKey_s PRIMARY KEY (ID)
);


CREATE TABLE User_Scoreboard (
	ID integer,
	User_ID char(36) DEFAULT 'u0000000-0000-0000-0000-000000000000',
	
	CONSTRAINT pKey_us PRIMARY KEY (ID, User_ID),
	CONSTRAINT fKey_us FOREIGN KEY (User_ID) REFERENCES `User`(User_ID) ON DELETE NO ACTION
);

CREATE TABLE Game_Scoreboard (
	ID integer,
	Game_ID char(36) DEFAULT 'g0000000-0000-0000-0000-000000000000',
	
	CONSTRAINT pKey_gs PRIMARY KEY (ID, Game_ID),
	CONSTRAINT fKey_gs FOREIGN KEY (Game_ID) REFERENCES Game(Game_ID) ON DELETE NO ACTION
);

CREATE TABLE Subscribed(
	User_ID char(36), 
	Game_ID char(36),
	Rating int,
	
	CONSTRAINT pKey_su PRIMARY KEY (User_ID, Game_ID),
	CONSTRAINT fKey1_su FOREIGN KEY (User_ID) REFERENCES `User`(User_ID) ON DELETE CASCADE,
	CONSTRAINT fKey2_su FOREIGN KEY (Game_ID) REFERENCES Game(Game_ID) ON DELETE CASCADE
);