<?
add_shortcode( 'slider__header', 'footag_func' ); 

function footag_func( ){ 

    ob_start(); // уберает от ошибкe когда вставляемый шорткод выводиться с начала всего контента

?>

<style>
    :root {
            --size-caficent-text-slider: 1;
            --size-caficent-controls: 1;
            --pager-size: calc(20px * var(--size-caficent-controls));
            --controls-button: calc(16px * 2.5 * var(--size-caficent-controls));
            --slider-height: 600px;

            --width-lide-content-width: calc(16px * 60);
            --slider-content-height: 450px;
        }
        .slider {
            position: relative;
            z-index: 1;            
        }
        .bx-wrapper {
            box-shadow: none!important;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            border: 0;
            margin-bottom: 0!important;
        }
        .slider ul {
            height: var(--slider-height);
            
        }
        .slider li {
            height: var(--slider-height);
            background-repeat: no-repeat;
            background-size: cover!important;
            background: var(--global-palette6);
            /* background: #000; */
        }

        /* pager */
        .pager {
            position: absolute;
            right: 1rem;
            bottom: 2rem;
            z-index: 10;
        }
        .pager a {
            display: block;

            background: transparent;
            border: 2px solid #fff;
            box-sizing: border-box;
            box-shadow: 0 0 2px 1px #9b9b9b6e;

            width: var(--pager-size);
            height: var(--pager-size);
            
            transition: .4s;
            margin-bottom:  calc(16px * .7);
            border-radius: 5px;
            
        }
        .pager a:hover {
            background: #fff;
        }   
        .pager .active {
            background: #fff;
        }
        .pager a:last-child {
            margin-bottom: 0;
        }

        /* controls */
        .custom-controls {
            background: #ccc;
            position: absolute;
            left: 1rem;
            bottom: 2rem;
            z-index: 10;

           display: flex;
           justify-content: space-between;
           align-items: center;
           gap: 1rem;
           background: transparent;
        }
        .custom-controls a {
            background-repeat: no-repeat;
            width: var(--controls-button);
            height: var(--controls-button);
            display: block;
            border: 2px solid #fff;
            padding: .8rem 1.2rem;
            transition: .5s;
        }
        .custom-controls a:hover {
            background-position-x: 100%;
            padding-left: 20px;
        }
        .bx-prev {
            transform: rotate(180deg);
            background: url("<?php bloginfo('template_directory'); ?>/slider/img/arrows.png"), transparent;
            background-position: center center;
            background-size:  calc(16px * 2 * var(--size-caficent-controls));
            
        }
            
        .bx-next  {
            background: url("<?php bloginfo('template_directory'); ?>/slider/img/arrows.png"), transparent;
            background-position: center center;
            background-size: calc(40px * var(--size-caficent-controls));   
        }

      
        /* slide data */

        .slide__data {
            
           /* 
            background: #fff;
            box-shadow: 0 0 2px 1px #25252514;
            border-radius: 8px;
            overflow: hidden;
            
             position: absolute;
           left: 10%;
           right: 10%;
           top: 50px; */
            /* max-width: var(--width-lide-content-width); */
            
            position: absolute;
            left: 0;
            right: 0;
            top: 0; 
            bottom: 0;
            margin: auto;
            min-height: var(--slider-content-height);
            z-index: 10;
            
            
        }
        .slide__wrapper {
            padding: 0 1rem;
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 50px;
        }
        .slide__wrapper_k {
            background: #fff;
            box-shadow: 0 0 2px 1px #25252514;
            border-radius: 8px;
            overflow: hidden;
            max-width: var(--width-lide-content-width);
        }
        .slide__tag {
            text-transform: uppercase;
            font-size: calc(16px * 1.2 * var(--size-caficent-text-slider));
            color: var(--global-palette1);
            font-family: 'Roboto';
            font-weight: 400;
            letter-spacing: 1px;
            margin-bottom: .7rem;
        }
        .slide__data .slide__title {
            font-size: calc(16px * 1.8 * var(--size-caficent-text-slider));
            line-height: calc(16px * 2.3 * var(--size-caficent-text-slider));
            font-weight: 800;
            color: var(--global-palette3);
        }
        .slide__data .slide__title--x1 {
            font-size: calc(16px * 1.6 * var(--size-caficent-text-slider));
            line-height: calc(16px * 2 * var(--size-caficent-text-slider))
        }
        .slide__data .slide__title--x3 {
            font-size: calc(16px * 3 * var(--size-caficent-text-slider));
            line-height: calc(16px * 3 * var(--size-caficent-text-slider));
        }
        .slide__data .slide__SubTitle {
            font-size: calc(16px * 1.2 * var(--size-caficent-text-slider));
            font-weight: 300;
            margin: .5rem 0;
        }
        .slide__data .slide__description {
            font-size: calc(16px * 1.2 * var(--size-caficent-text-slider));
            font-weight: 300;
            line-height: calc(16px * 1.7 * var(--size-caficent-text-slider));
            margin: .4rem 0;
            color: var(--global-palette4);
        }
        .slide__data .slide__button {
            border: 0;
            padding: calc(16px * 0.4 * var(--size-caficent-text-slider)) calc(16px * .7 * var(--size-caficent-text-slider));
            font-size: calc(16px * 1 * var(--size-caficent-text-slider));
            margin-top: calc(16px * var(--size-caficent-text-slider));
            box-sizing: border-box;
            cursor: pointer;
            border-radius: 3px;
            transition: .4s;
            /* border: 3px solid #f0f0f0; */
        }
        .slide__data .slide__button:hover {
            /* background: #fff; */
            /* border: 3px solid #2b2b2b; */
        }
        .slide__imgWrapper {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        .slide__img {
            object-fit: cover;
            width: max-content;
        }

        .slide__row {
            display: flex;
            gap: .5rem;
        }
        .slide__row--buttons {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 1rem;
            margin: 0;
        }
        .slide__button {
             margin: 0 !important;
         }
        .slide__row .slide__hulf {
            /* flex: 1; */
        }
        .slide__row--buttons .slide__hulf {
            flex: none;
        }
        .slide__hulf--content {
            padding: calc(16px * 1.6 * var(--size-caficent-text-slider)) calc(16px * 2 * var(--size-caficent-text-slider));
            box-sizing: border-box;

            display: grid;
            height: 100%;
            align-content: space-between;
            
            order: 1;
            flex-basis: calc(var(--width-lide-content-width) - 70%);
            height: var(--slider-content-height);
        }
        
        .slide__hulf--img {
            order: 2;
            
        }  
        .slide__hulf--img img {
            height: var(--slider-content-height);
            object-fit: cover;
            object-position: center;
        }      
        @media screen and (min-width: 768px) and (max-width: 980px) {
            :root {
                --size-caficent-text-slider: .9!important;
                --size-caficent-controls: .9!important;
            }
        }
        @media screen and (max-width: 768px) {
            :root {
                --size-caficent-text-slider: .8;
                --size-caficent-controls: .8!important;

                /* --slider-content-height: 350px; */
                /* --slider-height: 750px; */
            }
            .slide__data {
                /* top: 80px; */
                left: 1rem;
                right: 1rem;
                width: auto;
            }
            
            .slide__row--buttons {
                display: flex;
            }
            .slide__button {
                font-size: 1.1rem!important;
            }
            .pager {
                display: none;
            }
        }
        @media screen and (max-width: 540px) {
            .bx-viewport li {
                height: 700px;
            }
             
            :root {
                --size-caficent-text-slider: .8;
                --size-caficent-controls: .7;
                --slider-height: 750px;
                --slider-content-height: 400px;
            }
            
            .slide__row {
                display: flex;
                flex-wrap: wrap;
            }
            .slide__hulf {
                flex: auto !important;
                flex-basis: 100% !important;
            }
            .slide__hulf--content {
                order: 2!important;
                /* display: block; */

            }
            .slide__hulf--img {
                order: 1!important;
                height: 150px;
            }
            .slide__hulf--img img {
                height: 150px;
                width: 100%;
            }
        }
        
</style>
    <div class="slider">
       <ul>
            <li class="first-slide ">
                
                <video playsinline autoplay muted loop poster="cake.jpg">
                    <source src="http://martoyym.beget.tech/wp-content/uploads/2024/09/header_bg.mp4" type="video/webm">
                    Your browser does not support the video tag.
                </video>

                <div class="slide__data">
                    <div class="slide__wrapper">
                        <div class="slide__wrapper_k">
                            <div class="slide__row">
                                <div class="slide__hulf slide__hulf--content">
                                    <div class="slide__tag"></div>
                                    <div class="slide__mainText">
                                        <div class="slide__title slide__title--x3">АЗБУКА СЛУХА</div>
                                        <div class="slide__SubTitle">СЛУХОВЫЕ АППАРАТЫ И АКСЕССУАРЫ</div>
                                        <div class="slide__description">Мы предлагаем нашим клиентам — полный ассортимент слуховых аппаратов и аксессуаров!</div>
                                    </div>
                                    <div class="slide__row--buttons">
                                        <div class="slide__hulf"><a href="/category/hearings-aids"><button class="slide__button">Слуховые аппарты</button></a></div>
                                        <div class="slide__hulf"><a href="/category/accessories/"><button class="slide__button">Аксессуары</button></a></div>
                                    </div>
                                </div>
                                <div class="slide__hulf slide__hulf--img">
                                    <img class="slide__img" src="http://martoyym.beget.tech/wp-content/uploads/2024/09/2148984290.jpg" alt="unique-u-fa-440">
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </li>
            <li style = "background: url('http://martoyym.beget.tech/wp-content/uploads/2024/09/2148940049.jpg'); ">
                <div class="slide__data">
                    <div class="slide__wrapper">
                        <div class="slide__wrapper_k">
                            <div class="slide__row">
                                <div class="slide__hulf slide__hulf--content">
                                    <div class="slide__tag">Спецпредложение</div>
                                    <div class="slide__mainText">
                                        <div class="slide__title">ВЫЕЗД НА ДОМ  ПО МОСКВЕ БЕСПЛАТНО! </div>
                                        
                                        <div class="slide__description">
                                            Выезжаем на дом за 100 км от Москвы! Разборчивость речи - вернется!
                                        </div>
                                    </div>
                                    
                                    <div class="slide__row--buttons">
                                        <div class="slide__hulf"><a href="#popmake-1219"><button class="slide__button">Заказать выезд на дом</button></a></div>
                                    </div>
                                </div>
                                <div class="slide__hulf slide__hulf--img">
                                    <img class="slide__img" src="http://martoyym.beget.tech/wp-content/uploads/2024/09/2148940049.jpg" alt="unique-u-fa-440">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style = "background: url('http://martoyym.beget.tech/wp-content/uploads/2024/09/2148984290.jpg');">
                <div class="slide__data">
                     <div class="slide__wrapper">
                        <div class="slide__wrapper_k">
                            <div class="slide__row">
                                <div class="slide__hulf slide__hulf--content">
                                    <div class="slide__tag">АКЦИЯ</div>
                                    <div class="slide__mainText">
                                        <div class="slide__title slide__title--x1">Каждую неделю подготавливаем выгодные предложения!</div>
                                        
                                        <div class="slide__description">
                                            Консультация специалиста с примеркой двух различных моделей слуховых аппаратов - БЕСПЛАТНО!
                                        </div>
                                    </div>
                                    
                                    <div class="slide__row--buttons">
                                        <div class="slide__hulf"><a href="/sales/"><button class="slide__button">Узнать подробнее</button></a></div>
                                    </div>
                                </div>
                                <div class="slide__hulf slide__hulf--img">
                                    <img class="slide__img" src="http://martoyym.beget.tech/wp-content/uploads/2024/09/2148984290.jpg" alt="unique-u-fa-440">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <div class="pager">
            <a data-slide-index="0" href="#"></a>
            <a data-slide-index="1" href="#"></a>
            <a data-slide-index="2" href="#"></a>
        </div>

        <div class="custom-controls">
            <div class="custom-prev"></div>
            <div class="custom-next"></div>
        </div>

    </div>
<script>
$('.slider ul').bxSlider({
        pagerCustom: '.pager',
		controls: true,
        prevSelector: '.custom-prev',
		nextSelector: '.custom-next',
		auto: true,
		pause: 10000,
		minSlides: 1,
		maxSlides: 1,
        slideMargin: 0, // отступ между слайдами.
        border: 0,
        nextText: '',
        prevText: '',
        touchEnabled: false
});
</script>


<?
return ob_get_clean();

} 