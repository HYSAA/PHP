
CREATE SCHEMA IF NOT EXISTS USJR;

-- Switch to the 'USJR' schema
USE USJR;

-- Create a 'users' table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
);

