
## Pruab Ivan Sanchez para Full Stack Developer en Koltin

Practica de Servicios Online para Koltin


Puntos realizandos de practica
- 1. Chat entre usuario y anfitrión basado en un publicación. 100%
- 2. Multiples Chats. 100%
- 3. Paginacion y Orden. 100%
- 4. Archivos adjuntos. 70% (Solo se agregan fotografias)
- 5. Comandos y colas. 100%

El proyecto esta realizando con 

- Laravel y Jetstream-livewire


## Instalacion

Ejecutar comando

```
npm install
```

luego ejecutar el comando

```
composer update
```


## Configuraciones de env


Para la funcionalidad del Chat es necesario agregar Credenciales de Pusher en el ENV

Adjunto credenciales para esta prueba.

```
BROADCAST_DRIVER=pusher


PUSHER_APP_ID=1610691
PUSHER_APP_KEY=3518673340a93d545fd0
PUSHER_APP_SECRET=399add1246b4981c88e2
PUSHER_APP_CLUSTER=us2
```



Para el envio de correos primero agregar llaves de Mailtrap.io para pruebas

Adjunto Credenciales de prueba.

```
BROADCAST_DRIVER=pusher

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=376b6c9f65cc89
MAIL_PASSWORD=55705a15f18ebf
MAIL_ENCRYPTION=tls

```


Configuracion de Queue, es necesario cambiar configuracion en ENV

```
QUEUE_CONNECTION=database
SESSION_DRIVER=database

```

Configurar entorno de base de datos (segun entorno)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pruebakoltin
DB_USERNAME=root
DB_PASSWORD=123

```

## Migraciones

Migrar base de datos con el siguiente comando

```
php artisan migrate
```

## Comando y colas

Para Probar comando de colas ejecutar siguientes comandos

```
php artisan schedule:run

```

Luego ejecutar

```
php artisan queue:work

```


**Informacion de contacto:**

Ivan Ulises Sanchez Medina
922 120 4331
ivanusanchezm@gmail.com
