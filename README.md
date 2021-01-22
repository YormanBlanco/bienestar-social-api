Instrucciones de Instalacion
    
    -WampServer:
        *Necesario php 7.4 o Superior
        *Necesario Instalar Composer
        *Necesario mysql con las extensiones activas en el php.ini
        *una base de datos llamada nayle
        *usuario mysql llamado root
        *clave del usuario root 'root'
        *Dichos parametros pueden ser cambiados en el .env en <Ruta del Proyecto>/ 
            1-git clone
            2-composer install
            3-usar tinker para registrar usuarios
    -Docker:
        1)Abrir una consola con permisos de admin
        2)cd <Ruta del Proyecto>/Laradock
        3)docker-compose up workspace php-fpm nginx mysql phpmyadmin
        4)docker-compose exec workspace bash  en <Ruta del Proyecto>/Laradock
        5)en la misma consola php artisan tinker
        6)$user = new User; 
          $user->name = 'example';
          $user->email = 'example@example.com';
          $user->password = bcrypt('12345678');
          $user->save(); 

Falta por hacer

    1)Configurar los controladores para retornar las vistas con los datos requeridos