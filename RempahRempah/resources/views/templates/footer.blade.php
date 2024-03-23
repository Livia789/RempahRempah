<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin:0px;
            padding:0px;
        }

        a{
            text-decoration: none;
        }

        p{
            margin:15px 0px;
        }

        .footerContainer{
            background-color: #201c1c;
            color:white;
            display:flex;
            flex-direction:column;
            text-align:center;
            padding:50px;
        }

        .footerContentContainer{
            background-color: #201c1c;
            color:white;
            margin:auto;
            width:80%;
            display:flex;
            flex-direction:row;
            justify-content:space-between;
        }

        .footerSectionContainer{
            margin:10px;
            padding:25px 0px;
            width:auto;
            max-width: 25%;
            {{--  border:2px solid white;  --}}
            text-align:left;
        }

        .footerLogo{
            width:100px;
            height:auto;
        }

        .roundedBox{
            border:2px solid white;
            display:inline-box;
            padding:10px;
            border-radius:10px;
            width:fit-content;
        }

        .yellow{
            color:#E3E800;
            border:2px solid #E3E800;
            transition:all 0.3s;
        }

        a.yellow:hover{
            color:#e8a200;
            border:2px solid #e8a200;
            background-color:#000000;
        }

        a.yellow:hover::after{
            content:' 👨‍🍳 →';
            transition:all 0.3s;
        }

        .socialMediaIcon{
            width:25px;
            height:auto;
        }

        .socialMediaIconContainer{
            width:80%;
            display:flex;
            justify-content: space-between;
        }

        hr{
            margin:20px auto;
            background-color:white;
            height:1px;
            width:80%
        }

        @media (max-width: 992px) {
            .footerContentContainer{
                flex-direction:column;
                justify-content: center;
            }

            .footerSectionContainer{
                max-width:100%;
                text-align:center;
                justify-content: center;
            }

            p{
                margin:20px auto;
            }

            .socialMediaIconContainer{
                width:50%;
                margin:auto;
            }

        }

        @media (max-width: 350px) {
            .footerContainer{
                padding:10px;
            }
        }
    </style>
</head>

<body>
    <div class="footerContainer">
        <div class="footerContentContainer">
            <div class="footerSectionContainer">
                <img src="/assets/logo_rempah.png" class="footerLogo">
                <p style="padding:30px 0px">“Dari Dapur ke Dunia, Resep Sederhana, Kelezatan Luar Biasa”</p>
                <a class="roundedBox yellow" href="\tentangKami">Tentang Kami</a>
            </div>
            <div class="footerSectionContainer">
                <p>Hubungi Kami:</p>
                <p>Email</p>
                <p class="roundedBox">rempah-rempah@gmail.com</p>
                <p>Kontak</p>
                <p class="roundedBox">+62 321654987</p>
            </div>
            <div class="footerSectionContainer">
                    <p>Media sosial kami</p>
                    <div class="socialMediaIconContainer">
                        <a href="https://www.instagram.com/rempahrempah"><img class="socialMediaIcon" src="/assets/instagramLogo.png" class="footerLogo"></a>
                        <a href="https://www.twitter.com/rempahrempah"><img class="socialMediaIcon" src="/assets/twitterLogo.png" class="footerLogo"></a>
                        <a href="https://www.facebook.com"><img class="socialMediaIcon" src="/assets/facebookLogo.png" class="footerLogo"></a>
                    </div>
                    <p class="roundedBox yellow">@rempah-rempah</p>
            </div>
        </div>
        <hr>
        <p>© 2024 Rempah-Rempah, All right reserved.</p>
    </div>
</body>
</html>


{{--
    TODO:
    1. [ ] link ke page tentangKami
    2. [ ] modif link akun ig, twitter, facebook
    3. [ ] ganti font
--}}
