<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>
    <link href="{{asset('css/info.css') }}" rel="stylesheet">
    <script src="{{ asset('js/info.js') }}" defer></script>

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="blog-slider">
        <div class="blog-slider__wrp swiper-wrapper">
            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">

                    <img src="{{asset('imgbg/info.jpg')}}" alt="">
                </div>
                <div class="blog-slider__content">
                    <span class="blog-slider__code">26 December 2022</span>
                    <div class="blog-slider__title">Development Team</div>
                    <div class="blog-slider__text">Có làm thì mới có ăn</div>
                    <a href="#" class="blog-slider__button">READ MORE</a>
                </div>
            </div>
            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/277643502_343694884393561_5726447646073995880_n.jpg?stp=dst-jpg_s206x206&_nc_cat=101&ccb=1-5&_nc_sid=aee45a&_nc_ohc=fAzfpbqUTOgAX9u8Qmi&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AVL3DUwQTH78-l3d-Y0-5WIv-e3QE8PeBiUh7cgmpexiaw&oe=6270DB1F"
                        alt="">
                </div>
                <div class="blog-slider__content">
                    <span class="blog-slider__code">22 Jun 2001</span>
                    <div class="blog-slider__title">Đoàn Ngọc Hải</div>
                    <div class="blog-slider__text">Ông Hoàng CopyPaste</div>
                    <a href="#" class="blog-slider__button">READ MORE</a>
                </div>
            </div>

            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/277691335_983746009182127_6721165532357454288_n.jpg?stp=dst-jpg_s206x206&_nc_cat=108&ccb=1-5&_nc_sid=aee45a&_nc_ohc=peHYRXEHWygAX_a0K9u&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AVKLfg88ZeyklkWjdqU48cYTtMnT5XOugpyj1KMJILbQdw&oe=626ED704"
                        alt="">
                </div>
                <div class="blog-slider__content">
                    <span class="blog-slider__code">30 November 2001</span>
                    <div class="blog-slider__title">Nguyễn Duy Khánh</div>
                    <div class="blog-slider__text">Ông hoàng của sự cố gắng</div>
                    <a href="#" class="blog-slider__button">READ MORE</a>
                </div>
            </div>

            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="https://scontent.fdad3-4.fna.fbcdn.net/v/t1.6435-9/125463770_2746865422240034_2666573679892352181_n.jpg?_nc_cat=104&ccb=1-5&_nc_sid=174925&_nc_ohc=e7tmOu4Ox9gAX81bcJb&_nc_oc=AQlWT9JaKJaveDayLBx9XgB1KRXlZmDOlf-E5_HUqrENNy6_hlKPLemfcdKTB40IbKQ&_nc_ht=scontent.fdad3-4.fna&oh=00_AT9Wd1tTPCk7-Kpk2UfzhGvo5MSVVviCPs3h9QvPvJEIlw&oe=626F20E2"
                        alt="">
                </div>
                <div class="blog-slider__content">
                    <span class="blog-slider__code">07 December 1999</span>
                    <div class="blog-slider__title">Nguyễn Kim Khương</div>
                    <div class="blog-slider__text">Đầu tàu để team cố gắng, gà rồi mà còn suy tình .</div>
                    <a href="#" class="blog-slider__button">READ MORE</a>
                </div>
            </div>

        </div>
        <div class="blog-slider__pagination"></div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script>
    <script src="./script.js"></script>

</body>

</html>