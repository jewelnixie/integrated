CREATE DATABASE visita_db;

USE visita_db;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Destinations table
CREATE TABLE destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price FLOAT NOT NULL,
    duration VARCHAR(50) NOT NULL
);

-- Favorites table
CREATE TABLE favorites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    destination_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (destination_id) REFERENCES destinations(id),
    UNIQUE KEY unique_user_destination (user_id, destination_id)
);

-- Insert sample data into destinations
INSERT INTO destinations (name, image, price, duration, description)
VALUES
('Boracay', 'boracay.jpg', 400.00, '3 days', 'Boracay is a tropical paradise...'),
('Puerto Princesa', 'puerto.jpg', 200.00, '2 days', 'Puerto Princesa, the capital of Palawan...'),
('Coron', 'coron.jpg', 150.00, '2 days', 'Coron is a hidden gem known for its breathtaking...'),
('El Nido', 'el nido.jpg', 260.00, '3 days', 'El Nido, located in Palawan, is a stunning destination...'),
('Chocolate Hills', 'chocolatehills.jpg', 90.00, '2 days', 'The Chocolate Hills, located in Bohol...'),
('Baguio', 'baguio.jpg', 200.00, '4 days', 'Baguio, known as the "Summer Capital"...');

INSERT INTO users (name, username, email, password) 
VALUES ('Nixie', 'nj', 'njpara@gmail.com', MD5('nixiejewel'));

CREATE TABLE feedback_tbl(
	id INT(11) NOT NULL,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    comments TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT current_timestamp());

