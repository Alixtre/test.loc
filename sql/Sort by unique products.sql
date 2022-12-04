SELECT Category.category_id, Category.category_name, Count(Products.category_id) AS "Уникальных товаров" FROM Products
INNER JOIN Category
ON Products.category_id = Category.category_id
GROUP BY Products.category_id
ORDER BY Count(Products.category_id) DESC;