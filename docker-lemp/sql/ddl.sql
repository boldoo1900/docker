/*

tabelname: users
columns:   user_id, nickname, password, birth_date, gender, favorite_language

tablename: blogs
columns: blog_id, user_id, blog_name, sub_title, header_image_url

tablename: articles
columns: article_id, title, body

tablename: comment
columns: comment_Id, article_id, posted_user_id, comment, created_at

 */

DROP TABLE IF EXISTS user_hobby_map;
DROP TABLE IF EXISTS hobby;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS articles;
DROP TABLE IF EXISTS blogs;
DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS users (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
    email    VARCHAR(31) NOT NULL,
	nickname VARCHAR(31) NOT NULL,
	password VARCHAR(255) NOT NULL,
	birth_date DATE NOT NULL,
    gender char(1) NOT NULL,
	
	-- CONSTRAINT `users_chk_1` CHECK (nickname NOT LIKE '%[^A-Z]%') ,
    CONSTRAINT `users_chk_2` CHECK (LENGTH(nickname) >= 4),
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
END$$
DELIMITER ;


CREATE TABLE IF NOT EXISTS hobby (
	hobby_id INT AUTO_INCREMENT PRIMARY KEY,
	hobby VARCHAR(255) NOT NULL,
	created_at DATE,
    updated_at DATE
);

CREATE TABLE IF NOT EXISTS user_hobby_map (
	user_hobby_map_id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
	hobby_id INT NOT NULL,

    CONSTRAINT foreign_key_1_user_id FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE RESTRICT,
    CONSTRAINT foreign_key_1_hobby_id FOREIGN KEY (hobby_id) REFERENCES hobby(hobby_id) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS blogs (
	blog_id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
	blog_name VARCHAR(63) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    sub_title VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    header_image VARCHAR(255),
	is_public	SMALLINT default 0,
    
    CONSTRAINT foreign_key_blog_user_id FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE RESTRICT
);


CREATE TABLE IF NOT EXISTS articles (
	article_id INT AUTO_INCREMENT PRIMARY KEY,
	blog_id INT NOT NULL,
	title VARCHAR(63) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    body TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	is_public	SMALLINT default 0,
    created_at DATE NOT NULL,
    updated_at DATE NOT NULL,

	CONSTRAINT foreign_key_blog_blog_id FOREIGN KEY (blog_id) REFERENCES blogs(blog_id) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS comments (
	comment_id INT AUTO_INCREMENT PRIMARY KEY,
	article_id INT NOT NULL,
	posted_user_id INT NOT NULL,
    comment TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    created_at TIMESTAMP NOT NULL,

	CONSTRAINT foreign_key_comment_article_id FOREIGN KEY (article_id) REFERENCES articles(article_id) ON DELETE CASCADE
);