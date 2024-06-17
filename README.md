- ### Клонируем проект

```bash
https://github.com/KonstantinKliman/test-task-clients.git
```

- ### Запуск бэкенд приложения(API)

1. Устанавливаем зависимости через composer

```bash
cd backend
composer install
```

2. Билдим и поднимаем контейнеры через [sail](https://laravel.com/docs/11.x/sail)

```bash
./vendor/bin/sail up --build -d
```

3. Применяем миграции и тестовые данные

```bash
./vendor/bin/sail artisan migrate --seed
```

- ### Запуск фронтэнд приложения

1. Устанавливаем зависимости через npm
```bash
cd  frontend
npm install
```

2. Запускаем фронтенд-приложение в dev среде

```bash
npm run dev
```

Логин и пароль от "тестового" пользователя:
Логин: login
Пароль: password

-----

##### p.s

Не смог нормально обернуть фронтенд и бэкенд приложение, чтобы они поднимались с одного docker-compose