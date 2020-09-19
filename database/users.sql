create table users
(
    id bigint unsigned auto_increment,
    email varchar(100) not null,
    password varchar(100) not null,
    constraint id
        unique (id),
    constraint users_email_uindex
        unique (email),
    constraint users_id_uindex
        unique (id)
)
