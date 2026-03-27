<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $site_settings = array(
            array(
                "id" => 1,
                "key" => "site_name",
                "value" => "Ethjobs",
                "created_at" => "2024-01-03 07:03:35",
                "updated_at" => "2024-01-30 09:57:08",
            ),
            array(
                "id" => 2,
                "key" => "site_email",
                "value" => "ethjobs2024@gmail.com",
                "created_at" => "2024-01-03 07:03:35",
                "updated_at" => "2024-01-03 07:03:35",
            ),
            array(
                "id" => 3,
                "key" => "site_phone",
                "value" => "+251903324489",
                "created_at" => "2024-01-03 07:03:35",
                "updated_at" => "2024-01-03 07:03:35",
            ),
            array(
                "id" => 4,
                "key" => "site_default_currency",
                "value" => "birr",
                "created_at" => "2024-01-03 07:03:35",
                "updated_at" => "2024-01-03 07:03:35",
            ),
            array(
                "id" => 5,
                "key" => "site_currency_icon",
                "value" => "$",
                "created_at" => "2024-01-03 07:03:35",
                "updated_at" => "2024-01-03 07:03:35",
            ),
            array(
                "id" => 6,
                "key" => "site_map",
                "value" => "<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3931.6809077687017!2d38.7385443!3d9.7930437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x16493678cee0f065%3A0x26b174d2dd1efba4!2sSalale%20University!5e0!3m2!1sam!2set!4v1714851329673!5m2!1sam!2set\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>",
                "created_at" => "2024-01-30 09:53:20",
                "updated_at" => "2024-01-30 09:59:42",
            ),
        );

        \DB::table('site_settings')->insert($site_settings);

    }
}
