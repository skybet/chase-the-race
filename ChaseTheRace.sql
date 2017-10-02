create database ChaseTheRace;

create table User (User_id int not null auto_increment, User_email varchar(50) not null, Primary KEY(User_id));

create table Team (Team_id int not null auto_increment, Team_name varchar(50) not null, Primary KEY (Team_id));

create table Driver (Driver_id int not null auto_increment, Driver_name varchar(50) not null, Team_id int not null,
  Primary KEY(Driver_id),
  Foreign KEY Team_id REFERENCES Team(Team_id));

create table Race (Race_id int not null auto_increment, Location varchar(50) not null, Primary KEY(Race_id));

create table RaceDrivers (RaceDriver_id int not null auto_increment, Race_id int not null, Driver_id int not null,
  Primary KEY(RaceDriver_id),
  Foreign KEY Race_id REFERENCES Race(Race_id)),
  Foreign KEY Driver_id REFERENCES Driver(Driver_id);

create table Predictions (Predictions_id int not null auto_increment, User_id int not null, RaceDriver_id int not null, NoOfPitStops int not null,
  Primary KEY(Predictions_id),
  Foreign KEY User_id REFERENCES User(User_id),
  Foreign KEY RaceDriver_id REFERENCES RaceDrivers(RaceDriver_id)
);

create table Results (Result_id int not null auto_increment, RaceDriver_id int not null,
  Primary KEY(Result_id),
  Foreign KEY RaceDriver_id REFERENCES RaceDrivers(RaceDriver_id));
