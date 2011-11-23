CREATE USER test;
CREATE DATABASE mydb;
USE mydb;
GRANT ALL ON mydb TO test;
CREATE TABLE TradeAutomats (
idTradeAutomats INT,
Type VARCHAR(50),
Owner INT,
Location INT,
Status INT,
Cash DOUBLE,
Servise INT,
SellAmount DOUBLE,
RegistrationDate DATETIME,
isWorking BOOL);
CREATE TABLE TradeList (
idTradeList INT,
ProductId INT,
AutomateId INT,
Quantity VARCHAR(45));
CREATE TABLE Products (
idProducts INT,
Name VARCHAR(45),
Description VARCHAR(100),
Price DOUBLE,
Image BINARY);
CREATE TABLE Status (
idStatus INT,
NoGoods BOOL,
FullCashStorage BOOL,
Fault BOOL);
CREATE TABLE Users (
idUsers INT,
Name VARCHAR(45),
Surname VARCHAR(45),
Role INT,
Login VARCHAR(45),
Password VARCHAR(45),
Email VARCHAR(45),
Balance DOUBLE);
CREATE TABLE Location (
idLocation INT,
City VARCHAR(45),
Street VARCHAR(45),
Coordinates VARCHAR(45));
CREATE TABLE Roles (
idRoles INT,
RoleName VARCHAR(50));

