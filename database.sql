create database mystore;
use mystore;

create table user_table(user_id int(11) primary key, user_name varchar(100),
user_email varchar(100),user_password varchar(255), user_image varchar(255)
,user_ip varchar(100),user_address varchar(255),user_mobile varchar(200));