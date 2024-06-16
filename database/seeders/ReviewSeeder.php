<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                "user_id" => "3",
                "recipe_id" => "1",
                "comment" => "Ayam goreng bawang putih ini sungguh luar biasa! Tekstur ayamnya renyah di luar, tapi juicy di dalamnya. Aromanya yang harum bawang putih benar-benar menggugah selera.",
                "rating" => "5",
                "img" => "review1.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "user_id" => "4",
                "recipe_id" => "1",
                "comment" => "Rasa ayam goreng bawang putih ini benar-benar mengingatkan saya akan masakan rumah. Bumbu-bumbunya meresap sempurna ke dalam daging ayam, membuatnya begitu lezat.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "1",
                "comment" => "Kombinasi sempurna antara renyah dan gurih! Ayam goreng bawang putih ini benar-benar membuat lidah saya bergoyang. Sangat direkomendasikan!",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "1",
                "comment" => "Ayam goreng bawang putih ini tidak hanya enak, tapi juga mudah untuk disiapkan. Saya sangat senang bisa membuat hidangan yang lezat ini di rumah.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "7",
                "recipe_id" => "1",
                "comment" => "Bumbu bawang putih dalam ayam goreng ini memberikan sentuhan yang unik. Rasanya begitu segar dan berbeda dari ayam goreng biasa.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "8",
                "recipe_id" => "1",
                "comment" => "Ayam goreng bawang putih ini memiliki cita rasa yang mendalam. Saya suka bagaimana bawang putihnya tidak terlalu kuat, tapi memberikan tambahan rasa yang sangat menyenangkan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "1",
                "comment" => "Ini adalah salah satu ayam goreng terbaik yang pernah saya coba! Kulitnya yang renyah dan bumbu bawang putih yang kaya rasa membuatnya sulit untuk berhenti makan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "1",
                "comment" => "Saya tidak bisa berhenti memikirkan ayam goreng bawang putih ini sejak saya mencobanya. Saya pasti akan membuatnya lagi untuk acara makan malam berikutnya.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "2",
                "comment" => "Rendang Daging Sapi ala Jawa ini benar-benar memukau! Dagingnya lembut dan bumbunya meresap sempurna, memberikan citra rasa yang autentik. Saya suka betapa kaya akan rempah-rempahnya dan aroma yang menggugah selera.",
                "rating" => "5",
                "img" => "review2.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "2",
                "comment" => "Saya sangat terkesan dengan Rendang Daging Sapi ala Jawa ini. Rasa gurih santan yang melimpah bersatu sempurna dengan daging sapi yang empuk. Tidak ada yang bisa menandingi kenikmatan dari rempah-rempah khas Jawa yang terasa dalam setiap gigitannya.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "2",
                "comment" => "Rendang Daging Sapi ala Jawa ini benar-benar menu yang wajib dicoba! Tekstur dagingnya yang melt-in-your-mouth dan bumbu rempah yang meresap begitu dalam menciptakan harmoni rasa yang luar biasa. Saya tidak sabar untuk mencicipi lagi!",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "3",
                "comment" => "Cookies Ginger Pohon Natal adalah sentuhan magis dalam setiap gigitannya! Rasanya yang kaya jahe dan teksturnya yang renyah membuatnya sempurna sebagai camilan untuk merayakan musim liburan.",
                "rating" => "5",
                "img" => "review3.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "3",
                "comment" => "Setiap Cookies Ginger Pohon Natal adalah karya seni yang lezat! Dari bentuknya yang menggemaskan hingga cita rasanya yang menggugah selera, cookies ini tidak pernah gagal untuk menyenangkan lidah saya dan keluarga.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "3",
                "comment" => "Cookies Ginger Pohon Natal adalah pilihan yang tepat untuk menambahkan kegembiraan Natal ke dalam hidangan Anda. Dengan kombinasi rasa jahe yang khas dan dekorasi warna-warni yang ceria, cookies ini akan membuat meja hidangan Anda semakin meriah.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "7",
                "recipe_id" => "3",
                "comment" => "Saya jatuh cinta pada Cookies Ginger Pohon Natal sejak gigitan pertama! Teksturnya yang renyah, rasa jahe yang kaya, dan hiasan yang menawan membuatnya menjadi camilan yang tidak bisa saya lewatkan selama musim liburan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "8",
                "recipe_id" => "4",
                "comment" => "Resep kue kering nastar ini sangat mudah diikuti dan hasilnya luar biasa! Aroma harum dari adonan yang terbuat dari campuran mentega, gula, dan kuning telur membuatnya begitu menggugah selera. Selai nanas di tengahnya memberikan sentuhan manis yang sempurna.",
                "rating" => "5",
                "img" => "review4.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "4",
                "comment" => "Saya sangat senang menemukan resep kue kering nastar yang sempurna untuk musim liburan ini. Proses pembuatannya yang terperinci memastikan bahwa setiap langkah dilakukan dengan benar. Hasil akhirnya adalah kue kering yang lezat dengan tekstur yang tepat dan rasa yang kaya.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "4",
                "comment" => "Resep kue kering nastar ini membuat kue terasa seperti yang dibeli dari toko roti terbaik! Tekstur kue yang renyah di luar dan lembut di dalamnya benar-benar memuaskan, dan rasa manis dari selai nanasnya sungguh menggugah selera. Saya pasti akan membuatnya lagi untuk berbagi dengan keluarga dan teman-teman.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "5",
                "comment" => "Resep Gudeg Ala Jogja ini benar-benar membawa cita rasa autentik kota pelajar ke dalam hidangan saya. Dengan bumbu rempah yang kaya dan nangka muda yang empuk, setiap suapan memberikan pengalaman kuliner yang mengesankan.",
                "rating" => "5",
                "img" => "review5.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "5",
                "comment" => "Gudeg Ala Jogja ini merupakan hidangan yang begitu menggoda dengan kombinasi manis dari nangka muda dan gurihnya santan serta rempah-rempah. Resepnya mudah diikuti dan hasilnya benar-benar memuaskan, cocok untuk dinikmati dalam acara keluarga atau acara khusus lainnya.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "6",
                "comment" => "Resep combro ini memberikan kombinasi tekstur yang sempurna dengan lapisan luar yang renyah dan lembut dalamnya. Hasilnya adalah camilan yang memuaskan bagi siapa pun yang menyukai rasa gurih dan kaya akan cita rasa.",
                "rating" => "5",
                "img" => "review6.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "6",
                "comment" => "Dengan isian oncom yang kaya akan rasa dan adonan singkong yang lembut, resep combro ini berhasil menciptakan paduan rasa tradisional yang autentik dengan sentuhan modern yang menyegarkan. Rasanya pasti akan menggugah selera.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "6",
                "comment" => "Combro yang baru digoreng dengan sempurna menjadi camilan hangat yang tidak bisa ditolak. Dengan aroma yang menggoda dan cita rasa yang lezat, combro ini pasti akan menjadi favorit di meja makan untuk dinikmati bersama keluarga dan teman-teman.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "7",
                "comment" => "Resep dodol Garut menghadirkan cita rasa tradisional yang kaya dan manis yang menjadi ikon kelezatan dari daerah Garut. Rasanya yang lembut dan gurih memikat lidah siapa pun yang mencicipinya.",
                "rating" => "5",
                "img" => "review7.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "7",
                "recipe_id" => "7",
                "comment" => "Dodol Garut tidak hanya menggoda dalam rasa, tetapi juga dalam tekstur yang lembut dan kenyal. Konsistensinya yang sempurna menjadikan dodol ini camilan yang memuaskan dan membuat ketagihan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "8",
                "recipe_id" => "7",
                "comment" => "Memasak dodol Garut membutuhkan kesabaran ekstra, tetapi hasil akhirnya sebanding dengan usaha. Proses memasaknya selama 4 jam menghasilkan dodol yang mengental dan lezat, membuat setiap gigitan menjadi kenangan yang tak terlupakan.",
                "rating" => "3",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "7",
                "comment" => "Dodol Garut bukan hanya sekadar camilan, tetapi juga bagian dari warisan budaya Indonesia. Saat dinikmati bersama keluarga dan teman-teman, dodol Garut menjadi pengingat akan kekayaan tradisi dan kelezatan lokal yang patut dilestarikan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "8",
                "comment" => "Resep nasi liwet kukus ini adalah penghidangan klasik yang mempertahankan kelezatan tradisionalnya. Tekstur lembut dan rasa rempah yang kaya membuat setiap suapan menjadi kenikmatan yang tak terlupakan.",
                "rating" => "5",
                "img" => "review8.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "8",
                "comment" => "Rempah-rempah seperti serai, daun salam, dan daun pandan memberikan aroma khas yang menggoda sejak awal memasak. Setiap gigitan nasi liwet kukus ini memberikan pengalaman kuliner yang autentik dan memuaskan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "8",
                "comment" => "Penggunaan daun pisang sebagai alas dalam proses memasak memberikan nuansa tradisional yang kuat. Selain memberikan aroma khas, daun pisang juga memberikan sentuhan alami yang memperkaya pengalaman makan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "8",
                "comment" => "Kombinasi bumbu-bumbu tradisional seperti bawang merah, bawang putih, dan jahe, serta tambahan santan instan, memberikan keseimbangan rasa yang pas antara gurih, manis, dan pedas. Setiap suapan nasi liwet kukus ini membuat lidah bergoyang dalam kenikmatan.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "8",
                "comment" => "Meskipun proses memasaknya membutuhkan kesabaran, nasi liwet kukus ini adalah sajian praktis yang membuat setiap usaha terbayar lunas. Nikmati kenikmatan tiada tara dari hidangan tradisional ini bersama keluarga dan teman-teman terdekat.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "9",
                "comment" => "Resep sate Padang menghadirkan cita rasa khas dengan bumbu rempah yang kaya dan kuah yang gurih. Daging sapi yang diolah dengan sempurna dan dilumuri bumbu Padang memberikan pengalaman kuliner yang autentik dan memikat.",
                "rating" => "5",
                "img" => "review9.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "9",
                "comment" => "Sate Padang tidak hanya sekadar camilan, tetapi juga sebuah pengalaman rasa yang memanjakan lidah. Dengan sentuhan rempah Padang yang khas, setiap suapan sate Padang menghadirkan kenikmatan hangat dan lezat yang tak terlupakan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "10",
                "comment" => "Resep kerak telor ini merupakan hidangan tradisional khas Jakarta yang tak bisa dilewatkan. Tekstur renyah dari kerak telor yang disajikan dengan taburan kelapa sangrai dan bawang goreng membuatnya menjadi camilan yang menggugah selera.",
                "rating" => "5",
                "img" => "review10.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "7",
                "recipe_id" => "11",
                "comment" => "Resep es pisang ijo menghadirkan kesegaran rasa buah tropis dalam setiap suapannya. Paduan pisang yang lembut dan manis, dilapisi dengan adonan tepung hijau dan disajikan dengan santan dan sirup gula merah, membuatnya menjadi hidangan pencuci mulut yang sempurna untuk menikmati cuaca panas.",
                "rating" => "4",
                "img" => "review11.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "8",
                "recipe_id" => "11",
                "comment" => "Es pisang ijo menggabungkan kelezatan tradisional dengan sentuhan modern yang menyegarkan. Warna hijau dari adonan tepung daun pisang memberikan kesan segar dan alami, sementara santan dan sirup gula merah memberikan sentuhan manis yang lezat.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "11",
                "comment" => "Cocok untuk dinikmati oleh semua kalangan, es pisang ijo tidak hanya menyegarkan, tetapi juga menghadirkan rasa manis yang memanjakan lidah. Hidangan ini adalah pilihan sempurna untuk menyegarkan hari Anda di tengah cuaca panas atau sebagai hidangan penutup istimewa untuk acara keluarga dan teman-teman.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "12",
                "comment" => "Lumpia khas Semarang adalah hidangan yang lezat dan populer, terdiri dari rebung, daging ayam, dan bumbu-bumbu rempah yang disajikan dalam kulit lumpia yang renyah. Rasanya yang gurih dan tekstur yang crunchy membuatnya menjadi pilihan favorit untuk dinikmati sebagai camilan atau hidangan utama.",
                "rating" => "5",
                "img" => "review12.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "12",
                "comment" => "Menggabungkan cita rasa tradisional dengan kepraktisan dalam penyajiannya. Dengan isian yang menggugah selera dan saus gula yang khas, lumpia ini cocok disajikan di berbagai acara atau sebagai camilan di rumah, memberikan pengalaman kuliner yang memuaskan bagi siapa pun yang menikmatinya.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "8",
                "recipe_id" => "13",
                "comment" => "Ayam Pop adalah hidangan ayam yang populer di Indonesia, khususnya di daerah Padang, Sumatra Barat. Hidangan ini terdiri dari potongan ayam yang dipanggang atau digoreng hingga kulitnya renyah sementara dagingnya tetap lembut dan bumbu rempahnya meresap. Rasanya gurih, pedas, dan kaya rempah, menjadikannya pilihan yang sempurna untuk dinikmati bersama nasi putih dan sambal.",
                "rating" => "5",
                "img" => "review13.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "14",
                "comment" => "Kelezatan brongkos tidak hanya berasal dari bumbu-bumbu rempahnya, tetapi juga dari paduan berbagai bahan seperti tahu, tempe, dan kacang panjang yang menambah tekstur dan rasa yang beragam.",
                "rating" => "4",
                "img" => "review14.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "14",
                "comment" => "Selain rasanya yang enak, brongkos juga dikenal karena kandungan nutrisinya yang baik, terutama dari kacang panjang dan bahan-bahan lainnya yang memberikan manfaat kesehatan bagi tubuh.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "15",
                "comment" => "Mochi khas Semarang ini menghadirkan rasa tradisional dengan tekstur yang lembut dan kenyal. Rasanya yang manis dengan isian kacang merah atau wijen membuatnya cocok sebagai camilan di sore hari.",
                "rating" => "5",
                "img" => "review15.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "15",
                "comment" => "Sajian mochi khas Semarang ini merupakan perpaduan sempurna antara kelembutan mochi dengan rasa manis yang pas. Dengan beragam pilihan isian, setiap gigitan akan memanjakan lidah Anda dengan sensasi yang tak terlupakan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "7",
                "recipe_id" => "16",
                "comment" => "Rasakan kelezatan khas Sulawesi dengan coto Makassar yang kaya akan rempah-rempah. Kuahnya yang gurih dan daging sapi yang empuk membuat hidangan ini begitu memikat!",
                "rating" => "4",
                "img" => "review16.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "8",
                "recipe_id" => "17",
                "comment" => "Dengan campuran sayuran segar, disajikan dengan lapisan saus kacang khas, resep gado-gado klasik ini memukau dengan kelezatan dan keanekaragaman tekstur.",
                "rating" => "5",
                "img" => "review17.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "17",
                "comment" => "Bagi pencinta pedas, resep Gado-gado ini adalah pilihan sempurna. Saus kacang yang pedas dan beraroma disajikan dengan sayuran yang segar, memberikan sensasi rasa yang menantang dan memuaskan.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "18",
                "comment" => "Dengan aroma harum buluh yang meresap dalam nasi yang empuk, Lemang Tapai menawarkan cita rasa yang kaya dan lezat yang cocok untuk disantap sebagai hidangan utama atau makanan pendamping.",
                "rating" => "5",
                "img" => "review18.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "19",
                "comment" => "Resep ini menghadirkan krecek yang renyah dan pedas yang memikat selera. Bumbu sambal yang meresap sempurna membuat hidangan ini cocok sebagai pendamping nasi hangat",
                "rating" => "5",
                "img" => "review19.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "20",
                "comment" => "Roti Gambang ini begitu lembut dan beraroma, dengan kombinasi sempurna antara aroma kayu manis dan kelembutan tekstur rotinya. Sangat cocok dinikmati sebagai camilan atau sarapan pagi yang menggugah selera.",
                "rating" => "5",
                "img" => "review20.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "20",
                "comment" => "Ketika mencoba Roti Gambang pertama kali, saya langsung terpikat dengan teksturnya yang begitu lembut dan kenyal. Paduan antara rasa manis dan rempah yang menyeluruh membuatnya menjadi pilihan yang sempurna untuk dinikmati bersama secangkir kopi atau teh.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "21",
                "comment" => "Kapurung menawarkan cita rasa autentik khas Sulawesi Selatan yang kaya akan rempah-rempah. Kuahnya yang kental dan gurih berpadu sempurna dengan sayuran segar dan potongan ikan atau daging, menciptakan harmoni rasa yang memanjakan lidah.",
                "rating" => "5",
                "img" => "review21.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "21",
                "comment" => "Dengan kombinasi sayuran hijau, protein dari ikan atau daging, serta karbohidrat dari sagu, Kapurung adalah pilihan menu yang menyehatkan. Setiap suapan memberikan keseimbangan gizi yang sempurna, cocok untuk keluarga yang ingin menjaga pola makan sehat.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "21",
                "comment" => "Memasak Kapurung memang memerlukan ketelatenan dan kesabaran, terutama saat mengolah sagunya. Namun, hasil akhirnya yang lezat dan tekstur yang unik sangat memuaskan dan layak untuk dicoba oleh pecinta kuliner tradisional.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "7",
                "recipe_id" => "22",
                "comment" => "Tampilannya unik dan menggoda. Sangat kreatif cara mereka membentuk roti menjadi sesuatu yang menyerupai buaya. Rasanya juga lezat, renyah di luar dan lembut di dalam.",
                "rating" => "5",
                "img" => "review22.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "8",
                "recipe_id" => "22",
                "comment" => "Saya sangat terkesan dengan kreativitas di balik menu ini. Mengubah roti biasa menjadi bentuk buaya yang menggemaskan adalah ide yang brilian dan menyenangkan untuk dinikmati bersama keluarga.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "22",
                "comment" => "Pilihan sempurna untuk membuat makanan yang menyenangkan bagi anak-anak. Mereka pasti akan terkesan dengan bentuknya yang lucu dan pasti akan menyukai rasanya yang lezat.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "23",
                "comment" => "Kue Keranjang adalah kudapan tradisional yang lezat dengan tekstur kenyal dan manis. Sangat cocok dinikmati sebagai camilan atau hidangan penutup.",
                "rating" => "5",
                "img" => "review23.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "23",
                "comment" => "Rasakan kelezatan Kue Keranjang yang meleleh di mulut dengan rasa gula merah yang khas. Teksturnya yang kenyal membuatnya menjadi favorit di setiap kesempatan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "23",
                "comment" => "Kue Keranjang tidak hanya lezat, tetapi juga sarat dengan nilai tradisional yang kaya. Setiap gigitan menghadirkan cita rasa masa lalu yang memikat.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "23",
                "comment" => "Tidak ada yang dapat menolak godaan dari Kue Keranjang yang lembut dan manis. Cocok dinikmati bersama secangkir teh hangat atau kopi di sore hari.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "23",
                "comment" => "Kue Keranjang adalah hidangan klasik yang terbuat dari bahan-bahan alami dan disajikan dengan keahlian yang sempurna. Setiap sajian menghadirkan cita rasa autentik yang sulit dilupakan.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "24",
                "comment" => "Kue bulan mereka sangat lezat dan memikat! Isian biji teratai memberikan rasa manis yang begitu nikmat di lidah.",
                "rating" => "5",
                "img" => "review24.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "24",
                "comment" => "Kue bulan di sini begitu lembut dan harum. Tersedia dalam berbagai varian rasa, membuatnya menjadi pilihan favorit untuk menemani teh sore.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "7",
                "recipe_id" => "24",
                "comment" => "Saya sangat menyukai tekstur kue bulan ini, begitu lembut dan mudah meleleh di mulut. Rasanya yang autentik membuat saya ingin kembali lagi dan lagi.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "8",
                "recipe_id" => "24",
                "comment" => "Kue bulan mereka terkenal dengan rasa tradisional yang kaya. Dibuat dengan teliti dan dipanggang hingga sempurna, memberikan pengalaman kue bulan yang tak terlupakan.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "25",
                "comment" => "Klapertart Keju ini luar biasa! Kombinasi lembutnya custard kelapa dengan cita rasa gurih keju membuatnya begitu memikat. Teksturnya yang lembut dan aroma harumnya sungguh menggugah selera. Sungguh pilihan sempurna untuk menemani santap sore atau sebagai pencuci mulut yang memuaskan.",
                "rating" => "5",
                "img" => "review25.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "25",
                "comment" => "Menu Klapertart Keju ini sungguh menggoda lidah! Rasanya yang lezat dan konsistensinya yang pas membuatnya menjadi favorit di hati. Tidak hanya nikmat disantap saat hangat, tapi juga tetap lezat ketika disimpan dalam lemari es. Cocok untuk dinikmati bersama keluarga atau sebagai sajian istimewa untuk tamu spesial.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "25",
                "comment" => "Resep Klapertart Keju ini adalah pilihan tepat untuk pencinta keju dan kelapa. Teksturnya yang creamy dan lembut, dipadukan dengan keju yang melimpah, menjadikan makanan penutup ini begitu istimewa. Cocok disajikan di berbagai acara, baik santai maupun formal. Benar-benar menggugah selera!",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "25",
                "comment" => "Klapertart Keju ini sukses membuat semua orang di rumah ketagihan. Kombinasi antara rasa manis kelapa dan gurihnya keju sangat seimbang, menciptakan harmoni rasa yang sempurna. Proses pembuatannya juga tidak rumit, dengan hasil yang selalu memukau. Sempurna untuk menemani waktu bersantai bersama keluarga!",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "26",
                "comment" => "Es Loder merupakan menu yang menyegarkan dengan paduan unik antara es serut dan berbagai jenis topping seperti jelly, kacang, dan buah-buahan segar. Rasanya yang manis dan segar cocok untuk dinikmati di hari yang panas.",
                "rating" => "4",
                "img" => "review26.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "26",
                "comment" => "Es Loder adalah pilihan sempurna untuk menghilangkan dahaga di tengah hari yang panas. Tekstur lembut dari es serut yang disajikan dengan berbagai topping membuatnya menjadi camilan yang nikmat dan menyenangkan.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "26",
                "comment" => "Dengan kombinasi rasa yang lezat dan tampilan yang menarik, Es Loder berhasil mencuri perhatian para pecinta makanan penutup. Tersedia dalam berbagai varian topping, membuat pengalaman menikmati Es Loder menjadi lebih beragam dan memuaskan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "27",
                "comment" => "Galamai ini luar biasa! Teksturnya yang kenyal dan aroma rempahnya begitu menggugah selera. Rasanya yang gurih dengan sentuhan manis pas membuatnya jadi menu favorit di keluarga kami.",
                "rating" => "5",
                "img" => "review27.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "7",
                "recipe_id" => "27",
                "comment" => "Saya sangat suka dengan galamai ini. Sajian tradisional yang begitu autentik dengan bumbu yang meresap sempurna. Sungguh menggugah selera dan cocok dinikmati di berbagai kesempatan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "8",
                "recipe_id" => "27",
                "comment" => "Galamai ini benar-benar lezat! Teksturnya yang kenyal dan cita rasa rempah yang kaya memberikan pengalaman kuliner yang memuaskan. Tidak sabar untuk mencoba lagi di lain waktu!",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "28",
                "comment" => "Resep klepon ketan ini menghasilkan jajanan tradisional yang lezat dengan rasa manis gula merah yang legit. Tekstur kenyal dan aromanya yang harum membuatnya cocok dinikmati sebagai cemilan di waktu senggang.",
                "rating" => "4",
                "img" => "review28.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "28",
                "comment" => "Menu klepon ketan menghadirkan sensasi kenyal dan manis yang memikat. Isi gula merah yang meleleh di dalamnya menjadi sajian yang disukai oleh banyak orang, cocok untuk dinikmati bersama keluarga di rumah.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "28",
                "comment" => "Resep klepon ketan ini memberikan pengalaman rasa autentik jajanan pasar yang mudah dibuat di rumah. Dengan bahan-bahan yang mudah ditemukan, Anda bisa menciptakan camilan lezat yang disukai semua orang.",
                "rating" => "3",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "28",
                "comment" => "Siapa yang bisa menolak kelezatan klepon ketan? Dengan paduan antara tekstur kenyal klepon dan manisnya gula merah di dalamnya, jajanan klasik ini selalu berhasil memikat selera siapa pun yang mencicipinya.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "29",
                "comment" => "Resep Es Gempol Pleret ini menghadirkan cita rasa tradisional yang lezat dan menyegarkan. Tekstur gempol yang kenyal dipadu dengan aroma gula merah dan santan membuatnya menjadi pilihan dessert yang cocok untuk dinikmati di tengah hari yang panas.",
                "rating" => "5",
                "img" => "review29.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "29",
                "comment" => "Es Gempol Pleret merupakan hidangan khas Jawa yang menggoda selera. Paduan antara gempol yang lembut dengan kuah gula merah yang kental menciptakan sensasi manis yang memanjakan lidah. Cocok disajikan sebagai pencuci mulut setelah makanan berat atau sebagai camilan di sore hari.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "30",
                "comment" => "Es Pallu Butung ini benar-benar menyegarkan! Rasanya yang manis dan segar dari santan, gula merah, dan es serutnya membuatnya sempurna untuk dinikmati di hari yang panas.",
                "rating" => "5",
                "img" => "review30.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "30",
                "comment" => "Saya suka bagaimana es ini menggabungkan rasa kental dan lezat dari santan dengan rasa unik gula merah dan aroma pandan. Benar-benar sebuah hidangan penutup yang memuaskan!",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "7",
                "recipe_id" => "31",
                "comment" => "Menu ayam kodok ini sungguh menggugah selera! Dengan bumbu rempah yang meresap sempurna ke dalam daging ayam yang empuk, setiap suapan memberikan sensasi yang menggoda. Tidak hanya lezat, tetapi juga mudah disiapkan, menjadikan hidangan ini pilihan sempurna untuk keluarga yang ingin menikmati hidangan yang istimewa.",
                "rating" => "5",
                "img" => "review31.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "8",
                "recipe_id" => "31",
                "comment" => "Ayam kodok adalah pilihan yang tepat untuk variasi menu masakan keluarga. Dengan bumbu yang meresap hingga ke bagian dalam, hasilnya adalah ayam yang juicy dan penuh dengan cita rasa. Resep yang sederhana namun menghasilkan hidangan yang lezat, pasti akan membuat semua orang kembali meminta tambahan!",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "32",
                "comment" => "Santapannya menggugah selera! Kuah santan yang kental menyatu sempurna dengan aroma rempah-rempah yang meresap pada telur. Rasanya benar-benar menggoda dan cocok untuk santapan sehari-hari.",
                "rating" => "5",
                "img" => "review32.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "32",
                "comment" => "Menu yang lezat dan praktis! Telur yang direbus dengan sempurna berpadu harmonis dengan kuah santan yang gurih. Tidak hanya mengenyangkan, tetapi juga memanjakan lidah dengan cita rasa yang otentik.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "32",
                "comment" => "Tampilan yang menggiurkan dan rasanya tak kalah menggoda! Kuah santan yang lezat meresap dalam setiap gigitan telur. Ditambah dengan bumbu-bumbu khas yang terasa sangat autentik, membuat hidangan ini sempurna untuk dinikmati bersama keluarga.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "32",
                "comment" => "Inilah sajian yang selalu dinantikan setiap kali makan siang! Telur yang lembut bertemu dengan kuah santan yang kaya rempah, menciptakan paduan cita rasa yang memukau. Cocok disajikan dengan nasi hangat untuk pengalaman makan yang memuaskan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "33",
                "comment" => "Bubur Ayam Betawi adalah sajian khas yang lezat dan menyehatkan. Dengan bahan-bahan seperti ayam, beras, dan rempah-rempah, bubur ini memiliki cita rasa yang khas dan gurih.",
                "rating" => "5",
                "img" => "review33.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "34",
                "comment" => "Resep ini menghadirkan bubur yang lembut dengan sentuhan kriuk dari keripik bayam yang renyah. Kaya akan nutrisi dari bayam dan beras, bubur ini tidak hanya menggugah selera, tetapi juga memberikan rasa yang memanjakan lidah. Cocok untuk sarapan atau makanan ringan di tengah hari.",
                "rating" => "5",
                "img" => "review34.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "34",
                "comment" => "Kreasi ini menampilkan bubur dengan tekstur halus yang dipadukan dengan keripik bayam yang membuatnya semakin istimewa. Selain memberikan cita rasa yang unik, bubur keripik bayam ini juga menawarkan manfaat kesehatan dari bayam yang kaya akan serat dan gizi. Sangat cocok untuk dinikmati sebagai hidangan lezat dan bergizi bagi keluarga.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "35",
                "comment" => "Nasi tutug oncom adalah sajian yang menggabungkan kelezatan nasi dengan cita rasa gurih oncom yang khas. Kedua bahan tersebut dipadukan dengan sempurna, memberikan rasa yang kaya dan tekstur yang menggoda. ",
                "rating" => "4",
                "img" => "review35.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "7",
                "recipe_id" => "35",
                "comment" => "Resep nasi tutug oncom merupakan inovasi menarik dalam menyajikan oncom, bahan pangan tradisional Indonesia, dengan cara yang baru dan menggugah selera. ",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "8",
                "recipe_id" => "35",
                "comment" => "Nasi tutug oncom menghadirkan paduan sempurna antara tradisi kuliner Indonesia dengan cita rasa yang lezat dan menggugah selera. Kelezatan oncom yang dipadukan dengan nasi yang pulen dan aromatik membuat hidangan ini menjadi favorit bagi pecinta masakan tradisional.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "36",
                "comment" => "Resep lodeh ini luar biasa! Rasanya autentik dan kaya rempah-rempah. Saya sangat suka dengan paduan santan yang lezat dan sayuran yang empuk. Sangat cocok disantap bersama nasi hangat.",
                "rating" => "5",
                "img" => "review36.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "36",
                "comment" => "Saya baru saja mencoba resep sayur lodeh ini dan saya terkesan! Tekstur sayurannya begitu lembut dan kuah santannya begitu gurih. Mudah dan cepat untuk disiapkan, cocok untuk hidangan sehari-hari.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "36",
                "comment" => "Wow! Resep lodeh yang sangat menggugah selera. Kombinasi berbagai bumbu membuatnya begitu sedap. Ini benar-benar sayuran yang lezat dan sehat. Sangat direkomendasikan untuk yang ingin mencoba hidangan tradisional yang lezat!",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "37",
                "comment" => "Resep cumi saus Padang ini sangat lezat! Cumi yang digoreng tepung disiram dengan saus Padang yang pedas dan gurih, menciptakan paduan cita rasa yang menggoda.",
                "rating" => "5",
                "img" => "review37.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "37",
                "comment" => "Sajian cumi saus Padang ini menghadirkan sensasi kuliner yang autentik. Rasa pedas dari saus Padangnya sangat pas dengan kelezatan cumi yang empuk dan renyah.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "37",
                "comment" => "Menu cumi saus Padang ini merupakan pilihan yang tepat untuk penggemar masakan seafood dengan cita rasa khas Indonesia. Saus Padang yang kental dan bumbu rempahnya membuatnya begitu menggugah selera.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "37",
                "comment" => "Cumi saus Padang ini cocok disajikan sebagai hidangan utama di meja makan. Kelezatan cumi yang disiram dengan saus Padang yang kaya rasa membuatnya menjadi favorit di keluarga.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "37",
                "comment" => "Dengan resep cumi saus Padang yang mudah dan praktis, Anda bisa menyiapkan hidangan spesial dengan cepat di rumah. Rasakan kelezatan cita rasa khas Padang dalam setiap suapan cumi yang juicy dan lezat.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "7",
                "recipe_id" => "38",
                "comment" => "Resep cuanki sehat ini benar-benar menyegarkan! Dengan paduan aneka sayuran segar dan bumbu rempah yang khas, cuanki ini memberikan cita rasa yang luar biasa. Cocok untuk disantap sebagai hidangan hangat di hari-hari yang sejuk.",
                "rating" => "4",
                "img" => "review38.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "8",
                "recipe_id" => "38",
                "comment" => "Cuanki sehat ini merupakan pilihan sempurna bagi yang menginginkan hidangan lezat dan bergizi. Dengan tambahan berbagai jenis bahan, seperti tahu, bakso, dan jamur, resep ini menawarkan sensasi makan yang memuaskan dan bergizi tanpa harus khawatir akan kesehatan.",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "9",
                "recipe_id" => "39",
                "comment" => "Dalam resep ini, mie celor disajikan dengan bahan-bahan vegan yang menggugah selera. Sayuran segar seperti tauge, wortel, dan kubis, dicampur dengan saus lezat berbahan dasar santan, membuat hidangan ini kaya akan rasa dan gizi. Cocok bagi yang mencari opsi makanan yang ramah lingkungan dan menyehatkan.",
                "rating" => "4",
                "img" => "review39.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "10",
                "recipe_id" => "39",
                "comment" => "Mie celor vegan ini menghadirkan cita rasa yang autentik namun tetap memperhatikan prinsip kesehatan dan kepedulian terhadap lingkungan. Dengan penggunaan bahan-bahan nabati seperti susu kelapa dan sayuran-sayuran segar, hidangan ini memberikan variasi yang menyenangkan bagi para vegan dan non-vegan yang ingin mencoba sesuatu yang baru.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "5",
                "recipe_id" => "40",
                "comment" => "Semur daging ini enak banget! Dagingnya empuk dan bumbunya meresap sempurna. Cocok banget disantap dengan nasi hangat di hari-hari yang sejuk.",
                "rating" => "5",
                "img" => "review40.png",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "6",
                "recipe_id" => "40",
                "comment" => "Resep semur daging yang praktis dan mudah diikuti. Rasanya begitu lezat dan gurih. Saya pasti akan membuatnya lagi untuk keluarga!",
                "rating" => "5",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "3",
                "recipe_id" => "40",
                "comment" => "Saya suka dengan semur daging ini karena bumbunya meresap sempurna ke dalam daging. Ditambah dengan tambahan kentang dan wortel, membuatnya semakin menggugah selera.",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "user_id" => "4",
                "recipe_id" => "40",
                "comment" => "Semur daging yang saya buat dengan resep ini menjadi favorit keluarga! Dagingnya lembut dan berpadu sempurna dengan kuah yang kental dan gurih. Pasti akan saya masak lagi!",
                "rating" => "4",
                "img" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
        ]);
    }
}
