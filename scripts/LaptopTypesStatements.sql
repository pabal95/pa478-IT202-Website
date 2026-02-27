CREATE TABLE laptop_types (
    laptop_type_id      INT             NOT NULL,
    laptop_type_name    VARCHAR(255)    NOT NULL,
    laptop_type_code    VARCHAR(255)    NOT NULL UNIQUE,
    laptop_ShelfNumber  INT             NOT NULL,
    date_time_created   TIMESTAMP       DEFAULT CURRENT_TIMESTAMP,
    date_time_updated   TIMESTAMP       DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (laptop_type_id)
)

INSERT INTO laptop_types (laptop_type_id, laptop_type_name, 
laptop_type_code, laptop_ShelfNumber) 
VALUES
(1, 'Apple Laptop', 'APPLE', 1),
(2, '2-in-1 Laptop', '2IN1', 2),
(3, 'Chromebook', 'CHROME', 3);