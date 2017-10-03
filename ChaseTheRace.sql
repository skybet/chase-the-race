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
  prediction varchar(256) not null,
  pitstops int not null
);
