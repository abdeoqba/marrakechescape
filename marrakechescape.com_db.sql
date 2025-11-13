
      DROP DATABASE IF EXISTS `marrakechescape.com_db`;
      CREATE DATABASE IF NOT EXISTS `marrakechescape.com_db`
      CHARACTER SET utf8
      COLLATE utf8_general_ci;
      USE `marrakechescape.com_db`;

CREATE TABLE IF NOT EXISTS `cg_user` (

    `id_user` INT AUTO_INCREMENT PRIMARY KEY ,

    `deleted_at` DATETIME NULL,

    `username` VARCHAR(255) NULL ,

    `password` VARCHAR(255) NULL ,

    `role` VARCHAR(255) NULL DEFAULT 'admin',

    `active` BOOLEAN NULL,

    `allow_trash` BOOLEAN NULL,

    `allow_truncate` BOOLEAN NULL,

    `allow_read_history` BOOLEAN NULL,

    `allow_edit` BOOLEAN NULL

    );



    INSERT INTO `cg_user`(`username`, `password`, `role`, `active`, `allow_trash`, `allow_truncate`, `allow_read_history`, `allow_edit`) 
          VALUES('admin1', '87654321', 'admin', 1, 1, 1, 1, 1);
    INSERT INTO `cg_user`(`username`, `password`, `role`, `active`, `allow_trash`, `allow_truncate`, `allow_read_history`, `allow_edit`) 
          VALUES('user1', '12345678', 'user', 1, 0, 0, 0, 1);

    
CREATE TABLE IF NOT EXISTS `cg_history` (

    `id_history` INT AUTO_INCREMENT PRIMARY KEY ,

    `id_user` INT NULL,

    `id_obj` INT NULL,

    `table` VARCHAR(50) NULL,

    `action` VARCHAR(50) NULL,

    `time` DATETIME NULL

    );

INSERT INTO `cg_history`(`id_user`, `id_obj`, `table`, `action`, `time`) VALUES(1,0,'','create_database',NOW());

    CREATE TABLE IF NOT EXISTS `post_comment` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_post_comment` INT AUTO_INCREMENT PRIMARY KEY ,
`id_post` INT NULL ,
`id_client` INT NULL ,
`name` VARCHAR(255) NULL ,
`email` VARCHAR(255) NULL ,
`content` TEXT NULL ,
`status` VARCHAR(10) NULL 
);

CREATE TABLE IF NOT EXISTS `post_category_translation` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_post_category_translation` INT AUTO_INCREMENT PRIMARY KEY ,
`id_post_category` INT NULL ,
`language` VARCHAR(5) NULL ,
`title` VARCHAR(255) NULL ,
`description` VARCHAR(1000) NULL 
);

CREATE TABLE IF NOT EXISTS `post_category` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_post_category` INT AUTO_INCREMENT PRIMARY KEY ,
`id_image` INT NULL 
);

CREATE TABLE IF NOT EXISTS `post_translation` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_post_translation` INT AUTO_INCREMENT PRIMARY KEY ,
`id_post` INT NULL ,
`language` VARCHAR(5) NULL ,
`title` VARCHAR(255) NULL ,
`slug` VARCHAR(255) NULL ,
`content` TEXT NULL ,
`meta_title` VARCHAR(255) NULL ,
`meta_description` VARCHAR(500) NULL ,
`excerpt` VARCHAR(500) NULL 
);

CREATE TABLE IF NOT EXISTS `payments` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_payments` INT AUTO_INCREMENT PRIMARY KEY ,
`id_booking` INT NULL ,
`amount` FLOAT NULL ,
`gateway` VARCHAR(20) NULL ,
`status` VARCHAR(255) NULL 
);

CREATE TABLE IF NOT EXISTS `bookings` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_bookings` INT AUTO_INCREMENT PRIMARY KEY ,
`id_client` INT NULL ,
`id_program` INT NULL ,
`persons` INT NULL ,
`travel_date` DATE NULL ,
`status` VARCHAR(20) NULL ,
`total_amount` FLOAT NULL 
);

