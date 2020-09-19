create table news
(
    id bigint unsigned auto_increment,
    title varchar(256) not null,
    content text null,
    author_id bigint null,
    constraint id
        unique (id),
    constraint news_id_uindex
        unique (id)
)
