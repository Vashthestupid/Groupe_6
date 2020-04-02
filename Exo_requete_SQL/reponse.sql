-- Question 1

SELECT prod.product_name AS Nom,
       prod.model_year AS Année,
       prod.list_price AS Prix,
       cat.category_name AS Catégorie,
       brand.brand_name AS Marque
FROM products AS prod, category AS cat, brand
WHERE cat.category_id = prod.category_category_id
AND brand.brand_id = prod.brand_brand_id
AND cat.category_name = 'Electric Bikes'
AND brand.brand_name = 'Haro'	


-- Question 2

Create table tva
(
	id_tva INT PRIMARY KEY NOT NULL,
	valeur_tva INT NOT NULL,
),

SELECT prod.product_name AS Nom,
       prod.model_year AS Année,
       prod.list_price AS Prix HT,
       tva.valeur_tva,
       
    

-- Question 3

SELECT prod.product_name AS Nom
FROM products AS prod
WHERE prod.list_price <= 1500
AND prod.list_price >= 500

-- Question 4

SELECT prod.product_name AS Nom,
       prod.list_price AS Prix
FROM products AS prod
WHERE prod.product_name LIKE 'H%'

--Question 5 

SELECT prod.product_name AS NOM,
       prod.model_year AS Année,
       prod.list_price AS Prix,
FROM products AS prod
WHERE prod.product_name LIKE '%Ice%'

-- Question 6

DELETE FROM `products` AS prod
WHERE brand.brand_id = prod.brand_brand_id
AND brand.name = "Trek"

-- Question 7

DELETE FROM `products`AS prod
WHERE category.category_id = prod.category_category_id
AND category.category_name = "Mountain Bikes" 

-- Question 8

UPDATE `products`
SET list_price = 1499
WHERE id = 9

-- Question 9 

INSERT INTO `catégory` (category_id,category_name) VALUES (8, Roller skates)

-- Question 10

INSERT INTO `products` (product_id,product_name,brand_id,category_id,model_year,list_price) VALUES (15,roller skate cool, 2, 2020, 258)