CREATE TABLE IF NOT EXISTS `program_day_translation` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_program_day_translation` INT AUTO_INCREMENT PRIMARY KEY ,
`id_day` INT NULL ,
`language` VARCHAR(5) NULL ,
`title` VARCHAR(255) NULL ,
`content` TEXT NULL 
);

CREATE TABLE IF NOT EXISTS `program_translation` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_program_translation` INT AUTO_INCREMENT PRIMARY KEY ,
`id_program` INT NULL ,
`language` VARCHAR(5) NULL ,
`title` VARCHAR(255) NULL ,
`description` VARCHAR(1000) NULL ,
`content` TEXT NULL ,
`includes` TEXT NULL ,
`excludes` TEXT NULL ,
`highlights` TEXT NULL 
);

CREATE TABLE IF NOT EXISTS `category_translation` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_category_translation` INT AUTO_INCREMENT PRIMARY KEY ,
`id_category` INT NULL ,
`language` VARCHAR(5) NULL ,
`title` VARCHAR(255) NULL ,
`description` VARCHAR(1000) NULL ,
`content` TEXT NULL 
);

CREATE TABLE IF NOT EXISTS `image` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_image` INT AUTO_INCREMENT PRIMARY KEY ,
`photo_file` VARCHAR (255) NULL ,
`alt_text` VARCHAR(255) NULL 
);

CREATE TABLE IF NOT EXISTS `post` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_post` INT AUTO_INCREMENT PRIMARY KEY ,
`id_post_category` INT NULL ,
`id_image` INT NULL ,
`published_at` DATETIME NULL ,
`status` VARCHAR(10) NULL 
);

CREATE TABLE IF NOT EXISTS `client` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_client` INT AUTO_INCREMENT PRIMARY KEY ,
`first_name` VARCHAR(100) NULL ,
`last_name` VARCHAR(100) NULL ,
`email` VARCHAR(255) NULL ,
`phone` VARCHAR(50) NULL 
);

CREATE TABLE IF NOT EXISTS `program_day` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_program_day` INT AUTO_INCREMENT PRIMARY KEY ,
`id_program` INT NULL ,
`day_order` INT NULL 
);

CREATE TABLE IF NOT EXISTS `category` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_category` INT AUTO_INCREMENT PRIMARY KEY ,
`parent_id` INT NULL ,
`id_image` INT NULL 
);

CREATE TABLE IF NOT EXISTS `program` (
`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`deleted_at` DATETIME NULL ,
`id_program` INT AUTO_INCREMENT PRIMARY KEY ,
`id_category` INT NULL ,
`id_image` INT NULL ,
`nbr_days` VARCHAR(50) NULL ,
`start` VARCHAR(255) NULL ,
`end` VARCHAR(255) NULL ,
`price` FLOAT NULL 
);


ALTER TABLE `post_comment` ADD FOREIGN KEY (id_post) REFERENCES `post`(`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `post_comment` ADD FOREIGN KEY (id_client) REFERENCES `client`(`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `post_category_translation` ADD FOREIGN KEY (id_post_category) REFERENCES `post_category`(`id_post_category`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `post_category` ADD FOREIGN KEY (id_image) REFERENCES `image`(`id_image`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `post_translation` ADD FOREIGN KEY (id_post) REFERENCES `post`(`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `payments` ADD FOREIGN KEY (id_booking) REFERENCES `bookings`(`id_bookings`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `bookings` ADD FOREIGN KEY (id_client) REFERENCES `client`(`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `bookings` ADD FOREIGN KEY (id_program) REFERENCES `program`(`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `program_day_translation` ADD FOREIGN KEY (id_day) REFERENCES `program_day`(`id_program_day`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `program_translation` ADD FOREIGN KEY (id_program) REFERENCES `program`(`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `category_translation` ADD FOREIGN KEY (id_category) REFERENCES `category`(`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `post` ADD FOREIGN KEY (id_post_category) REFERENCES `post_category`(`id_post_category`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `post` ADD FOREIGN KEY (id_image) REFERENCES `image`(`id_image`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `program_day` ADD FOREIGN KEY (id_program) REFERENCES `program`(`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `category` ADD FOREIGN KEY (parent_id) REFERENCES `category`(`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `category` ADD FOREIGN KEY (id_image) REFERENCES `image`(`id_image`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `program` ADD FOREIGN KEY (id_category) REFERENCES `category`(`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `program` ADD FOREIGN KEY (id_image) REFERENCES `image`(`id_image`) ON DELETE CASCADE ON UPDATE CASCADE;


