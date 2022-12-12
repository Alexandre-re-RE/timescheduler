CREATE DATABASE IF NOT EXISTS `timescheduler`;

USE `timescheduler`;

CREATE TABLE `roles`(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `code` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL
);

CREATE TABLE `users`(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `firstname` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `role_id` INT NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL,
    FOREIGN KEY(`role_id`) REFERENCES `roles`(`id`)
);

CREATE TABLE `clients`(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL
);

CREATE TABLE `status`(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `code` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL
);

CREATE TABLE `projects`(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `start_date` DATETIME NOT NULL,
    `end_date` DATETIME NOT NULL,
    `real_start_date` DATETIME NOT NULL,
    `real_end_date` DATETIME NOT NULL,
    `status_id` INT NOT NULL,
    `client_id` INT,
    FOREIGN KEY(`status_id`) REFERENCES `status`(`id`),
    FOREIGN KEY(`client_id`) REFERENCES `clients`(`id`)
);

CREATE TABLE `tasks`(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `priority` INT,
    `start_date` DATETIME NOT NULL,
    `end_date` DATETIME NOT NULL,
    `real_start_date` DATETIME NOT NULL,
    `real_end_date` DATETIME NOT NULL,
    `status_id` INT NOT NULL,
    `user_id` INT NOT NULL,
    `project_id` INT,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL,
    FOREIGN KEY(`status_id`) REFERENCES `status`(`id`),
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY(`project_id`) REFERENCES `projects`(`id`)
);