# Devstagram

Este proyecto fue desarrollado como parte de la asignatura **"Tecnologías y aplicaciones en internet"**. El objetivo del proyecto fue aprender los fundamentos del framework Laravel. El objetivo del proyecto era aprender los fundamentos del framework Laravel. El proyecto se inició en clase, pero quedó incompleto, ya que, con los conocimientos adquiridos durante su desarrollo, se nos solicitó otro proyecto como entrega final de la asignatura (puedes verlo [aquí](https://github.com/urieltorres-dev/sistema-de-administracion-de-proyectos).). Tiempo después decidí terminar el proyecto por mi cuenta para continuar aprendiendo y mejorar mis habilidades en Laravel.

## Descripción del proyecto

**Devstagram** es una red social para desarrolladores, inspirada en redes sociales actuales como Instagram o X, donde los usuarios pueden compartir imágenes, comentar y dar "me gusta" a las publicaciones de otros desarrolladores. La aplicación está desarrollada en **Laravel** y permite la creación de perfiles, la publicación de imágenes, la interacción a través de comentarios y el seguimiento de otros usuarios.

## Características

- Registro y autenticación de usuarios.
- Publicación de imágenes con descripción.
- Sistema de comentarios en las publicaciones.
- "Me gusta" en las publicaciones.
- Seguimiento entre usuarios.
- Perfil de usuario con imagen personalizada.
- Interfaz amigable y responsive.

## Tecnologías utilizadas

+ **Lenguajes:** PHP, HTML, CSS y JavaScript
+ **Base de datos:** MySQL
+ **Frameworks:** Laravel, Tailwind CSS y Livewire.
+ **Librerías:** Dropzone
+ **Herramientas de desarrollo:** Docker, Visual Studio Code

## Instalación y configuración

Para ejecutar este proyecto en tu entorno local, sigue estos pasos:

1. Clona el repositorio:
```bash
git clone https://github.com/urieltorres-dev/devstagram.git
```

2. Instala las dependencias de Composer:
```bash
composer install
```

3. Instala las dependencias de Node.js:
```bash
npm install
```

4. Configura el archivo `.env` y genera la clave de la aplicación:
```bash
cp .env.example .env
php artisan key:generate
```

5. Ejecuta las migraciones y seeders:
```bash
php artisan migrate --seed
```

6. Inicia el servidor de desarrollo:
```bash
php artisan serve
```

7. Ejecuta los assets de frontend:
```bash
npm run dev
```

8. Accede a la aplicación a través de tu navegador en `http://localhost:8000`.

## Capturas de pantalla

A continuación se muestran algunas capturas de pantalla de la aplicación:

## Capturas de pantalla

<table>
  <tr>
    <td align="center">
      <img src="public/img/ss1.png" width="400" alt="Login">
      <br><b>Login</b>
    </td>
    <td align="center">
      <img src="public/img/ss2.png" width="400" alt="Register">
      <br><b>Register</b>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="public/img/ss3.png" width="400" alt="Perfil de usuario">
      <br><b>Perfil de usuario</b>
    </td>
    <td align="center">
      <img src="public/img/ss4.png" width="400" alt="Home / News Feed">
      <br><b>Home / News Feed</b>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="public/img/ss5.png" width="400" alt="Post">
      <br><b>Post</b>
    </td>
    <td align="center">
      <img src="public/img/ss6.png" width="400" alt="Crear post">
      <br><b>Crear post</b>
    </td>
  </tr>
</table>

## Demo

Por el momento la demo no está  disponible.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT - consulta el archivo [LICENSE](https://choosealicense.com/licenses/mit/) para más detalles.

## Contacto

Para más información o consultas, puedes contactarme a través de [urieltorres.dev@gmail.com](mailto:urieltorres.dev@gmail.com) o en [github.com/urieltorres-dev](https://github.com/urieltorres-dev).

