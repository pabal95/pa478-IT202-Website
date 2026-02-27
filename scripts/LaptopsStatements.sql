CREATE TABLE laptops (
    laptop_id          INT             NOT NULL,
    laptop_code        VARCHAR(10)     NOT NULL,
    laptop_name        VARCHAR(255)    NOT NULL,
    laptop_description TEXT            NOT NULL,
    ram                INT             NOT NULL,
    storage_capacity   INT             NOT NULL,
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