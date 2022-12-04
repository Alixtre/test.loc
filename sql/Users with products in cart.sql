SELECT user_name, product_name, quantity FROM Cart
INNER JOIN Users
ON Cart.user_id = Users.user_id
INNER JOIN Products
ON Cart.product_id = Products.product_id;