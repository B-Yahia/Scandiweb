drop table SelectedAttributes,Attributes,AttributeSets,Orderlines,Prices,ImagesUrls,Products,Currencies,Orders,Categories;

create table Categories(
    id bigint unsigned auto_increment primary key,
    name text not null
);
create table Orders(
    id bigint unsigned auto_increment primary key,
    total decimal(10,2) not null
);
create table Currencies(
    id bigint unsigned auto_increment primary key,
    label text not null,
    symbol text not null
);
create table Products(
    id bigint unsigned auto_increment primary key,
    name text not null,
    brand text not null,
    description longtext ,
    inStock boolean not null,
    category_id bigint unsigned not null,
    foreign key (category_id) references Categories (id)
);
create table ImagesUrls ( 
    url text not null,
    product_id bigint unsigned not null, 
    foreign key (product_id) references Products(id) 
);

create table Prices (
    id bigint unsigned auto_increment primary key, 
    amount decimal(10,2) not null,
    currency_id bigint unsigned, 
    product_id bigint unsigned, 
    foreign key (currency_id) references Currencies(id), 
    foreign key (product_id) references Products(id)
);

create table Orderlines (
    id bigint unsigned auto_increment primary key,
    product_id bigint unsigned not null, 
    units int not null,
    order_id bigint unsigned not null ,
    foreign key (product_id) references Products (id),
    foreign key (order_id) references Orders (id) 
);

create table AttributeSets (
    id bigint unsigned auto_increment primary key,
    name text not null, 
    type text not null, 
    product_id bigint unsigned not null,
    foreign key (product_id) references Products(id)
);

create table Attributes (
    id bigint unsigned auto_increment primary key , 
    value text not null , 
    displayValue text not null, 
    attribute_set_id bigint unsigned not null , 
    foreign key (attribute_set_id) references AttributeSets(id)
    );

create table SelectedAttributes ( 
    attribute_set_id bigint unsigned not null,
    attribute_id bigint unsigned not null,
    orderline_id bigint unsigned not null,
    foreign key (attribute_set_id) references AttributeSets(id),
    foreign key (attribute_id) references Attributes(id),
    foreign key (orderline_id) references Orderlines (id)
);

INSERT INTO Categories (name) VALUES 
('clothes'),
('tech');

INSERT INTO Currencies (label, symbol) VALUES 
('USD', '$');

