# fabrica_info

## Fazer o clone do Laradock (biblioteca utilizada pela comunidade Laravel para uso e manutenção de containeres)

1 - Clone Laradock inside your PHP project:

```
git clone https://github.com/Laradock/laradock.git

```
2 - Enter the laradock folder and rename .env.example to .env.

```
cp .env.example .env
```

3 - Run your containers:

```
docker-compose up -d nginx mysql phpmyadmin redis workspace 
```

4 - Open your project’s .env file and set the following, set ports of the phpmyadmin, mysql, workspace ssh:

exemple:
```
DB_HOST=mysql
REDIS_HOST=redis
QUEUE_HOST=beanstalkd
```

In the front-end type npm install to download node modules
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```
