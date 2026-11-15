SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Create the CINEMO'TO database if it doesn't exist
CREATE DATABASE IF NOT EXISTS cinemoto_db;

-- Switch to the CINEMO'TO database
USE cinemoto_db;

-- Create the Customers table
CREATE TABLE IF NOT EXISTS customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    gender ENUM('Male', 'Female', 'Non-Binary', 'Other') NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Create the Foods table
CREATE TABLE IF NOT EXISTS foods (
    food_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    size VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    food_quantity INT NOT NULL DEFAULT 0,
    total DECIMAL(10, 2) NOT NULL DEFAULT 0,
    grand_total DECIMAL(10, 2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Create the Movies table
CREATE TABLE IF NOT EXISTS movies (
    movie_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    star_rating DECIMAL(2, 1) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    type_movie VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    mtrcb_rating VARCHAR(5) NOT NULL,
    duration_minutes INT NOT NULL,
    director VARCHAR(100) NOT NULL,
    cast TEXT NOT NULL,
    country VARCHAR(100) NOT NULL,
    overview TEXT,
    release_date DATE,
    UNIQUE KEY unique_title (title)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Create the Branches table
CREATE TABLE IF NOT EXISTS branches (
    branch_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert sample data into Branches table
INSERT INTO branches (name, address) VALUES
('Cinemoto Valenzuela', 'MacArthur Highway, Brgy. Karuhatan, Valenzuela, Metro Manila'),
('Cinemoto Alabang', 'Alabang–Zapote Rd, Almanza, Las Piñas, 1750 Metro Manila'),
('Cinemoto Caloocan', 'Deparo Road, Barangay 171, Zone 15, District 1, Bagumbong 1421 Caloocan City, Metro Manila'),
('Cinemoto Makati', 'Hotel Dr, East St, Ayala Center, Makati, 12242 Metro Manila'),
('Cinemoto Malabon', 'Gen. Borromeo St, Malabon, Metro Manila'),
('Cinemoto Marikina', 'SM Marikina, Marikina-Infanta Hwy, Marikina, 1801 Metro Manila');

-- Create the Tickets table
CREATE TABLE IF NOT EXISTS tickets (
    ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    movie_id INT NOT NULL,
    food_id INT,
    branch_id INT NOT NULL,
    branch_name VARCHAR(100) NOT NULL,
    type_movie VARCHAR(50) NOT NULL,
    choosing_date DATE NOT NULL,
    choosing_time TIME NOT NULL,
    seat_number VARCHAR(20) NOT NULL,
    movie_price DECIMAL(10, 2) NOT NULL,
    movie_quantity INT NOT NULL DEFAULT 1,
    food_name VARCHAR(100),
    food_size VARCHAR(50),
    food_price DECIMAL(10, 2),
    food_quantity INT,
    food_total DECIMAL(10, 2),
    subtotal DECIMAL(10, 2),
    tax DECIMAL(10, 2),
    grand_total DECIMAL(10, 2) NOT NULL,
    booking_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id),
    FOREIGN KEY (food_id) REFERENCES foods(food_id),
    FOREIGN KEY (branch_id) REFERENCES branches(branch_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Login and signup throttling. Stores the IP and time only.
CREATE TABLE IF NOT EXISTS auth_attempts (
    attempt_id INT AUTO_INCREMENT PRIMARY KEY,
    action_name VARCHAR(20) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    attempted_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_auth_attempts_lookup (action_name, ip_address, attempted_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Security audit events. No passwords, emails, or request bodies.
CREATE TABLE IF NOT EXISTS security_events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    event_type VARCHAR(40) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    customer_id INT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_security_events_type (event_type, created_at),
    INDEX idx_security_events_ip (ip_address, created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Commit the transaction
COMMIT;
