# php-nginx

1. Установить пхп и постгреc:

```bash
 sudo apt update -y
 sudo apt upgrade -y

 sudo apt install php-fpm php-cli php-pgsql postgresql
```

2. Настроить конфиг nginx (скопировать в /etc/nginx/conf.d/) и включить в мейн nginx.conf

3. Настройка бд

`sudo -u postgres psql`
задать пароль `ALTER USER postgres PASSWORD <пароль>` 

создать бд `CREATE DATABASE test;`

переключится `\c test;`

создать таблицу

```
CREATE TABLE feedback (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

добавить тестовые данные

```
INSERT INTO feedback (name, rating, comment) VALUES
('иван', 5, 'отзыв!');

```
