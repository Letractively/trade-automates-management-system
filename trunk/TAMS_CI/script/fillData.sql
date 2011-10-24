use tams;

insert into location(City,Street,Coordinates) values('Lviv','Zelena 2a','199.09 123.34');
insert into location(City,Street,Coordinates) values('Lviv','Stryska 2a','299.09 123.34');
insert into location(City,Street,Coordinates) values('Kiev','Zelena 21','195.09 223.34');

insert into products(Name,Description,Price,Image) values('Cofe','drink',1.99, null);
insert into products(Name,Description,Price,Image) values('Double Cofe','drink',2.99, null);
insert into products(Name,Description,Price,Image) values('Snickers','chocolate',3.99, null);
insert into products(Name,Description,Price,Image) values('Bounty','food',3.99, null);

insert into roles(RoleName) values('Administrator');
insert into roles(RoleName) values('Owner');
insert into roles(RoleName) values('Service');

insert into users(Name,Surname,Role,Login,Password,Email,Balance) values('admin','admin',1, 'admin'
,'qwerty','admin@gmail.com', 1000.0);

