
CREATE TABLE `category` (
  `cat_id` int(11) AUTO_INCREMENT PRIMARY key,
  `cat_name` varchar(255) NOT NULL
);


CREATE TABLE `customer_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  `total_price` float NOT NULL DEFAULT 0
);



CREATE TABLE `ordered_product` (
  `oproduct_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  FOREIGN KEY (product_id) REFERENCES product(product_id),
  FOREIGN KEY (order_id) REFERENCES customer_order(order_id)
);



CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  `product_image` varchar(500) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_price` float NOT NULL,
  `cat_id` int(11) NOT NULL,
  FOREIGN KEY (cat_id) REFERENCES category(cat_id)
);

CREATE TABLE `client_calls` (
  `call_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  `coordination` varchar(255) NOT NULL,
  `message` text DEFAULT NULL
);