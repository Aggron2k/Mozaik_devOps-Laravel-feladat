# Mozaik---devOps-Laravel-feladat

# Futtatás XAMPP segítségével:
![image](https://github.com/Aggron2k/Mozaik_devOps-Laravel-feladat/assets/40773753/47b504e0-6093-492c-acc2-13d26057ce94)
- Apache + MySQL futtatása.
## Migráció + Seeder:
- Szükséges valami terminál majd futatni:
  ![image](https://github.com/Aggron2k/Mozaik_devOps-Laravel-feladat/assets/40773753/b9a92b35-2cda-44a3-bf84-069c3a09c96b)
  ![image](https://github.com/Aggron2k/Mozaik_devOps-Laravel-feladat/assets/40773753/b430ca78-7413-40ed-8f65-dd70e646f039)

## Futtatás:
 - Laravel projekt futtatása:
![image](https://github.com/Aggron2k/Mozaik_devOps-Laravel-feladat/assets/40773753/f8ed0382-8749-4670-a31e-7aece6559ee5)
 - Új terminálba Vite futtatása:
![image](https://github.com/Aggron2k/Mozaik_devOps-Laravel-feladat/assets/40773753/15327de5-7375-4cf2-a508-f94114a3b8f8)
 - Ezután el kell látogatni a [(http://localhost/)](http://127.0.0.1:8000/) -ra ami megjeleníti a kezdőoldalt.

## Weboldalon login:
 - admin@admin.com
 - pw: password

# Futtatás Docker segítségével (Sajnos még nem működő):
 ### Docker Desktop futtatása
 ### Src mappában parancs futtatás:
![image](https://github.com/Aggron2k/Mozaik_devOps-Laravel-feladat/assets/40773753/71dff6e0-dfc3-4d2d-89ab-86c4611fdb7e)
Amint lebuildel minden részt elérhetővé válik a [weboldal](http://localhost:8000/) (Vite miatt nem működik még :c) és a [phpmyadmin](http://localhost:9001/) is 
### phpmyadmin login:
![image](https://github.com/Aggron2k/Mozaik_devOps-Laravel-feladat/assets/40773753/63d22b4a-7101-4906-b9a5-fc8b26b2f5d9)
pwd: password



# Fejlesztés alatt előjött problémák:

### Vanguard config beállításai nem férnek meg a Dockerével, megoldás:

https://www.reddit.com/r/docker/comments/181s76n/docker_w_vanguard_riots_anticheat/

### Telekom:

![image](https://github.com/Aggron2k/Mozaik_devOps-Laravel-feladat/assets/40773753/5b2ff1e2-4476-4bc8-a22e-9f5d92077d55)

#Forrás:

- https://hub.docker.com/
- https://hub.docker.com/_/php
- https://hub.docker.com/_/httpd
- https://stackoverflow.com/questions/63418070/an-error-during-is-running-a-docker-compose-yml-for-phpredisadmin
- https://github.com/phpredis/phpredis/issues/2085
- https://github.com/erikdubbelboer/phpRedisAdmin/tree/master
- https://github.com/hatamiarash7/Memcached-Admin/blob/master/docker-compose.yml
- https://stackoverflow.com/questions/67102759/getting-msg-as-cmdlet-invoke-webrequest-at-command-pipeline-position-1-supply-v
- https://laravel.com/docs/11.x/installation#sail-on-windows
- https://vitejs.dev/guide/
- https://github.com/twbs/bootstrap/blob/v5.3.3/scss/_accordion.scss
- https://laravel.com/docs/11.x/sail
