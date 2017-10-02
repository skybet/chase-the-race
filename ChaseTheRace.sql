create database if not exists chaseTheRace;
use chaseTheRace;
create user if not exists 'adminUser'@'localhost' identified by 'The password';
grant all on chaseTheRace.* to 'adminUser'@'localhost';

DROP TABLE IF EXISTS User;
create table Users (
  id int not null auto_increment primary key,
  email varchar(250) not null
);

DROP TABLE IF EXISTS Predictions;
create table Predictions (
  id int not null auto_increment primary key,
  user_id int not null,
  prediction varchar(256) not null
);
