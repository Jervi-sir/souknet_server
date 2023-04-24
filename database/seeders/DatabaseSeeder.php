<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Booking;
use App\Models\Company;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use App\Models\UserImage;
use App\Models\CompanyUser;
use App\Models\OrderCoupon;
use App\Models\Transaction;
use App\Models\CompanyImage;
use App\Models\Notification;
use App\Models\OrderCounpon;
use App\Models\ProductImage;
use App\Models\ServiceImage;
use App\Models\PaymentMethod;
use App\Models\ReviewProduct;
use App\Models\ReviewService;
use App\Models\FavoriteProduct;
use App\Models\FavoriteService;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use App\Models\CompanyPrivilege;
use App\Models\ProductPriceHistory;
use Database\Factories\CompanyUserFactory;
use Database\Factories\ProductCategoryFactory;
use Database\Factories\CompanyPrivilegeFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //User::factory(15)->create();
        //UserImage::factory(15)->create();

        //CompanyPrivilege::factory(5)->create();
        //Company::factory(15)->create();
        //CompanyImage::factory(15)->create();

        //Category::factory(12)->create();

        Product::factory(17)->create();
        ProductImage::factory(29)->create();
        //ProductPriceHistory::factory(15)->create();
        //ReviewProduct::factory(33)->create();
        //FavoriteProduct::factory(35)->create();

        Service::factory(12)->create();
        ServiceImage::factory(24)->create();
        //ReviewService::factory(15)->create();
        //FavoriteService::factory(15)->create();

        //PaymentMethod::factory(4)->create();
        //Order::factory(15)->create();
        //Transaction::factory(15)->create();
        //OrderCoupon::factory(5)->create();

        //Booking::factory(15)->create();
        //Coupon::factory(15)->create();
        //Notification::factory(15)->create();

        //CompanyUser::factory(15)->create();
        //ProductCategory::factory(15)->create();
    }
}
