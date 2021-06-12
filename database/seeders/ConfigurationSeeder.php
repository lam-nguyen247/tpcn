<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->isLocal()) {
            Configuration::insert([
                ['name' => 'phone', 'content' => '038.480.1238'],
                ['name' => 'email', 'content' => 'duong.dn92@gmail.com'],
                ['name' => 'whatsapp', 'content' => 'https://wa.me/0384801238'],
                ['name' => 'zalo', 'content' => 'https://zalo.me/0384801238'],
                ['name' => 'messenger', 'content' => 'https://www.messenger.com/t/duongvalo'],
                ['name' => 'facebook', 'content' => 'https://www.facebook.com/duongvalo'],
                ['name' => 'instagram', 'content' => 'https://www.instagram.com/duongvalo'],
                ['name' => 'twitter', 'content' => 'https://twitter.com/duongvalo'],
                ['name' => 'youtube', 'content' => 'https://www.youtube.com/channel/UC_po2pD3vbMH4oHs0psdJ7A'],
                ['name' => 'locale', 'content' => 'vi'],
                ['name' => 'theme', 'content' => 'dark'],
                ['name' => 'css', 'content' => '<style>.local-css {color: red}</style>'],
                ['name' => 'js', 'content' => '<script>let testConfigLocal = 1</script>'],
            ]);
        } else {
            Configuration::insert([
                ['name' => 'phone', 'content' => ''],
                ['name' => 'email', 'content' => 'duong.dn92@gmail.com'],
                ['name' => 'whatsapp', 'content' => ''],
                ['name' => 'zalo', 'content' => ''],
                ['name' => 'messenger', 'content' => ''],
                ['name' => 'facebook', 'content' => ''],
                ['name' => 'instagram', 'content' => ''],
                ['name' => 'twitter', 'content' => ''],
                ['name' => 'youtube', 'content' => ''],
                ['name' => 'locale', 'content' => 'vi'],
                ['name' => 'theme', 'content' => 'dark'],
                ['name' => 'css', 'content' => ''],
                ['name' => 'js', 'content' => ''],
            ]);
        }
    }
}
