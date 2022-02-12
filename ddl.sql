CREATE TABLE CardUser
(
  Id         BIGINT NOT NULL,
  CardNumber BIGINT,
  Expiry     DATE  ,
  CVC        INT   ,
  IdUser     BIGINT NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE Cart
(
  Id     BIGINT NOT NULL,
  IdUser BIGINT NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE CartSkin
(
  Id     BIGINT NOT NULL,
  IdCart BIGINT NOT NULL,
  IdSkin BIGINT NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE Skin
(
  Id        BIGINT  NOT NULL,
  Name      VARCHAR,
  ImageLink VARCHAR,
  Link3d    VARCHAR,
  Price     BIGINT ,
  Rarity    VARCHAR,
  SellerId  BIGINT,
  PRIMARY KEY (Id)
);

CREATE TABLE SkinTransaction
(
  Id            BIGINT NOT NULL,
  IdSkin        BIGINT NOT NULL,
  IdTransaction BIGINT NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE Transaction
(
  Id        BIGINT    NOT NULL,
  IdCard    BIGINT    NOT NULL,
  Timestamp TIMESTAMP,
  Price     BIGINT   ,
  PRIMARY KEY (Id)
);

CREATE TABLE Users
(
  Id       BIGINT  NOT NULL,
  Nome     VARCHAR,
  Cognome  VARCHAR,
  Email    VARCHAR,
  ApiToken VARCHAR,
  Password VARCHAR,
  PRIMARY KEY (Id)
);

ALTER TABLE SkinTransaction
  ADD CONSTRAINT FK_Skin_TO_SkinTransaction
    FOREIGN KEY (IdSkin)
    REFERENCES Skin (Id);

ALTER TABLE SkinTransaction
  ADD CONSTRAINT FK_Transaction_TO_SkinTransaction
    FOREIGN KEY (IdTransaction)
    REFERENCES Transaction (Id);

ALTER TABLE Cart
  ADD CONSTRAINT FK_Users_TO_Cart
    FOREIGN KEY (IdUser)
    REFERENCES Users (Id);

ALTER TABLE CardUser
  ADD CONSTRAINT FK_Users_TO_Card_User
    FOREIGN KEY (IdUser)
    REFERENCES Users (Id);

ALTER TABLE CartSkin
  ADD CONSTRAINT FK_Cart_TO_Cart_Skin
    FOREIGN KEY (IdCart)
    REFERENCES Cart (Id);

ALTER TABLE CartSkin
  ADD CONSTRAINT FK_Skin_TO_CartSkin
    FOREIGN KEY (IdSkin)
    REFERENCES Skin (Id);
