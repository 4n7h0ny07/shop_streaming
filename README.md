<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
<a href="https://fassid.com" target="_blank"><img src="{{ asset('images/logos/logo.png')}}" width="400" alt="Laravel Logo"></a></p>


## Acerca de Shop Streaming

Shop Streaming es un pequeño sistema para llevar el control de ventas de cuentas de streamin, con la facilidad para los clientes de poder registrarse y poder comprar una cuenta mediante recarga de saldo a una billetera digital.

------------------------------------------------------------------------------------------------

## Recarga de Credito mendiante codigo Qr simple de pago

Para Habiltar este proceso debes contactarte con funcionarios del banco BNB, y solicitar los accesos a su conjunto de API
 
 - #### Funciones habilitadas para este sistema
   
   - funcion de generacion de token de autorizacion
   - funcion de generacion de Qr simple de pago
   - funcion de consuta de estado del codigo Qr generado

## Instrucciones

- ### Crear una base de datos 
- - Ingresar a MySql con la siguiente linea de comando


```sh
mysql -u username -p
# luego te pedira ingresar el password del username ingresado
 
```
- - Ejecutas los comandos corresdpondientes apra crear la abse de datos y crear un usuario con todos los privileagios 
```sql
CREATE DATA BASE 'NAME_DATABASE' CHARACTER SET utf8;

 -- crear un usuario nuevo si asi lo requieres
CREATE USER NAME_USER@'localhost' IDENTIFIED BY 'PASSWORD_USER';

-- Si Se desea cambiar, vamos a asignar una clave para el acceso con este usuario de esta manera. 
SET PASSWORD FOR 'NEW_USER_NAME'@'localhost' = PASSWORD('UnAcl4v3m3REWF4334da5634sda3FDAS43434uyDiFiCiL');

-- Ahora debemos asignar los privilegios para el acceso a la base de datos que nos interesa que acceda este usuario nuevo. 
GRANT ALL ON NAME_DATABASE.* TO 'NEW_USER_NAME'@'localhost';

-- Una última acción, para asegurarnos que se entregan ya mismo esos privilegios, se reinicia la caché y todo lo que haga falta para que todo esté funcionando como se espera. 
FLUSH PRIVILEGES;


--Conestos aoomandos has creado satisfactoriamente una base de datos con su usuario para esa base de datos
```

- ### Instalacion de sistema
   - Para instalar este pequeño sistema ejecutar los sigientes comandos en la consola de tu servidor

```sh
git clone https://github.com/4n7h0ny07/repositorio.git
composer install
cp .env.example .env
php artisan migrate --seed
php artisan key:generate
php artisan storage:link

```
 no olvidar darle todos los permisos necesarios en la configuracion del servidor

## Tareas Realizadas y Faltantes

- [x] Creacion del Proyecto
- [x] Estructuracion simple de la abse de datos 
- [x] Creacion de las funciones para la generacion del TOKEN, generacion de codigos QR y Consulta estado del codigo Qr
- [x] Creacion del sitio web
- [x] Add de la vista de registrom para que los usuarios puedan registrase y pagar
- [x] Crear alertas para las suscripciones vensidad 
- [ ] Crear la vista para reportes
- [ ] crear la vista para consultar ultimas compras mediante codigo de transaccion
- [ ] Crear la vista para reclamos o sugerencias   
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
