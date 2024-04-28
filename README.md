# EstuNest

![logo](https://drive.google.com/uc?export=view&id=1Pn_SlNpky8t5hlLjsuq5vhbi82RIiL8f)

## Introducción

En la actualidad, muchos estudiantes se trasladan fuera de sus ciudades e incluso de sus países, lo que genera un creciente problema: la dificultad para encontrar viviendas decentes y asequibles. Como respuesta a esta problemática surge EstuNest, una plataforma digital diseñada para ayudar a los estudiantes a encontrar el alojamiento perfecto durante su etapa de estudios. EstuNest se ha creado específicamente para simplificar el proceso de alquiler de viviendas para estudiantes, ofreciendo seguridad y eficiencia en cada paso del camino.

## Objetivos

Los objetivos que pretendemos conseguir con nuestro proyecto son:

1. **Facilitar el proceso de búsqueda de alojamiento**: Proporcionar a los estudiantes una plataforma intuitiva y fácil de usar donde puedan encontrar rápidamente opciones de alojamiento que se ajusten a sus necesidades y preferencias.
   
2. **Ofrecer variedad de opciones**: Brindar a los usuarios una amplia gama de habitaciones y pisos compartidos disponibles para alquilar, permitiéndoles elegir la opción que mejor se adapte a sus gustos y presupuesto.
   
3. **Promover la comunidad estudiantil**: Conectar a estudiantes entre sí, fomentando la creación de redes sociales y comunitarias dentro de los pisos compartidos.
   
4. **Garantizar transacciones seguras**: Proporcionar un entorno seguro y protegido para que los usuarios realicen transacciones de alquiler, protegiendo su información personal y financiera.
   
5. **Optimizar la experiencia del usuario**: Ofrecer una experiencia de usuario fluida y agradable, desde la búsqueda de alojamiento hasta la reserva y el proceso de pago.
   
6. **Promover la independencia de los estudiantes**: Facilitar el acceso a opciones de alojamiento asequibles y flexibles, ayudando a los estudiantes a independizarse y asumir responsabilidades relacionadas con la vida adulta.

## Requisitos previos

Para la realización de este proyecto tenemos que cumplir con los siguientes requisitos:

- **Dos ordenadores**: Necesitamos dos máquinas, una para cada miembro del grupo de proyecto, para realizar el proyecto.
  
- **Laravel**: Laravel es el framework que usaremos para realizar nuestro proyecto.
  
- **PHP**: A consecuencia de usar Laravel, PHP será el lenguaje de programación a utilizar.
  
- **Servidor**: Necesitamos un servidor para alojar nuestra página web.
  
- **Bases de datos**: Necesitamos una base de datos donde se almacenarán los datos.
  
- **Conexión a Internet**: Sin Internet no se puede ejecutar la web.

## Enlaces adicionales

- **Diseños**: https://www.figma.com/file/dp6CoKRt7OVyyPrh1h4869/Figma-basics?type=design&node-id=1669-162202&mode=design&t=vdvgSgmUdwQEKZFv-0

- **Diagrama Entidad Relación**: https://drive.google.com/file/d/18rxh5Md66njD0u9odETmKrSMUqX81kCz/view?usp=sharing
  
- **Diagrama de casos de uso**: https://drive.google.com/file/d/1sXm-ncOghtJarxByy21bjZ-M93_QpyM0/view?usp=drive_link
  
- **Diagrama de clases**: https://drive.google.com/file/d/1TS-N-xvH7oXhTdjGFFzPSpqKHu0llXeK/view?usp=sharing

- **Video del proyecto**: https://youtu.be/njXlOYNXgBg

## Configuración

### Prerequisitos

Necesitas tener instalado tanto composer como npm:
* npm:
  ```sh
  npm install npm@latest -g
  ```
  
* xampp:

    <a href="https://www.apachefriends.org/es/index.html">Xampp Download Page</a>

* Composer:

Puedes instalarlo desde la terminal
```sh
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
  php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
  php composer-setup.php
  php -r "unlink('composer-setup.php');"
```

o desde la página web:

<a href="https://getcomposer.org/download/">Composer Download Page</a>

* Base de Datos:

Es necesario configurar nuestra Base de Datos. Para ello has uso de este archivo:

https://drive.google.com/file/d/1AH7ywHYCojToMvmjVwTFJ1dntXaaHQWY/view?usp=sharing

Además, debemos indicarla en nuestro archivo .env: 
```sh
DB_DATABASE=estuNest
DB_USERNAME=laravel
DB_PASSWORD=password
```

Si no tienes el archivo .env, puedes copiar la estructura del siguiente enlace:

https://github.com/platformsh-templates/laravel/blob/master/.env.example

Una vez copiado, ya puedes poner los valores anteriores.

### Instalación

1. Clonar el repositoro: `https://github.com/Ruuby666/EstuNest.git`
 
2. Instalar los paquetes de npm
   ```
     npm install
   ```
3. Ejecutamos los paquetes npm
    ```
        npm run dev
    ```
4. Actualizamos el composer
    ```
        composer update
    ```

5. Ejecutamos el servidor
   ```
       php artisan serve
   ```

Seguramente al abrir el navegador te dirá que no hay ninguna APP_KEY, sin embargo, Laravel, te proporciona un botón que te la genera automáticamente


### Test

Para ejecutar los test, ejecuta el siguiente comando en la terminal:
  ```
    php artisan test
  ```
