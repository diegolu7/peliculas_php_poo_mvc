/*SQL Query CRUD*/

INSERT INTO movieseries SET imdb_id = 'tt0461770', title ='Enchanted', genres='Animation, Adventure, Comedy', premiere='2007', status='2'; 

/* UPDATE movieseries SET author='Bill Kelly', actors='Amy Adams, Susan Sarandon, James Marsden', country='USA', poster='https: //m.media-amazon.com/images/M/MV5BMjE4NDQ2Mjc0OF5BMl5BanBnXkFtZTcwNzQ2NDE1MQ@@._V1_SX300.jpg', trailer='https: //www.youtube.com/watch?v=ClN4b3pv1uU',rating='7.1' ,  category='Movie',  plot='The beautiful Princess Giselle (Amy Adams) is banished by evil Queen Narissa (Susan Sarandon) from her magical, musical animated land and finds herself in the gritty reality of the streets of modern-day Manhattan. Shocked by this strange new environment that doesn\'t operate on a \"happily ever after\" basis, Giselle is now adrift in a chaotic world badly in need of enchantment. But when Giselle begins to fall in love with a charmingly flawed divorce lawyer who has come to her aid - even though she is already promised to a perfect fairy tale Prince back home - she has to wonder: Can a storybook view of romance survive in the real world?' WHERE imdb_id='tt0461770';
*/
DELETE movieseries FROM WHERE imdb_id = 'tt0461770';

SELECT * FROM movieseries;

SELECT COUNT(*) FROM movieseries;

SELECT * FROM movieseries WHERE category = 'Serie';

SELECT title,category,country,genres,premiere,status FROM movieseries WHERE category = 'Serie';

SELECT title,category,country,genres,premiere,status FROM movieseries WHERE category = 'Serie' AND country='USA';

SELECT title,category,country,genres,premiere,status FROM movieseries WHERE category = 'Movie' AND country LIKE'%USA%' ORDER BY premiere;


/*CONSULTAS MULTIPLES*/
/*uniendo tablas inner join*/
SELECT * FROM movieseries AS ms INNER JOIN status AS s;
/*uniendo tablas movieseries y status mediante  status y status_id*/
SELECT * FROM movieseries AS ms INNER JOIN status AS s ON ms.status = s.status_id;
/*puedo hacer la union seleccionando campos */
SELECT ms.title, ms.category, ms.country, ms.genres, ms.premiere, s.status FROM movieseries AS ms INNER JOIN status AS s ON ms.status = s.status_id
ORDER BY ms.premiere DESC;

/*puedo hacer la union seleccionando campos y con condicion por ejemplo cuando el status sea cancelado o finalizado, ordenandolo por premiere de movieserie */
SELECT ms.title, ms.category, ms.country, ms.genres, ms.premiere, s.status FROM movieseries AS ms INNER JOIN status AS s ON ms.status = s.status_id
WHERE s.status='Canceled' OR s.status='Finished' ORDER BY ms.premiere ;


/*lo mismo solo que agrego la condicion Y QUE SEAN SERIES*/
SELECT ms.title, ms.category, ms.country, ms.genres, ms.premiere, s.status FROM movieseries AS ms INNER JOIN status AS s ON ms.status = s.status_id
WHERE (s.status='Canceled' OR s.status='Finished' OR s.status='In Issue') AND ms.category='Serie' ORDER BY ms.premiere ;

/*Consulta FULLTEXT key*/
SELECT * FROM movieseries
    WHERE MATCH(title, author, actors, genres)
    AGAINST('stallone' IN BOOLEAN MODE);

/*tmb puedo agregar inner join*/
SELECT ms.title, ms.category, ms.country, ms.genres, ms.premiere, s.status
  FROM movieseries AS ms
  INNER JOIN status AS s
  ON ms.status = s.status_id
  WHERE MATCH(ms.title, ms.author, ms.actors, ms.genres)
  AGAINST('drama' IN BOOLEAN MODE)
  ORDER BY ms.premiere;

/*****INTEGRIDAD REFERENCIAL******/

SELECT COUNT(*) FROM movieseries WHERE status = 1;
SELECT COUNT(*) FROM movieseries WHERE status = 2;
SELECT COUNT(*) FROM movieseries WHERE status = 3;
SELECT COUNT(*) FROM movieseries WHERE status = 4;
SELECT COUNT(*) FROM movieseries WHERE status = 5;

INSERT INTO status SET status = 'otro status', status_id = 0; /* es autoincremental por ello no importa que id le pase siempre pondra el correcto*/

/*MYSQL PERMITE ELIMINAR LOS REGISTROS DE LA TABLA movieseries del status 1 'coming soon'*/
DELETE FROM movieseries WHERE status=1;

/*permite eliminar el registro con el status_id 1 porque ya no hay registros asociados en la tabla dependiente (movieseries)*/
DELETE FROM status WHERE status_id = 1;


DELETE FROM status WHERE status_id = 2;/*NO PERMITE ELIMINAR REGISTROS DE TABLA status (id=2) HASTA QUE EN LA TABLA movieseries NO EXISTAN PELICULAS ASOCIADAS A EL*/

DELETE FROM status WHERE status_id = 6; /*SI PODRIA ELIMINAR PORQUE NO HAY VALORES DEPENDIENTES DE EL EN LA OTRA TABLA movieseries*/