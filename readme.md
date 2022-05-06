## Настройки Dev
1. Клонируем
2. Устанавливаем в файле hosts если не установлено
```bash
127.0.0.1    localhost
```
3. Запускаем по очереди следующие комманды из папки с проектом
```bash
make build
make start
make composer-install
make migrate
make messenger-setup-transports
```
4. В случае если с коммандой ```make migrate``` будут ошибки то заходим в контейнер
```bash
make ssh
php bin/console doctrine:migrations:migrate --all-or-nothing=0
```
5. Переходим в браузере на страницу [http://localhost](http://localhost).
6. Чтобы протестировать метод ping можно из шторма(стандартными ) или из контейнера командой
```bash
./vendor/bin/phpunit ./tests/Functional/PingPongTest.php
```

Репозиторий был взят [тут](https://github.com/systemsdk/docker-nginx-php-symfony).
