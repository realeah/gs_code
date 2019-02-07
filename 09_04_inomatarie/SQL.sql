INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES(:name,:email,:naiyou,sysdate())

SELECT * FROM gs_an_table WHERE name='inomata'

SELECT * FROM gs_an_table WHERE id=2

SELECT * FROM gs_an_table WHERE name LIKE '%ma%'

SELECT * FROM gs_an_table ORDER BY indate DESC LIMIT 3




SELECT * FROM gs_an_table WHERE id = 1 OR id = 3 OR id = 5

SELECT * FROM gs_an_table WHERE id >= 4 AND id <= 8

SELECT * FROM gs_an_table WHERE email LIKE '%test1%'

SELECT * FROM gs_an_table ORDER BY indate DESC 

SELECT * from gs_an_table WHERE age = 20 AND indate LIKE '2019-01-19%'

SELECT * from gs_an_table ORDER BY indate DESC LIMIT 5

SELECT COUNT(*) AS total, age FROM gs_an_table GROUP BY age

