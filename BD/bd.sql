create database candieiros_login;

use candieiros_login;

create table usuarios(
    id_usuario int AUTO_INCREMENT PRIMARY KEY,
    nome varchar(30),
    telefone varchar(30),
    email varchar(40),
    senha varchar(80)
);

create table acessos(
    id_acesso int AUTO_INCREMENT PRIMARY KEY,
    nomeA varchar(50),
    email varchar(40),
    senha varchar(32),
    nameLogin varchar (30),
    link varchar (100) 
    );

create table garantias(
    id_garantia int AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(10),
    serial_number varchar(30),
    nota_compra varchar(10),
    data_emissao varchar (40),
    data_expira varchar (40)
);    