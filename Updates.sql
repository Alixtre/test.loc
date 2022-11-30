CREATE TABLE Users (
    user_id int NOT NULL AUTO_INCREMENT,
    user_name varchar(150) NOT NULL,
    user_email varchar(100) NOT NULL,
    user_password varchar(100) NOT NULL,
	PRIMARY KEY (user_id)
);

CREATE TABLE Category (
    category_id int NOT NULL AUTO_INCREMENT,
    category_name varchar(50) NOT NULL,
	PRIMARY KEY (category_id)
);

CREATE TABLE Products (
    product_id int NOT NULL AUTO_INCREMENT,
    category_id int NOT NULL,
    product_name varchar(50) NOT NULL,
	product_price decimal(2) unsigned NOT NULL,
	product_quantity int unsigned NOT NULL,
    PRIMARY KEY (product_id),
    FOREIGN KEY (category_id) REFERENCES Category(category_id)
);

CREATE TABLE Cart (
    cart_id int NOT NULL AUTO_INCREMENT,
    product_id int NOT NULL,
    user_id int NOT NULL,
	quantity int unsigned NOT NULL,
	order_date date NOT NULL,
    PRIMARY KEY (cart_id),
    FOREIGN KEY (product_id) REFERENCES Products(product_id),
	FOREIGN KEY (user_id) REFERENCES Users(user_id)
);