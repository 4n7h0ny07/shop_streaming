## actualizar repositorio e github

 - git add .

 - git commit -m "Primer commit del proyecto"

 - git push origin master

## actualizar projecto en servidor

 - php artisan down //ingresar modo mantenimiento

 - git pull origin master  //actualizar projecto en servidor

 - git checkout -- (ruta del archivo) //para descartar cambios si se han hecho en el servidor

 - php artisan up //salir del modo mantenimiento
