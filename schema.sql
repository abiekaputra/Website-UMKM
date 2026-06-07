-- ============================================================
-- UMKMGO! - Database Schema
-- Jalankan: mysql -u root -p < schema.sql
-- ============================================================

CREATE DATABASE IF NOT EXISTS umkm CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE umkm;

CREATE TABLE IF NOT EXISTS users (
    user_id   INT AUTO_INCREMENT PRIMARY KEY,
    username  VARCHAR(100)        NOT NULL,
    email     VARCHAR(150)        NOT NULL UNIQUE,
    password  VARCHAR(255)        NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS products (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    product_name        VARCHAR(200)        NOT NULL,
    product_category    VARCHAR(100)        NOT NULL,
    product_price       DECIMAL(12, 2)      NOT NULL,
    product_image       VARCHAR(500),
    product_description TEXT,
    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
