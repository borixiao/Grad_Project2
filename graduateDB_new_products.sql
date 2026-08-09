-- 補充 9 筆商品，優先填補 排球鞋／籃球鞋／服飾 等目前數量較少的分類。
-- 圖片皆為現有 admin/assets/images/ 目錄下、尚未被任何商品使用到的真實鞋款照片，
-- 品牌與分類完全對應（例如 ASICS 的照片一定歸在 ASICS 分類底下）。
-- 沒有寫死 id，可以直接對現有正式站資料庫執行，不會跟既有商品 id 衝突。
-- 用法跟匯入 seed SQL 一樣，透過 phpMyAdmin 匯入即可；記得同時把
-- graduateProject/admin/assets/images/ 資料夾裡對應的圖片一起上傳。

INSERT INTO `products` (`cat_id`,`subcat_id`,`pname`,`mrp`,`sprice`,`short_desc`,`long_desc`,`keywords`,`pimage`,`status`,`create_at`) VALUES
(3, 3, 'ASICS GEL-RENMA 中性排球鞋', 3280, 2680, '排球場地訓練鞋，適合室內排球運動使用。', '橡膠大底提供室內場地穩定抓地力，鞋面透氣網布搭配包覆設計，適合訓練與比賽穿著。', 'asics volleyball 排球鞋', 'GEL-RENMA 中性款排球鞋.jpg', 1, NOW()),
(3, 2, 'ASICS NOVA SURGE TOKYO 男款籃球鞋', 5280, 4280, '高筒籃球鞋，提供腳踝支撐與場上緩震反應。', '中高筒鞋身包覆腳踝，緩震中底吸收跳躍落地衝擊，適合切入、急停與跳投等籃球動作。', 'asics basketball 籃球鞋', 'NOVA SURGE TOKYO 男款籃球鞋.jpg', 1, NOW()),
(3, 1, 'ASICS METASPRINT 競速跑鞋', 6200, 4980, '輕量競速跑鞋，適合追求配速的路跑訓練。', '透氣網布鞋面搭配回彈中底，減輕跑動負擔，適合間歇訓練與路跑賽事穿著。', 'asics running 跑鞋 競速', 'METASPRINT 中性款跑鞋.jpg', 1, NOW()),
(3, 1, 'ASICS GT-2000 支撐型慢跑鞋', 4280, 3580, '穩定支撐型慢跑鞋，適合長時間訓練穿著。', '足弓支撐結構提升穩定性，緩震中底降低長距離跑步的關節負擔，日常訓練首選。', 'asics gt-2000 慢跑鞋', 'GT-2000.jpg', 1, NOW()),
(1, 2, 'NIKE LeBron Witness 籃球鞋', 3980, 3280, '簽名系列籃球鞋，兼顧支撐性與場上靈活度。', '中筒鞋身包覆搭配抓地力大底，適合強對抗打法與需要穩定支撐的球員。', 'nike lebron basketball 籃球鞋', 'NIKE LEBRON witness.jpg', 1, NOW()),
(1, 2, 'NIKE Kyrie Flytrap 籃球鞋', 3680, 2980, '低筒輕量籃球鞋，適合強調速度與變向的打法。', '貼合腳型的低筒設計提升靈活度，適合後衛球員急停變向與快速啟動。', 'nike kyrie basketball 籃球鞋', 'NIKE kyrie flytrap.jpg', 1, NOW()),
(2, 1, 'adidas Stan Smith 聯名限定款', 3280, 2680, '經典鞋型聯名限定配色，日常穿搭百搭選擇。', '皮革鞋面搭配撞色大底細節，兼具復古經典感與街頭穿搭風格。', 'adidas stan smith 休閒鞋', 'ZOZO CHAMPIONSHIP STAN SMITH.jpg', 1, NOW()),
(1, 4, 'NIKE NSW 運動短袖上衣', 1280, 980, '棉質透氣短袖上衣，適合日常運動與休閒穿著。', '寬鬆版型搭配親膚棉質布料，穿著舒適透氣，適合訓練後或日常休閒穿搭。', 'nike tee 服飾', 'NIKE NSW SS TEE UNI ATHLTC.jpg', 1, NOW()),
(1, 1, 'NIKE Pegasus 慢跑鞋', 4380, 3680, '經典訓練跑鞋系列，兼顧緩震與穩定表現。', '回彈中底提供日常訓練所需的緩震支撐，適合中長距離訓練與日常慢跑。', 'nike pegasus running 慢跑鞋', 'Nike Pegasus.jpg', 1, NOW());
