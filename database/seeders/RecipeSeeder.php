<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            //menu 1
            [
                "user_id" => "3",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "1",
                "sub_category_1_id" => null,
                "sub_category_2_id" => null,
                "name" => "Ayam Goreng Ayam Bawang Putih",
                "description" => "Nikmati kelezatan Ayam Goreng Bawang Putih yang gurih dan aromatik. Potongan ayam direndam dalam campuran bumbu dan bawang putih cincang, kemudian digoreng hingga kecoklatan dan renyah di luar, sementara juicy di dalamnya. Sajikan sebagai hidangan utama atau camilan yang memuaskan untuk acara bersama keluarga dan teman-teman.",
                "duration" => "35",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 2
            [
                "user_id" => "4",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "2",
                "sub_category_1_id" => "5",
                "sub_category_2_id" => "8",
                "name" => "Rendang Daging Sapi ala Jawa",
                "description" => "Rendang Daging Sapi ala Jawa adalah sajian ikonik yang menggoda dengan kekayaan rempah-rempah dan kelezatan daging sapi yang lembut. Resep ini berasal dari tradisi kuliner Jawa yang kaya akan cita rasa dan aroma yang khas. Potongan daging sapi dipadukan dengan campuran rempah-rempah seperti ketumbar, kayu manis, cengkeh, dan serai, yang kemudian direndam dalam santan kelapa dan dimasak secara perlahan hingga bumbu meresap dan daging menjadi empuk. Rendang Daging Sapi ala Jawa ini disajikan dengan kuah gurih yang kental dan aroma rempah yang harum, membuatnya menjadi hidangan yang sangat dinantikan di setiap kesempatan khusus. Cocok disantap dengan nasi hangat atau lontong, Rendang Daging Sapi ala Jawa ini akan memanjakan lidah Anda dengan kenikmatan cita rasa yang autentik dan mendalam.",
                "duration" => "300",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 3
            [
                "user_id" => "5",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => "6",
                "sub_category_2_id" => null,
                "name" => "Cookies Ginger Pohon Natal",
                "description" => "Cookies Ginger Pohon Natal adalah kreasi spesial yang memadukan cita rasa klasik cookies jahe dengan suasana musim liburan. Dibentuk seperti pohon-pohon Natal, cookies ini memberikan kelezatan renyah dan wangi jahe yang sempurna untuk dinikmati bersama keluarga dan teman-teman selama musim liburan. Dihiasi dengan gula dan warna-warni, cookies ini cocok sebagai camilan atau hiasan meja yang menarik selama perayaan Natal.",
                "duration" => "30",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 4
            [
                "user_id" => "6",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => "5",
                "sub_category_2_id" => null,
                "name" => "Kue Kering Nastar",
                "description" => "Kue kering istimewa yang terdiri dari adonan renyah dan taburan selai nanas manis di atasnya. Setiap gigitannya membawa cita rasa yang menggugah selera, cocok dinikmati dalam momen kebersamaan bersama keluarga atau dijadikan sebagai hadiah spesial untuk orang tersayang.",
                "duration" => "30",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 5
            [
                "user_id" => "7",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "11",
                "name" => "Gudeg Ala Jogja",
                "description" => "Gudeg Ala Jogja adalah hidangan khas dari Yogyakarta yang memikat dengan paduan cita rasa manis, gurih, dan rempah yang khas. Resep ini menggabungkan potongan nangka muda yang dimasak dengan santan, gula merah, daun salam, dan rempah-rempah lainnya, yang kemudian diolah dengan proses memasak yang panjang hingga mencapai kelezatan yang sempurna. Gudeg biasanya disajikan bersama dengan nasi, ayam suwir, telur rebus, sambal goreng krecek, dan emping sebagai pelengkapnya. Hidangan ini tak hanya memanjakan lidah, tetapi juga menyuguhkan aroma yang menggoda dan memberikan pengalaman kuliner yang autentik dari kota pelajar. Gudeg Ala Jogja adalah pilihan yang tepat untuk merasakan kekayaan rasa dan tradisi kulinernya yang khas.",
                "duration" => "120",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 6
            [
                "user_id" => "8",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "4",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "9",
                "name" => "Combro",
                "description" => "Combro adalah camilan yang populer di Indonesia, terutama di daerah Jawa Barat. Camilan ini terkenal dengan rasa gurihnya yang menggoda dan teksturnya yang renyah di luar namun lembut di dalamnya. Dibuat dari campuran tepung terigu, potongan tahu, dan daun singkong, combro merupakan salah satu camilan tradisional yang sering disajikan di berbagai acara atau sebagai camilan sehari-hari.",
                "duration" => "20",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 7
            [
                "user_id" => "9",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => "5",
                "sub_category_2_id" => "9",
                "name" => "Dodol Garut",
                "description" => "Resep dodol Garut adalah sajian tradisional Indonesia yang terkenal dengan teksturnya yang kenyal dan rasa manis yang lezat. Dibuat dengan mencampurkan tepung ketan dengan gula merah dan santan, adonan kemudian direbus dan diaduk hingga mengental. Dodol kemudian dibentuk dan dilapisi dengan minyak goreng sebelum disajikan sebagai camilan manis yang khas dari Garut, Jawa Barat.",
                "duration" => "240",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 8
            [
                "user_id" => "10",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "9",
                "name" => "Nasi Liwet Kukus",
                "description" => "Nasi liwet kukus adalah hidangan nasi tradisional Indonesia yang dimasak dengan cara dikukus. Nasi ini biasanya dimasak bersama bumbu rempah-rempah seperti daun salam, daun pandan, serai, bawang merah, bawang putih, jahe, dan pete untuk memberikan cita rasa yang khas dan aromatik. Setelah matang, nasi liwet kukus memiliki tekstur yang lembut dan aromanya yang menggugah selera. Hidangan ini sering disajikan bersama dengan lauk-pauk atau sambal sebagai hidangan utama dalam berbagai acara atau perayaan di Indonesia.",
                "duration" => "75",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 9
            [
                "user_id" => "11",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "10",
                "name" => "Sate Padang",
                "description" => "Sate Padang adalah hidangan populer dari Sumatera Barat, Indonesia, yang terkenal dengan cita rasanya yang khas dan bumbu kacangnya yang lezat. Potongan daging sapi yang telah direndam dalam bumbu rempah-rempah khas Padang, seperti serai, daun jeruk, dan daun salam, kemudian ditusuk dan dipanggang hingga matang. Sate Padang sering disajikan dengan kuah kacang yang kental dan pedas, serta dicampur dengan irisan bawang merah dan kerupuk untuk memberikan tambahan tekstur dan cita rasa yang menggugah selera. Hidangan ini merupakan kombinasi yang sempurna antara daging yang lembut dan bumbu kacang yang kaya, menciptakan pengalaman makan yang memuaskan dan menggoda selera.",
                "duration" => "90",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 10
            [
                "user_id" => "12",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "1",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "8",
                "name" => "Kerak Telor",
                "description" => "Kerak telor adalah hidangan khas Betawi yang terkenal dengan cita rasanya yang unik dan teksturnya yang renyah. Terbuat dari campuran beras ketan, telur ayam, bawang merah, dan kelapa parut, hidangan ini memiliki aroma harum rempah-rempah dan bumbu yang menggugah selera. Setelah matang, kerak telor biasanya disajikan dengan taburan bawang goreng dan cabai rawit, memberikan tambahan rasa pedas dan gurih yang memanjakan lidah. Sebagai salah satu ikon kuliner Jakarta, kerak telor menjadi pilihan favorit untuk dinikmati sebagai camilan atau hidangan pendamping dalam acara-acara spesial atau festival kuliner.",
                "duration" => "60",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 11
            [
                "user_id" => "3",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => "5",
                "sub_category_2_id" => "13",
                "name" => "Es Pisang Ijo Khas Makassar",
                "description" => "Es Pisang Ijo adalah hidangan pencuci mulut yang populer di Indonesia, terutama di daerah Makassar, Sulawesi Selatan. Hidangan ini terdiri dari irisan pisang yang dibalut dengan adonan tepung berwarna hijau dari daun pisang, kemudian direbus, lalu disajikan dengan siraman santan dan sirup gula merah. Es Pisang Ijo memiliki rasa manis yang lezat, disertai dengan aroma segar dari daun pisang dan kelembutan tekstur pisang yang direbus. Hidangan ini sering menjadi favorit dalam berbagai acara atau sebagai camilan di siang hari yang menyegarkan.",
                "duration" => "120",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 12
            [
                "user_id" => "4",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "4",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "12",
                "name" => "Lumpia Khas Semarang",
                "description" => "Lumpia Semarang adalah hidangan khas dari Semarang, Jawa Tengah, yang terkenal dengan kulit lumpia yang tipis dan renyah serta isian yang beragam. Isian lumpia biasanya terdiri dari rebung, udang, daging ayam atau babi cincang, telur, dan sayuran seperti wortel dan buncis. Semua bahan ini dibungkus dengan kulit lumpia, kemudian digoreng hingga berwarna keemasan. Lumpia Semarang sering disajikan dengan sambal kacang atau saus lumpia untuk menambah cita rasa gurih dan pedas. Hidangan ini sering menjadi pilihan camilan atau menu utama di acara-acara keluarga atau pesta.",
                "duration" => "60",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 13
            [
                "user_id" => "5",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "10",
                "name" => "Ayam Pop",
                "description" => "Ayam Pop adalah hidangan ayam yang populer di Indonesia, terutama di daerah Padang, Sumatra Barat. Ayam Pop biasanya terbuat dari potongan ayam yang dimasak dengan cara dipanggang atau digoreng hingga kulitnya renyah dan berwarna kecokelatan, sementara dagingnya tetap lembut dan beraroma rempah-rempah khas Padang. Hidangan ini sering disajikan dengan nasi putih dan sambal untuk menambah cita rasa pedas dan nikmat. Ayam Pop merupakan salah satu hidangan yang paling disukai di restoran-restoran Padang dan menjadi favorit di kalangan pecinta kuliner Indonesia.",
                "duration" => "90",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 14
            [
                "user_id" => "6",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "4",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "11",
                "name" => "Brongkos",
                "description" => "Resep brongkos adalah hidangan tradisional dari Indonesia yang terdiri dari irisan daging sapi yang dipadu dengan berbagai bumbu rempah khas Indonesia seperti bawang merah, bawang putih, jahe, kemiri, dan serai. Daging sapi ini kemudian dimasak hingga empuk dalam santan kelapa yang kental, sehingga menghasilkan hidangan berkuah gurih dan lezat. Bongkros biasanya disajikan bersama dengan nasi hangat sebagai hidangan utama yang menyenangkan bagi selera Indonesia.",
                "duration" => "90",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 15
            [
                "user_id" => "7",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "12",
                "name" => "Mochi khas Semarang",
                "description" => "Mochi khas Semarang adalah camilan tradisional yang terbuat dari campuran tepung ketan, gula, dan air, yang kemudian diolah dan dibentuk menjadi bulatan kecil-kecil. Biasanya, mochi ini dilumuri dengan campuran kelapa parut dan gula merah yang memberikan cita rasa manis khas. Proses pembuatannya melibatkan tahapan memasak dan mengulen adonan, serta pembentukan bulatan-bulatan kecil sebelum dilumuri dengan campuran kelapa parut dan gula merah. Mochi khas Semarang ini sering dijadikan sebagai jajanan tradisional yang populer di kota Semarang dan sekitarnya.",
                "duration" => "30",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 16
            [
                "user_id" => "8",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "13",
                "name" => "Coto Makassar",
                "description" => "Coto Makassar adalah sejenis sup khas dari Makassar, Sulawesi Selatan, Indonesia. Resep ini menggunakan bahan utama seperti daging sapi yang direbus hingga empuk, kemudian dipotong kecil-kecil, serta bumbu rempah yang kaya seperti bawang merah, bawang putih, kemiri, dan ketumbar. Sup ini biasanya disajikan dengan nasi, emping, dan perkedel. Coto Makassar memiliki cita rasa yang kaya, gurih, dan beraroma harum berkat penggunaan bumbu rempah yang melimpah.",
                "duration" => "120",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 17
            [
                "user_id" => "9",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "8",
                "name" => "Gado-Gado",
                "description" => "Gado-gado adalah hidangan khas Indonesia yang terdiri dari berbagai macam sayuran segar yang direbus, lalu disajikan dengan saus kacang kental. Sayuran yang umumnya digunakan antara lain kentang, tahu, tempe, kangkung, tauge, dan kol. Hidangan ini biasanya disajikan dengan telur rebus, lontong, dan kerupuk sebagai pelengkap. Saus kacang yang kental dan gurih menjadi ciri khas utama gado-gado, yang memberikan rasa lezat pada kombinasi sayuran yang beragam. Gado-gado sering disajikan sebagai hidangan utama atau sebagai lauk pendamping nasi di Indonesia.",
                "duration" => "60",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 18
            [
                "user_id" => "10",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "1",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "10",
                "name" => "Lemang Tapai",
                "description" => "Lemang Tapai adalah hidangan tradisional Indonesia yang terbuat dari beras ketan yang dimasak bersama dengan tapai, sebuah bahan fermentasi yang terbuat dari beras atau ketan. Proses memasaknya dilakukan dalam bambu yang telah diisi dengan campuran ketan dan tapai, kemudian dipanggang di atas api arang atau kayu bakar. Lemang Tapai memiliki tekstur yang lembut dan aroma yang khas karena proses pemanggangan yang dilakukan dalam bambu. Hidangan ini sering disajikan pada acara-acara spesial atau festival di Indonesia.",
                "duration" => "240",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 19
            [
                "user_id" => "11",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "4",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "11",
                "name" => "Sambal Goreng Krecek",
                "description" => "Sambal Goreng Krecek adalah hidangan khas Indonesia yang terbuat dari krecek yang direbus dan digoreng bersama bumbu rempah yang kaya rasa. Krecek direbus hingga empuk, kemudian digoreng hingga garing. Setelah itu, krecek disajikan dengan sambal pedas yang khas dengan tambahan bumbu rempah yang menggugah selera. Hidangan ini sering disantap sebagai lauk pendamping nasi hangat atau nasi kuning.",
                "duration" => "60",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            // menu 20
            [
                "user_id" => "12",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "12",
                "name" => "Roti Gambang",
                "description" => "Roti Gambang adalah roti tradisional dari Indonesia yang terkenal dengan rasa manis dan aroma rempah-rempahnya yang khas. Roti ini memiliki tekstur lembut di bagian dalam dengan lapisan luar yang renyah. Biasanya, roti ini dibuat dengan menggunakan bahan-bahan seperti tepung terigu, gula, telur, mentega, dan rempah-rempah seperti kayu manis dan cengkeh. Proses pembuatannya melibatkan menguleni adonan, memberikan bentuk unik pada roti, dan kemudian memanggangnya dalam oven hingga matang dan berwarna keemasan. Roti Gambang sering disajikan sebagai camilan atau hidangan penutup yang lezat dan cocok dinikmati bersama secangkir teh atau kopi.",
                "duration" => "60",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 21
            [
                "user_id" => "3",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "1",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "13",
                "name" => "Kapurung",
                "description" => "Kapurung adalah makanan tradisional khas dari Sulawesi Selatan, Indonesia. Makanan ini terbuat dari sagu yang difermentasi dan dihidangkan dengan kuah santan ikan serta bumbu rempah-rempah. Proses pembuatannya melibatkan fermentasi tepung sagu yang kemudian direbus hingga matang.",
                "duration" => "60",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 22
            [
                "user_id" => "4",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "1",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "8",
                "name" => "Roti Buaya",
                "description" => "Roti Buaya adalah roti manis yang memiliki bentuk menyerupai buaya. Roti ini biasanya disajikan sebagai hidangan penutup atau camilan. Roti Buaya memiliki rasa yang lezat dan tekstur yang lembut.",
                "duration" => "60",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 23
            [
                "user_id" => "5",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => "7",
                "sub_category_2_id" => "14",
                "name" => "Kue Keranjang",
                "description" => "Kue Keranjang, juga dikenal sebagai kue Cina atau kue Cina tahun baru, adalah kue tradisional yang biasa disajikan saat perayaan Tahun Baru Imlek. Kue ini memiliki tekstur kenyal dan manis, dan sering dibuat dalam bentuk bulat atau kotak. Kue Keranjang memiliki rasa yang khas dan biasanya disajikan sebagai bagian dari tradisi menyambut Tahun Baru Imlek.",
                "duration" => "180",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 24
            [
                "user_id" => "6",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => "7",
                "sub_category_2_id" => "14",
                "name" => "Kue Bulan",
                "description" => "Kue Bulan adalah salah satu kue tradisional yang sering disajikan saat perayaan Festival Bulan, seperti perayaan Tiongkok, Vietnam, dan Korea. Kue ini memiliki bentuk bulat dan biasanya diisi dengan berbagai jenis pasta manis seperti kacang merah, kacang hijau, atau pasta biji lotus. Kulit kue Bulan dibuat dari campuran tepung beras dan air, kemudian diisi dan dikukus hingga matang.",
                "duration" => "200",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 25
            [
                "user_id" => "7",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => "6",
                "sub_category_2_id" => "15",
                "name" => "Klapertart Keju",
                "description" => "Klapertart Keju adalah sejenis kue tart yang terkenal dengan rasa lembutnya yang khas, disajikan dengan parutan kelapa muda dan keju sebagai topping. Kue ini memiliki tekstur yang lembut dan aroma yang menggugah selera.",
                "duration" => "30",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 26
            [
                "user_id" => "8",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "9",
                "name" => "Es Loder",
                "description" => "Es Loder adalah minuman segar yang berasal dari Sulawesi Selatan, Indonesia. Minuman ini terbuat dari campuran berbagai bahan seperti santan, gula merah, dan agar-agar. Es Loder memiliki rasa manis dengan aroma santan yang khas, dan sering disajikan dalam keadaan dingin dengan potongan es batu. Rasanya yang unik dan menyegarkan menjadikan Es Loder favorit banyak orang terutama saat cuaca panas.",
                "duration" => "60",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 27
            [
                "user_id" => "9",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "10",
                "name" => "Galamai",
                "description" => "Galamai adalah makanan tradisional dari Indonesia, terutama populer di daerah Sulawesi Selatan. Galamai terbuat dari bahan dasar ketan yang direbus, kemudian ditambahkan dengan santan dan gula merah untuk memberikan cita rasa manis khas. Hidangan ini biasanya disajikan sebagai cemilan atau hidangan penutup.",
                "duration" => "180",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 28
            [
                "user_id" => "10",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "11",
                "name" => "Klepon Ketan",
                "description" => "Klepon Ketan adalah makanan khas Indonesia yang terkenal dengan rasa manisnya dan taburan kelapa parut. Klepon terbuat dari adonan ketan yang dibentuk bulat dan diisi dengan gula merah cair. Kemudian klepon direbus dan digulingkan dalam kelapa parut. Hidangan ini sering disajikan sebagai camilan tradisional yang lezat dan menyegarkan.",
                "duration" => "30",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 29
            [
                "user_id" => "11",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "12",
                "name" => "Es Gempol Pleret",
                "description" => "Es Gempol Pleret adalah minuman tradisional Jawa yang menyegarkan, terbuat dari campuran gempol (potongan singkong) dan pleret (ketan hitam) yang disajikan dengan gula merah cair dan es serut.",
                "duration" => "30",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 30
            [
                "user_id" => "12",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "3",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "13",
                "name" => "Es Pallu Butung",
                "description" => "Es Pallu Butung adalah minuman tradisional khas dari Sulawesi Selatan, Indonesia. Minuman ini terbuat dari campuran bahan-bahan seperti pisang raja, kacang hijau, kelapa parut, dan gula merah yang dibungkus dengan daun pisang kemudian dikukus. Es Pallu Butung memiliki cita rasa manis dan segar, cocok dinikmati sebagai hidangan penutup atau camilan saat cuaca panas.",
                "duration" => "30",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 31
            [
                "user_id" => "3",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "2",
                "sub_category_1_id" => "7",
                "sub_category_2_id" => "14",
                "name" => "Ayam Kodok",
                "description" => "Ayam Kodok adalah hidangan khas Indonesia yang terbuat dari ayam yang dibumbui dengan rempah-rempah, kemudian digoreng hingga kecokelatan. Hidangan ini memiliki cita rasa yang gurih dan renyah di luar, namun lembut di dalam.",
                "duration" => "120",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 32
            [
                "user_id" => "4",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "4",
                "sub_category_1_id" => "5",
                "sub_category_2_id" => "16",
                "name" => "Telur Kuah Santan",
                "description" => "Telur Kuah Santan adalah hidangan khas Indonesia yang terdiri dari telur rebus yang disajikan dengan kuah santan kental yang gurih dan bumbu rempah yang lezat. Hidangan ini sering disajikan sebagai menu utama atau lauk tambahan saat makan bersama nasi.",
                "duration" => "60",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 33
            [
                "user_id" => "5",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "8",
                "name" => "Bubur Ayam Betawi",
                "description" => "Bubur Ayam Betawi adalah hidangan bubur khas Betawi yang terkenal dengan cita rasa gurih dan lezatnya. Bubur ini terbuat dari beras yang dimasak hingga menjadi bubur, disajikan dengan potongan ayam, telur, bawang goreng, dan bumbu khas. Bubur Ayam Betawi biasanya disantap sebagai sarapan atau camilan yang mengenyangkan.",
                "duration" => "60",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 34
            [
                "user_id" => "6",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "4",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "8",
                "name" => "Keripik Bayam",
                "description" => "Keripik Bayam adalah camilan renyah yang terbuat dari irisan tipis bayam yang dipanggang atau digoreng hingga kering. Camilan ini memiliki rasa gurih dan renyah yang disukai banyak orang. Dengan sedikit minyak dan bumbu, Anda dapat membuat camilan yang lezat dan bergizi ini di rumah.",
                "duration" => "15",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 35
            [
                "user_id" => "7",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "9",
                "name" => "Nasi Tutug Oncom",
                "description" => "Nasi Tutug Oncom adalah hidangan nasi yang dicampur dengan oncom yang telah dihaluskan dan bumbu rempah khas Indonesia. Oncom merupakan hasil fermentasi biji-bijian, seringkali kedelai, dan merupakan makanan tradisional Indonesia yang kaya akan protein. Hidangan ini memiliki cita rasa gurih dan harum rempah yang khas.",
                "duration" => "30",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 36
            [
                "user_id" => "8",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "4",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "12",
                "name" => "Sayur Lodeh",
                "description" => "Sayur Lodeh adalah hidangan tradisional Indonesia yang terkenal dengan kuah santannya yang gurih dan kaya rempah. Biasanya, sayur-sayuran seperti kacang panjang, wortel, terong, dan tahu dimasak dalam kuah santan yang lezat. Hidangan ini sering disajikan sebagai pelengkap nasi putih hangat.",
                "duration" => "30",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 37
            [
                "user_id" => "9",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "10",
                "name" => "Cumi Saus Padang",
                "description" => "Cumi Saus Padang adalah hidangan lezat yang terdiri dari cumi-cumi yang dimasak dengan saus khas Padang yang kaya rasa dan rempah. Hidangan ini memiliki cita rasa gurih, pedas, dan sedikit manis yang menggugah selera. Cumi yang digunakan biasanya dipotong-potong dan dimasak bersama saus Padang yang kental dan bumbu rempah yang harum.",
                "duration" => "60",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 38
            [
                "user_id" => "10",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "1",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "9",
                "name" => "Cuanki Sehat",
                "description" => "Cuanki Sehat adalah hidangan sehat yang terbuat dari campuran bahan-bahan segar seperti sayuran, daging, dan bumbu-bumbu rempah. Hidangan ini kaya akan nutrisi dan memiliki rasa yang lezat, cocok untuk dinikmati sebagai camilan atau hidangan utama.",
                "duration" => "30",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 39
            [
                "user_id" => "11",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "4",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "10",
                "name" => "Mie Celor Vegan",
                "description" => "Mie Celor adalah hidangan mie khas Palembang yang disajikan dengan kuah kental khasnya. Namun, dalam versi vegan, hidangan ini menggantikan bahan-bahan hewani dengan bahan-bahan nabati yang lezat dan bergizi. Kuahnya tetap kaya rasa dan gurih, membuatnya cocok untuk dinikmati oleh vegetarian dan vegan.",
                "duration" => "30",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
            //menu 40
            [
                "user_id" => "12",
                "admin_id" => null,
                "ahli_gizi_id" => null,
                "category_id" => "2",
                "sub_category_1_id" => null,
                "sub_category_2_id" => "8",
                "name" => "Semur Daging",
                "description" => "Roti Gambang adalah roti tradisional dari Indonesia yang terkenal dengan rasa manis dan aroma rempah-rempahnya yang khas. Roti ini memiliki tekstur lembut di bagian dalam dengan lapisan luar yang renyah. Biasanya, roti ini dibuat dengan menggunakan bahan-bahan seperti tepung terigu, gula, telur, mentega, dan rempah-rempah seperti kayu manis dan cengkeh. Proses pembuatannya melibatkan menguleni adonan, memberikan bentuk unik pada roti, dan kemudian memanggangnya dalam oven hingga matang dan berwarna keemasan. Roti Gambang sering disajikan sebagai camilan atau hidangan penutup yang lezat dan cocok dinikmati bersama secangkir teh atau kopi.",
                "duration" => "90",
                "img" => "recipes/default_recipe_img.png",
                "vid" => null,
                "is_verified_by_admin" => "1",
                "is_verified_by_ahli_gizi" => "1",
                "type" => "public"
            ],
        ]);
    }
}
