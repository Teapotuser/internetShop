<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Collection;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Collection::truncate();
  
        $collections = [
              ["code" => "jolly_maeh", "name" => "Овечки Jolly Mäh", "title_description" => "NICI Jolly Mäh - овечки, которые должны вам понравиться!", "description" => "Самый безошибочно узнаваемый персонаж -- овечки Jolly Mäh на рынке в 2003 года. Красочный мир овечек доставляет удовольствие и занимает прочное место в сердцах детей и взрослых благодаря своему дерзкому и забавному дизайну.", "picture" => "collections/1/jolly_maeh_collection_image.jpg"],
              ["code" => "unicorn_theodor", "name" => "Единорог Theodor и его друзья", "title_description" => "Мир единорога NICI Theodor и его друзей полон чудес и волшебства.", "description" => "Откройте для себя красочный мир Theodor с пушистыми мягкими игрушками и подарочными предметами в виде единорогов, и позвольте себе быть очарованными!", "picture" => "collections/2/unicorn_theodor_collection_image.jpg"],
              ["code" => "wild_friends", "name" => "Дикие обитатели", "title_description" => "Время становиться диким!", "description" => "Животные из Африки популярной коллекции Дикие Обитатели (Wild Friends) от NICI очаровывают своим уникальным и оригинальным дизайном. Естественные расцветки меха, пушистый мягкий плюш, дизайн в стиле джунглей, стильные цвета -- все притягивает взгляд и зовет вас играть с новыми дикими друзьями. Эти изделия являются частью серии NICI GREEN, для изготовления которой используются исключительно плюш и наполнители, изготовленные из переработанных материалов", "picture" => "collections/3/wild_friends_collection_image.jpg"],
              ["code" => "nici_dinos", "name" => "Динозавры", "title_description" => "Ничто так не увлекает маленьких детей, как динозавры!", "description" => "Новые Динозавры NICI Dinos, три доисторических животных разных размеров, с красочным дизайном и захватывающим сочетанием материалов, по-настоящему стильны и состоят из множество деталей. Коллекцию, являющуюся частью продукции NICI GREEN, прекрасно дополняют два милых детеныша динозавра в плюшевом яйце. NICI Dinos – это приключенческое фэнтезийное развлечение, приносящее хорошее настроение и приятные моменты уюта. Многогранная линия игрушек и аксессуаров с вау-эффектом в виде доисторических друзей-ящуров радует взрослых и детей, предлагая отличные подарки на любой случай.", "picture" => "collections/4/dinos_collection_image.jpg"]
            ];
  
        foreach ($collections as $key => $data) {
            Collection::create($data);
        }
    }
}
