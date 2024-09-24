<?php
// подлкючаю стили и скрипты
function addStyle(){
    //require_once(plugins_url( '/assets/css/style.php',__FILE__ ));
    
    ?>
        <link rel="stylesheet" href="<? echo plugins_url(  '/assets/css/basic-UI-slider.css',__FILE__); ?>">
        <link rel="stylesheet" href="<? echo plugins_url(  '/assets/css/style_slider.css',__FILE__); ?>">
    <? 
}
add_action( 'wp_head', 'addStyle' );

function AddScript() {
    ?>
    <script src="<? echo plugins_url( '/assets/js/script.js',__FILE__ ); ?>"></script>
    <script>console.log("slider script loaded ...");</script>
    <?
}
add_action( 'wp_footer', 'AddScript', 200 );