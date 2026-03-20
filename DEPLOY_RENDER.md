# PLATO-INTEL - Инструкция по деплою на Render.com

**Дата:** 20 марта 2026
**Статус:** Готово к тестированию

---

## 📋 ЧТО ГОТОВО

### ✅ Страницы в новом стиле (Neomorphism)
- [x] Главная (`home-neomorph.blade.php`)
- [x] Каталог (`catalog/index-neomorph.blade.php`)
- [x] Товар (`product/show-neomorph.blade.php`)
- [x] Контакты (`contacts-neomorph.blade.php`)
- [x] О компании (`about-neomorph.blade.php`)
- [x] 404 ошибка (`errors/404-neomorph.blade.php`)

### ✅ Компоненты
- [x] Header с поиском и контактами
- [x] Footer
- [x] Telegram-бот
- [x] Фильтры и сортировка
- [x] Форма обратной связи

### ✅ SEO
- [x] Schema.org микроразметка
- [x] Meta теги
- [x] Open Graph
- [x] Sitemap.xml (требуется генерация)
- [x] Robots.txt (требуется настройка)

---

## 🚀 ДЕПЛОЙ НА RENDER.COM

### Шаг 1: Подготовка GitHub

1. **Создайте репозиторий на GitHub:**
```bash
cd f:\Work\plato-intel2
git remote add github https://github.com/YOUR_USERNAME/plato-intel.git
git push -u github main
```

2. **Проверьте файлы:**
- [x] `composer.json` - PHP зависимости
- [x] `package.json` - NPM зависимости
- [x] `.gitignore` - Исключения

### Шаг 2: Настройка Render.com

1. **Зарегистрируйтесь на https://render.com**

2. **Создайте новый Web Service:**
   - Name: `plato-intel`
   - Region: `Frankfurt, Germany` (ближе к Беларуси)
   - Branch: `main`
   - Root Directory: (оставьте пустым)
   - Runtime: `Docker`

3. **Создайте `Dockerfile` в корне проекта:**

```dockerfile
FROM php:8.2-apache

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

# Установка расширений PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Включение mod_rewrite
RUN a2enmod rewrite

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копирование файлов
COPY . /var/www/html
WORKDIR /var/www/html

# Установка зависимостей
RUN composer install --no-dev --optimize-autoloader
RUN npm install -g pnpm
RUN pnpm install --production
RUN pnpm run build

# Настройка прав
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Настройка Apache
COPY .docker/apache2.conf /etc/apache2/apache2.conf
COPY .docker/000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]
```

4. **Создайте папку `.docker` и файлы конфигурации:**

`.docker/apache2.conf`:
```apache
ServerTokens Prod
ServerSignature Off
TraceEnable Off

Timeout 60
KeepAlive On
MaxKeepAliveRequests 100
KeepAliveTimeout 5

<Directory />
    Options FollowSymLinks
    AllowOverride None
    Require all denied
</Directory>

<Directory /var/www/>
    Options -Indexes +FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>

ErrorLog ${APACHE_LOG_DIR}/error.log
CustomLog ${APACHE_LOG_DIR}/access.log combined

IncludeOptional mods-enabled/*.load
IncludeOptional mods-enabled/*.conf
Include ports.conf
```

`.docker/000-default.conf`:
```apache
<VirtualHost *:80>
    ServerName plato-intel.onrender.com
    DocumentRoot /var/www/html/public

    <Directory /var/www/html/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

5. **Создайте `render.yaml`:**

```yaml
services:
  - type: web
    name: plato-intel
    env: php
    buildCommand: |
      composer install --no-dev --optimize-autoloader
      pnpm install --production
      pnpm run build
      php artisan migrate --force
      php artisan config:cache
      php artisan route:cache
      php artisan view:cache
    startCommand: php artisan serve --host=0.0.0.0 --port=10000
    envVars:
      - key: APP_ENV
        value: production
      - key: APP_DEBUG
        value: false
      - key: APP_URL
        sync: false
      - key: DB_CONNECTION
        value: sqlite
      - key: CACHE_DRIVER
        value: file
      - key: SESSION_DRIVER
        value: file
      - key: QUEUE_CONNECTION
        value: sync
```

### Шаг 3: Настройка базы данных

**Вариант A: SQLite (для начала)**
```bash
touch database/database.sqlite
```

**Вариант B: PostgreSQL (Render Database)**
1. Создайте PostgreSQL на Render
2. Подключите к проекту
3. Обновите `.env`:
```env
DB_CONNECTION=pgsql
DB_HOST=<host-from-render>
DB_PORT=5432
DB_DATABASE=<database-name>
DB_USERNAME=<username>
DB_PASSWORD=<password>
```

### Шаг 4: Переменные окружения

В панели Render добавьте переменные:
```
APP_NAME=PLATO-INTEL
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:... (сгенерируйте: php artisan key:generate)
APP_URL=https://plato-intel.onrender.com

DB_CONNECTION=sqlite

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

### Шаг 5: Миграции

```bash
# После первого деплоя
php artisan migrate --force
php artisan db:seed --force
```

---

## 🧪 ТЕСТИРОВАНИЕ

### Чек-лист проверки

- [ ] Главная страница загружается
- [ ] Дизайн применяется (тёмный фон, оранжевые акценты)
- [ ] Header с логотипом и навигацией
- [ ] Поиск по каталогу работает
- [ ] Каталог открывается
- [ ] Фильтры работают
- [ ] Страница товара отображается
- [ ] Контакты показываются
- [ ] О компании загружается
- [ ] 404 страница кастомная
- [ ] Telegram-бот кнопка видна
- [ ] Мобильная версия корректна
- [ ] Форма обратной связи работает

### URL для тестирования

- **Главная:** https://plato-intel.onrender.com/
- **Каталог:** https://plato-intel.onrender.com/catalog
- **Контакты:** https://plato-intel.onrender.com/contacts
- **О компании:** https://plato-intel.onrender.com/about

---

## 📊 SEO ПРОВЕРКА

### Google Search Console
1. Добавьте сайт
2. Загрузите sitemap.xml
3. Проверьте индексацию

### Google Analytics
```html
<!-- Добавьте в layouts/app-neomorph.blade.php -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'GA_MEASUREMENT_ID');
</script>
```

### Яндекс.Метрика
```html
<!-- Добавьте в layouts/app-neomorph.blade.php -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, 1, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(XXXXXXXXX, "init", {clickmap:true, trackLinks:true, accurateTrackBounce:true});
</script>
```

---

## 🐛 ВОЗМОЖНЫЕ ПРОБЛЕМЫ

### Ошибка: "Permission denied"
**Решение:**
```dockerfile
RUN chmod -R 777 storage bootstrap/cache
```

### Ошибка: "Class not found"
**Решение:**
```bash
composer dump-autoload --optimize
```

### Ошибка: "CSRF token mismatch"
**Решение:**
- Проверьте `APP_URL` в переменных окружения
- Очистите кэш: `php artisan cache:clear`

---

## 📞 ПОДДЕРЖКА

**Email:** timursama96@gmail.com
**Telegram:** @timursama96

---

**Инструкция создана:** 20 марта 2026
**Версия:** 1.0
**Статус:** Готово к деплою!
