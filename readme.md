<p align="center"><a href="https://laravel.com" target="_blank"><img width="150"src="https://laravel.com/laravel.png"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Install
Require before installing:
- Composer
- Server Requirements for Laravel 5.3 : 
    PHP >= 5.6.4,
    OpenSSL PHP Extension,
    PDO PHP Extension,
    Mbstring PHP Extension,
    Tokenizer PHP Extension,
    XML PHP Extension,

Installing:
- Step 1: Clone or download this repository
- Step 2: $ composer install
- Step 3: Copy file .env.example to .env
- Step 4: $ php artisan migrate
- Step 5: $ php artisan storage:link
- Step 6: $ php artisan serve

Now, you can run application in http://localhost:8000

If you want to use data example, you can run $ php artisan db:seed
then, you can login with account: 
- Email: huytb.contact@gmail.com
- Password: 123456

## Chức năng chính
- Tạo ra các workspace, mỗi workspace có thể quản lý 1 chuỗi nhà hàng
- Mỗi workspace có một địa chỉ truy cập riêng, có thể sử dụng workspace bằng cách truy cập trực tiếp Url của workspace
- Mỗi workspace là một trang quản lý nhà hàng, admin có thể thêm sửa xóa các nhà hàng, đánh dấu trên bản đồ địa chỉ của từng nhà hàng.
- Quản lý nhân viên
- Quản lý món ăn
- Quản lý đơn hàng
- Quản lý món ăn
- Khi admin nhận order, admin nhập vào thông tin địa chỉ khách hàng, app sẽ trả về khoảng cách của từng nhà hàng thành viên đến địa chỉ khách hàng và tình trạng món ăn trong từng nhà hàng thành viên. Dựa vào đó admin có thể lựa chọn nhà hàng phù hợp để vận chuyển đơn hàng.
- Sau khi nhận đơn hàng hệ thống sẽ thông báo cho admin tại nhà hàng thành viên để thực hiện đơn hàng hoặc thông báo tình trạng xử lý của đơn hàng (xử lý realtime).