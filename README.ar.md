<div dir="rtl" style="text-align: right;">

# التطبيق المهني

تطبيق ويب لعرض الوظائف المتاحة في الشركة واستقبال طلبات التوظيف من المستخدمين. تم إنشاؤه باستخدام Laravel و Jetstream و Livewire و Tailwind و Sail.

## جدول المحتويات

- [التطبيق المهني](#التطبيق-المهني)
  - [جدول المحتويات](#جدول-المحتويات)
  - [المتطلبات الأساسية](#المتطلبات-الأساسية)
  - [التثبيت](#التثبيت)
  - [التكوين](#التكوين)
  - [تشغيل المشروع](#تشغيل-المشروع)
    - [باستخدام Laravel Sail (مستحسن)](#باستخدام-laravel-sail-مستحسن)
    - [باستخدام MySQL المحلي و PHP artisan](#باستخدام-mysql-المحلي-و-php-artisan)
    - [تشغيل أوامر npm](#تشغيل-أوامر-npm)
  - [التطوير](#التطوير)
    - [إضافة المكونات](#إضافة-المكونات)
      - [‫Laravel](#laravel)
      - [‫Livewire](#livewire)
      - [‫Tailwind](#tailwind)
    - [الأوامر المفيدة](#الأوامر-المفيدة)
  - [المساهمة](#المساهمة)
  - [الترخيص](#الترخيص)
  - [شكر وتقدير](#شكر-وتقدير)

## المتطلبات الأساسية

<div dir="ltr" style="text-align: left;">

- PHP >= 8.2
- MySQL
- Composer
- Node.js and npm
- Docker (for Sail)
- Laravel Sail (optional)

</div>


## التثبيت

١. استنسخ المستودع: `git clone https://github.com/khalidfsh/careers-app.git`

٢. انتقل إلى مجلد المشروع: `cd careers-app`

٣. قم بتثبيت معتمدات PHP &#x202B;: `composer install`

٤. قم بتثبيت معتمدات JavaScript &#x202B;: `npm install`

٥. قم بنسخ ملف `.env.example` إلى ملف `.env` جديد: `cp .env.example .env`

٦. قم بإنشاء مفتاح التطبيق: `php artisan key:generate`

## التكوين

١. افتح ملف `.env` وقم بتكوين إعدادات قاعدة البيانات الخاصة بك:

   - لاستخدام Laravel Sail، قم بتعيين `DB_CONNECTION=mysql` و `DB_HOST=mysql`
   - لاستخدام MySQL المحلي، قم بتعيين `DB_CONNECTION=mysql` و `DB_HOST=127.0.0.1`، ثم أدخل قيم `DB_DATABASE` و `DB_USERNAME` و `DB_PASSWORD`

٢. (اختياري) قم بتكوين Laravel Sail لاستخدام إعدادات قاعدة البيانات الصحيحة في ملف `docker-compose.yml` إذا كنت تستخدم Laravel Sail.

## تشغيل المشروع

### باستخدام Laravel Sail (مستحسن)

١. شغّل Laravel Sail &#x202B;: `./vendor/bin/sail up`

٢. قم بتشغيل ترحيلات قاعدة البيانات: `./vendor/bin/sail artisan migrate`

### باستخدام MySQL المحلي و PHP artisan

١. شغّل خادم MySQL المحلي.

٢. قم بتشغيل ترحيلات قاعدة البيانات: `php artisan migrate`

### تشغيل أوامر npm

١. قم بتجميع موارد التطبيق للتطوير: `npm run dev`

   - بدلاً من ذلك، قم بتجميع موارد التطبيق للإنتاج: `npm run build`

٢. (اختياري) راقب التغييرات في موارد التطبيق وأعد تجميعها تلقائيًا: `npm run watch`

## التطوير

### إضافة المكونات

#### &#x202B;Laravel

1. إنشاء نموذج جديد وترحيل ومصنع ومنشئ بيانات:

```bash
php artisan make:model --migration --factory --seeder Job
```

2. إنشاء متحكم جديد:

```bash
php artisan make:controller JobController --resource
```


#### &#x202B;Livewire

1. إنشاء مكون Livewire جديد:

```bash
php artisan make:livewire JobList
```

سينشئ هذا فئة جديدة في `app/Http/Livewire` ومشهد جديد في `resources/views/livewire`.

#### &#x202B;Tailwind

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

### الأوامر المفيدة
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



## المساهمة

يرجى قراءة CONTRIBUTING.md للتفاصيل حول قوانين سلوكنا، والعملية المتبعة لإرسال طلبات السحب إلينا.

## الترخيص

يتم ترخيص هذا المشروع بموجب رخصة تطبيق Careers-App. راجع ملف [LICENSE](LICENSE.ar.md) للحصول على التفاصيل.

## شكر وتقدير

- التجمع الصحي بمنطقة حائل.
</div>