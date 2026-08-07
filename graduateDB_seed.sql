CREATE DATABASE IF NOT EXISTS graduateDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE graduateDB;

DROP TABLE IF EXISTS user_order;
DROP TABLE IF EXISTS user_cart;
DROP TABLE IF EXISTS guest_cart;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS subcategories;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS user_registration;
DROP TABLE IF EXISTS admin;

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  catname VARCHAR(100) NOT NULL UNIQUE,
  created_on DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE subcategories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  subname VARCHAR(100) NOT NULL UNIQUE,
  created_on DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cat_id INT NOT NULL,
  subcat_id INT NOT NULL,
  pname VARCHAR(255) NOT NULL,
  mrp DECIMAL(10,2) NOT NULL DEFAULT 0,
  sprice DECIMAL(10,2) NOT NULL DEFAULT 0,
  short_desc TEXT,
  long_desc TEXT,
  keywords VARCHAR(255),
  pimage VARCHAR(255),
  status TINYINT NOT NULL DEFAULT 1,
  create_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE user_registration (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  id INT NULL,
  uname VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  mnumber VARCHAR(20),
  password VARCHAR(100) NOT NULL,
  create_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  uname VARCHAR(100) NOT NULL UNIQUE,
  pswd VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE guest_cart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pid INT NOT NULL,
  qty INT NOT NULL DEFAULT 1,
  create_on DATETIME DEFAULT CURRENT_TIMESTAMP,
  ip_address VARCHAR(80)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE user_cart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  pid INT NOT NULL,
  qty INT NOT NULL DEFAULT 1,
  create_on DATETIME DEFAULT CURRENT_TIMESTAMP,
  ip_address VARCHAR(80)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE user_order (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_name VARCHAR(100),
  order_email VARCHAR(150),
  order_phone VARCHAR(30),
  order_address VARCHAR(255),
  order_pay VARCHAR(50),
  oid INT,
  order_user_id INT,
  qty INT DEFAULT 1,
  create_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO categories (id, catname, created_on) VALUES
(1, 'NIKE', NOW()),
(2, 'adidas', NOW()),
(3, 'ASICS', NOW()),
(4, 'Mizuno', NOW()),
(5, 'Lotto', NOW()),
(6, 'Keds', NOW());

INSERT INTO subcategories (id, subname, created_on) VALUES
(1, '慢跑鞋', NOW()),
(2, '籃球鞋', NOW()),
(3, '排球鞋', NOW()),
(4, '服飾', NOW()),
(5, '羽球用品', NOW());

INSERT INTO products (id, cat_id, subcat_id, pname, mrp, sprice, short_desc, long_desc, keywords, pimage, status, create_at) VALUES
(1, 1, 1, 'Nike Revolution 5 慢跑鞋', 2600, 1880, '輕量透氣的日常慢跑鞋，適合初階訓練與通勤穿搭。', '鞋面採用透氣網布設計，搭配柔軟泡棉中底，提供穩定舒適的著地感。適合日常慢跑、健走與校園通勤使用。', 'nike running shoes 慢跑鞋', 'Nike Revolution 5.jpg', 1, NOW()),
(2, 1, 2, 'NIKE Precision 5 籃球鞋', 3200, 2480, '強調抓地與支撐的籃球鞋，適合室內外球場訓練。', '鞋底紋路提供多方向移動時的穩定抓地力，鞋身包覆能支援切入、急停與跳投等動作。', 'nike basketball 籃球鞋', 'NIKE Precision 5.jpg', 1, NOW()),
(3, 2, 1, 'adidas ULTRABOOST 21 跑鞋', 6200, 4980, '高回彈跑鞋，適合長距離跑步與高舒適度需求。', 'BOOST 中底帶來柔軟且有彈性的腳感，鞋面貼合腳型，適合長時間訓練或日常穿搭。', 'adidas ultraboost running 跑鞋', 'ULTRABOOST 21.jpg', 1, NOW()),
(4, 3, 3, 'ASICS GEL-TASK 2 男款排球鞋', 2980, 2380, '穩定型排球訓練鞋，支援橫向移動與落地緩震。', '鞋底提供球場移動所需的抓地力，前後掌緩震設計可降低跳躍落地時的衝擊。', 'asics volleyball 排球鞋', 'GEL-TASK 2 男款排球鞋.jpg', 1, NOW()),
(5, 4, 1, 'Mizuno WAVE CREATION 22 男慢跑鞋', 5680, 4280, '支撐型慢跑鞋，適合重視穩定與避震的跑者。', 'Wave 結構提升後跟支撐與避震表現，鞋身包覆穩定，適合中長距離跑步訓練。', 'mizuno wave running 慢跑鞋', '男慢跑鞋 WAVE CREATION 22.jpg', 1, NOW()),
(6, 1, 4, 'Nike JDI 男款連帽上衣', 2200, 1680, '柔軟棉質連帽上衣，適合運動後與日常休閒穿著。', '親膚布料搭配經典版型，兼具保暖與活動舒適度，可搭配球鞋與運動長褲作為完整穿搭。', 'nike hoodie 服飾', 'Nike M NSW JDI HOODIE.jpg', 1, NOW()),
(7, 1, 4, 'Nike Dri-FIT Freak 運動上衣', 1680, 1280, '排汗機能上衣，適合籃球、健身與戶外訓練。', 'Dri-FIT 排汗布料協助維持乾爽，版型俐落，適合高強度訓練與日常運動穿搭。', 'nike dri-fit 運動上衣', 'Nike Dri-FIT Freak.jpg', 1, NOW()),
(8, 2, 1, 'adidas RUNFALCON 2.0 慢跑鞋', 2380, 1880, '入門慢跑鞋，適合健走、跑步與日常訓練。', '輕量鞋面搭配穩定中底，提供基礎緩震與舒適腳感，是日常運動的實用選擇。', 'adidas runfalcon 慢跑鞋', 'RUNFALCON 2.0.jpg', 1, NOW()),
(9, 3, 1, 'ASICS GEL-CUMULUS 23 跑鞋', 4680, 3280, '兼具緩震與穩定的跑鞋，適合規律跑步訓練。', 'GEL 緩震科技降低落地衝擊，鞋面透氣且包覆自然，適合一般跑者日常累積里程。', 'asics gel cumulus 跑鞋', 'GEL-CUMULUS 23.jpg', 1, NOW()),
(10, 3, 5, 'ASICS COURT FF NOVAK 網球鞋', 5280, 3980, '球場型運動鞋，適合快速啟動與側向移動。', '鞋身支撐性佳，外底耐磨且抓地穩定，適合網球、羽球與多方向移動訓練。', 'asics court 網球 羽球', 'COURT FF NOVAK.jpg', 1, NOW()),
(11, 2, 2, 'adidas D ROSE 11 籃球鞋', 4300, 2980, '注重穩定與推進感的籃球鞋，適合後衛與切入型打法。', '中底回彈明確，鞋底提供靈活抓地力，能支援急停、變向與快速啟動。', 'adidas d rose basketball 籃球鞋', 'D ROSE 11.jpg', 1, NOW()),
(12, 5, 1, 'Lotto SPIRITAIN 2000 GORE-TEX 休閒鞋', 3980, 2880, '防潑水休閒運動鞋，適合通勤與戶外輕旅行。', 'GORE-TEX 材質提升天候適應性，鞋型兼具復古運動感與日常搭配性。', 'lotto gore-tex 休閒鞋', 'SPIRITAIN 2000 GORE-TEX.jpg', 1, NOW());

-- password 欄位存的是 password_hash() 產生的 bcrypt hash，不是明文。
-- 下面兩筆分別是 'demo123' 與 'admin123' 的 bcrypt hash，登入頁會用 password_verify() 比對，
-- 對外顯示的測試帳密（demo123 / admin123）不受影響。
INSERT INTO user_registration (user_id, id, uname, email, mnumber, password, create_at) VALUES
(1, 1, 'Demo User', 'demo@example.com', '0912345678', '$2b$10$Je99DvXFswCg.xH0feQS5OC1y9YVt63XVEh09qT2xuMzEEgJUuJKW', NOW());

INSERT INTO admin (id, uname, pswd) VALUES
(1, 'admin', '$2b$10$tWoyHlb7vThCDUv7SgMs8eopZrp2v0sW1gCpmc5JW3SvEfOEGEfF6');
