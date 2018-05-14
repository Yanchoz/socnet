
drop database GetMeSocial_database;
create database GetMeSocial_database;

create table GetMeSocial_database.users (
	user_id integer not null auto_increment ,
	name varchar(255),
	surname varchar(255),
	maiden_name varchar(255),
	email varchar(255),
	password varchar(255),
	gender varchar(10),
	date_of_birth date,
	relationship_stat varchar(70),
	hometown varchar(70),
	primary key (user_id)
);


create table GetMeSocial_database.friends(
	friend_id integer not null auto_increment,
	user_one integer,
	user_two integer,
    primary key (friend_id)
	);

create table GetMeSocial_database.messages (
	message_id integer not null auto_increment unique,
	group_hash integer,
	from_id integer,
	message text,
	message_time datetime NOT NULL DEFAULT NOW(),
	primary key (message_id)
);

create table GetMeSocial_database.message_group (
	user_one integer,
	user_two integer,
	hash integer
);
  

create table GetMeSocial_database.articles (
	article_id integer not null auto_increment,
	article_title varchar(255) not null,
	article_text longtext,
	article_description longtext,
	where_art integer,
    article_date datetime NOT NULL DEFAULT NOW(),
	primary key (article_id)
);

create table GetMeSocial_database.images_u (
	image_id integer not null auto_increment,
	primary key (image_id)
);



ALTER TABLE GetMeSocial_database.images_u
ADD `name` VARCHAR(255) NOT NULL AFTER `image_id`,
ADD `image` LONGBLOB NOT NULL AFTER `name`,
ADD `useri_id` integer  not null after `image` ;
	
alter table GetMeSocial_database.images_u 
add constraint useri_id foreign key (useri_id )
references GetMeSocial_database.users(user_id );

create table GetMeSocial_database.images_a (
	image_id integer not null auto_increment,
	primary key (image_id)
);

ALTER TABLE GetMeSocial_database.images_a
ADD `name` VARCHAR(255) NOT NULL AFTER `image_id`,
ADD `image` LONGBLOB NOT NULL AFTER `name`,
ADD `articlei_id` integer not null after `image` ;

alter table GetMeSocial_database.images_a
add constraint articlei_id foreign key(articlei_id)
references GetMeSocial_database.articles(article_id);

create table GetMeSocial_database.articles_images (
	article_images_id integer not null auto_increment,
	articless_id integer ,
	imagess_id integer,
	primary key (article_images_id)
);

alter table GetMeSocial_database.articles_images
add constraint imagess_id foreign key (imagess_id)
references GetMeSocial_database.images_a (image_id);

alter table GetMeSocial_database.articles_images
add constraint  articless_id foreign key ( articless_id )
references GetMeSocial_database.articles(article_id );

create table GetMeSocial_database.a_type (
	a_type_id integer not null auto_increment,
	type_name varchar(255),
	category_name varchar(255),
	categories_id integer,
	primary key (a_type_id)
);
create table GetMeSocial_database.articles_type (
	articles_type_id integer not null auto_increment,
	a_types_id integer,
	articls_id integer,
	category_id integer,
	primary key (articles_type_id)
);

alter table GetMeSocial_database.articles_type 
add constraint a_types_id foreign key (a_types_id )
references GetMeSocial_database.a_type(a_type_id );

alter table GetMeSocial_database.articles_type 
add constraint articls_id foreign key (articls_id)
references GetMeSocial_database.articles (article_id);



create table GetMeSocial_database.articles_author (
	articles_author_id integer not null auto_increment,
	author_id integer,
	articles_id integer,
	primary key (articles_author_id)
);

alter table GetMeSocial_database.articles_author 
add constraint author_id foreign key (author_id )
references GetMeSocial_database.users (user_id );

alter table GetMeSocial_database.articles_author 
add constraint articles_id foreign key (articles_id)
references GetMeSocial_database.articles (article_id);

create table GetMeSocial_database.saved (
	saved_id integer not null auto_increment unique,
	artices_id integer,
	date_of_saving datetime,  
	user_saved integer,
	primary key (saved_id)
);

alter table GetMeSocial_database.saved
add constraint artices_id foreign key (artices_id)
references GetMeSocial_database.articles (article_id);

alter table GetMeSocial_database.saved
add constraint user_saved foreign key (user_saved)
references GetMeSocial_database.users (user_id);

create table GetMeSocial_database.whereTG (
	where_id integer not null auto_increment unique,
	country varchar(70),
	city varchar(70),
	street varchar(70),
	number_s integer,
	coordinates varchar(255),
	primary key (where_id)
);
alter table GetMeSocial_database.articles 
add constraint where_art foreign key (where_art)
references GetMeSocial_database.whereTG(where_id );


INSERT INTO GetMeSocial_database.whereTG(country,city,street,number_s,coordinates)VALUES('Great Britan','London','Baker street','22','51.517660, -0.154731');
INSERT INTO GetMeSocial_database.whereTG(country,city,street,number_s,coordinates)VALUES('Canada','Toronto','Main street','12','43.679378, -79.297846');
INSERT INTO GetMeSocial_database.whereTG(country,city,street,number_s,coordinates)VALUES('Poland','Warsaw','Wolska','46/48','52.234437, 20.968834');
INSERT INTO GetMeSocial_database.whereTG(country,city,street,number_s,coordinates)VALUES('Great Britan','London','Lincoln s Inn Fields','71','51.516750, -0.118519');



INSERT INTO GetMeSocial_database.a_type(type_name,categories_id,category_name)VALUES('History','1','Design your life');
INSERT INTO GetMeSocial_database.a_type(type_name,categories_id,category_name)VALUES('US & Canada','2','Ideas and Inspirations');
INSERT INTO GetMeSocial_database.a_type(type_name,categories_id,category_name)VALUES('Middle East','3','Fun');
INSERT INTO GetMeSocial_database.a_type(type_name,categories_id,category_name)VALUES('Africa','4','Advertisment');
INSERT INTO GetMeSocial_database.a_type(type_name,categories_id,category_name)VALUES('Asia','5','News');
INSERT INTO GetMeSocial_database.a_type(type_name,categories_id,category_name)VALUES('Australia','6','Studing');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Europe');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Latin America');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Business');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Market Data');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Markets');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Economy');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Companies');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Entrepreneurship');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Technology of business');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Business of Sport');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Global Education');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Technology');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Science & Environment');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Art');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Health');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Travel');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Videos');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Games');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Motivating stories');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Math');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('English language');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Handmade');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Decor your house');
INSERT INTO GetMeSocial_database.a_type(type_name)VALUES('Business ideas');



