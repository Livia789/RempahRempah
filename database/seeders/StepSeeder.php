<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('steps')->insert([
            //menu 1
            [
                'step_header_id' => '1',
                'step_desc' => 'Di dalam sebuah wadah datar, campurkan bubuk bawang putih, merica, garam, paprika, tepung roti, dan tepung terigu. Di wadah lain, aduk susu dan telur.',
                'step_img' => null
            ],
            [
                'step_header_id' => '1',
                'step_desc' => 'Panaskan minyak dalam skillet listrik pada suhu 350 derajat Fahrenheit (175 derajat Celsius). Celupkan potongan ayam ke dalam campuran telur dan susu, lalu gulingkan dalam campuran kering hingga terbalut rata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '1',
                'step_desc' => 'Goreng potongan ayam dalam minyak panas selama sekitar 5 menit di setiap sisi, atau sampai ayam matang dan jusnya jernih. Angkat dari minyak dengan menggunakan spatula berlubang, dan siap disajikan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '1',
                'step_desc' => 'Panaskan minyak dalam skillet listrik pada suhu 350 derajat Fahrenheit (175 derajat Celsius). Celupkan potongan ayam ke dalam campuran telur dan susu, lalu gulingkan dalam campuran kering hingga terbalut rata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '1',
                'step_desc' => 'Di dalam sebuah wadah datar, campurkan bubuk bawang putih, merica, garam, paprika, tepung roti, dan tepung terigu. Di wadah lain, aduk susu dan telur.',
                'step_img' => null
            ],
            // menu 2
            [
                'step_header_id' => '2',
                'step_desc' => 'Potong daging sapi menjadi irisan tipis dan persiapkan bumbu halus serta bumbu lainnya. Panaskan wajan dan tumis bumbu halus sampai harum, kemudian tambahkan bumbu lainnya. Setelah itu, masukkan irisan daging dan aduk rata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '2',
                'step_desc' => 'Tuangkan santan ke dalam wajan, tambahkan garam, dan kaldu bubuk rasa sapi. Tutup panci, biarkan bumbu meresap dan cairan menyusut hingga matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '2',
                'step_desc' => 'Setelah matang, Rendang Daging dengan bumbu Jawa siap disajikan bersama nasi hangat.',
                'step_img' => null
            ],
            // menu 3
            [
                'step_header_id' => '3',
                'step_desc' => 'Kocok margarin, telur, dan kuning telur dengan mixer sampai mengembang menjadi adonan yang ringan dan lembut. Setelah itu, sisihkan adonan tersebut.',
                'step_img' => null
            ],
            [
                'step_header_id' => '3',
                'step_desc' => 'Selanjutnya, dalam langkah pertama memasak Cookies Ginger Pohon Natal, campurkan Kobe Tepung Pisang Goreng Crispy, Kobe Breadcrumbs, dan gula halus ke dalam adonan yang telah disiapkan. Tambahkan jahe bubuk dan baking powder, kemudian aduk hingga merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '3',
                'step_desc' => 'Siapkan loyang dan cetakan berbentuk pohon Natal. Bentuk adonan sesuai dengan cetakan tersebut dan panggang hingga matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '3',
                'step_desc' => 'Setelah cookies dingin, langkah selanjutnya adalah mencampurkan mentega, gula halus, dan pewarna makanan hijau. Masukkan campuran tersebut ke dalam plastik segitiga untuk memudahkan penghiasan. Hiasi cookies dengan cream yang telah disiapkan dan taburkan hiasan warna-warni untuk menambahkan sentuhan kreatif.',
                'step_img' => null
            ],
            [
                'step_header_id' => '3',
                'step_desc' => 'Akhirnya, letakkan cookies dalam toples dan sajikan sebagai hidangan yang menarik dan lezat untuk dinikmati bersama keluarga dan teman-teman.',
                'step_img' => null
            ],
            //menu 4
            [
                'step_header_id' => '4',
                'step_desc' => 'Siapkan wadah untuk mencampur mentega, margarin, gula halus, dan kuning telur. Aduk atau haluskan campuran tersebut hingga merata. Pastikan untuk menggunakan mixer dengan kecepatan rendah agar adonan tidak menjadi terlalu lembek.',
                'step_img' => null
            ],
            [
                'step_header_id' => '4',
                'step_desc' => 'Tambahkan tepung terigu, tepung maizena, dan susu bubuk ke dalam campuran tersebut. Aduk kembali hingga adonan menjadi kalis dan tercampur dengan baik.',
                'step_img' => null
            ],
            [
                'step_header_id' => '4',
                'step_desc' => 'Ambil sedikit adonan dan bentuk menjadi bulatan kecil. Isi setiap bulatan dengan selai nanas yang telah disiapkan sebelumnya. Ulangi proses ini sampai seluruh adonan habis.',
                'step_img' => null
            ],
            [
                'step_header_id' => '4',
                'step_desc' => 'Siapkan loyang yang sudah diolesi dengan mentega agar kue tidak lengket saat diangkat. Letakkan bulatan adonan di atas loyang dan oleskan permukaannya dengan kuning telur.',
                'step_img' => null
            ],
            [
                'step_header_id' => '4',
                'step_desc' => 'Panggang kue dalam oven dengan suhu yang rendah. Tunggu hingga kue matang sempurna. Setelah itu, angkat dan siap disajikan untuk dinikmati.',
                'step_img' => null
            ],
            // menu 5
            [
                'step_header_id' => '5',
                'step_desc' => 'Potong nangka muda menjadi dadu besar. Rebus nangka muda dalam air atau air kelapa tua secukupnya hingga empuk. Setelah itu, angkat dan tiriskan nangka muda.',
                'step_img' => null
            ],
            [
                'step_header_id' => '5',
                'step_desc' => 'Untuk membuat bumbu halus, haluskan semua bahan bumbu menggunakan blender atau ulekan hingga mencapai konsistensi yang halus.',
                'step_img' => null
            ],
            [
                'step_header_id' => '5',
                'step_desc' => 'Selanjutnya, masukkan potongan nangka muda dan telur ke dalam panci. Tuangkan santan, tambahkan bumbu halus, daun salam, daun jeruk, lengkuas, dan gula merah ke dalam panci yang sama.',
                'step_img' => null
            ],
            [
                'step_header_id' => '5',
                'step_desc' => 'Masak dengan api sedang hingga bumbu meresap dan kuahnya mengental.',
                'step_img' => null
            ],
            [
                'step_header_id' => '5',
                'step_desc' => 'Kemudian, tuangkan santan kental ke dalam panci dan masak dengan api hingga kuah benar-benar mengental. Setelah itu, matikan api.',
                'step_img' => null
            ],
            [
                'step_header_id' => '5',
                'step_desc' => 'Sajikan gudeg dengan pelengkapnya seperti sambal goreng krecek, opor ayam, dan sambal bajak.',
                'step_img' => null
            ],
            // menu 6
            [
                'step_header_id' => '6',
                'step_desc' => 'Parutlah kelapa dan singkong hingga halus menggunakan parutan atau alat penggilingan makanan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '6',
                'step_desc' => 'Haluskan bumbu-bumbu untuk adonan dengan cara ditumbuk atau diulek hingga halus. Setelah itu, campurkan bumbu-bumbu tersebut dengan adonan singkong dan kelapa. Pastikan untuk mengaduk dengan baik sehingga semua bahan tercampur merata. Kamu bisa menggunakan tangan untuk mengaduknya agar lebih mudah dan merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '6',
                'step_desc' => 'Siapkan bumbu untuk isian dengan cara mengulek atau menumbuknya hingga halus, lalu campurkan dengan oncom yang sudah dipotong kecil-kecil. Pastikan bumbu tercampur merata dengan oncom.',
                'step_img' => null
            ],
            [
                'step_header_id' => '6',
                'step_desc' => 'Panaskan wajan dan tumis adonan oncom hingga matang dengan api sedang. Tambahkan penyedap rasa sesuai selera untuk memberi cita rasa yang lezat pada isian.',
                'step_img' => null
            ],
            [
                'step_header_id' => '6',
                'step_desc' => 'Goreng potongan ayam dalam minyak panas selama sekitar 5 menit di setiap sisi, atau sampai ayam matang dan jusnya jernih. Angkat dari minyak dengan menggunakan spatula berlubang, dan siap disajikan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '6',
                'step_desc' => 'Bentuklah adonan singkong dan kelapa menjadi bulatan-bulatan kecil, lalu beri isian oncom di tengahnya.',
                'step_img' => null
            ],
            [
                'step_header_id' => '6',
                'step_desc' => 'Sajikan combro hangat sebagai camilan lezat untuk dinikmati bersama keluarga dan teman-teman.',
                'step_img' => null
            ],
            // menu 7
            [
                'step_header_id' => '7',
                'step_desc' => 'Gabungkan tepung ketan dengan potongan gula merah untuk membuat adonan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '7',
                'step_desc' => 'Tambahkan santan cair dan garam secukupnya ke dalam campuran tepung ketan dan gula merah.',
                'step_img' => null
            ],
            [
                'step_header_id' => '7',
                'step_desc' => 'Panaskan campuran ini sambil diaduk secara terus-menerus.',
                'step_img' => null
            ],
            [
                'step_header_id' => '7',
                'step_desc' => 'Setelah campuran mendidih, tambahkan santan kental dan gula pasir, lalu terus masak dan aduk adonan selama 4 jam hingga mengental.',
                'step_img' => null
            ],
            [
                'step_header_id' => '7',
                'step_desc' => 'Setelah adonan mencapai konsistensi yang diinginkan, tuangkan adonan ke dalam baskom yang telah dilapisi dengan kertas minyak untuk mencegah lengket.',
                'step_img' => null
            ],
            [
                'step_header_id' => '7',
                'step_desc' => 'Gulungkan adonan dengan minyak goreng secara merata untuk memberikan lapisan tipis agar tidak lengket.',
                'step_img' => null
            ],
            [
                'step_header_id' => '7',
                'step_desc' => 'Setelah dingin dan mengeras, dodol Garut siap disajikan sebagai camilan tradisional yang lezat dan manis.',
                'step_img' => null
            ],
            // menu 8
            [
                'step_header_id' => '8',
                'step_desc' => 'Bersihkan beras dengan mencucinya hingga airnya bening, kemudian tiriskan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '8',
                'step_desc' => 'Potong-potong bawang merah, bawang putih, dan jahe menjadi irisan tipis.',
                'step_img' => null
            ],
            [
                'step_header_id' => '8',
                'step_desc' => 'Panaskan minyak dalam wajan, lalu tumis irisan jahe hingga harum, tambahkan irisan bawang merah dan bawang putih ke dalam wajan yang sudah panas.',
                'step_img' => null
            ],
            [
                'step_header_id' => '8',
                'step_desc' => 'Setelah itu, tambahkan serai, daun salam, dan daun jeruk ke dalam tumisan bumbu, lalu aduk hingga aromanya menyebar. Jangan lupa untuk menambahkan potongan pete. Pastikan agar tidak terlalu kering.',
                'step_img' => null
            ],
            [
                'step_header_id' => '8',
                'step_desc' => 'Tuangkan air sebanyak 1,2 liter ke dalam tumisan bumbu, tambahkan daun pandan, dan biarkan hingga mendidih.',
                'step_img' => null
            ],
            [
                'step_header_id' => '8',
                'step_desc' => 'Setelah air mendidih, tambahkan garam dan totole (bumbu kaldu jamur), lalu aduk rata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '8',
                'step_desc' => 'Masukkan santan instan ke dalam campuran air dan bumbu, lalu aduk hingga merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '8',
                'step_desc' => 'Tambahkan beras yang telah dicuci bersih ke dalam campuran santan dan bumbu, aduk secara perlahan agar beras tidak pecah. Pastikan untuk tetap mengaduk agar bagian bawah tidak gosong.',
                'step_img' => null
            ],
            [
                'step_header_id' => '8',
                'step_desc' => 'Biarkan airnya menyusut tanpa mengering sepenuhnya.',
                'step_img' => null
            ],
            [
                'step_header_id' => '8',
                'step_desc' => 'Setelah air menyusut, biarkan beras dingin terutama di bagian tengah dengan cara memisahkan beras ke kanan dan kiri panci.',
                'step_img' => null
            ],
            [
                'step_header_id' => '8',
                'step_desc' => 'Setelah beras dingin, tambahkan teri Medan yang telah digoreng ke dalam beras, lalu aduk hingga merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '8',
                'step_desc' => 'Siapkan dandang kukus yang sudah dilapisi dengan daun pisang. Masukkan beras dan tambahkan cabai lombok galak di atasnya.',
                'step_img' => null
            ],
            [
                'step_header_id' => '8',
                'step_desc' => 'Kukus beras selama 45 menit, kemudian angkat dan hidangkan.',
                'step_img' => null
            ],
            // menu 9
            [
                'step_header_id' => '9',
                'step_desc' => 'Rebus daging hingga benar-benar matang dan empuk. Setelah matang, angkat daging dari air rebusan dan sisihkan untuk digunakan nanti.',
                'step_img' => null
            ],
            [
                'step_header_id' => '9',
                'step_desc' => 'Untuk membuat bumbu sate Padang, panaskan minyak dalam wajan dan tumis bumbu halus hingga aromanya harum. Tambahkan serai dan daun jeruk ke dalam tumisan, lalu aduk rata. Serta bubuk kari dan asam kandis, lalu aduk kembali. Setelah itu, bagi tumisan bumbu halus menjadi dua bagian yang sama.',
                'step_img' => null
            ],
            [
                'step_header_id' => '9',
                'step_desc' => 'Selanjutnya, masukkan salah satu bagian bumbu halus ke dalam kaldu daging yang telah direbus, dan masak di atas api sedang hingga mendidih. Setelah mendidih, angkat dari kompor.',
                'step_img' => null
            ],
            [
                'step_header_id' => '9',
                'step_desc' => 'Siapkan tusuk sate dengan cara menusukkan daging yang telah direbus ke dalam tusuk sate sebanyak 4-5 potongan daging per tusuk. Siapkan tusukan yang telah dipersiapkan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '9',
                'step_desc' => 'Panaskan kembali air sisa dari merebus daging bersama dengan sisa bumbu tumisan. Tambahkan Royco Kaldu Sapi, tepung beras, dan tepung tapioka, kemudian aduk hingga mengental. Setelah mengental, angkat dari kompor.',
                'step_img' => null
            ],
            [
                'step_header_id' => '9',
                'step_desc' => 'Panggang sate di atas grill pan hingga permukaannya kecokelatan dan tercium aroma harum. Setelah matang, angkat sate dari panggangan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '9',
                'step_desc' => 'Sate Padang siap dinikmati dengan cara menyiramkan kuah sate di atas sate. Sajikan sate Padang hangat bersama dengan ketupat atau nasi, dan tambahkan bawang goreng sebagai pelengkap.',
                'step_img' => null
            ],
            // menu 10
            [
                'step_header_id' => '10',
                'step_desc' => 'Rendam beras ketan semalaman, kemudian bersihkan dengan mencucinya pada pagi hari dan tiriskan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '10',
                'step_desc' => 'Sangrai udang rebon hingga kering, lalu haluskan menjadi bubuk.',
                'step_img' => null
            ],
            [
                'step_header_id' => '10',
                'step_desc' => 'Kerak telor khas Betawi memiliki beberapa tahapan dalam proses memasaknya, seperti yang terlihat pada langkah pertama dalam gambar.',
                'step_img' => null
            ],
            [
                'step_header_id' => '10',
                'step_desc' => 'Langkah berikutnya adalah menumbuk bumbu halus dan menumisnya hingga harum. Setelah itu, campurkan dengan telur, wortel parut, udang rebon halus, dan serundeng kelapa.',
                'step_img' => null
            ],
            [
                'step_header_id' => '10',
                'step_desc' => 'Proses selanjutnya dapat dilihat pada langkah kedua dalam gambar, di mana adonan bumbu dan telur yang telah disiapkan dituangkan dan ditutup dengan lapisan beras ketan yang telah diratakan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '10',
                'step_desc' => 'Setelah ditutup, adonan kerak telor dimasak hingga permukaannya kering dan sedikit gosong seperti yang terlihat pada langkah ketiga dalam gambar.',
                'step_img' => null
            ],
            [
                'step_header_id' => '10',
                'step_desc' => 'Terakhir, baliklah kerak telor dalam wajan untuk memastikan permukaannya benar-benar kering, dan kemudian sajikan dengan taburan serundeng kelapa.',
                'step_img' => null
            ],
            // menu 11
            [
                'step_header_id' => '11',
                'step_desc' => 'Pisang dikukus bersama kulitnya selama 15 menit, kemudian didinginkan. Campurkan tepung terigu, tepung beras, gula, garam, santan, air, dan pasta pandan hingga merata untuk membuat adonan kulit.',
                'step_img' => null
            ],
            [
                'step_header_id' => '11',
                'step_desc' => 'Saring adonan kulit untuk memisahkan dari gerindil, kemudian masak dengan api kecil hingga matang. Selama proses memasak, adonan perlu diaduk secara terus menerus hingga matang sempurna.',
                'step_img' => null
            ],
            [
                'step_header_id' => '11',
                'step_desc' => 'Plastik diolesi dengan minyak, lalu ambil adonan kulit dan pipihkan. Satu buah pisang diletakkan di atas adonan kulit, kemudian semua permukaan pisang ditutupi dengan adonan kulit. Setelah itu, kukus dengan api sedang selama 20 menit atau hingga matang. Jika khawatir akan menempel, pisang ijo bisa dibungkus dengan daun pisang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '11',
                'step_desc' => 'Semua bahan untuk bubur sumsum dimasukkan ke dalam panci dan dimasak dengan api kecil hingga matang dan mengental. Selama proses memasak, adonan perlu terus diaduk untuk mendapatkan tekstur yang sesuai.',
                'step_img' => null
            ],
            [
                'step_header_id' => '11',
                'step_desc' => 'Semua bahan untuk saus santan dimasukkan ke dalam panci, kemudian dimasak dengan api sedang hingga mendidih. Setelah mendidih, angkat dan dinginkan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '11',
                'step_desc' => 'Setelah semua bahan dingin, potong pisang ijo sesuai selera. Tata pisang ijo di atas bubur sumsum dan tambahkan saus santan di atasnya. Beri sirup cocopandan/DHT dan susu kental manis secukupnya. Es pisang ijo siap dinikmati.',
                'step_img' => null
            ],
            // menu 12
            [
                'step_header_id' => '12',
                'step_desc' => 'Rebung yang telah direbus kemudian dicacah menjadi potongan kecil.',
                'step_img' => null
            ],
            [
                'step_header_id' => '12',
                'step_desc' => 'Daging ayam direbus terlebih dahulu dan kemudian dihaluskan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '12',
                'step_desc' => 'Tumis daging ayam giling bersama bawang yang telah dihaluskan, tambahkan potongan rebung, serta bumbu-bumbu lainnya, aduk rata, dan tambahkan telur.',
                'step_img' => null
            ],
            [
                'step_header_id' => '12',
                'step_desc' => 'Untuk membuat kulit lumpia, kocok semua bahan kulit hingga merata. Panaskan wajan dengan sedikit minyak, lalu panggang adonan kulit dalam ukuran satu sendok sayur hingga sedikit kering. Lakukan proses ini hingga seluruh adonan habis.',
                'step_img' => null
            ],
            [
                'step_header_id' => '12',
                'step_desc' => 'Tambahkan 1-2 sendok makan isian di atas kulit lumpia, gulung seperti amplop, dan pastikan ujungnya ditempel agar tidak terbuka.',
                'step_img' => null
            ],
            [
                'step_header_id' => '12',
                'step_desc' => 'Untuk saus gula, rebus semua bahan hingga mendidih. Bawang putih dan cabe rawit hanya digeprek saja. Setelah itu, saring bahan-bahan, tambahkan larutan tapioka, dan masak lagi sebentar hingga saus mengental.',
                'step_img' => null
            ],
            [
                'step_header_id' => '12',
                'step_desc' => 'Goreng lumpia hingga kecokelatan, lalu angkat dan tiriskan. Siap disajikan dengan saus, cabe rawit, dan daun bawang muda sebagai pelengkap.',
                'step_img' => null
            ],
            // menu 13
            [
                'step_header_id' => '13',
                'step_desc' => 'Siapkan semua bahan yang diperlukan. Lumuri potongan ayam dengan air jeruk nipis, biarkan meresap selama 10 menit, kemudian bilas dengan air bersih.',
                'step_img' => null
            ],
            [
                'step_header_id' => '13',
                'step_desc' => 'Haluskan semua bumbu yang diperlukan untuk membuat rempah.',
                'step_img' => null
            ],
            [
                'step_header_id' => '13',
                'step_desc' => 'Siapkan wajan, masukkan potongan ayam ke dalamnya, tambahkan semua bahan dan bumbu yang telah dihaluskan sebelumnya. Ungkep ayam dengan bumbu tersebut hingga dagingnya empuk dan cairan mulai menyusut. Pastikan untuk mencicipi dan sesuaikan rasa jika diperlukan, lalu angkat dari api.',
                'step_img' => null
            ],
            [
                'step_header_id' => '13',
                'step_desc' => 'Panaskan minyak dalam wajan, goreng ayam yang telah diungkep sebentar saja hingga matang secara merata, kemudian angkat dan tiriskan minyaknya.',
                'step_img' => null
            ],
            [
                'step_header_id' => '13',
                'step_desc' => 'Didihkan air dalam panci, rebus daun singkong hingga matang. Tambahkan sedikit soda kue ke dalam air rebusan untuk menjaga warna hijau daun singkong tetap cerah. Setelah matang, angkat daun singkong, bilas dengan air bersih, dan peras airnya.',
                'step_img' => null
            ],
            [
                'step_header_id' => '13',
                'step_desc' => 'Sajikan ayam pop bersama sambal ijo, daun singkong yang telah direbus, dan nasi putih.',
                'step_img' => null
            ],
            // menu 14
            [
                'step_header_id' => '14',
                'step_desc' => 'Potong daging sapi menjadi potongan kecil kemudian direbus hingga empuk dengan tetap mempertahankan kaldu sebanyak 500 ml.',
                'step_img' => null
            ],
            [
                'step_header_id' => '14',
                'step_desc' => 'Potong tahu menjadi potongan-potongan kecil dan digoreng hingga setengah kering, kemudian tiriskan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '14',
                'step_desc' => 'Tumis bumbu halus hingga harum dan matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '14',
                'step_desc' => 'Tambahkan daun salam, daun jeruk, lengkuas, dan serai ke dalam tumisan, lalu aduk hingga aroma harum tercium.',
                'step_img' => null
            ],
            [
                'step_header_id' => '14',
                'step_desc' => 'Angkat bumbu tumis dan campurkan ke dalam kaldu daging yang sedang direbus.',
                'step_img' => null
            ],
            [
                'step_header_id' => '14',
                'step_desc' => 'Tambahkan potongan tahu, gula merah, potongan labu siam, kacang merah, dan santan ke dalam kaldu.',
                'step_img' => null
            ],
            [
                'step_header_id' => '14',
                'step_desc' => 'Masak dengan api kecil hingga kacang merah menjadi lunak.',
                'step_img' => null
            ],
            [
                'step_header_id' => '14',
                'step_desc' => 'Tambahkan santan kental, krecek, cabe rawit, dan petai.',
                'step_img' => null
            ],
            [
                'step_header_id' => '14',
                'step_desc' => 'Masak hingga semua bahan matang dan kuahnya sedikit berminyak.',
                'step_img' => null
            ],
            [
                'step_header_id' => '14',
                'step_desc' => 'Angkat dan hidangkan selagi hangat.',
                'step_img' => null
            ],
            // menu 15
            [
                'step_header_id' => '15',
                'step_desc' => 'Goreng potongan ayam dalam minyak panas selama sekitar 5 menit di setiap sisi, atau sampai ayam matang dan jusnya jernih. Angkat dari minyak dengan menggunakan spatula berlubang, dan siap disajikan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '15',
                'step_desc' => 'Panaskan minyak dalam skillet listrik pada suhu 350 derajat Fahrenheit (175 derajat Celsius). Celupkan potongan ayam ke dalam campuran telur dan susu, lalu gulingkan dalam campuran kering hingga terbalut rata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '15',
                'step_desc' => 'Goreng potongan ayam dalam minyak panas selama sekitar 5 menit di setiap sisi, atau sampai ayam matang dan jusnya jernih. Angkat dari minyak dengan menggunakan spatula berlubang, dan siap disajikan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '15',
                'step_desc' => 'Panaskan minyak dalam skillet listrik pada suhu 350 derajat Fahrenheit (175 derajat Celsius). Celupkan potongan ayam ke dalam campuran telur dan susu, lalu gulingkan dalam campuran kering hingga terbalut rata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '15',
                'step_desc' => 'Di dalam sebuah wadah datar, campurkan bubuk bawang putih, merica, garam, paprika, tepung roti, dan tepung terigu. Di wadah lain, aduk susu dan telur.',
                'step_img' => null
            ],
            // menu 16
            [
                'step_header_id' => '16',
                'step_desc' => 'Rebus daging sapi dan paru-paru hingga empuk secara terpisah. Setelah empuk, tiriskan daging dan paru, dan sisihkan kaldu daging sebanyak 1 liter.',
                'step_img' => null
            ],
            [
                'step_header_id' => '16',
                'step_desc' => 'Tumbuk atau giling halus kacang tanah yang sudah disangrai. Sisihkan kacang tanah halus tersebut.',
                'step_img' => null
            ],
            [
                'step_header_id' => '16',
                'step_desc' => 'Tumis bumbu halus hingga harum dan wangi. Kemudian tambahkan lengkuas, jahe, daun jeruk, daun salam, dan serai. Aduk hingga aroma harum tercium. Setelah itu, angkat dari api.',
                'step_img' => null
            ],
            [
                'step_header_id' => '16',
                'step_desc' => 'Masukkan tumisan bumbu ke dalam panci, lalu tambahkan kaldu daging, kacang tanah halus, serta potongan daging dan paru yang sudah direbus. Masak dengan api kecil hingga bumbu meresap ke dalam daging dan paru.',
                'step_img' => null
            ],
            [
                'step_header_id' => '16',
                'step_desc' => 'Tuangkan air cucian beras dan tambahkan gula. Masak hingga kuah menjadi kental dan bumbu meresap sempurna ke dalam daging. Setelah itu, matikan api.',
                'step_img' => null
            ],
            [
                'step_header_id' => '16',
                'step_desc' => 'Sajikan coto Makassar dengan pelengkapnya seperti bawang merah goreng, buras, sambal rawit merah, dan irisan jeruk nipis.',
                'step_img' => null
            ],
            // menu 17
            [
                'step_header_id' => '17',
                'step_desc' => 'Goreng kacang tanah dalam wajan dengan api sedang hingga matang. Kemudian angkat dan tiriskan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '17',
                'step_desc' => 'Haluskan tiga sendok makan kacang tanah, satu siung bawang putih, satu lembar daun jeruk purut, dan gula merah secukupnya. Setelah itu, campur dengan larutan asam jawa dan kecap manis untuk menciptakan sambal kacang yang kaya rasa.',
                'step_img' => null
            ],
            [
                'step_header_id' => '17',
                'step_desc' => 'Setelah semua bahan bumbu kacang halus, letakkan di dalam mangkuk dan sisihkan untuk digunakan sebagai siraman gado-gado.',
                'step_img' => null
            ],
            [
                'step_header_id' => '17',
                'step_desc' => 'Siapkan piring saji dan susun tahu goreng, telur, kacang panjang, mentimun, kol, taoge, labu siam, tempe goreng, dan tomat di atasnya. Kemudian siram isian gado-gado dengan sambal kacang yang sudah dicampur dengan air panas.',
                'step_img' => null
            ],
            [
                'step_header_id' => '17',
                'step_desc' => 'Sajikan gado-gado betawi dengan tambahan bawang goreng dan kerupuk untuk menyempurnakan kenikmatannya.',
                'step_img' => null
            ],
            // menu 18 [18-19]
            [
                'step_header_id' => '18',
                'step_desc' => 'Bersihkan beras ketan dan rendam dalam air selama satu jam. Setelah itu, tiriskan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '18',
                'step_desc' => 'Campurkan beras ketan dengan garam, pastikan tercampur secara merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '18',
                'step_desc' => 'Letakkan beras ketan ke dalam cetakan lontong yang sudah diberi alas daun pisang. Isi cetakan hingga sekitar 3/4 penuh untuk mendapatkan lemang yang padat.',
                'step_img' => null
            ],
            [
                'step_header_id' => '18',
                'step_desc' => 'Didihkan air dalam panci dan tambahkan minyak. Setelah itu, rebus lemang dalam cetakan selama 3-4 jam hingga matang. Setelah matang, angkat dan biarkan dingin sebelum dipotong-potong.',
                'step_img' => null
            ],
            [
                'step_header_id' => '18',
                'step_desc' => 'Sajikan lemang dengan tapai.',
                'step_img' => null
            ],
            [
                'step_header_id' => '19',
                'step_desc' => 'Cuci bersih ketan hitam dan rendam dalam air selama satu jam. Kemudian, tiriskan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '19',
                'step_desc' => 'Kukus ketan hitam selama satu jam hingga matang. Setelah matang, diamkan hingga dingin.',
                'step_img' => null
            ],
            [
                'step_header_id' => '19',
                'step_desc' => 'Setelah dingin, taburkan ragi ke atas ketan hitam dan aduk hingga merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '19',
                'step_desc' => 'Masukkan ketan hitam ke dalam toples dan tutup rapat. Biarkan selama tiga hari untuk proses fermentasi.',
                'step_img' => null
            ],
            [
                'step_header_id' => '19',
                'step_desc' => 'Tapai siap untuk dinikmati setelah proses fermentasi selesai.',
                'step_img' => null
            ],
            // menu 19 [20]
            [
                'step_header_id' => '20',
                'step_desc' => 'Tumis bumbu halus hingga tercium aroma harum. Masukkan daun salam dan lengkuas, tumis hingga bumbu matang dan harum.',
                'step_img' => null
            ],
            [
                'step_header_id' => '20',
                'step_desc' => 'Tuangkan santan, aduk hingga mendidih perlahan. Setelah itu, tambahkan kacang tolo yang telah direbus, aduk rata agar bumbu meresap.',
                'step_img' => null
            ],
            [
                'step_header_id' => '20',
                'step_desc' => 'Selanjutnya, masukkan kerupuk krecek ke dalam wajan, aduk merata dengan bumbu dan santan. Masak dengan api sedang hingga bumbu meresap ke dalam krecek.',
                'step_img' => null
            ],
            [
                'step_header_id' => '20',
                'step_desc' => 'Lanjutkan memasak hingga kuah mulai mengental dan krecek menjadi empuk. Sesekali aduk agar santan tidak pecah.',
                'step_img' => null
            ],
            [
                'step_header_id' => '20',
                'step_desc' => 'Jika kuah sudah mengental dan krecek terasa empuk, tambahkan irisan cabai rawit. Masak sebentar hingga cabai rawit layu.',
                'step_img' => null
            ],
            [
                'step_header_id' => '20',
                'step_desc' => 'Koreksi rasa sambal goreng krecek, tambahkan gula, garam, atau kaldu penyedap sesuai selera. Setelah rasa sesuai, angkat sambal goreng krecek yang telah matang, dan siap untuk disajikan.',
                'step_img' => null
            ],
            // menu 20 [21]
            [
                'step_header_id' => '21',
                'step_desc' => 'Campurkan semua bahan untuk gula, kemudian masak di atas kompor sambil diaduk hingga gula larut. Setelah itu, angkat dan biarkan dingin.',
                'step_img' => null
            ],
            [
                'step_header_id' => '21',
                'step_desc' => 'Selanjutnya, campurkan semua bahan untuk roti ke dalam wadah besar. Tuangkan gula cair yang telah dibuat sebelumnya ke dalam adonan roti, lalu uleni hingga menjadi adonan yang elastis atau agak lengket di tangan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '21',
                'step_desc' => 'Bentuk adonan menjadi bulatan dan bungkus dengan plastik. Simpan adonan di dalam kulkas selama 30 menit untuk membuatnya lebih mudah diolah.',
                'step_img' => null
            ],
            [
                'step_header_id' => '21',
                'step_desc' => 'Setelah 30 menit, keluarkan adonan dari kulkas dan bagi menjadi bagian-bagian yang sama besar. Panaskan oven selama 10-15 menit. Uleni kembali adonan secara singkat dan bentuk menjadi bentuk memanjang sesuai selera.',
                'step_img' => null
            ],
            [
                'step_header_id' => '21',
                'step_desc' => 'Siapkan loyang, lalu lapisi dengan kertas roti. Letakkan setiap adonan roti di atas loyang yang sudah disiapkan. Oles permukaan roti dengan susu dan taburi dengan biji wijen untuk memberikan rasa dan aroma yang lezat.',
                'step_img' => null
            ],
            [
                'step_header_id' => '21',
                'step_desc' => 'Jika oven sudah cukup panas, masukkan roti ke dalamnya dan panggang selama sekitar 25 menit atau hingga matang secara merata. Setelah matang, angkat roti dari oven dan biarkan dingin sebelum disajikan.',
                'step_img' => null
            ],
            // menu 21 [22]
            [
                'step_header_id' => '22',
                'step_desc' => 'Pertama-tama, bersihkan semua sayuran. Potong-potong semua sayuran kecuali jagung, bisa dipotong tipis atau tebal sesuai selera.',
                'step_img' => null
            ],
            [
                'step_header_id' => '22',
                'step_desc' => 'Selanjutnya, masukkan semua sayuran ke dalam panci yang sudah diisi dengan air. Masak hingga mendidih, kemudian tambahkan kaldu bubuk dan garam.',
                'step_img' => null
            ],
            [
                'step_header_id' => '22',
                'step_desc' => 'Sementara menunggu sayuran matang, haluskan kacang tanah. Haluskan kacang tanah menggunakan ulekan atau blender.',
                'step_img' => null
            ],
            [
                'step_header_id' => '22',
                'step_desc' => 'Siapkan tepung sagu, lalu tambahkan air sesuai kekentalan yang diinginkan. Masak hingga sagu matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '22',
                'step_desc' => 'Setelah sayuran matang, tambahkan kacang tanah yang sudah dihaluskan dan sagu yang sudah matang, dengan takaran sekitar 1 sendok makan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '22',
                'step_desc' => 'Aduk semua bahan hingga tercampur rata. Selanjutnya, hidangan siap untuk disajikan.',
                'step_img' => null
            ],
            //menu 22 [23]
            [
                'step_header_id' => '23',
                'step_desc' => 'Untuk mengaktifkan ragi, awali dengan merendamnya dalam air hangat atau langsung dicampurkan dengan bahan-bahan lainnya. Campurkan tepung terigu, kuning telur, susu cair, gula, dan ragi hingga merata. Kemudian tambahkan mentega dan garam, uleni adonan hingga menjadi kalis.',
                'step_img' => null
            ],
            [
                'step_header_id' => '23',
                'step_desc' => 'Setelah itu, tutup adonan dengan plastik wrap atau serbet bersih dan diamkan selama 1 jam. Setelah 1 jam, adonan akan mengembang dua kali lipat. Pukul-pukul adonan untuk mengeluarkan udara di dalamnya.',
                'step_img' => null
            ],
            [
                'step_header_id' => '23',
                'step_desc' => 'Bagi adonan menjadi tiga bagian, satu untuk badan dan dua untuk kaki-kaki buaya. Bagian kaki-kaki berbobot sekitar 25 gram, sementara sisanya digunakan untuk badan buaya.',
                'step_img' => null
            ],
            [
                'step_header_id' => '23',
                'step_desc' => 'Mulailah membentuk adonan menjadi kaki-kaki. Plintir adonan hingga memanjang, lalu letakkan di loyang. Lakukan hal yang sama untuk badan buaya, plintir hingga membentuk panjang. Sesuaikan bentuk kepala yang agak pendek dan lebar, sementara ekor dibuat panjang dan semakin mengecil. Buka sedikit bagian punggung buaya, lalu isi dengan chococip dan rapatkan kembali.',
                'step_img' => null
            ],
            [
                'step_header_id' => '23',
                'step_desc' => 'Setelah buaya terbentuk, buatlah kulit kasar buaya dengan bantuan gunting. Potong kecil-kecil serpihan dari badan hingga ekor. Lalu tambahkan mata dengan chocochip.',
                'step_img' => null
            ],
            [
                'step_header_id' => '23',
                'step_desc' => 'Panaskan oven dan panggang roti buaya selama sekitar 20 menit pada suhu 180°C, atau sesuaikan dengan oven masing-masing. Pastikan untuk memutar loyang dan memindah letaknya agar warna roti buaya merata. Setelah 10 menit, keluarkan roti buaya dan beri olesan. Panggang kembali dengan posisi di rak paling atas dan setiap 5 menit, putar loyang untuk meratakan warna permukaan roti buaya hingga berwarna coklat merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '23',
                'step_desc' => 'Hasil akhirnya, roti buaya akan memiliki warna coklat merata dan siap untuk dinikmati.',
                'step_img' => null
            ],
            // menu 23 [24]
            [
                'step_header_id' => '24',
                'step_desc' => 'Untuk memulai, cairkan 200 gram gula pasir dalam panci hingga menjadi karamel berwarna cokelat tua dengan panas sedang hingga rendam. Setelah itu, tambahkan air ke dalam panci dan aduk hingga karamel larut sempurna. Setelah mencapai konsistensi yang diinginkan, matikan api.',
                'step_img' => null
            ],
            [
                'step_header_id' => '24',
                'step_desc' => 'Selanjutnya, masukkan sisa gula pasir ke dalam larutan karamel yang sudah terbentuk, pastikan untuk mengaduk hingga merata. Setelah itu, angkat panci dan diamkan hingga larutan tidak lagi panas. Sisihkan campuran ini untuk sementara waktu.',
                'step_img' => null
            ],
            [
                'step_header_id' => '24',
                'step_desc' => 'Dalam sebuah wadah yang lebih besar, campurkan tepung beras ketan, tepung tapioka, dan garam secara merata. Pastikan semua bahan tercampur dengan baik.',
                'step_img' => null
            ],
            [
                'step_header_id' => '24',
                'step_desc' => 'Secara perlahan, tuangkan larutan karamel ke dalam campuran tepung sambil terus diaduk hingga mencapai konsistensi yang rata dan homogen.',
                'step_img' => null
            ],
            [
                'step_header_id' => '24',
                'step_desc' => 'Selanjutnya, siapkan 8 buah loyang kue keranjang dengan kapasitas sekitar 200 ml, lalu olesi bagian dalamnya dengan plastik tahan panas atau daun pisang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '24',
                'step_desc' => 'Tuangkan sekitar 200 ml adonan ke dalam masing-masing loyang. Susun loyang-loyang ini dalam dandang yang sudah dipanaskan dan masak selama sekitar 2-2,5 jam hingga adonan matang dengan baik. Setelah matang, angkat loyang dari dandang dan biarkan kue mendingin hingga tidak panas.',
                'step_img' => null
            ],
            [
                'step_header_id' => '24',
                'step_desc' => 'Untuk menutup permukaan Kue Keranjang, gunakan selembar plastik kaca. Setelah itu, keluarkan kue dari loyang dan gunting bagian tepinya agar rapi.',
                'step_img' => null
            ],
            [
                'step_header_id' => '24',
                'step_desc' => 'Kue Keranjang siap untuk disajikan dengan segera.',
                'step_img' => null
            ],
            //menu 24 [25]
            [
                'step_header_id' => '25',
                'step_desc' => 'Sirup: Campur semua bahan yang telah disiapkan dalam panci, lalu masak dengan api sedang hingga mendidih dan sirup mengental. Setelah itu, dinginkan sirup tersebut.',
                'step_img' => null
            ],
            [
                'step_header_id' => '25',
                'step_desc' => 'Siapkan adonan untuk kulit moon cake. Campur tepung terigu dengan sirup, minyak kacang, dan larutan air abu. Aduk hingga merata, kemudian uleni adonan hingga kalis dan tidak lengket di tangan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '25',
                'step_desc' => 'Diamkan adonan selama sekitar 3 jam. Agar adonan tetap lembab, tutup dengan serbet yang telah dibasahi di atas wadah yang digunakan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '25',
                'step_desc' => 'Untuk membuat isian, rebus kacang merah hingga lembut, lalu haluskan dengan blender. Setelah halus, masukkan kacang merah ke dalam panci dan tambahkan bahan lainnya termasuk Sasa Santan Cair. Masak dengan api sedang sambil terus diaduk hingga kacang merah menyatu dengan bahan lain dan adonan dapat dibentuk bulat.',
                'step_img' => null
            ],
            [
                'step_header_id' => '25',
                'step_desc' => 'Siapkan cetakan khusus moon cake dan taburkan tepung terigu di dalamnya dengan merata namun tidak terlalu tebal.',
                'step_img' => null
            ],
            [
                'step_header_id' => '25',
                'step_desc' => 'Ambil sedikit adonan kulit, lalu cetak di dalam cetakan yang sudah ditaburi tepung terigu. Tambahkan isian di bagian tengah adonan dan pastikan seluruh isian tertutup oleh adonan kulit.',
                'step_img' => null
            ],
            [
                'step_header_id' => '25',
                'step_desc' => 'Panaskan oven dan panggang moon cake selama sekitar 15 menit atau hingga matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '25',
                'step_desc' => 'Moon cake tradisional isi kacang merah siap untuk disajikan setelah matang.',
                'step_img' => null
            ],
            //menu 25 [26]
            [
                'step_header_id' => '26',
                'step_desc' => 'Campurkan gula, tepung maizena, tepung terigu, susu UHT, dan Santan Bubuk Sasa dalam sebuah wadah, aduk hingga merata, dan masak dengan api sedang hingga mendidih.',
                'step_img' => null
            ],
            [
                'step_header_id' => '26',
                'step_desc' => 'Tambahkan mentega dan kuning telur ke dalam campuran tersebut, aduk kembali hingga merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '26',
                'step_desc' => 'Setelah itu, masukkan daging kelapa muda dan kismis ke dalam adonan, aduk hingga semua bahan tercampur dengan baik. Untuk memberikan rasa yang khas, taburkan sedikit bubuk cinnamon ke dalam adonan, kemudian aduk kembali.',
                'step_img' => null
            ],
            [
                'step_header_id' => '26',
                'step_desc' => 'Tuangkan adonan ke dalam cetakan yang sudah dipersiapkan, dan panggang dalam oven selama sekitar 15 menit.',
                'step_img' => null
            ],
            [
                'step_header_id' => '26',
                'step_desc' => 'Sementara itu, kocok putih telur dan gula hingga halus dan kental menggunakan mixer. Setelah itu, tuangkan campuran putih telur ke dalam cetakan yang telah dipanggang sebelumnya.',
                'step_img' => null
            ],
            [
                'step_header_id' => '26',
                'step_desc' => 'Taburkan kismis, keju parut, dan daging kelapa muda di atas adonan sebagai topping. Panggang kembali dalam oven selama sekitar 30 menit hingga matang dan berwarna keemasan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '26',
                'step_desc' => 'Klapertart siap untuk dinikmati setelah dingin.',
                'step_img' => null
            ],
            // menu 26 [27-31]
            [
                'step_header_id' => '27',
                'step_desc' => 'Persiapkan semua bahan yang diperlukan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '27',
                'step_desc' => 'Panaskan 500 ml air bersama santan, garam, dan pasta pandan dalam panci hingga mendidih.',
                'step_img' => null
            ],
            [
                'step_header_id' => '27',
                'step_desc' => 'Sambil terus diaduk, campurkan sisa air (100 ml) dengan tepung hunkwe, masak hingga adonan mendidih dan mengental.',
                'step_img' => null
            ],
            [
                'step_header_id' => '27',
                'step_desc' => 'Setelah mengental, pindahkan adonan ke wadah lain dan biarkan hingga dingin.',
                'step_img' => null
            ],
            [
                'step_header_id' => '28',
                'step_desc' => 'Rebus gula merah dan daun pandan hingga mendidih.',
                'step_img' => null
            ],
            [
                'step_header_id' => '28',
                'step_desc' => 'Setelah mendidih, angkat dan biarkan hingga dingin.',
                'step_img' => null
            ],
            [
                'step_header_id' => '29',
                'step_desc' => 'Didihkan air, lalu masukkan sagu mutiara.',
                'step_img' => null
            ],
            [
                'step_header_id' => '29',
                'step_desc' => 'Masak dengan api kecil hingga sagu mutiara mekar, kemudian angkat dan dinginkan.(Catatan: Gunakan metode 5-30-7, Rebus selama 5 menit, Diamkan dengan panci tertutup selama 30 menit, Setelah diamkan, masak kembali selama 7 menit dengan menambahkan air secukupnya)',
                'step_img' => null
            ],
            [
                'step_header_id' => '30',
                'step_desc' => 'Rebus semua bahan kuah santan hingga mendidih, kemudian angkat dan dinginkan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '31',
                'step_desc' => 'Siapkan wadah saji atau mangkuk.',
                'step_img' => null
            ],
            [
                'step_header_id' => '31',
                'step_desc' => 'Isi wadah dengan puding hunkwe dan bubur sagu mutiara (termasuk semua komponen/isian).',
                'step_img' => null
            ],
            [
                'step_header_id' => '31',
                'step_desc' => 'Tambahkan es batu, saus gula merah, dan kuah santan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '31',
                'step_desc' => 'Es loder Bogor siap disajikan dan dinikmati.',
                'step_img' => null
            ],
            //menu 27 [32]
            [
                'step_header_id' => '32',
                'step_desc' => 'Campurkan santan, air, dan garam, lalu bagi menjadi dua bagian.',
                'step_img' => null
            ],
            [
                'step_header_id' => '32',
                'step_desc' => 'Ambil separuh bagian santan dan tambahkan daun pandan, lalu masak hingga mendidih.',
                'step_img' => null
            ],
            [
                'step_header_id' => '32',
                'step_desc' => 'Sambil menunggu gula merah mendidih, sangrai kacang tanah hingga berwarna kekuningan, kemudian kupas kulitnya dan hancurkan menggunakan cobek.',
                'step_img' => null
            ],
            [
                'step_header_id' => '32',
                'step_desc' => 'Ambil sisa santan dan campurkan dengan tepung ketan, lalu saring ke dalam wajan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '32',
                'step_desc' => 'Saring juga gula merah yang telah mendidih, kemudian masak dan aduk hingga mendidih.',
                'step_img' => null
            ],
            [
                'step_header_id' => '32',
                'step_desc' => 'Setelah mendidih, kecilkan api dan masak hingga mengental, aduk secara terus menerus, proses ini memerlukan sedikit waktu.',
                'step_img' => null
            ],
            [
                'step_header_id' => '32',
                'step_desc' => 'Saat sudah mengental, tambahkan kacang sangrai yang telah disiapkan sebelumnya, aduk hingga merata. Kemudian pindahkan ke wadah yang telah dialasi dengan daun pisang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '32',
                'step_desc' => 'Masukkan campuran ke dalam plastik kecil yang telah diolesi dengan minyak terlebih dahulu, lalu lipat plastik.',
                'step_img' => null
            ],
            [
                'step_header_id' => '32',
                'step_desc' => 'Sajikan.',
                'step_img' => null
            ],
            //menu 28 [33]
            [
                'step_header_id' => '33',
                'step_desc' => 'Uleni adonan bola-bola hingga konsistensinya memungkinkan untuk dibentuk, pastikan tidak terlalu lembek agar kleponnya tidak menjadi kempes, tetapi juga jangan terlalu kering agar tidak mudah bocor saat dimasak.',
                'step_img' => null
            ],
            [
                'step_header_id' => '33',
                'step_desc' => 'Isi bagian tengah bola-bola dengan gula merah yang telah disisir, kemudian bentuk menjadi bola-bola kecil. Setelah itu, sisihkan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '33',
                'step_desc' => 'Rebus air hingga mendidih, lalu masukkan bola-bola ke dalam air. Ketika bola-bola sudah matang, mereka akan mengapung.',
                'step_img' => null
            ],
            [
                'step_header_id' => '33',
                'step_desc' => 'Gulung bola-bola tersebut di atas kelapa parut. Kelapa parut yang sudah merah memiliki rasa sedikit asin, sehingga tidak perlu menambahkan garam lagi ke dalam kelapa parutnya agar tidak bertabrakan dengan rasa gula merah klepon.',
                'step_img' => null
            ],
            //menu 29 [34]
            [
                'step_header_id' => '34',
                'step_desc' => 'Dalam mangkuk, gabungkan tepung beras, tepung tapioka, gula, dan air, kemudian bagi adonan menjadi tiga bagian dan tambahkan pewarna makanan sesuai selera untuk memberi variasi warna.',
                'step_img' => null
            ],
            [
                'step_header_id' => '34',
                'step_desc' => 'Bentuk adonan menjadi bulatan seukuran kelereng, lalu tekan bagian tengahnya untuk membuat lubang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '34',
                'step_desc' => 'Rebus adonan hingga mengapung di air mendidih, kemudian tiriskan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '34',
                'step_desc' => 'Dalam wadah lain, didihkan santan bersama garam, gula pasir, dan daun pandan untuk membuat kuahnya. Sajikan bersama es batu untuk sensasi yang menyegarkan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '34',
                'step_desc' => 'Es Gempol Pleret siap dinikmati dengan kuah santan yang lezat.',
                'step_img' => null
            ],
            //menu 30 [35-36]
            [
                'step_header_id' => '35',
                'step_desc' => 'Campurkan santan dan tepung beras dalam sebuah wadah, aduk hingga tepung larut dan tercampur secara merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '35',
                'step_desc' => 'Tambahkan garam, kemudian panaskan campuran tersebut di atas api kecil sambil terus diaduk hingga tepung matang dan mengental. Setelah itu, angkat dari api.',
                'step_img' => null
            ],
            [
                'step_header_id' => '36',
                'step_desc' => 'Siapkan mangkuk saji, lalu masukkan potongan pisang raja dan bubur sumsum yang sudah Anda buat sebelumnya.',
                'step_img' => null
            ],
            [
                'step_header_id' => '36',
                'step_desc' => 'Beri es serut untuk memberikan sensasi segar.',
                'step_img' => null
            ],
            [
                'step_header_id' => '36',
                'step_desc' => 'Tuangkan sirup merah untuk memberikan rasa manis yang khas.',
                'step_img' => null
            ],
            [
                'step_header_id' => '36',
                'step_desc' => 'Tambahkan susu kental manis untuk menambah kelezatan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '36',
                'step_desc' => 'Sajikan dan nikmati es pallu butung dengan berbagai lapisan rasa yang lezat dan menyegarkan.',
                'step_img' => null
            ],
            //menu 31 [37]
            [
                'step_header_id' => '37',
                'step_desc' => 'Pisahkan daging ayam dari kulitnya dengan hati-hati, pastikan kulit tidak robek.',
                'step_img' => null
            ],
            [
                'step_header_id' => '37',
                'step_desc' => 'Campur semua bahan untuk isian dalam sebuah wadah, aduk hingga merata sehingga semua bahan tercampur dengan baik.',
                'step_img' => null
            ],
            [
                'step_header_id' => '37',
                'step_desc' => 'Masukkan adonan isian ke dalam plastik piping bag untuk kemudian dimasukkan ke dalam kulit ayam.',
                'step_img' => null
            ],
            [
                'step_header_id' => '37',
                'step_desc' => 'Isi kulit ayam dengan adonan isian menggunakan plastik piping bag, kemudian jahit bagian yang terbuka hingga tertutup rapat.',
                'step_img' => null
            ],
            [
                'step_header_id' => '37',
                'step_desc' => 'Siapkan bahan untuk olesan, campur semua bahan hingga rata. Olesi permukaan ayam dengan bahan olesan tersebut.',
                'step_img' => null
            ],
            [
                'step_header_id' => '37',
                'step_desc' => 'Tusuk-tusuk kulit ayam dengan garpu atau jarum supaya tidak meletus saat proses memasak.',
                'step_img' => null
            ],
            [
                'step_header_id' => '37',
                'step_desc' => 'Kukus ayam selama sekitar 30 menit hingga matang, kemudian keluarkan dari kukusan. Olesi kembali permukaan ayam dengan sisa bahan olesan, lalu panggang sebentar di dalam oven selama sekitar 15 menit untuk memberikan kecoklatan yang sempurna.',
                'step_img' => null
            ],
            [
                'step_header_id' => '37',
                'step_desc' => 'Untuk membuat saus, sisihkan air yang keluar dari ayam saat proses pengukusan. Campurkan air tersebut dengan sisa bahan olesan yang tersisa, kemudian masak hingga sausnya matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '37',
                'step_desc' => 'Sajikan ayam dengan pelengkapnya seperti wortel, buncis, dan kentang yang telah dipersiapkan sebelumnya.',
                'step_img' => null
            ],
            //menu 32 [38]
            [
                'step_header_id' => '38',
                'step_desc' => 'Panaskan wajan dan tumis jahe hingga harum.',
                'step_img' => null
            ],
            [
                'step_header_id' => '38',
                'step_desc' => 'Tambahkan bawang merah dan bawang putih, tumis hingga harum dan matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '38',
                'step_desc' => 'Tuangkan 300 mililiter air ke dalam wajan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '38',
                'step_desc' => 'Masukkan setengah sendok teh Sasa Bumbu Ekstrak Daging Ayam, setengah sendok teh gula pasir, setengah sendok teh lada bubuk, dan setengah sendok teh kunyit bubuk ke dalam air.',
                'step_img' => null
            ],
            [
                'step_header_id' => '38',
                'step_desc' => 'Setelah bumbu tercampur rata, tambahkan 6 butir telur ke dalam wajan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '38',
                'step_desc' => 'Masak telur dengan api sedang hingga mendidih.',
                'step_img' => null
            ],
            [
                'step_header_id' => '38',
                'step_desc' => 'Tambahkan 65 mililiter Sasa Santan Omega 3 ke dalam wajan, aduk perlahan hingga semua bahan tercampur rata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '38',
                'step_desc' => 'Terakhir, tambahkan potongan tomat dan cabai ke dalam masakan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '38',
                'step_desc' => 'Sajikan telur tumis dengan aroma rempah yang khas.',
                'step_img' => null
            ],
            //menu 33 [39]
            [
                'step_header_id' => '39',
                'step_desc' => 'Potong labu siam menjadi potongan kecil dan remas-remas dengan garam. Kemudian cuci bersih dan tiriskan. Sisihkan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '39',
                'step_desc' => 'Rebus santan encer dan beras hingga menjadi bubur yang lembut dan kental. Setelah matang, angkat dan sisihkan.',
                'step_img' => null
            ],
            [
                'step_header_id' => '39',
                'step_desc' => 'Untuk sayuran Betawi, panaskan 2 sendok makan minyak di wajan anti lengket. Tumis bumbu halus dan bumbu lain hingga harum dan matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '39',
                'step_desc' => 'Masukkan potongan daging paha ayam, tumis hingga setengah matang. Kemudian tambahkan potongan labu siam, tahu goreng, dan telur ayam rebus. Tumis sebentar hingga bahan-bahan tersebut tercampur dengan baik.',
                'step_img' => null
            ],
            [
                'step_header_id' => '39',
                'step_desc' => 'Tuangkan Sasa Santan Cair ke dalam wajan. Masak di atas api sedang hingga santan mendidih dan sayuran matang dengan sempurna.',
                'step_img' => null
            ],
            [
                'step_header_id' => '39',
                'step_desc' => 'Siapkan mangkuk untuk menyajikan bubur. Tuangkan bubur ke dalam mangkuk, lalu tambahkan sayuran Betawi yang telah dimasak dan teri goreng sebagai tambahan. Nikmati bubur bersama kerupuk kecil untuk menambah citarasa yang lezat.',
                'step_img' => null
            ],
            //menu 34 [40]
            [
                'step_header_id' => '40',
                'step_desc' => 'Cuci bersih daun bayam dan tiriskan untuk menghilangkan kotoran dan air berlebih.',
                'step_img' => null
            ],
            [
                'step_header_id' => '40',
                'step_desc' => 'Siapkan adonan tepung dengan menggunakan Sasa Tepung Bumbu Serbaguna Original yang kaya akan vitamin. Campur tepung dengan air, pastikan adonan tidak terlalu kental. Takaran tepung dan air yang direkomendasikan adalah 1 sendok makan tepung untuk setiap 4 sendok makan air.',
                'step_img' => null
            ],
            [
                'step_header_id' => '40',
                'step_desc' => 'Aduk adonan perlahan hingga tercampur dengan baik dan menjadi konsistensi yang rata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '40',
                'step_desc' => 'Celupkan setiap lembar daun bayam ke dalam adonan tepung yang telah disiapkan, pastikan daun bayam terbalut dengan merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '40',
                'step_desc' => 'Goreng daun bayam dalam minyak panas hingga matang dan berwarna kecoklatan. Pastikan untuk membaliknya agar matang merata di kedua sisi.',
                'step_img' => null
            ],
            [
                'step_header_id' => '40',
                'step_desc' => 'Setelah matang, angkat dan tiriskan daun bayam. Setelah dingin, Anda dapat menyimpannya dalam toples kedap udara untuk menjaga kesegarannya.',
                'step_img' => null
            ],
            [
                'step_header_id' => '40',
                'step_desc' => 'Hidangan crispy bayam siap disajikan sebagai camilan atau pelengkap makanan utama.',
                'step_img' => null
            ],
            //menu 35 [41]
            [
                'step_header_id' => '41',
                'step_desc' => 'Panaskan sedikit minyak dalam wajan dan tumis oncom yang telah dipotong tipis hingga sedikit mengering. Setelah itu, remas-remas oncom hingga agak halus.',
                'step_img' => null
            ],
            [
                'step_header_id' => '41',
                'step_desc' => 'Haluskan semua bumbu yang telah disiapkan, dengan menyisakan sebagian bawang merah untuk digoreng.',
                'step_img' => null
            ],
            [
                'step_header_id' => '41',
                'step_desc' => 'Panaskan minyak goreng dalam wajan dan tumis bumbu yang telah dihaluskan bersama kecap manis dan Sasa Kaldu hingga harum dan matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '41',
                'step_desc' => 'Tambahkan oncom yang telah dimasak ke dalam wajan, lalu aduk hingga tercampur rata dengan bumbu.',
                'step_img' => null
            ],
            [
                'step_header_id' => '41',
                'step_desc' => 'Setelah itu, matikan api dan tambahkan bawang merah yang telah digoreng, kemudian aduk rata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '41',
                'step_desc' => 'Masukkan nasi putih ke dalam tumisan oncom, dan aduk hingga rata dengan oncom.',
                'step_img' => null
            ],
            [
                'step_header_id' => '41',
                'step_desc' => 'Jumlah resep ini dapat dibagi menjadi 3 atau 4 porsi nasi campur oncom.',
                'step_img' => null
            ],
            [
                'step_header_id' => '41',
                'step_desc' => 'Setelah matang, bungkus nasi tutug oncom dengan daun pisang sesuai dengan jumlah porsi. Sebelumnya, oleskan sedikit minyak goreng pada daun pisang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '41',
                'step_desc' => 'Jika diinginkan, bungkus nasi tutug oncom dapat dipanggang sebentar di atas bara api agar daunnya sedikit mengering.',
                'step_img' => null
            ],
            [
                'step_header_id' => '41',
                'step_desc' => 'Sajikan nasi tutug oncom bersama pelengkap sesuai dengan selera.',
                'step_img' => null
            ],
            //menu 36 [42]
            [
                'step_header_id' => '42',
                'step_desc' => 'Rebus air hingga mendidih, lalu tambahkan jagung manis, labu siam, bumbu halus, tempe, daun salam, dan lengkuas. Masak hingga semua bahan lunak dan terasa matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '42',
                'step_desc' => 'Tambahkan Sasa Santan Bubuk ke dalam rebusan tersebut, lalu aduk hingga merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '42',
                'step_desc' => 'Setelah itu, tambahkan kacang panjang, terong, daun melinjo, cabai hijau, garam, dan gula pasir ke dalam rebusan. Masak sambil terus diaduk hingga semua bahan matang sempurna.',
                'step_img' => null
            ],
            [
                'step_header_id' => '42',
                'step_desc' => 'Angkat dari kompor dan sajikan selagi hangat.',
                'step_img' => null
            ],
            //menu 37 [43]
            [
                'step_header_id' => '43',
                'step_desc' => 'Panaskan minyak goreng, tumis bumbu halus, sereh, daun jeruk, dan bawang bombay hingga harum dan matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '43',
                'step_desc' => 'Tambahkan air secukupnya untuk membuat kuah, lalu tambahkan Sasa Saus Tomat, Sasa Saus Sambal, saus tiram, kecap manis, garam, gula, dan penyedap rasa sesuai selera.',
                'step_img' => null
            ],
            [
                'step_header_id' => '43',
                'step_desc' => 'Setelah bumbu tercampur merata dan kuah mulai mendidih, masukkan jagung, cumi-cumi, dan udang ke dalam kuah. Masak hingga cumi-cumi dan udang matang sempurna.',
                'step_img' => null
            ],
            [
                'step_header_id' => '43',
                'step_desc' => 'Terakhir, tambahkan daun bawang dan potongan tomat untuk memberikan aroma dan kesegaran pada masakan. Aduk sebentar, lalu angkat dan hidangkan selagi hangat.',
                'step_img' => null
            ],
            //menu 38
            [
                'step_header_id' => '44',
                'step_desc' => 'Campur semua bahan kecuali kulit pangsit dalam sebuah mangkuk. Pastikan semua bahan tercampur secara merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '44',
                'step_desc' => 'Ambil sejumlah campuran tersebut dan masukkan ke dalam kulit pangsit.',
                'step_img' => null
            ],
            [
                'step_header_id' => '44',
                'step_desc' => 'Panggang dengan menggunakan airfryer selama 15 menit pada suhu 180 derajat Celsius, atau alternatifnya, bisa direbus atau dikukus.',
                'step_img' => null
            ],
            [
                'step_header_id' => '45',
                'step_desc' => 'Keluarkan isi tahu dan campurkan dengan semua bahan kecuali kulit tahu.',
                'step_img' => null
            ],
            [
                'step_header_id' => '45',
                'step_desc' => 'Masukkan campuran isian ayam ke dalam kulit tahu.',
                'step_img' => null
            ],
            [
                'step_header_id' => '45',
                'step_desc' => 'Panggang dengan menggunakan airfryer selama 10 menit pada suhu 180 derajat Celsius, atau alternatifnya, bisa direbus atau dikukus.',
                'step_img' => null
            ],
            [
                'step_header_id' => '46',
                'step_desc' => 'Didihkan air, lalu tambahkan semua bahan untuk membuat kuah.',
                'step_img' => null
            ],
            [
                'step_header_id' => '46',
                'step_desc' => 'Aduk rata dan biarkan kuah mendidih.',
                'step_img' => null
            ],
            [
                'step_header_id' => '46',
                'step_desc' => 'Sajikan kuah bersama pangsit dan tahu.',
                'step_img' => null
            ],
            //menu 39 [47]
            [
                'step_header_id' => '47',
                'step_desc' => 'Panaskan minyak dalam wajan, tumis bumbu halus hingga aromanya harum dan bumbu matang. Kemudian tambahkan garam, gula, dan Sasa MSG sesuai selera untuk memberi rasa pada kuah.',
                'step_img' => null
            ],
            [
                'step_header_id' => '47',
                'step_desc' => 'Setelah itu, tambahkan air dan Sasa santan omega 3 ke dalam wajan. Aduk secara merata hingga mendidih. Setelah mendidih, tambahkan lada untuk memberikan sedikit rasa pedas.',
                'step_img' => null
            ],
            [
                'step_header_id' => '47',
                'step_desc' => 'Kemudian, campur larutan tepung terigu perlahan-lahan ke dalam kuah sambil terus diaduk agar tidak menggumpal. Terus masak hingga kuah sedikit mengental. Setelah matang, matikan api.',
                'step_img' => null
            ],
            [
                'step_header_id' => '47',
                'step_desc' => 'Sementara itu, siapkan mie kuning dan tauge. Seduh keduanya dengan air panas terpisah selama 5 menit untuk memastikan mereka benar-benar matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '47',
                'step_desc' => 'Ketika semua komponen sudah siap, tata mie dan tauge di atas piring saji. Siram kuah yang sudah matang di atas mie dan tauge secara perlahan untuk meresap ke dalamnya. Untuk penyajian yang lebih menarik, taburkan daun seledri di atasnya sebagai hiasan. Sajikan selagi hangat untuk menikmati sensasi rasa yang lezat.',
                'step_img' => null
            ],
            //menu 40 [48]
            [
                'step_header_id' => '48',
                'step_desc' => 'Dalam sebuah mangkuk besar, campurkan daging sapi, tepung terigu, garam, Sasa MSG, dan lada hitam hingga merata.',
                'step_img' => null
            ],
            [
                'step_header_id' => '48',
                'step_desc' => 'Panaskan wajan dan tumis bawang bombay serta bawang putih hingga harum. Tambahkan daging dan tomat puree, aduk hingga tercampur rata dan biarkan setengah matang.',
                'step_img' => null
            ],
            [
                'step_header_id' => '48',
                'step_desc' => 'Selanjutnya, tambahkan wortel, kentang, seledri, dan rosemary ke dalam wajan. Masak sebentar sebelum menuangkan air dan Sasa Bumbu Ekstrak Daging Sapi.',
                'step_img' => null
            ],
            [
                'step_header_id' => '48',
                'step_desc' => 'Biarkan semuanya mendidih dan masak hingga daging dan sayuran matang serta airnya mengental.',
                'step_img' => null
            ],
            [
                'step_header_id' => '48',
                'step_desc' => 'Sajikan District 12s beef stew selagi hangat untuk menikmati cita rasanya yang lezat dan menggugah selera.',
                'step_img' => null
            ],
        ]);
    }
}
