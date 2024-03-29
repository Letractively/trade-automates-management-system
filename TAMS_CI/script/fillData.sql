use tams;
-- Location---
insert into location(City,Street,Coordinates) values('Lviv','Zelena 2a','199.09 123.34');
insert into location(City,Street,Coordinates) values('Lviv','Stryska 2a','299.09 123.34');
insert into location(City,Street,Coordinates) values('Kiev','Zelena 21','195.09 223.34');
insert into location(City,Street,Coordinates) values('Lviv','Naukova 7','196.09 223.34');
insert into location(City,Street,Coordinates) values('Lviv','Bandery 29','195.09 228.34');
-- Products ----
insert into products(Name,Description,Price,Image) values('Cofe','drink',1.99, null);
insert into products(Name,Description,Price,Image) values('Double Cofe','drink',2.99, null);
insert into products(Name,Description,Price,Image) values('Snickers','chocolate',3.99, null);
insert into products(Name,Description,Price,Image) values('Bounty','food',3.99, null);
insert into products(Name,Description,Price,Image) values('Nuts','food',5.99, null);

-- Roles ----
insert into roles(RoleName) values('Administrator');
insert into roles(RoleName) values('Owner');
insert into roles(RoleName) values('Service');
insert into roles(RoleName) values('User');
insert into roles(RoleName) values('OldUser');

-- Status --
insert into status(NoGoods,FullCashStorage, Fault) values(0,0,0);
insert into status(NoGoods,FullCashStorage, Fault) values(0,0,0);
insert into status(NoGoods,FullCashStorage, Fault) values(0,1,1);
insert into status(NoGoods,FullCashStorage, Fault) values(1,0,0);
insert into status(NoGoods,FullCashStorage, Fault) values(0,1,0);

-- users ---password is  -----qwerty------
insert into users(Name,Surname,Role,Login,Password,Email,Balance) values('George','Vashington',1, 'george'
,'b1b3773a05c0ed0176787a4f1574ff0075f7521e','vashington@gmail.com', 10000.0);
insert into users(Name,Surname,Role,Login,Password,Email,Balance) values('Tomas','Jefferson',2, 'tomas'
,'b1b3773a05c0ed0176787a4f1574ff0075f7521e','jefferson@gmail.com', 500.0);
insert into users(Name,Surname,Role,Login,Password,Email,Balance) values('Theodor','Rusvelt',2, 'theodor'
,'b1b3773a05c0ed0176787a4f1574ff0075f7521e','rusvelt@gmail.com', 1000.0);
insert into users(Name,Surname,Role,Login,Password,Email,Balance) values('Barak','Obama',3, 'barak'
,'b1b3773a05c0ed0176787a4f1574ff0075f7521e','obama@gmail.com', 1000.0); 


-- trade_tams.trade_automatsautomats --
insert into trade_automats(Type,Owner,Location,Status,Cash,Service,SellAmount,RegistrationDate, IsWorking) values('Drinks seller',2,1, 1,345.6,4, 1000.0,'2003-01-16 23:12:01',1);
insert into trade_automats(Type,Owner,Location,Status,Cash,Service,SellAmount,RegistrationDate, IsWorking) values('Drinks seller',3,3, 1,345.6,4, 1000.0,'2003-01-16 23:12:01',1);
insert into trade_automats(Type,Owner,Location,Status,Cash,Service,SellAmount,RegistrationDate, IsWorking) values('Drinks seller',2,2, 1,345.6,4, 1000.0,'2003-01-16 23:12:01',1);
insert into trade_automats(Type,Owner,Location,Status,Cash,Service,SellAmount,RegistrationDate, IsWorking) values('Drinks seller',3,4, 1,345.6,4, 1000.0,'2003-01-16 23:12:01',1);


-- tradelist --
insert into tradelist (ProductId, AutomateId, Quantity) values(1,1,10);
insert into tradelist (ProductId, AutomateId, Quantity) values(1,2,12);
insert into tradelist (ProductId, AutomateId, Quantity) values(1,3,32);
insert into tradelist (ProductId, AutomateId, Quantity) values(1,4,100);
insert into tradelist (ProductId, AutomateId, Quantity) values(2,1,10);
insert into tradelist (ProductId, AutomateId, Quantity) values(3,1,10);
insert into tradelist (ProductId, AutomateId, Quantity) values(4,1,10);

-- tasks --
insert into tasks (TradeAutomatID, UserID, Description, CreationTime) values(1,4,'coffee','2003-01-16 23:12:01');
insert into tasks (TradeAutomatID, UserID, Description, CreationTime) values(2,4,'baunty','2003-01-16 23:12:01');
insert into tasks (TradeAutomatID, UserID, Description, CreationTime) values(3,4,'nuts','2003-01-16 23:12:01');
insert into tasks (TradeAutomatID, UserID, Description, CreationTime) values(4,4,'nuts','2003-01-16 23:12:01');

-- transactions --
insert into transactions (product, amount, receivedMoney, `change`, automat) values(1, 10, 12.2, 1.1, 1);
insert into transactions (product, amount, receivedMoney, `change`, automat) values(2,10,12.2,1.1,1);
insert into transactions (product, amount, receivedMoney, `change`, automat) values(3,10,12.2,1.1,1);
insert into transactions (product, amount, receivedMoney, `change`, automat) values(4,10,12.2,1.1,1);
insert into transactions (product, amount, receivedMoney, `change`, automat) values(2,10,12.2,1.1,2);
insert into transactions (product, amount, receivedMoney, `change`, automat) values(3,10,12.2,1.1,3);
insert into transactions (product, amount, receivedMoney, `change`, automat) values(4,10,12.2,1.1,4);

