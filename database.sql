CREATE DATABASE queen_shop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE queen_shop;

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10,3) NOT NULL,
  image TEXT,
  category VARCHAR(100),
  is_active TINYINT DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_code VARCHAR(50) NOT NULL,
  customer_name VARCHAR(255),
  phone VARCHAR(50),
  address TEXT,
  total DECIMAL(10,3),
  payment_method VARCHAR(50),
  payment_status VARCHAR(50) DEFAULT 'pending',
  order_status VARCHAR(50) DEFAULT 'new',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  product_name VARCHAR(255),
  price DECIMAL(10,3),
  quantity INT DEFAULT 1,
  FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
);

CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL
);

INSERT INTO admins (username, password)
VALUES ('admin', '$2y$10$ZlHf5B4pD9DqjWqRj4Xv0Owj8EVX8JwBlpT3bC9gYQZlQmqlPJyKq');
