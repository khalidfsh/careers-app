<div dir="rtl" style="text-align: right;">

# التطبيق المهني

تطبيق ويب لعرض الوظائف المتاحة في الشركة واستقبال طلبات التوظيف من المستخدمين. تم إنشاؤه باستخدام Laravel و Jetstream و Livewire و Tailwind و Sail.

## جدول المحتويات

- [التطبيق المهني](#التطبيق-المهني)
  - [جدول المحتويات](#جدول-المحتويات)
  - [المتطلبات الأساسية](#المتطلبات-الأساسية)
  - [التثبيت](#التثبيت)
  - [التهيئة](#التهيئة)
  - [إضافة المكونات](#إضافة-المكونات)
    - [Laravel](#laravel)
    - [Livewire](#livewire)
    - [Tailwind](#tailwind)
  - [الأوامر المفيدة](#الأوامر-المفيدة)
- [المساهمة](#المساهمة)

## المتطلبات الأساسية

<div dir="ltr" style="text-align: left;">

- PHP >= 7.3
- Composer
- Node.js & NPM
- Docker (لـ Sail)

</div>


## التثبيت

1. استنساخ المستودع:

```bash
git clone https://github.com/yourusername/careers-app.git
cd careers-app
```

2. تثبيت اعتماديات PHP:

```bash
composer install
```

3. تثبيت اعتماديات JavaScript:

```bash
npm install
```

4. يمكنك نسخ ملف البيئة المثال وتهيئة التطبيق:

```bash
cp .env.example .env
```

قم بتحديث ملف `.env` بتفاصيل قاعدة البيانات والتكوينات المطلوبة الأخرى.

5. إنشاء مفتاح التطبيق:

```bash
php artisan key:generate
```

6. تشغيل ترحيل قاعدة البيانات والبذور (إن وجدت):

```bash
php artisan migrate --seed
```

7. بدء بيئة التطوير Sail:

```bash
./vendor/bin/sail up -d
```

يجب أن يكون التطبيق الآن قابلاً للوصول إليه على [http://localhost](http://localhost).

## التهيئة

- قم بتكوين متغيرات بيئة التطبيق في ملف `.env`.
- حدّث ملفات `config/*.php` لتخصيص إعدادات التطبيق.

## إضافة المكونات

### Laravel

1. إنشاء نموذج جديد وترحيل ومصنع ومنشئ بيانات:

```bash
php artisan make:model --migration --factory --seeder Job
```

2. إنشاء متحكم جديد:

```bash
php artisan make:controller JobController --resource
```


### Livewire

1. إنشاء مكون Livewire جديد:

```bash
php artisan make:livewire JobList
```

سينشئ هذا فئة جديدة في `app/Http/Livewire` ومشهد جديد في `resources/views/livewire`.

### Tailwind

1. استيراد مكونات Tailwind الجديدة في `resources/css/app.css`

```bash
@import 'components/new-component';
```

1. إنشاء ملف المكون الجديد في resources/css/components:

```bash
touch resources/css/components/new-component.css
```

3. تجميع ملفات CSS:

```bash
npm run dev
```

## الأوامر المفيدة
- تشغيل الاختبارات:

```bash
php artisan test
```

- تشغيل ترحيل قاعدة البيانات:

```bash
php artisan migrate
```

- التراجع عن ترحيل قاعدة البيانات:

```bash
php artisan migrate:rollback
```

- مسح ذاكرة التخزين المؤقت:

```bash
php artisan cache:clear
```

- مسح ذاكرة التخزين المؤقت للتكوين:

```bash
php artisan config:clear
```

- مسح ذاكرة التخزين المؤقت للمشاهد:

```bash
php artisan view:clear
```

- التفاعل مع شيفرة التطبيق:

```bash
php artisan tinker
```



# المساهمة
يرجى قراءة CONTRIBUTING.md للتفاصيل حول قوانين سلوكنا، والعملية المتبعة لإرسال طلبات السحب إلينا.
</div>