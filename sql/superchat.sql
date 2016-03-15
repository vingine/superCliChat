CREATE TABLE Account
(
        client_id           INTEGER        NOT NULL PRIMARY KEY UNIQUE
        , username          VARCHAR(16)    NOT NULL UNIQUE
        , login_password    VARCHAR(255)   NOT NULL
);

CREATE TABLE Message
(
        message_id      INTEGER         NOT NULL PRIMARY KEY UNIQUE
        , created_at    TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP
        , username      VARCHAR(16)     NOT NULL
);

CREATE TABLE Message_Body
(
        message_id      INTEGER         NOT NULL PRIMARY KEY UNIQUE
        , content       TEXT            NOT NULL
); 

CREATE TABLE Server_Connection
(
        username            VARCHAR(16)     UNIQUE
        , clientPrivateKey  VARCHAR(255)    NOT NULL UNIQUE
        , aesKey            VARCHAR(255)    UNIQUE
        , clientPublicKey   VARCHAR(255)    UNIQUE
        , clientId          VARCHAR(255)    NOT NULL UNIQUE PRIMARY KEY
);

CREATE TABLE Client
(
        clientPublicKey     VARCHAR(255)   NOT NULL
        , clientId          VARCHAR(255)   NOT NULL PRIMARY KEY UNIQUE
);

CREATE TABLE Server_Keys
(
        serverId        VARCHAR(255)    NOT NULL UNIQUE PRIMARY KEY
        , createdAt     TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP
);

SHOW TABLES;

DESC Account;
