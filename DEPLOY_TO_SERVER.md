# 📦 PLATO-INTEL - Инструкция по загрузке на сервер заказчика

**Дата:** 20 марта 2026
**Сервер:** 93.125.99.147
**Пользователь:** platoint
**Путь:** /home/platoint/www/plato-intel.by

---

## 🚀 СПОСОБ 1: WinSCP (Рекомендуется)

### Шаг 1: Подключение
1. Скачайте WinSCP: https://winscp.net
2. Подключитесь к серверу:
   - **Хост:** 93.125.99.147
   - **Пользователь:** platoint
   - **Пароль:** haea3bPHnXJrRJL
   - **Протокол:** SFTP

### Шаг 2: Загрузка файлов
**Загрузите следующие файлы и папки:**

```
✅ ОТРАВЛЯТЬ:
├── app/
├── bootstrap/
├── config/
├── database/
├── lang/
├── public/
│   ├── css/ (все CSS файлы включая crane-ui.css)
│   ├── i/
│   ├── products/
│   └── storage/
├── resources/
│   └── views/ (все view файлы включая test-neo.blade.php)
├── routes/
│   └── web.php
├── storage/
├── .env (создать на сервере)
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
├── package.json
└── pnpm-lock.yaml

❌ НЕ ОТПРАВЛЯТЬ:
├── node_modules/
├── vendor/
├── .git/
├── .docker/
├── Dockerfile
├── render.yaml
├── deploy*.bat
├── deploy*.sh
├── deploy*.ps1
├── *.log
├── .idea/
├── .vscode/
├── tests/
└── composer.phar
```

### Шаг 3: Установка на сервере

```bash
# Подключиться к серверу
ssh platoint@93.125.99.147

# Перейти в директорию
cd /home/platoint/www/plato-intel.by

# Установить PHP зависимости
composer install --optimize-autoloader --no-dev

# Установить NPM зависимости
pnpm install --production

# Собрать assets
pnpm run build

# Создать .env
cp .env.example .env
# Или создать вручную с правильными настройками

# Сгенерировать ключ
php artisan key:generate

# Миграции
php artisan migrate --force

# Оптимизация
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Права доступа
chmod -R 777 storage bootstrap/cache
```

---

## 🚀 СПОСОБ 2: Git на сервере

### Если на сервере есть git репозиторий:

```bash
# На сервере
ssh platoint@93.125.99.147
cd /home/platoint/www/plato-intel.by

# Добавить remote GitHub как backup
git remote add github https://github.com/foxampy/plato-intel2.git

# Загрузить изменения
git pull github main

# Установить зависимости
composer install --optimize-autoloader --no-dev
pnpm install --production
pnpm run build

# Оптимизация
php artisan optimize
```

---

## 🚀 СПОСОБ 3: Через архив

### Шаг 1: Создать архив локально

```bash
# В проекте
git archive --format=zip --output=plato-intel-deploy.zip main
```

### Шаг 2: Загрузить архив на сервер

```bash
# Загрузить через WinSCP
# Распаковать на сервере
unzip plato-intel-deploy.zip -d /home/platoint/www/plato-intel.by/
```

### Шаг 3: Установить зависимости

```bash
cd /home/platoint/www/plato-intel.by
composer install --optimize-autoloader --no-dev
pnpm install --production
pnpm run build
php artisan optimize
```

---

## ✅ ПРОВЕРКА ПОСЛЕ ДЕПЛОЯ

### 1. Проверить основную страницу
```
https://plato-intel.by/
```
- Должна работать как прежде
- Старый дизайн (не ломается)

### 2. Проверить тестовую страницу
```
https://plato-intel.by/test-neo
```
- Новый дизайн (Crane UI + Neomorphism)
- Интерактивный кран-скроллбар
- Поиск в хедере

### 3. Проверить логи
```bash
# На сервере
tail -f storage/logs/laravel.log
```

### 4. Проверить каталог
```
https://plato-intel.by/catalog
```
- Поиск работает
- Фильтры работают

### 5. Проверить товар
```
https://plato-intel.by/catalog/{product-slug}
```
- Кнопка "Заказать сейчас" работает
- Добавляет в корзину + редирект на оформление

---

## 🐛 ВОЗМОЖНЫЕ ПРОБЛЕМЫ

### Ошибка: "Permission denied"
**Решение:**
```bash
chmod -R 777 storage bootstrap/cache
```

### Ошибка: "Class not found"
**Решение:**
```bash
composer dump-autoload --optimize
composer install --optimize-autoloader
```

### Ошибка: "APP_KEY not set"
**Решение:**
```bash
php artisan key:generate
```

### Ошибка: "Database not found"
**Решение:**
```bash
# Проверить .env
nano .env

# Создать SQLite базу
touch database/database.sqlite

# Или настроить MySQL
```

### Ошибка: "View not found"
**Решение:**
```bash
php artisan view:clear
php artisan config:clear
```

---

## 📞 КОНТАКТЫ

**Сервер:**
- Хост: 93.125.99.147
- Пользователь: platoint
- Путь: /home/platoint/www/plato-intel.by

**Git:**
- GitHub: https://github.com/foxampy/plato-intel2
- Server: ssh://platoint@93.125.99.147:22/home/platoint/www/plato-intel.by/.git

**Ответственный:** timursama96@gmail.com

---

**Инструкция создана:** 20 марта 2026
**Версия:** 1.0
**Статус:** Готово к деплою!
