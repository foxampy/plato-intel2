# PLATO-INTEL - Инструкция по развёртыванию на сервере

**Дата:** 20 марта 2026
**Сервер:** 93.125.99.147
**Пользователь:** platoint
**Путь:** /home/platoint/www/plato-intel.by

---

## 📋 Шаг 1: Подготовка файлов

### Вариант A: Через WinSCP (Рекомендуется)

1. Скачайте WinSCP: https://winscp.net
2. Подключитесь к серверу:
   - **Хост:** 93.125.99.147
   - **Пользователь:** platoint
   - **Пароль:** [ваш пароль]
   - **Протокол:** SFTP

3. Скопируйте файлы из `f:\Work\plato-intel2\` в `/home/platoint/www/plato-intel.by/`

**Исключить при копировании:**
- `node_modules/`
- `vendor/`
- `.git/`
- `*.log`
- `.idea/`
- `.vscode/`
- `.env`

### Вариант B: Через Git на сервере

```bash
ssh platoint@93.125.99.147
cd /home/platoint/www/plato-intel.by
git pull origin main
```

---

## 🔧 Шаг 2: Установка зависимостей

```bash
ssh platoint@93.125.99.147
cd /home/platoint/www/plato-intel.by

# PHP зависимости
composer install --no-dev -o --no-interaction

# NPM зависимости
pnpm install --production

# Сборка assets
pnpm run build
```

---

## 🗄️ Шаг 3: База данных

```bash
cd /home/platoint/www/plato-intel.by

# Миграции
php artisan migrate --force

# Очистка кэша
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## ⚡ Шаг 4: Оптимизация

```bash
cd /home/platoint/www/plato-intel.by

# Кэширование
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Оптимизация автозагрузки
php artisan optimize
```

---

## 🌐 Шаг 5: Проверка

1. Откройте https://plato-intel.by
2. Проверьте главную страницу (новый дизайн неоморфизм)
3. Проверьте поиск по каталогу
4. Проверьте Telegram-бот (кнопка справа снизу)
5. Проверьте мобильную версию

---

## 📊 Чек-лист проверки

- [ ] Главная страница загружается
- [ ] Стили неоморфизм применяются (тёмный фон, оранжевые акценты)
- [ ] Header с логотипом и навигацией
- [ ] Поиск по каталогу работает
- [ ] Кнопка контактов с выпадающим списком
- [ ] Telegram-бот кнопка справа снизу
- [ ] Слайдер работает
- [ ] Преимущества отображаются
- [ ] Каталог продукции
- [ ] Популярные товары
- [ ] Новости
- [ ] Footer
- [ ] Мобильная версия

---

## 🔄 Откат изменений (если нужно)

```bash
ssh platoint@93.125.99.147
cd /home/platoint/www/plato-intel.by

# Вернуть предыдущую версию
git reset --hard HEAD~1

# Очистить кэш
php artisan cache:clear
php artisan view:clear
```

---

## 📞 Контакты

**Разработчик:** [Ваше имя]
**Email:** timursama96@gmail.com
**Telegram:** @timursama96

---

## 🎯 Что обновлено

✅ Новый дизайн в стиле неоморфизм:
- Тёмный серый фон (#1a1d26)
- Оранжевые акценты (#ff9a4d)
- Свечение активных элементов
- Плавные переходы и тени

✅ Обновлённый header:
- Логотип и название компании
- Навигация по разделам
- Поиск по каталогу
- Кнопка контактов с выпадающим окном

✅ Telegram-бот:
- Кнопка справа снизу
- Быстрая связь с менеджером
- Автоответчик

✅ SEO оптимизация:
- Уникальные title/description
- Микроразметка Schema.org
- Оптимизированные изображения
- Sitemap.xml

---

**Документ создан:** 20 марта 2026
**Версия:** 2.0
