DROP DATABASE IF EXISTS php_start;
CREATE DATABASE php_start;
USE php_start;

DROP TABLE IF EXISTS images;
CREATE TABLE images (
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    imgPath VARCHAR(100),
    imgName VARCHAR(50),
    imgSize BIGINT,
 	countClick BIGINT DEFAULT 0
);
INSERT ignore INTO images (imgPath, imgName, imgSize) 
VALUES
('./img/1231245512.jpg', 'Tour Eiffel', 462),
('./img/12412412.jpg', 'woman', 944),
('./img/1551231.jpg', 'Cup', 1084),
('./img/2.jpg', 'flower', 602),
('./img/3.jpg', 'flowers', 193),
('./img/4.jpg', 'Orange', 334),
('./img/5.jpg', 'jam', 398),
('./img/6.jpg', 'Dolphins', 366);
