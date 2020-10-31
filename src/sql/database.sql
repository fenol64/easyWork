create database if not exists easywork
default character set utf8mb4
default collate utf8mb4_general_ci;
use easywork;

create table if not exists users (
	id_user int primary key auto_increment,
    nome varchar(50) not null,
    Snome varchar(80) not null,
    nasc date not null,
    bio text,
    cpf char(14) not null unique,
    email varchar(100) not null unique,
    passwd char(32) not null,
    forget char(30),
    profile_pic varchar(255) not null default 'views/assets/imgs/avatar/avatar.png',
    tipo enum('U', 'P', 'A') not null default 'U', 
    facebook_id varchar(255),
    google_id varchar(255),
    created_At timestamp default current_timestamp,
    updated_At timestamp default current_timestamp
)default charset = utf8;              

create table if not exists partner (
	id_partner int primary key auto_increment,
    id_user int(11),
    imei char(15) not null unique,
    capable json not null,
    is_online bool not null default 1,
    plano enum('free', 'paid'),
	created_At timestamp default current_timestamp,
    updated_At timestamp default current_timestamp
)default charset = utf8;        

create table if not exists posts (
	id_post int primary key auto_increment,
    creator int not null,
	post_head varchar(50),
    post_body longtext not null,
    categories json not null,
    professional int not null,
    status_post enum('ok', 'pending', 'cancel', 'ban') not null default 'pending',
	created_At timestamp default current_timestamp,
    updated_At timestamp default current_timestamp
)default charset = utf8;

create table if not exists hates (
	id_hate int primary key auto_increment,
    id_post int not null,
    id_user_giving int not null,
    id_user_receiving int not null,
    hate_value enum('1', '2', '3', '4', '5') not null,
	created_At timestamp default current_timestamp,
    updated_At timestamp default current_timestamp
)default charset = utf8;

create table if not exists payment (
	id_payment int primary key auto_increment,
	tipo varchar(20) not null,
	id_transaction varchar(50) not null,
	created_At timestamp default current_timestamp,
    updated_At timestamp default current_timestamp
)default charset = utf8;

create table if not exists categories (
	id_category int primary key auto_increment,
	name_category varchar(70)not null,
	created_At timestamp default current_timestamp,
    updated_At timestamp default current_timestamp
)default charset = utf8;

create table if not exists support (
	id_support int primary key auto_increment,
	question varchar(255) not null,
    anwser varchar(255),
	created_At timestamp default current_timestamp,
    updated_At timestamp default current_timestamp
)default charset = utf8;


    