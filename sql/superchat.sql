CREATE TABLE Account
(
	client_id  	INTEGER	 	NOT NULL PRIMARY KEY UNIQUE
	, username 	VARCHAR(16)	NOT NULL UNIQUE
	, password 	VARCHAR(255) 	NOT NULL
);

CREATE TABLE Message
(
	message_id		INTEGER		NOT NULL PRIMARY KEY UNIQUE
	, created_at 	TIMESTAMP 	NOT NULL CURRENT_TIMESTAMP
	, username		VARCHAR(16)
);

CREATE TABLE Message_Body
(
	message_id		INTEGER		NOT NULL PRIMARY KEY UNIQUE
	, content		TEXT		
);

CREATE TABLE Server_Connection
(

);

CREATE TABLE Client
(

);

CREATE TABLE Server_Keys
(

);