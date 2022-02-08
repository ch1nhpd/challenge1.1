create table tasks(
    id int unsigned not null auto_increment,
    name varchar(30) not null,
    primary key(id)
);



create table accounts(
    username varchar(30) not null,
    fullname varchar(30) not null,
	password varchar(30) not null,
    primary key(username)
);

ALTER TABLE accounts CHANGE password password VARCHAR(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

create table acc_task (
    task_id int unsigned not null,
    username varchar(30) not null,
    CONSTRAINT acc_task_task foreign key (task_id) references tasks(id),
    CONSTRAINT acc_task_account foreign key (username) references accounts(username),
    CONSTRAINT acc_task_unique UNIQUE (task_id, username)
)