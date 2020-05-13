use cts_project1;

create table users (
    id int(11) primary key auto_increment,
    user_id varchar(13),
    user_role int(1),
    password varchar(100),
    last_login timestamp,
    status int(1)		/*do we need this if theres a different status table (student_approval) */
);
create table users_values (
    field_id int(11) primary key auto_increment,
    uid int(11),
    address varchar(255),
    mobile_no varchar(10),
    class varchar(4),
    section varchar(4),
    fname varchar(25),
    lname varchar(25)
);

create table student_approval(
	student_id int(11) primary key,
	status int,		/* 0 pending 1 accepted 2 rejected */  
	actioned_on timestamp,
	approved_by varchar(40)
);

create table class(
	id int(11) primary key auto_increment,
	class varchar(10)
);

create table class_section(
	id int(11) primary key auto_increment,
	class varchar(10),		/* class or class id? */
	sections varchar(2)
);