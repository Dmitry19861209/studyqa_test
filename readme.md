## Test
### Задание для Studyqa от Держаева Дмитрия

Скачать/клонировать/распаковать архив.

Создать .env

```sh
cp .env.example .env
```

Установить библиотеки/пакеты:

```sh
composer install
```

Сгерерировать ключ(если на прошлом этапе не сгенерировался)

```sh
php artisan key:generate
```

Настроить подключение к БД в файле .env

```sh
DB_DATABASE=имя_базы
DB_USERNAME=логин
DB_PASSWORD=пароль
```

Запустить миграцию и сиды:

```sh
php artisan migrate --seed
```

(ВАЖНО)Создать символическую ссылку, чтобы были видны изображения из хранилища:

```sh
php artisan storage:link
```

Запустить тесты:
```sh
php vendor/phpunit/phpunit/phpunit
```

Запуск приложения:

```sh
php artisan serve
```

Локально приложение будет доступно по адресу(если не занят порт):

```sh
http://127.0.0.1:8000
```

## Структура

Структура задействованных в задании каталогов и файлов(вкратце)

Каталог | Файл | Комментарий
:--- | :---: | :---:
routes | web.php | Маршруты/роуты.
Http/Controllers | IndexController.php | Контроллер главной страницы
Http/Controllers | NewsController.php | Контроллер новостей
Http/Controllers | ImageController.php | Контроллер галереи
Models | HomePage.php | Модель для главной
Models | News.php | Модель для новостей
database/migrations | * | Миграции
database/seeds | * | Сидеры
database/seeds | * | Сидеры
public/css | * | стили
public/js | * | скрипты
public/storage | * | символическая ссылка для изображений
public/storage | * | символическая ссылка для изображений
resources/views | * | blade шаблоны
tests | Unit/* | unit-тесты

