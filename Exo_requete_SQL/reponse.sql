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

<<<<<<< HEAD
-- Rémi

SELECT prod.name AS Nom, 
       prod.model_year AS Année, 
    prod.price AS PrixHT, 
       prod.price / (100 * 20) AS Montant20prcent, 
       ROUND(prod.price + (prod.price / (100 * 20)), 2) AS prixTTC,   
       cat.nameCat AS typeVélo,  
       brands.brand_name AS Marque
FROM products AS prod, categories AS cat, brands
WHERE cat.idCat = 5
AND brands.brand_id = 2

-- Edwina


SELECT  products.name, 
        products.model_year, 
        categories.nameCat, 
        brands.brand_name, 
        products.price AS PrixHT, 
        CAST(products.price*0.2 as DECIMAL(9,2)) AS TVA, 
        CAST(products.price*1.2 as DECIMAL(9,2)) AS PrixTTC
FROM products
INNER JOIN categories ON products.category_id = categories.idCat
INNER JOIN brands ON products.brand_id = brands.brand_id
=======
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
>>>>>>> 6ff768e4315775bc6301ff56534c029bb6937835
    

-- Question 3

SELECT prod.name AS Nom,
	prod.price AS Prix
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
	prod.created AS Année,
        prod.price as Prix
FROM products AS prod
WHERE prod.name LIKE '%Lce%'

-- Question 6

DELETE FROM products
WHERE products.brand_id = 9


-- Question 7

DELETE FROM products
where products.category_id = 6 

-- Question 8

UPDATE products
SET price = 1499
WHERE products.id = 9

-- Question 9 

INSERT INTO categories VALUES (8,'Roller skates')

-- Question 10

INSERT INTO `products`(name,brand_id,category_id,model_year,price) VALUES ('roller skate cool', 2, 8, 2020, 258)

