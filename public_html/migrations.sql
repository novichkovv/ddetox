CREATE TABLE detox_products (
id SERIAL PRIMARY KEY,
sku VARCHAR (255) NOT NULL,
url VARCHAR (255) NOT NULL,
image VARCHAR (255) NOT NULL,
price DECIMAL (10,2) NOT NULL,
special_price DECIMAL (10,2) NOT NULL
)ENGINE=MyISAM;