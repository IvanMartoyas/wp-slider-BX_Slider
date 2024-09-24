<?
add_action( 'save_post', 'slider_save_meta',10, 2);
 
function slider_save_meta( $post_id, $post ) {
    
     // пришло ли поле наших данных? 
    if (!isset($_POST['slider__data'])) 
    return; 

    //  нечего не сохраняю если это ревизия
    if (wp_is_post_revision($post_id)) 
    return; 
    
    // проверка достоверности запроса 
    check_admin_referer('slider_data_action', 'nonce_slider_data'); 

	
	update_post_meta($post_id, '_slider__data', $_POST['slider__data']); // делаю сохранение поля 
	
	return;
 
}