### CRUD campers

cree la base de datos desde la terminal:

![](https://raw.githubusercontent.com/Novacord/filtroInsentivo/master/img/Screenshot%20from%202023-06-28%2017-25-25.png)

despues cree la base de datos desde un .sql pero me di de cuneta que en el taller qie idCamper era vchar y lo cambie a int y el nombre pais estaba en int y lo cambie a vchar 

![](https://raw.githubusercontent.com/Novacord/filtroInsentivo/master/img/Screenshot%20from%202023-06-28%2017-31-28.png)

y tambien los uni y queda asi :

![](https://raw.githubusercontent.com/Novacord/filtroInsentivo/master/img/Screenshot%20from%202023-06-28%2017-26-31.png)

despues inicie composer un compser init, despues cree la carpeta scripts donde colo una carpeta llamada db donde coloque mi .sql y cree un archivo connect.php donde estaba la coneccion a la base de datos y lo conecte con el compouser gracias al namespace que le colo al archivo connect .

despues cree una carpeta llamada uploads donde coloque el root de composer para poder crear la api para conectarlo con el javascript ya con eso listo copie el diseño que miguel nos dio para conectarlo al php mediante el javascript con una peticion fetch. en el crud hay un formulario donde puede guardar un dato y visualisarlo en la tabla y en la tabla aparece dos botones uno de eliminar y otro de editar el cual el de editar si le das click aparede una modal para editarlo y hay un boton que dice buscar para filtrar