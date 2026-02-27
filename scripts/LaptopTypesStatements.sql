CREATE TABLE laptop_types (
    laptop_type_id      INT             NOT NULL,
    laptop_type_name    VARCHAR(255)    NOT NULL,
    laptop_type_code    VARCHAR(255)    NOT NULL UNIQUE,
    date_time_created   TIMESTAMP       DEFAULT CURRENT_TIMESTAMP,
    date_time_updated   TIMESTAMP       DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (laptop_type_id)
)