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
