SELECT * FROM Products
WHERE product_quantity = (SELECT MAX(product_quantity) FROM Products);