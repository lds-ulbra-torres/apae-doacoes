create table Payment_type(
	idPayment_type int not null auto_increment primary key,
    payment_description varchar(50) not null
)engine=innoDB;

create table Frequency(
	idFrequency int not null auto_increment primary key,
    frequency_description varchar(30) not null
)engine=innoDB;

create table Bank(
	idBank int not null auto_increment primary key,
    name_bank varchar(50) not null,
    phone_bank varchar(30) not null,
    min_value decimal(12,2) not null
)engine=innoDB;

create table State(
	idState int not null auto_increment primary key,
    name_state varchar(75) not null,
    uf varchar(2) not null
)engine=innoDB;

create table City(
	idCity int not null auto_increment primary key,
    name_city varchar(120) not null,
    idState int not null,
    foreign key (idState)
		references State(idState)
			on delete restrict
            on update cascade
)engine=innoDB;

create table Associated(
	idAssociated bigint not null auto_increment primary key,
    name_assoc varchar(70) not null,
    birth_date date not null,
    rg int not null,
    cpf varchar(18) not null,
    street varchar(72) not null,
    number varchar(5) not null,
    complement varchar(50) not null,
    neighborhood varchar(70) not null,
    name_in_card varchar(50) not null,
    item_updated datetime,
    idBank int not null,
    idFrequency int not null,
    idPayment_type int not null,
    idCity int not null,
    foreign key (idBank)
		references Bank(idBank)
			on delete restrict
            on update cascade,
    foreign key (idFrequency)
		references Frequency(idFrequency)
			on delete restrict
            on update cascade,
    foreign key (idPayment_type)
		references Payment_type(idPayment_type)
			on delete restrict
            on update cascade,
    foreign key (idCity)
		references City(idCity)
			on delete restrict
            on update cascade
)engine=innoDB;

create table Contact_type(
	idContact_type int not null auto_increment primary key,
    description_c_type varchar(30) not null
)engine=innoDB;

create table Contact(
	idContact int not null auto_increment primary key,
    idContact_type int not null,
    idAssociated bigint not null,
    description_contact varchar(100) not null,
    foreign key (idContact_type)
		references Contact_type(idContact_type)
			on delete restrict
            on update cascade,
	foreign key (idAssociated)
		references Associated(idAssociated)
			on delete restrict
            on update cascade
)engine=innoDB;