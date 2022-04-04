<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_configurations')->truncate();
        $site_configuration = [
            [
                'title' => "Site Email Address",
                'identifier' => 'email_address',
                'value' => 'shahid.innovius58@gmail.com',
                'control_type' => 'textfield',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'title' => "Web Site Lnk",
                'identifier' => 'web_site',
                'value' => 'www.innoviussoftware.com',
                'control_type' => 'textfield',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'title' => "Contact Number",
                'identifier' => 'contact_number',
                'value' => '+91 8866521212',
                'control_type' => 'textfield',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'title' => "Address",
                'identifier' => 'address',
                'value' => '962 Fifth Avenue Str, 3rd Floor-Trump Building NY 10006, United State.',
                'control_type' => 'textfield',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'title' => "Facebook Link",
                'identifier' => 'facebook_link',
                'value' => 'https://www.facebook.com/',
                'control_type' => 'textfield',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'title' => "Youtube Link",
                'identifier' => 'youtube_link',
                'value' => 'https://www.youtube.com/',
                'control_type' => 'textfield',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'title' => "Instagram Link",
                'identifier' => 'instagram_link',
                'value' => 'https://www.instagram.com/',
                'control_type' => 'textfield',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'title' => "Razor Pay",
                'identifier' => 'razor_pay',
                'value' => true,
                'control_type' => 'checkbox',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'title' => "Razor Payment Site Key",
                'identifier' => 'razor_pay_site_key',
                'value' => '',
                'control_type' => 'textfield',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'title' => "Razor Payment Secret Key",
                'identifier' => 'razor_pay_secret_key',
                'value' => '',
                'control_type' => 'textfield',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]
        ];
        DB::table('site_configurations')->insert($site_configuration);
    }
}
