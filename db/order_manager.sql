create database order_management;
use order_management;
INSERT INTO `customer_order` (total_price) VALUES (0);

select * from customer_order ;
delete  from customer_order;
create table category (
    cat_id int not null auto_increment primary key,
    cat_name varchar(255) not null
);
create table product (
    product_id int not null auto_increment primary key,
    product_image varchar(500) not null,
    product_name varchar(500) not null,
    product_price float not null,
    cat_id int not null,
    foreign key (cat_id) references category(cat_id)

);
create table customer_order (
    order_id int not null auto_increment primary key ,
    total_price float not null

);

create table ordered_product (
    oproduct_id int not null auto_increment primary key,
    product_id int not null,
    order_id int not null,
    qte int not null,
    foreign key (product_id) references product(product_id),
    foreign key (order_id) references customer_order(order_id)

);
ALTER TABLE customer_order 
MODIFY COLUMN total_price FLOAT NOT NULL DEFAULT 0;
