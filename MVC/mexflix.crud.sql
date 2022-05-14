/*MODELO: 
  representa la logica de negocio (manipulacion de datos)

  CONTROLADOR: require y response 
  controla el flujo es internediario, representa el codigo de navegacion de la aplicacion
  
  VISTA: front
  representa la presentacion de los datos (Diseño de la paginado)*/

/*LISTA DE OPERACIONES queris CRUD de mexflix */

/*movieseries */
  /*- crear movieseries*/
  INSERT INTO movieseries SET imdb_id = 'tt3749900', title = 'Gotam', plot = '', author ='', actors='',country = '', premiere=8.0, genres='Crime, Drama, Thriller', category='Serie', status = 3;
  /*- actualizar movieseries*/
  UPDATE movieseries SET title = 'Gotham', plot ='lorem ipsum dolor lorem lorem lorem lorem lorem lorem.', genres = 'Crime, Drama, Thriller' , author='Bruno Heller', actors='Zabryna Guevara, Ben McKenzie, Donal Logue, David Mazouz', country='USA', premiere='2014', trailer='https://www.youtube.com/watch?v=VwOPA2upeCA', poster ='https://static.wikia.nocookie.net/batman/images/7/77/Second-Season.jpg/revision/latest?cb=20160923023238&path-prefix=es', rating = 8.0 ,
  category = 'Serie' , status =3 WHERE imdb_id= 'tt3749900';
  
  /*- eliminar movieseries */
  DELETE FROM movieseries WHERE imdb_id = 'tt3749900';

  /*- buscar todas las movieseries*/
  SELECT ms.imdb_id, ms.title, ms.plot, ms.author, ms.actors ,ms.country, ms.premiere, ms.poster,ms.trailer, ms.rating, ms.genres, ms.category, s.status
  FROM movieseries AS ms INNER JOIN status AS s ON ms.status = s.status_id;

  /*- buscar UNA movieseries por titulos, peronas (actores , autores) genero.*/
  SELECT ms.imdb_id, ms.title, ms.plot, ms.author, ms.actors ,ms.country, ms.premiere, ms.poster,ms.trailer, ms.rating, ms.genres, ms.category, s.status
  FROM movieseries AS ms INNER JOIN status AS s ON ms.status = s.status_id 
  WHERE MATCH(ms.title, ms.author, ms.actors, ms.genres)
  AGAINST('drama' IN BOOLEAN MODE);

  /*- buscar una movieseries por categoria*/
  SELECT ms.imdb_id, ms.title, ms.plot, ms.author, ms.actors ,ms.country, ms.premiere, ms.poster,ms.trailer, ms.rating, ms.genres, ms.category, s.status
  FROM movieseries AS ms INNER JOIN status AS s ON ms.status = s.status_id
  WHERE ms.category ='Movie';

  /*- buscar una movieseries por status*/
  SELECT ms.imdb_id, ms.title, ms.plot, ms.author, ms.actors ,ms.country, ms.premiere, ms.poster,ms.trailer, ms.rating, ms.genres, ms.category, s.status
  FROM movieseries AS ms INNER JOIN status AS s ON ms.status = s.status_id
  WHERE ms.status ='1';

/*status*/
  /*crear status*/
  INSERT INTO status SET status_id = 0 , status = 'Otro status';
  /*actualizar status*/
  UPDATE status SET status = 'Otro status' WHERE status_id ='6'
  /*eliminar status*/
  DELETE FROM status WHERE status_id = 6;
  /*buscar todos Status*/
  SELECT * FROM status;
  /*buscar un status por STATUS_ID*/
  SELECT * FROM status WHERE status_id=3;
/*Users*/

  /*-crear Users*/
  INSERT INTO set user = '@usuario', email='usuario@midominio.com', name='Soy un usuario',birthday='1988-10-09', pass= MD5('un_password'), role = 'Admin';
  /*-actualizar */
          /*datos generales*/
          UPDATE users SET name ='Soy un usuario', birthday ='1994-10-09', role='User' WHERE user= '@usuario' AND email = 'usuario@midominio.com';
          /*pasword*/
          UPDATE users SET pass =MD5('un_nuevo_password') WHERE user = '@usuario' AND email='usuario@midominio.com';

  /*-eliminar user*/
  DELETE FROM users WHERE user = '@usuario' AND email='usuario@midominio.com';
  /*-buscar todos los users*/
  SELECT * FROM users;
  /*-buscar un user por:*/
              /*email*/
                SELECT * FROM users WHERE user = '@usuario';
              /*rool*/
                SELECT * FROM users WHERE role = 'un_admi_o_un_usuario';
              /*user*/
                SELECT * FROM users WHERE email = 'usuario@midominio.com';



37:44 MIN