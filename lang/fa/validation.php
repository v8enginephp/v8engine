<?php
/*EScF*/
return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute باید پذیرفته شده باشد.',
    'active_url' => 'آدرس :attribute معتبر نیست',
    'after' => ':attribute باید تاریخی بعد از :date باشد.',
    'alpha' => ':attribute باید شامل حروف الفبا باشد.',
    'alpha_dash' => ':attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد.',
    'alpha_num' => ':attribute باید شامل حروف الفبا و عدد باشد.',
    'array' => ':attribute باید شامل آرایه باشد.',
    'before' => ':attribute باید تاریخی قبل از :date باشد.',
    'between' => array(
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file' => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string' => ':attribute باید بین :min و :max کاراکتر باشد.',
        'array' => ':attribute باید بین :min و :max آیتم باشد.',
    ),
    'boolean' => 'The :attribute field must be true or false',
    'confirmed' => ':attribute با تاییدیه مطابقت ندارد.',
    'date' => ':attribute یک تاریخ معتبر نیست.',
    'date_format' => ':attribute با الگوی :format مطاقبت ندارد.',
    'different' => ':attribute و :other باید متفاوت باشند.',
    'digits' => ':attribute باید :digits رقم باشد.',
    'digits_between' => ':attribute باید بین :min و :max رقم باشد.',
    'email' => 'فرمت :attribute معتبر نیست.',
    'exists' => ':attribute انتخاب شده، معتبر نیست.',
    'image' => ':attribute باید تصویر باشد.',
    'in' => ':attribute انتخاب شده، معتبر نیست.',
    'integer' => ':attribute باید نوع داده ای عددی (integer) باشد.',
    'ip' => ':attribute باید IP آدرس معتبر باشد.',
    'max' => array(
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file' => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string' => ':attribute نباید بیشتر از :max کاراکتر باشد.',
        'array' => ':attribute نباید بیشتر از :max آیتم باشد.',
    ),
    'mimes' => ':attribute باید یکی از فرمت های :values باشد.',
    'min' => array(
        'numeric' => ':attribute نباید کوچکتر از :min باشد.',
        'file' => ':attribute نباید کوچکتر از :min کیلوبایت باشد.',
        'string' => ':attribute نباید کمتر از :min کاراکتر باشد.',
        'array' => ':attribute نباید کمتر از :min آیتم باشد.',
    ),
    'not_in' => ':attribute انتخاب شده، معتبر نیست.',
    'numeric' => ':attribute باید شامل عدد باشد.',
    'regex' => ':attribute یک فرمت معتبر نیست',
    'required' => 'فیلد :attribute الزامی است',
    'required_if' => 'فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.',
    'required_with' => ':attribute الزامی است زمانی که :values موجود است.',
    'required_with_all' => ':attribute الزامی است زمانی که :values موجود است.',
    'required_without' => ':attribute الزامی است زمانی که :values موجود نیست.',
    'required_without_all' => ':attribute الزامی است زمانی که :values موجود نیست.',
    'same' => ':attribute و :other باید مانند هم باشند.',
    'size' => array(
        'numeric' => ':attribute باید برابر با :size باشد.',
        'file' => ':attribute باید برابر با :size کیلوبایت باشد.',
        'string' => ':attribute باید برابر با :size کاراکتر باشد.',
        'array' => ':attribute باسد شامل :size آیتم باشد.',
    ),
    'timezone' => ':attribute باید یک منظقه معتبر باشد.',
    'unique' => ':attribute قبلا انتخاب شده است.',
    'url' => 'فرمت آدرس :attribute اشتباه است.',
    'uploaded' => 'مشکل در اپلود',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention 'attribute.rule' to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => array(),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of 'email'. This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => array(
        'full_name' => 'نام کامل',
        'name' => 'نام',
        'name_en' => 'نام',
        'family' => 'نام خانوادگی',
        'username' => 'نام کاربری',
        'email' => 'پست الکترونیکی',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'password' => 'رمز عبور',
        'passcode' => 'رمز عبور',
        'password_confirmation' => 'تاییدیه ی رمز عبور',
        'city' => 'شهر',
        'country' => 'کشور',
        'address' => 'نشانی',
        'phone' => 'تلفن',
        'mobile' => 'تلفن همراه',
        'age' => 'سن',
        'sex' => 'جنسیت',
        'gender' => 'جنسیت',
        'day' => 'روز',
        'month' => 'ماه',
        'year' => 'سال',
        'hour' => 'ساعت',
        'minute' => 'دقیقه',
        'second' => 'ثانیه',
        'title' => 'عنوان',
        'title_en' => 'عنوان',
        'text' => 'متن',
        'content' => 'محتوا',
        'description' => 'توضیحات',
        'description_en' => 'توضیحات',
        'excerpt' => 'گلچین کردن',
        'date' => 'تاریخ',
        'time' => 'زمان',
        'available' => 'موجود',
        'link' => 'لینک',
        'body' => 'متن',
        'subject' => 'موضوع',
        'seo_title' => 'عنوان صفحه',
        'linkaddress' => 'آدرس لینک',
        'linkname' => 'نام لینک',
        'meta_description' => 'توضیحات',
        'size' => 'اندازه',
        'gift' => 'هدیه',
        'score' => 'امتیاز',
        'type' => 'نوع',
        'expiredate' => 'تاریخ انقضا',
        'message' => 'پیام',
        'start_at' => 'تاریخ شروع',
        'expire_at' => 'تاریخ پایان',
        'minprice' => 'حداقعل خرید',
        'percent' => 'درصد',
        'transaction' => 'تراکنش',
        'last_transaction' => 'اخرین تراکنش',
        'minvalue' => 'حداقعل خرید',
        'customernumber' => 'تعداد مشتری',
        'status' => 'وضعیت',
        'golden' => 'طلایی',
        'silver' => 'نقره ای',
        'bronze' => 'برنزی',
        'festivaltext' => 'متن جشنواره فروش',
        'during' => 'مدت',
        'ball' => 'توپ',
        'price' => 'مبلغ',
        'count' => 'تعداد',
        'code' => 'کد',
        'logo' => 'لوگو',
        'bank' => 'بانک',
        'cartnumber' => 'شماره کارت',
        'cartholder' => 'دارنده کارت',
        'value' => 'میزان',
        'minbalance' => 'حداقعل موجودی',
        'maxbalance' => 'حداکثر موجودی',
        'tracking_code' => 'کد رهگیری',
        'display_name' => 'نام نمایشی',
        'templatename' => 'نام قالب',
        'intro' => 'اینترو',
        'persian' => 'فارسی',
        'english' => 'انگلیسی',
        'firstlogo' => 'لوگو اول',
        'secoundlogo' => 'لوگو دوم',
        'position' => 'موقعیت',
        'artist_name' => 'نام هنرمند',
        'artist_name_en' => 'نام هنرمند',
        'category_id' => 'دسته',
        'sub_category_id' => 'زیردسته',
        'created_year' => 'سال ساخت',
        'qty' => 'تعداد',
        'moderated_price' => 'قیمت',
        'moderated_price_en' => 'قیمت',
        'province_id' => 'استان',
        'kindusage' => 'نوع استفاده',
        'start time' => 'زمان شروع',
        'start time  ' => 'زمان پایان',
        'suggested_price' => 'قیمت پیشنهادی',
        'suggested_price_en' => 'قیمت پیشنهادی',
        'post' => 'پست',
        't_pox' => 'تیپاکس',
        'barbari' => 'باربری',
        'free' => 'مجانی',
        'parent_id' => 'والد',
        'main_image' => 'تصویر',
        'is_displayed' => 'وضعیت نمایش',
        'slug' => 'نام مستعار',
        'sku' => 'کد شناسه غیر تکراری کالا',
        'barcode' => 'بارکد',
        'brand_id' => 'برند',
        'user_id' => 'کاربر',
        'supplier_id' => 'تامین کننده',
        'seo_tags' => 'تگهای سئو',
        'seo_description' => 'توضیحات سئو',
        'category_parents' => 'دسته بندی والد',
        'register_status' => 'وضعیت ثبت',
        'summary' => 'خلاصه مطلب',
        'unit' => 'واحد',
        'fname' => "نام خانوادگی"
    ),
);
