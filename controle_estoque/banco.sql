create schema estoque;

use estoque;

create table item(
    id int not null,
    nome varchar(60) not null,
    descricao varchar(100) not null,
    valor decimal(10, 2) not null,
    quant_estoque float not null,
    familia varchar(30) not null,
    primary key(id)
);


insert into  item values(123123, 'Parafuso','Parafuso Sextavado 3/16', 1.50, 1000,'Parafusos - Aço');
insert into  item values(321321, 'Porca','Porca 3/16', 0.50, 50,'Porcas - Aço');