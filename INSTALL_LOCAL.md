# PLATO-INTEL - Инструкция по локальному запуску

**Дата:** 20 марта 2026

---

## 📋 ТРЕБОВАНИЯ

### Обязательные
- **PHP:** 8.1 - 8.3 (PHP 8.5 НЕ совместим!)
- **Composer:** 2.x
- **Node.js:** 18+ 
- **pnpm:** 8+

### Опционально
- **SQLite** или **MySQL** 5.7+
- **Git**

---

## 🚀 УСТАНОВКА

### Шаг 1: Проверка PHP

```bash
php -v
# Должно быть: PHP 8.1.x - 8.3.x
```

**Если PHP 8.5:**
- Скачайте PHP 8.3: https://windows.php.net/download/
- Распакуйте в `F:\programs\PHP-8.3`
- Обновите PATH

### Шаг 2: Установка зависимостей

```bash
cd f:\Work\plato-intel2

# PHP зависимости
composer install --no-dev

# NPM зависимости
pnpm install

# Сборка assets
pnpm run build
```

### Шаг 3: Настройка окружения

```bash
# Копирование .env
copy .env.example .env

# Генерация ключа
php artisan key:generate

# Создание SQLite базы (если нет MySQL)
type nul > database\database.sqlite
```

### Шаг 4: Миграции

```bash
# Базовые миграции
php artisan migrate

# Сидеры (опционально)
php artisan db:seed
```

### Шаг 5: Запуск сервера

```bash
# Laravel сервер
php artisan serve

# Сайт доступен по: http://localhost:8000
```

### Шаг 6: Vite (для разработки)

```bash
# В отдельном терминале
pnpm run dev
```

---

## 🔧 НАСТРОЙКА .ENV

```env
APP_NAME="PLATO-INTEL"
APP_ENV=local
APP_KEY=base64:... (сгенерируется автоматически)
APP_DEBUG=true
APP_URL=http://localhost:8000

# База данных (SQLite для локальной разработки)
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

# Или MySQL
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=plato_intel
# DB_USERNAME=root
# DB_PASSWORD=

# Кэширование
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

---

## 📁 СТРУКТУРА ПРОЕКТА

```
plato-intel2/
├── app/                    # Laravel приложения
├── bootstrap/              # Автозагрузка
├── config/                 # Конфигурация
├── database/
│   ├── migrations/         # Миграции БД
│   ├── seeders/            # Сидеры
│   └── database.sqlite     # SQLite база
├── public/
│   ├── css/
│   │   └── neomorph-complete.css  # Новый дизайн
│   ├── i/                  # Изображения
│   └── storage/            # Файлы
├── resources/
│   ├── js/                 # JavaScript
│   ├── sass/               # SCSS
│   └── views/
│       ├── layouts/
│       │   └── app-neomorph.blade.php  # Новый layout
│       ├── common/
│       │   ├── header-neomorph.blade.php
│       │   └── footer-neomorph.blade.php
│       ├── home/
│       │   └── home-neomorph.blade.php
│       └── parts/
│           └── telegram-button.blade.php
├── routes/
│   └── web.php             # Маршруты
├── storage/
│   ├── app/                # Файлы
│   ├── framework/          # Кэш
│   └── logs/               # Логи
└── vendor/                 # Composer зависимости
```

---

## ✅ ПРОВЕРКА УСТАНОВКИ

### 1. Проверка Laravel

```bash
php artisan --version
# Laravel Framework 9.x.x
```

### 2. Проверка маршрутов

```bash
php artisan route:list
```

### 3. Проверка views

Откройте `http://localhost:8000`

Должна загрузиться главная страница с новым дизайном.

---

## 🐛 ВОЗМОЖНЫЕ ПРОБЛЕМЫ

### Ошибка: "PHP 8.5 не совместим"

**Решение:**
```bash
# Установите PHP 8.3
# Обновите PATH в системе
# Перезапустите терминал
```

### Ошибка: "vendor/autoload.php not found"

**Решение:**
```bash
composer install --no-dev
```

### Ошибка: "APP_KEY not set"

**Решение:**
```bash
php artisan key:generate
```

### Ошибка: "Database not found"

**Решение:**
```bash
# Создайте SQLite базу
type nul > database\database.sqlite

# Или выполните миграции
php artisan migrate
```

### Ошибка: "Class not found"

**Решение:**
```bash
composer dump-autoload
composer install --no-dev
```

---

## 🎯 НОВЫЕ ФУНКЦИИ

### 1. Неоморфизм дизайн
- Тёмная тема
- Оранжевые акценты
- Плавные переходы

### 2. Поиск по каталогу
```
http://localhost:8000/catalog?search=автомат
```

### 3. Telegram-бот
- Кнопка справа снизу
- Быстрая связь с менеджером

### 4. Улучшенный header
- Выпадающие контакты
- Навигация
- Логотип

---

## 📞 ПОДДЕРЖКА

**Email:** timursama96@gmail.com
**Telegram:** @timursama96

---

**Инструкция создана:** 20 марта 2026
**Версия:** 1.0
