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

    if ($('.custom-chackout').length){
        $('#billing_country_field').appendTo('.custom-chackout__right');
        $('#billing_state_field').appendTo('.custom-chackout__right');
        $('#city_field').appendTo('.custom-chackout__right');
        $('#street_field').appendTo('.custom-chackout__right');
        $('#house_field').appendTo('.custom-chackout__right');
        $('#kvof_field').appendTo('.custom-chackout__right');
        $('#payment').appendTo('.custom-chackout__pay');



        $('.custom-chackout__rev input').blur(function(){
            if(!$(this).val()){
                $(this).closest('p').find('label').addClass('input-enter');
                console.log('enter');
            } else{
                $(this).closest('p').find('label').removeClass('input-enter');
            }
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

            var FirstCoord = 54.830453;
            var SecondCoord = 56.086357;

            var CenterFirstCoord = 54.830525;
            var CenterSecondCoord = 56.088109;
        } else {
            var FirstCoord = 53.925701;
            var SecondCoord = 30.341069;

            var CenterFirstCoord = FirstCoord;
            var CenterSecondCoord = SecondCoord;
        }
        ymaps.ready(function () {
            var IconUrl = $('.bio-map').data('icon');
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
            myMap.behaviors.disable('scrollZoom');
            myMap.geoObjects
                // .add(myPlacemark)
                .add(myPlacemarkWithContent);
        });
    }

    if ($('#map-contacts').length){

            var FirstCoord = 54.830517;
            var SecondCoord = 56.086317;

            var CenterFirstCoord = 54.830517;
            var CenterSecondCoord = 56.086317;

        ymaps.ready(function () {
            var IconUrl = $('.bio-map').data('icon');
            var myMap = new ymaps.Map('map-contacts', {
                    center: [CenterFirstCoord, CenterSecondCoord],
                    controls: [],
                    zoom: 16
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
            myMap.behaviors.disable('scrollZoom');
            myMap.geoObjects
                // .add(myPlacemark)
                .add(myPlacemarkWithContent);
        });
    }

    $(".menu-item-has-children", "#category-menu").hover(
        function() {
            $(this).find(".sub-menu").fadeIn(300);
        },
        function() {
            $(this).find(".sub-menu").fadeOut(300);
        }
    );

    if ($('.quantity').length){
        $( '.quantity' ).each(function( index ) {
            let col = $(this).find('input');
            let plus = $(this).find('.quantity-arrow-plus');
            let minus = $(this).find('.quantity-arrow-minus');
            let step = $(this).find('input').attr('step');
            let min = $(this).find('input').attr('min');
            var total = 0;
            plus.click(function() {
                total = (col.val() * 1) + (step * 1);
                col.val(total);
                $('button.button').removeAttr("disabled");
                var check = col.val();
                if (total > min){
                    minus.removeClass('disable');
                }
            });
            minus.click(function() {
                var check = col.val();
                total = (col.val() * 1) - (step * 1);
                col.val(total);
                $('button.button').removeAttr("disabled");
                if (total <= min){
                    minus.addClass('disable');
                } else {
                    minus.removeClass('disable');
                }

            });
        });
    }

});






