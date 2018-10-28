create table tbl_adminaccount
	(
		username varchar(20) not null,
		email varchar(50) not null,
		password varchar(20) not null,
		firstName varchar(50) not null, 
		lastName varchar(50) not null,
		userImage longblob null,
		constraint pk_username primary key (username)
	)

create table tbl_menu
	(
		productID int auto_increment not null,
		productName varchar(80) not null,
		productDescription varchar(255) not null,
		productImage longblob not null,
		unitPrice double not null,
		constraint pk_productID primary key (productID),
		constraint uq_productName unique(productName)
	)

create table tbl_itemList
	(
		itemID int auto_increment not null,
		itemName varchar(50) not null,
		itemDescription varchar(80) null default 'Description not available',
		constraint pk_itemID primary key (itemID)
	)

create table tbl_itemStock
	(
		stockID int auto_increment not null,
		measurement varchar(20) not null,
		quantity double not null,
		dateUpdated timestamp not null,
		itemID int not null,
		constraint pk_stockID primary key (stockID),
		constraint fk_itemID foreign key (itemID) references tbl_itemList(itemID) on update cascade on delete cascade
	)

create table tbl_customer
	(
		customerID int auto_increment not null,
		customerType varchar(15) not null,
		customerName varchar(50) null,
		contactNumber varchar(15) null,
		email varchar(50) null,
		address varchar(255) not null,
		constraint pk_customerID primary key (customerID)
	)

create table tbl_toppings
	(
		toppingsID int auto_increment not null,
		toppingsName varchar(50) not null,
		constraint pk_toppings primary key (toppingsID)
	)

create table tbl_customerorder 
	(
		orderID int auto_increment not null,
		toppingsID int null,
		quantity int not null,
		orderDate timestamp not null,
		totalPrice float not null,
		orderStatus varchar(20) not null,
		otherDetails varchar(80) null,
		adminUserName varchar(20) null,
		customerID int not null,
		constraint pk_orderID primary key (orderID),
		constraint fk_userName foreign key (adminUserName) references tbl_adminaccount(username) on update cascade on delete set null,
		constraint fk_customerID foreign key (customerID) references tbl_customer(customerID) on update cascade on delete cascade,
		constraint fk_toppingsID foreign key (toppingsID) references tbl_toppings(toppingsID) on update cascade on delete cascade 
	)

