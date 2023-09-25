<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductImages;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImages::truncate();
  
        $product_images = [
              ["product_id" => "1", "path" => "Products/1/1/carousel/48531_01_HA_600x600.jpg", "preview_path" => "Products/1/1/carousel/preview/48531_01_200_200.jpg", "counter" => "1"],
              ["product_id" => "1", "path" => "Products/1/1/carousel/48531_02_ZA_600x600.jpg", "preview_path" => "Products/1/1/carousel/preview/48531_02_200x200.jpg", "counter" => "2"],
              ["product_id" => "1", "path" => "Products/1/1/carousel/48531_03_ZA_600x600.jpg", "preview_path" => "Products/1/1/carousel/preview/48531_03_200x200.jpg", "counter" => "3"],
              ["product_id" => "1", "path" => "Products/1/1/carousel/48531_04_ZA_600x600.jpg", "preview_path" => "Products/1/1/carousel/preview/48531_04_200x200.jpg", "counter" => "4"],
              ["product_id" => "1", "path" => "Products/1/1/carousel/48531_14_Milieu_600x600.jpg", "preview_path" => "Products/1/1/carousel/preview/48531_14_200x200.jpg", "counter" => "5"],
              
              ["product_id" => "2", "path" => "Products/1/2/carousel/48533_01_HA_Frei_600x600.jpg", "preview_path" => "Products/1/2/carousel/preview/48533_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "2", "path" => "Products/1/2/carousel/48533_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/2/carousel/preview/48533_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "2", "path" => "Products/1/2/carousel/48533_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/2/carousel/preview/48533_03_ZA_Frei_200x200.jpg", "counter" => "3"],
              ["product_id" => "2", "path" => "Products/1/2/carousel/48533_04_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/2/carousel/preview/48533_04_ZA_Frei_200x200.jpg", "counter" => "4"],
              ["product_id" => "2", "path" => "Products/1/2/carousel/48533_10_48532_48530_48531_48534_Milieu_600x600.jpg", "preview_path" => "Products/1/2/carousel/preview/48533_10_48532_48530_48531_48534_Milieu_200x200.jpg", "counter" => "5"],
              ["product_id" => "2", "path" => "Products/1/2/carousel/48533_11_48532_48530_48531_48534_Milieu_600x600.jpg", "preview_path" => "Products/1/2/carousel/preview/48533_11_48532_48530_48531_48534_Milieu_200x200.jpg", "counter" => "6"],
              ["product_id" => "2", "path" => "Products/1/2/carousel/48533_12_48532_48530_48531_48534_Milieu_600x600.jpg", "preview_path" => "Products/1/2/carousel/preview/48533_12_48532_48530_48531_48534_Milieu_200x200.jpg", "counter" => "7"],
              ["product_id" => "2", "path" => "Products/1/2/carousel/48533_13_Milieu_600x600.jpg", "preview_path" => "Products/1/2/carousel/preview/48533_13_Milieu_200x200.jpg", "counter" => "8"],

              ["product_id" => "3", "path" => "Products/1/3/carousel/48534_01_HA_Frei_600x600.jpg", "preview_path" => "Products/1/3/carousel/preview/48534_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "3", "path" => "Products/1/3/carousel/48534_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/3/carousel/preview/48534_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "3", "path" => "Products/1/3/carousel/48534_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/3/carousel/preview/48534_03_ZA_Frei_200x200.jpg", "counter" => "3"],
              ["product_id" => "3", "path" => "Products/1/3/carousel/48534_04_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/3/carousel/preview/48534_04_ZA_Frei_200x200.jpg", "counter" => "4"],
              ["product_id" => "3", "path" => "Products/1/3/carousel/48534_16_Milieu_600x600.jpg", "preview_path" => "Products/1/3/carousel/preview/48534_16_Milieu_200x200.jpg", "counter" => "5"],

              ["product_id" => "4", "path" => "Products/1/4/carousel/48530_01_HA_Frei_600x600.jpg", "preview_path" => "Products/1/4/carousel/preview/48530_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "4", "path" => "Products/1/4/carousel/48530_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/4/carousel/preview/48530_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "4", "path" => "Products/1/4/carousel/48530_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/4/carousel/preview/48530_03_ZA_Frei_200x200.jpg", "counter" => "3"],
              ["product_id" => "4", "path" => "Products/1/4/carousel/48530_04_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/4/carousel/preview/48530_04_ZA_Frei_200x200.jpg", "counter" => "4"],
              ["product_id" => "4", "path" => "Products/1/4/carousel/48530_15_Milieu_600x600.jpg", "preview_path" => "Products/1/4/carousel/preview/48530_15_Milieu_200x200.jpg", "counter" => "5"],

              ["product_id" => "5", "path" => "Products/1/5/carousel/48532_01_HA_Frei_600x600.jpg", "preview_path" => "Products/1/5/carousel/preview/48532_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "5", "path" => "Products/1/5/carousel/48532_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/5/carousel/preview/48532_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "5", "path" => "Products/1/5/carousel/48532_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/5/carousel/preview/48532_03_ZA_Frei_200x200.jpg", "counter" => "3"],
              ["product_id" => "5", "path" => "Products/1/5/carousel/48532_04_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/5/carousel/preview/48532_04_ZA_Frei_200x200.jpg", "counter" => "4"],
              ["product_id" => "5", "path" => "Products/1/5/carousel/48532_05_ZA_Frei_600x600.jpg", "preview_path" => "Products/1/5/carousel/preview/48532_05_ZA_Frei_200x200.jpg", "counter" => "5"],
              ["product_id" => "5", "path" => "Products/1/5/carousel/48532_17_Milieu_600x600.jpg", "preview_path" => "Products/1/5/carousel/preview/48532_17_Milieu_200x200.jpg", "counter" => "6"],

              ["product_id" => "6", "path" => "Products/1/6/carousel/47081_01_HA_Frei_1334x2048_600x600.jpg", "preview_path" => "Products/1/6/carousel/preview/47081_01_HA_Frei_1334x20480GFQOb484vw3d_200x200.jpg", "counter" => "1"],
              ["product_id" => "6", "path" => "Products/1/6/carousel/47081_02_ZA_Frei_1273x2048xJ60VcnzpX2he_600x600.jpg", "preview_path" => "Products/1/6/carousel/preview/47081_02_ZA_Frei_1273x2048xJ60VcnzpX2he_200x200.jpg", "counter" => "2"],
              ["product_id" => "6", "path" => "Products/1/6/carousel/47081_03_ZA_Frei_1437x2048xuoPtCYyfR502_600x600.jpg", "preview_path" => "Products/1/6/carousel/preview/47081_03_ZA_Frei_1437x2048xuoPtCYyfR502_200x200.jpg", "counter" => "3"],
              ["product_id" => "6", "path" => "Products/1/6/carousel/47081_04_ZA_Frei_1299x20481QVWNEiTj900b_600x600.jpg", "preview_path" => "Products/1/6/carousel/preview/47081_04_ZA_Frei_1299x20481QVWNEiTj900b_200x200.jpg", "counter" => "4"],
              ["product_id" => "6", "path" => "Products/1/6/carousel/47081_05_ZA_Frei_1593x2048_600x600.jpg", "preview_path" => "Products/1/6/carousel/preview/47081_05_ZA_Frei_1593x2048N7Q4ZUMNBo6Qw_200x200.jpg", "counter" => "5"],
              ["product_id" => "6", "path" => "Products/1/6/carousel/47081_06_ZA_Frei_1501x2048Vp2CGzwDDIsrk_600x600.jpg", "preview_path" => "Products/1/6/carousel/preview/47081_06_ZA_Frei_1501x2048Vp2CGzwDDIsrk_200x200.jpg", "counter" => "6"],
              ["product_id" => "6", "path" => "Products/1/6/carousel/47080_07_47081_Milieu_1379x2048_600x600.jpg", "preview_path" => "Products/1/6/carousel/preview/47080_07_47081_Milieu_1379x2048_200x200.jpg", "counter" => "7"],
              ["product_id" => "6", "path" => "Products/1/6/carousel/47080_08_47081_Milieu_2048x1377zafEA6jSs6okn_600x600.jpg", "preview_path" => "Products/1/6/carousel/preview/47080_08_47081_Milieu_2048x1377zafEA6jSs6okn_200x200.jpg", "counter" => "8"],

              ["product_id" => "7", "path" => "Products/1/7/carousel/47086_01_HA_Frei_1272x2048iIAFyKmqokTBn_600x600.jpg", "preview_path" => "Products/1/7/carousel/preview/47086_01_HA_Frei_1272x2048iIAFyKmqokTBn_200x200.jpg", "counter" => "1"],
              ["product_id" => "7", "path" => "Products/1/7/carousel/47086_02_ZA_Frei_1253x2048_600x600.jpg", "preview_path" => "Products/1/7/carousel/preview/47086_02_ZA_Frei_1253x2048_200x200.jpg", "counter" => "2"],
              ["product_id" => "7", "path" => "Products/1/7/carousel/47086_03_ZA_Frei_1124x2048_600x600.jpg", "preview_path" => "Products/1/7/carousel/preview/47086_03_ZA_Frei_1124x2048_200x200.jpg", "counter" => "3"],
              ["product_id" => "7", "path" => "Products/1/7/carousel/47086_04_ZA_Frei_1372x2048_600x600.jpg", "preview_path" => "Products/1/7/carousel/preview/47086_04_ZA_Frei_1372x2048_200x200.jpg", "counter" => "4"],

              ["product_id" => "8", "path" => "Products/1/8/carousel/48400_01_HA_Frei_2048x1393CNhxOKvwyYbLW_600x600.jpg", "preview_path" => "Products/1/8/carousel/preview/48400_01_HA_Frei_2048x1393CNhxOKvwyYbLW_200x200.jpg", "counter" => "1"],
              ["product_id" => "8", "path" => "Products/1/8/carousel/48400_02_ZA_Frei_2048x129241aLLn52GIYh7_600x600.jpg", "preview_path" => "Products/1/8/carousel/preview/48400_02_ZA_Frei_2048x129241aLLn52GIYh7_200x200.jpg", "counter" => "2"],
              ["product_id" => "8", "path" => "Products/1/8/carousel/48400_03_ZA_Frei_2048x1781u02Ke3RQaWQtg_600x600.jpg", "preview_path" => "Products/1/8/carousel/preview/48400_03_ZA_Frei_2048x1781u02Ke3RQaWQtg_200x200.jpg", "counter" => "3"],


              ["product_id" => "9", "path" => "Products/2/9/carousel/47634_01_HA_Frei_600x600.jpg", "preview_path" => "Products/2/9/carousel/preview/47634_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "9", "path" => "Products/2/9/carousel/47634_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/9/carousel/preview/47634_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "9", "path" => "Products/2/9/carousel/47634_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/9/carousel/preview/47634_03_ZA_Frei_200x200.jpg", "counter" => "3"],
              ["product_id" => "9", "path" => "Products/2/9/carousel/47634_04_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/9/carousel/preview/47634_04_ZA_Frei_200x200.jpg", "counter" => "4"],
              ["product_id" => "9", "path" => "Products/2/9/carousel/47634_unicorns4.jpg", "preview_path" => "Products/2/9/carousel/preview/47634_unicorns4.jpg", "counter" => "5"],

              ["product_id" => "10", "path" => "Products/2/10/carousel/47634_01_HA_Frei_600x600.jpg", "preview_path" => "Products/2/10/carousel/preview/47634_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "10", "path" => "Products/2/10/carousel/47634_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/10/carousel/preview/47634_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "10", "path" => "Products/2/10/carousel/47634_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/10/carousel/preview/47634_03_ZA_Frei_200x200.jpg", "counter" => "3"],
              ["product_id" => "10", "path" => "Products/2/10/carousel/47634_04_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/10/carousel/preview/47634_04_ZA_Frei_200x200.jpg", "counter" => "4"],
              ["product_id" => "10", "path" => "Products/2/10/carousel/47634_unicorns4.jpg", "preview_path" => "Products/2/10/carousel/preview/47634_unicorns4.jpg", "counter" => "5"],

              ["product_id" => "11", "path" => "Products/2/11/carousel/47630_01_HA_Frei_600x600.jpg", "preview_path" => "Products/2/11/carousel/preview/47630_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "11", "path" => "Products/2/11/carousel/47630_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/11/carousel/preview/47630_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "11", "path" => "Products/2/11/carousel/47630_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/11/carousel/preview/47630_03_ZA_Frei_200x200.jpg", "counter" => "3"],

              ["product_id" => "12", "path" => "Products/2/12/carousel/47631_01_HA_Frei_600x600.jpg", "preview_path" => "Products/2/12/carousel/preview/47631_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "12", "path" => "Products/2/12/carousel/47631_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/12/carousel/preview/47631_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "12", "path" => "Products/2/12/carousel/47631_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/12/carousel/preview/47631_03_ZA_Frei_200x200.jpg", "counter" => "3"],

              ["product_id" => "13", "path" => "Products/2/13/carousel/47636_01_HA_Frei_600x600.jpg", "preview_path" => "Products/2/13/carousel/preview/47636_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "13", "path" => "Products/2/13/carousel/47636_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/13/carousel/preview/47636_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "13", "path" => "Products/2/13/carousel/47636_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/13/carousel/preview/47636_03_ZA_Frei_200x200.jpg", "counter" => "3"],

              ["product_id" => "14", "path" => "Products/2/14/carousel/47652_01_HA_Frei_600x600.jpg", "preview_path" => "Products/2/14/carousel/preview/47652_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "14", "path" => "Products/2/14/carousel/47652_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/14/carousel/preview/47652_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "14", "path" => "Products/2/14/carousel/47652_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/14/carousel/preview/47652_03_ZA_Frei_200x200.jpg", "counter" => "3"],
              ["product_id" => "14", "path" => "Products/2/14/carousel/47652_04_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/14/carousel/preview/47652_04_ZA_Frei_200x200.jpg", "counter" => "4"],

              ["product_id" => "15", "path" => "Products/2/15/carousel/47653_01_HA_Frei_600x600.jpg", "preview_path" => "Products/2/15/carousel/preview/47653_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "15", "path" => "Products/2/15/carousel/47653_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/15/carousel/preview/47653_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "15", "path" => "Products/2/15/carousel/47653_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/15/carousel/preview/47653_03_ZA_Frei_200x200.jpg", "counter" => "3"],
              ["product_id" => "15", "path" => "Products/2/15/carousel/47653_04_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/15/carousel/preview/47653_04_ZA_Frei_200x200.jpg", "counter" => "4"],

              ["product_id" => "16", "path" => "Products/2/16/carousel/47648_01_HA_Frei_600x600.jpg", "preview_path" => "Products/2/16/carousel/preview/47648_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "16", "path" => "Products/2/16/carousel/47648_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/16/carousel/preview/47648_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "16", "path" => "Products/2/16/carousel/47648_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/16/carousel/preview/47648_03_ZA_Frei_200x200.jpg", "counter" => "3"],

              ["product_id" => "17", "path" => "Products/2/17/carousel/47649_01_HA_Frei_600x600.jpg", "preview_path" => "Products/2/17/carousel/preview/47649_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "17", "path" => "Products/2/17/carousel/47649_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/17/carousel/preview/47649_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "17", "path" => "Products/2/17/carousel/47649-217069-3.jpg", "preview_path" => "Products/2/17/carousel/preview/47649-217069-3.jpg", "counter" => "3"],

              ["product_id" => "18", "path" => "Products/2/18/carousel/47654_01_HA_Frei_600x600.jpg", "preview_path" => "Products/2/18/carousel/preview/47654_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "18", "path" => "Products/2/18/carousel/47654_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/18/carousel/preview/47654_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "18", "path" => "Products/2/18/carousel/47654_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/2/18/carousel/preview/47654_03_ZA_Frei_200x200.jpg", "counter" => "3"],


              ["product_id" => "19", "path" => "Products/3/19/carousel/47971_01_HA_Frei_600x600.jpg", "preview_path" => "Products/3/19/carousel/preview/47971_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "19", "path" => "Products/3/19/carousel/47971_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/3/19/carousel/preview/47971_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "19", "path" => "Products/3/19/carousel/47971_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/3/19/carousel/preview/47971_03_ZA_Frei_200x200.jpg", "counter" => "3"],
              ["product_id" => "19", "path" => "Products/3/19/carousel/47971_04_ZA_Frei_600x600.jpg", "preview_path" => "Products/3/19/carousel/preview/47971_04_ZA_Frei_200x200.jpg", "counter" => "4"],
              ["product_id" => "19", "path" => "Products/3/19/carousel/47959_47963_47967_47971_47974_47977_47979_Groessenvergleich_600x600.jpg", "preview_path" => "Products/3/19/carousel/preview/47959_47963_47967_47971_47974_47977_47979_Groessenvergleich_200x200.jpg", "counter" => "5"],
              ["product_id" => "19", "path" => "Products/3/19/carousel/47982_14_47971_47965_47968_47958_47965_Milieu_600x600.jpg", "preview_path" => "Products/3/19/carousel/preview/47982_14_47971_47965_47968_47958_47965_Milieu_200x200.jpg", "counter" => "6"],

              ["product_id" => "20", "path" => "Products/3/20/carousel/47982_01_HA_Frei_600x600.jpg", "preview_path" => "Products/3/20/carousel/preview/47982_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "20", "path" => "Products/3/20/carousel/47982_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/3/20/carousel/preview/47982_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "20", "path" => "Products/3/20/carousel/47982_04_ZA_Frei_600x600.jpg", "preview_path" => "Products/3/20/carousel/preview/47982_04_ZA_Frei_200x200.jpg", "counter" => "3"],
              ["product_id" => "20", "path" => "Products/3/20/carousel/47982_10_47962_47960_Milieu_600x600.jpg", "preview_path" => "Products/3/20/carousel/preview/47982_10_47962_47960_Milieu_200x200.jpg", "counter" => "4"],
              ["product_id" => "20", "path" => "Products/3/20/carousel/47982_14_47971_47965_47968_47958_47965_Milieu_600x600.jpg", "preview_path" => "Products/3/20/carousel/preview/47982_14_47971_47965_47968_47958_47965_Milieu_200x200.jpg", "counter" => "5"],
              ["product_id" => "20", "path" => "Products/3/20/carousel/47982_15_47958_47960_47961_47981_Milieu_600x600.jpg", "preview_path" => "Products/3/20/carousel/preview/47982_15_47958_47960_47961_47981_Milieu_200x200.jpg", "counter" => "6"],
              ["product_id" => "20", "path" => "Products/3/20/carousel/47982_17_47960_47961_47966_Milieu_600x600.jpg", "preview_path" => "Products/3/20/carousel/preview/47982_17_47960_47961_47966_Milieu_200x200.jpg", "counter" => "7"],
              ["product_id" => "20", "path" => "Products/3/20/carousel/47982_47961_Milieu_600x600.jpg", "preview_path" => "Products/3/20/carousel/preview/47982_47961_Milieu_200x200.jpg", "counter" => "8"],

              ["product_id" => "21", "path" => "Products/3/21/carousel/47950_01_HA_Frei_600x600.jpg", "preview_path" => "Products/3/21/carousel/preview/47950_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "21", "path" => "Products/3/21/carousel/47950_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/3/21/carousel/preview/47950_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "21", "path" => "Products/3/21/carousel/47950_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/3/21/carousel/preview/47950_03_ZA_Frei_200x200.jpg", "counter" => "3"],

              ["product_id" => "22", "path" => "Products/3/22/carousel/47954_01_HA_Frei_600x600.jpg", "preview_path" => "Products/3/22/carousel/preview/47954_01_HA_Frei_200x200.jpg", "counter" => "1"],
              ["product_id" => "22", "path" => "Products/3/22/carousel/47954_02_ZA_Frei_600x600.jpg", "preview_path" => "Products/3/22/carousel/preview/47954_02_ZA_Frei_200x200.jpg", "counter" => "2"],
              ["product_id" => "22", "path" => "Products/3/22/carousel/47954_03_ZA_Frei_600x600.jpg", "preview_path" => "Products/3/22/carousel/preview/47954_03_ZA_Frei_200x200.jpg", "counter" => "3"],
              ["product_id" => "22", "path" => "Products/3/22/carousel/47954_47981_47982_47964_47962_Milieu_600x600.jpg", "preview_path" => "Products/3/22/carousel/preview/47954_47981_47982_47964_47962_Milieu_200x200.jpg", "counter" => "4"],


              ["product_id" => "23", "path" => "Products/3/23/carousel/47968_01_HA_Frei_1741x2048eHLKfuUYAeRpI_600x600.jpg", "preview_path" => "Products/3/23/carousel/preview/47968_01_HA_Frei_1741x2048eHLKfuUYAeRpI_200x200.jpg", "counter" => "1"],
              ["product_id" => "23", "path" => "Products/3/23/carousel/47968_02_ZA_Frei_2048x1862gKjUoW77KekPf_600x600.jpg", "preview_path" => "Products/3/23/carousel/preview/47968_02_ZA_Frei_2048x1862gKjUoW77KekPf_200x200.jpg", "counter" => "2"],
              ["product_id" => "23", "path" => "Products/3/23/carousel/47968_03_ZA_Frei_1633x2048IeG4RTbhkqdJh_600x600.jpg", "preview_path" => "Products/3/23/carousel/preview/47968_03_ZA_Frei_1633x2048IeG4RTbhkqdJh_200x200.jpg", "counter" => "3"],
              ["product_id" => "23", "path" => "Products/3/23/carousel/47968_04_ZA_Frei_2048x1744eawujtzxeiHBe_600x600.jpg", "preview_path" => "Products/3/23/carousel/preview/47968_04_ZA_Frei_2048x1744eawujtzxeiHBe_200x200.jpg", "counter" => "4"],

              ["product_id" => "24", "path" => "Products/3/24/carousel/NICI47951_01_nilpferd-dj-nilbert-schluesselanhaenger_600x600.png", "preview_path" => "Products/3/24/carousel/preview/NICI47951_01_nilpferd-dj-nilbert-schluesselanhaenger_200x200.jpg", "counter" => "1"],
              ["product_id" => "24", "path" => "Products/3/24/carousel/NICI47951_02_nilpferd-dj-nilbert-schluesselanhaenger_600x600.png", "preview_path" => "Products/3/24/carousel/preview/NICI47951_02_nilpferd-dj-nilbert-schluesselanhaenger_200x200.jpg", "counter" => "2"],
              ["product_id" => "24", "path" => "Products/3/24/carousel/NICI47951_03_nilpferd-dj-nilbert-schluesselanhaenger_600x600.png", "preview_path" => "Products/3/24/carousel/preview/NICI47951_03_nilpferd-dj-nilbert-schluesselanhaenger_200x200.jpg", "counter" => "3"],

              ["product_id" => "25", "path" => "Products/3/25/carousel/NICI47955_01_nilpferd-dj-nilbert-magnici_600x600.jpg", "preview_path" => "Products/3/25/carousel/preview/NICI47955_01_nilpferd-dj-nilbert-magnici_200x200.jpg", "counter" => "1"],
              ["product_id" => "25", "path" => "Products/3/25/carousel/NICI47955_02_nilpferd-dj-nilbert-magnici_600x600.jpg", "preview_path" => "Products/3/25/carousel/preview/NICI47955_02_nilpferd-dj-nilbert-magnici_200x200.jpg", "counter" => "2"],
              ["product_id" => "25", "path" => "Products/3/25/carousel/NICI47955_03_nilpferd-dj-nilbert-magnici_600x600.jpg", "preview_path" => "Products/3/25/carousel/preview/NICI47955_03_nilpferd-dj-nilbert-magnici_200x200.jpg", "counter" => "3"],

              ["product_id" => "26", "path" => "Products/3/26/carousel/47983_01_HA_Frei_2048x1534_600x600.jpg", "preview_path" => "Products/3/26/carousel/preview/47983_01_HA_Frei_2048x1534_200x200.jpg", "counter" => "1"],
              ["product_id" => "26", "path" => "Products/3/26/carousel/47983_02_ZA_Frei_2048x1361_600x600.jpg", "preview_path" => "Products/3/26/carousel/preview/47983_02_ZA_Frei_2048x1361_200x200.jpg", "counter" => "2"],
              ["product_id" => "26", "path" => "Products/3/26/carousel/47983_03_ZA_Frei_1641x2048_600x600.jpg", "preview_path" => "Products/3/26/carousel/preview/47983_03_ZA_Frei_1641x2048_200x200.jpg", "counter" => "3"],
              ["product_id" => "26", "path" => "Products/3/26/carousel/47983_04_ZA_Frei_2046x2048_600x600.jpg", "preview_path" => "Products/3/26/carousel/preview/47983_04_ZA_Frei_2046x2048_200x200.jpg", "counter" => "4"],
              ["product_id" => "26", "path" => "Products/3/26/carousel/47983_05_ZA_Frei_1969x2048_600x600.jpg", "preview_path" => "Products/3/26/carousel/preview/47983_05_ZA_Frei_1969x2048_200x200.jpg", "counter" => "5"],
              ["product_id" => "26", "path" => "Products/3/26/carousel/47983_06_ZA_Frei_1554x2048_600x600.jpg", "preview_path" => "Products/3/26/carousel/preview/47983_06_ZA_Frei_1554x2048_200x200.jpg", "counter" => "6"],

              ["product_id" => "27", "path" => "Products/3/27/carousel/47981_01_HA_Frei_2048x13136WRt40KUoKVXv_600x600.jpg", "preview_path" => "Products/3/27/carousel/preview/47981_01_HA_Frei_2048x13136WRt40KUoKVXv_200x200.jpg", "counter" => "1"],
              ["product_id" => "27", "path" => "Products/3/27/carousel/47981_02_ZA_Frei_2048x1237_600x600.jpg", "preview_path" => "Products/3/27/carousel/preview/47981_02_ZA_Frei_2048x1237_200x200.jpg", "counter" => "2"],
              ["product_id" => "27", "path" => "Products/3/27/carousel/47982_15_47958_47960_47961_47981_Milieu_600x600.jpg", "preview_path" => "Products/3/27/carousel/preview/47982_15_47958_47960_47961_47981_Milieu_200x200.jpg", "counter" => "3"],

              ["product_id" => "", "path" => "", "preview_path" => "", "counter" => ""],

            ];
  
        foreach ($product_images as $key => $data) {
            ProductImages::create($data);
        }
    }
}
