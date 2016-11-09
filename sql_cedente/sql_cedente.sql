 CREATE TABLE cedente(
	id_cedente int not null auto_increment primary key,
    cod_cedente int not null,
	num_agencia int not null,
    num_operacao int default 0,
    num_conta_corrente int not null,
    cnpj varchar(18) not null,
    razao_social varchar(100) not null,
    id_cidade int not null,
    foreign key (id_cidade) 
		references city(id_city)
 )engine=innoDB;