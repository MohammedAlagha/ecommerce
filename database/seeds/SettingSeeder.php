<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
            'default_locale'=>'ar',
            'default_timezone'=>'Asia/Gaza',
            'reviews_enabled'=>true,
            'auto_approve_reviews'=>'',
            'supported_currencies'=>['USD','NIS','SAR'],
            'default_currency'=>'USD',
            'store_email'=>'admin@ecommerce.test',
            'search_engine'=>'mysql',
            'local_shipping_cost'=> 0,
            'outer_shipping_cost'=> 0,
            'free_shipping_cost'=> 0,
            'translatable'=>[
                'store_name' => 'متجر محمد',
                'free_shipping_label' => 'توصيل مجاني',
                'local_label' => 'توصيل داخلي',
                'outer_label' => 'توصيل خارجي'
            ],

        ]);
    }
}
