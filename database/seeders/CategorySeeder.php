<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::truncate();
  
        $categories = [
              ["code" => "soft_toys", "name" => "Мягкие игрушки", "description" => "Наши мягкие игрушки NICI для радости, игр и веселья.  Выберите себе плюшевого друга из большого ассортимента мягких игрушек нашего магазина. Будь то единорог, лама или альпака - ваш новый друг будет сопровождать вас повсюду.", "picture" => "categories/1/soft_toys_category.png"],
              ["code" => "keychains", "name" => "Брелки", "description" => "Найдите своего личного компаньона среди многочисленных брелков NICI. Может быть, как хранителя связки ключей, как украшение для вашей сумке или как маленький талисман.", "picture" => "categories/2/keychains_category.png"],
              ["code" => "magnici", "name" => "Магниты MagNICI", "description" => "Ваша любимая игрушка NICI в качестве маленького магнитного животного-компаньона MagNICI и талисмана на удачу. Благодаря небольшим магнитам внутри плюшевые игрушки держатся на металлических предметах.", "picture" => "categories/3/magnici_category.jpg"],
              ["code" => "cushions", "name" => "Подушки", "description" => "Декоративные плюшевые подушки NICI создадут в вашем доме домашнюю приятную атмосферу, способствующую расслаблению и умиротворению. Симпатичные персонажи NICI наполнят ваши любимые комнаты легкостью и радостью жизни.", "picture" => "categories/4/cushions_category.jpg"]
            ];
  
        foreach ($categories as $key => $data) {
            Category::create($data);
        }
    }
}
