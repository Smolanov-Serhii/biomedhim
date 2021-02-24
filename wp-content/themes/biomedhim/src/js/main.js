$(document ).ready(function() {

    if ($('.bio-slider').length){
        var MainBanner = new Swiper('.bio-slider .swiper-container', {
            slidesPerView: 1,
            loop: true,
            pagination: {
                el: '.bio-slider .swiper-pagination',
            },
        });
    }

    if ($('.bio-clients').length){
        var Partners = new Swiper('.bio-clients .swiper-container', {
            slidesPerView: 5,
            loop: true,
            observer: true,
            observeParents: true,
            lazy: true,
            pagination: {
                el: '.bio-clients .swiper-pagination',
            },
            breakpoints: {
                900: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                },
                240: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    centeredSlides: false,
                }
            }
        });
    }
    if ($('#map').length){
        if (  jQuery(window).width() >= 1100 ) {
            var FirstCoord = 53.925701;
            var SecondCoord = 30.341069;

            var CenterFirstCoord = 53.925678;
            var CenterSecondCoord = 30.338758;
        } else {
            var FirstCoord = 53.925701;
            var SecondCoord = 30.341069;

            var CenterFirstCoord = FirstCoord;
            var CenterSecondCoord = SecondCoord;
        }
        ymaps.ready(function () {
            var IconUrl = $('.uni-footer__map').data('icon');
            var myMap = new ymaps.Map('map', {
                    center: [CenterFirstCoord, CenterSecondCoord],
                    controls: [],
                    zoom: 18
                }, {
                    searchControlProvider: true
                }),

                // Создаём макет содержимого.
                MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                    '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                ),

                myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                }, {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    // Своё изображение иконки метки.
                    iconImageHref: "",
                    // Размеры метки.
                    iconImageSize: [0, 0],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                }),
                myPlacemarkWithContent = new ymaps.Placemark([FirstCoord, SecondCoord], {
                }, {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    iconLayout: 'default#imageWithContent',
                    // Своё изображение иконки метки.
                    iconImageHref: IconUrl,
                    // Размеры метки.
                    iconImageSize: [72, 87],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-40, -90],
                    // Смещение слоя с содержимым относительно слоя с картинкой.
                    iconContentOffset: [15, 15],
                    // Макет содержимого.
                    iconContentLayout: MyIconContentLayout
                });

            myMap.geoObjects
                // .add(myPlacemark)
                .add(myPlacemarkWithContent);
        });
    }



});






