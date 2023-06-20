use book_shop;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (id)
);

INSERT INTO `users` (`name`, `email`, `password`, `role`) VALUES
('admin', 'admin@gmail.com', '8b72529ec356bfa60828b4da6c2cc610', 'admin');

CREATE TABLE `categories` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `describes` varchar(255),
    PRIMARY KEY (id)
);

INSERT INTO `categories`(name, describes) VALUES 
('Văn học', "Mô tả văn học"),
('Sách', "Mô tả sách"),
('Truyện trinh thám', "Mô tả truyện chinh thám"),
('Sách kinh tế ', "Mô tả kinh tế"),


CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `producer` varchar(100) NOT NULL,
  `old_price` double NOT NULL,
  `discount` int(100) NOT NULL,
  `new_price` double NOT NULL,
  `quantity` int NOT NULL,
  `describes` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  constraint fk_product_category foreign key(category_id)
		references categories(id),
  PRIMARY KEY (id)
);
INSERT INTO `products`(name, author, producer, old_price, discount, new_price, quantity, describes, img_path, category_id) VALUES 
('Harry Potter và Hòn đá Phù thủy', 'J. K. Rowling', 'Bloomsbury Publishing', 200000, 10, 180000, 100, 'Phần truyện khởi đầu của Harry Potter','5d3b271fd6e04b8a56eae199bc272d96.jpg', 3),
('Harry Potter và Hoàng tử lai', 'J. K. Rowling', 'Bloomsbury Publishing', 200000, 10, 180000, 100,'Phần truyện tiếp theo của Harry Potter','417adae4299fde008d775491d488e070.jpg', 1),
('Harry Potter và Phòng chứa bí mật','J. K. Rowling', 'Bloomsbury Publishing', 220000, 10, 200000, 100,'Phần truyện tiếp theo của Harry Potter','df1510654d607ee8756dc1483c56b3cb.jpg', 2),
('Harry Potter và Tù nhân Azkaban','J. K. Rowling', 'Bloomsbury Publishing', 180000, 10, 160000, 100,'Phần truyện tiếp theo của Harry Potter','488c6d7f7096c5661bf63848ace6535c.jpg', 2),
('Harry Potter và Chiếc cốc lửa','J. K. Rowling', 'Bloomsbury Publishing', 200000, 10, 160000, 100,'Phần truyện tiếp theo của Harry Potter','e8f3f59815e82a7b1cab64e5f8645414.jpg', 3),
('Harry Potter và Mệnh lệnh Phượng hoàng','J. K. Rowling', 'Bloomsbury Publishing', 190000, 10, 170000, 100,'Phần truyện tiếp theo của Harry Potter','a09588c2dffd5dcc1471455570c62dc9.jpg', 1);



CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_date` datetime(6) DEFAULT NULL,
  `total_price` double NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_id` int DEFAULT NULL,
  constraint fk_order_user foreign key(user_id)
		references users(id),
  PRIMARY KEY (id)
);

CREATE TABLE `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `user_id` int DEFAULT NULL,
  constraint fk_message_user foreign key(user_id)
		references users(id),
  PRIMARY KEY (id)
);

CREATE TABLE `carts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` double NOT NULL,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  constraint fk_cart_user foreign key(user_id)
		references users(id),
	constraint fk_cart_product foreign key(product_id)
		references products(id),
  PRIMARY KEY (id)
);

CREATE TABLE `orders_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `amount` int NOT NULL,
  `note` varchar(255) NOT NULL,
  `total_price` int(100) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  constraint fk_orderDetail_order foreign key(order_id)
		references orders(id),
  constraint fk_orderDetail_product foreign key(product_id)
		references products(id),
  PRIMARY KEY (id)
);

