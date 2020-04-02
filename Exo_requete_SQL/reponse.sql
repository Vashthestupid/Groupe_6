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

SELECT prod.product_name AS NOM
FROM products AS prod
WHERE prod.list_price <= 1500
AND prod.list_price >= 500

-- Question 4