/*

tabelname: users
columns:   user_id, nickname, password, birth_date, gender, favorite_language

tablename: blogs
columns: blog_id, user_id, blog_name, sub_title, header_image_url

tablename: articles
columns: article_id, title, body

 */


DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS users (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	nickname VARCHAR(31) NOT NULL,
	password VARCHAR(31) NOT NULL,
	birth_date DATE NOT NULL,
    gender char(1) NOT NULL,
    favorite_language VARCHAR(255) NOT NULL,
	
	
	-- CONSTRAINT `users_chk_1` CHECK (nickname NOT LIKE '%[^A-Z]%') ,
    CONSTRAINT `users_chk_2` CHECK (LENGTH(nickname) >= 4),
    CONSTRAINT `users_chk_3` CHECK (LENGTH(password) >= 8),
    CONSTRAINT `users_chk_10` CHECK(gender IN ('M', 'F'))
);


DELIMITER $$
CREATE TRIGGER users_check BEFORE INSERT ON users
FOR EACH ROW 
BEGIN 
IF (NEW.nickname REGEXP '^[a-zA-Z0-9_]+$' ) = 0 THEN 
  SIGNAL SQLSTATE '12345'
     SET MESSAGE_TEXT = 'alphabet and underscore only accepted on this column!!!';
END IF; 

IF (NEW.password REGEXP '^[a-zA-Z0-9]+$' ) = 0 THEN 
  SIGNAL SQLSTATE '12346'
     SET MESSAGE_TEXT = 'password error!!!';
END IF; 
END$$
DELIMITER ;



DROP TABLE IF EXISTS blogs;

CREATE TABLE IF NOT EXISTS blogs (
	blog_id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
	blog_name VARCHAR(63) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    sub_title VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    header_image_url TEXT,
    
    CONSTRAINT foreign_key_1_user_id FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);


DROP TABLE IF EXISTS articles;

CREATE TABLE IF NOT EXISTS articles (
	article_id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
	title VARCHAR(63) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    body TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    created_at DATE NOT NULL,
    updated_at DATE NOT NULL,
    
    CONSTRAINT foreign_key_2_user_id FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);