CREATE TABLE laptops (
    laptop_id          INT             NOT NULL,
    laptop_code        VARCHAR(10)     NOT NULL,
    laptop_name        VARCHAR(255)    NOT NULL,
    laptop_description TEXT            NOT NULL,
    ram                INT             NOT NULL,
    storage_capacity   INT             NOT NULL,
    -- additional feature
    inch_dimension     INT             NOT NULL,

    laptop_type_id     INT             DEFAULT 0,
    laptop_buy_price   DECIMAL(10, 2)  NOT NULL,
    laptop_sell_price  DECIMAL(10, 2)  NOT NULL,
    date_time_created  TIMESTAMP       DEFAULT CURRENT_TIMESTAMP,
    date_time_updated  TIMESTAMP       DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (laptop_id),
    FOREIGN KEY (laptop_type_id) 
    REFERENCES laptop_types(laptop_type_id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
);

--INSERT STATEMENTS
INSERT INTO laptops (laptop_id, laptop_code, laptop_name, laptop_description, ram, 
storage_capacity, inch_dimension, laptop_type_id, laptop_buy_price, laptop_sell_price) 
VALUES
(1, 'MACPRO',
'MacBook Pro 2025', 'The latest MacBook Pro with M3 chip and improved battery life.',
16, 512, 14, 1, 1999.99, 2499.99),

(2, "LENYOGA",
"Lenovo Yoga 2025", "A versatile 2-in-1 laptop with a flexible hinge and touchscreen.",
16, 256, 13, 2, 1099.99, 1399.99),

(3, "DELLCHROME",
"Dell Chromebook 2025", "A lightweight and affordable Chromebook for everyday tasks.",
8, 128, 11, 3, 299.99, 399.99);