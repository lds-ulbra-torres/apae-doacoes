create table pre_partners(
	id_pre_partner int primary key auto_increment,
    name_partner varchar(100) not null,
    name_contact varchar(100) not null,
    phone varchar(45) not null,
    email varchar(45) not null,
    message varchar(1000),
    became_partner boolean default 0,
    refused_partner boolean default 0
)