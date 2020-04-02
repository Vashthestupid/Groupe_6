-- Question 1

SELECT prod.name AS Nom,
       prod.model_year AS Année,
       prod.price AS Prix,
       cat.nameCat AS Catégorie,
       brands.brand_name AS Marque
FROM products AS prod, categories AS cat, brands
WHERE cat.idCat = prod.category_id
AND brands.brand_id = prod.brand_id
AND cat.nameCat = 'Electric Bikes'
AND brands.brand_name = 'Haro'

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
       
       
-- Je préfère voir la correction pour celui-ci 
    

-- Question 3

SELECT prod.name AS Nom
FROM products AS prod
WHERE prod.price <= 1500
AND prod.price >= 500

-- Question 4

SELECT prod.name AS Nom,
	prod.price as Prix
FROM products AS prod
WHERE prod.name LIKE 'H%'

--Question 5 

SELECT prod.name AS Nom,
	prod.model_year AS Année,
        prod.price as Prix
FROM products AS prod
WHERE prod.name LIKE '%Ice%'

-- Question 6

DELETE FROM products
WHERE products.brand_id = 9


-- Question 7

DELETE FROM products
where products.category_id = 6 

-- Question 8

UPDATE products
SET price = 1499
WHERE id = 9

-- Question 9 

INSERT INTO categories VALUES (8,'Roller skates')

-- Question 10

INSERT INTO `products`(id,name,brand_id,category_id,model_year,price) VALUES (15, 'roller skate cool', 2, 8, 2020, 258)

