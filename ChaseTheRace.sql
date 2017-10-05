CREATE DATABASE IF NOT EXISTS heroku_2a00e25f9fd5fde;
use heroku_2a00e25f9fd5fde;
create user if not exists '853c9a50b3dae'@'us-cdbr-iron-east-05.cleardb.net' identified by '850596d0';
grant all on heroku_2a00e25f9fd5fde.* to '853c9a50b3dae'@'us-cdbr-iron-east-05.cleardb.net';

-- CREATE DATABASE IF NOT EXISTS ChaseTheRace;
-- use ChaseTheRace;
-- create user if not exists 'adminUser'@'localhost' identified by 'The password';
-- grant all on ChaseTheRace.* to 'adminUser'@'localhost';

DROP TABLE IF EXISTS Users;
create table Users (
  id int not null auto_increment primary key,
  email varchar(250) not null,
  password varchar(500) not null,
  domain varchar(50) not null,
  date_created datetime not null,
  ip varchar(20) not null
);

DROP TABLE IF EXISTS Predictions;
create table Predictions (
  id int not null auto_increment primary key,
  user_id int not null,
  prediction int not null,
  fastest_pit_stop int not null,
  first_retiree int not null,
  safety_car boolean DEFAULT FALSE,
  tiebreaker int not null
);
