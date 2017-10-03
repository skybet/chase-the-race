CREATE DATABASE IF NOT EXISTS ChaseTheRace;
use ChaseTheRace;
create user if not exists 'adminUser'@'localhost' identified by 'The password';
grant all on ChaseTheRace.* to 'adminUser'@'localhost';

DROP TABLE IF EXISTS Users;
create table Users (
  id int not null auto_increment primary key,
  email varchar(250) not null
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
