create table pre_associated(
	id int auto_increment primary key ,
    name_associated varchar(45) not null,
    email_associated varchar(45) not null,
    phone_cel varchar(45) not null,
    phone_home varchar(45) not null,
	phone_commerce varchar(45),
	became bool default 0,
    refused bool default 0
);