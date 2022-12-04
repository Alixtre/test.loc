UPDATE Products
JOIN (SELECT MIN(product_quantity) AS minquantity
FROM Products
) tempmin
ON Products.product_quantity = tempmin.minquantity
SET product_quantity = product_quantity * 2;