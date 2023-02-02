# cafeteria_konecta

cafeteria_konecta
ESPECIFICACIONES

Proyecto contruido en PHP puro, sql, mysql y jquery.

Corre sobre el servido Xampp usando la base de datos, se puede establecer el host en conexión para que esta apunte correctamente, así mismo se puede definir el usuario y la contraseña de la base de datos.

se corre con los siguientes link (Esto desde mi equipo):

http://localhost/cafeteria_konecta/views/productos/productos.php
http://localhost/cafeteria_konecta/views/categorias/categorias.php
http://localhost/cafeteria_konecta/views/ventas/ventas.php
Dentro del aplicativo exiten anchor elements para redireccionar a cada una de ellas.

Queries :

Obtener el producto con el mayor stock -> SELECT * FROM productos WHERE stock = (SELECT MAX(stock) FROM productos);
Obtener el producto más vendido -> SELECT producto_id, SUM(cantidad) AS total FROM ventas GROUP BY producto_id ORDER BY total DESC;
