CREATE DATABASE IF NOT EXISTS cafe_reservation;
USE cafe_reservation;

CREATE TABLE IF NOT EXISTS reservations (
  id VARCHAR(30) PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  reservation_date DATE NOT NULL,
  reservation_time TIME NOT NULL,
  guests INT NOT NULL,
  table_number INT NOT NULL,
  status ENUM('pending', 'confirmed', 'cancelled') NOT NULL DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
