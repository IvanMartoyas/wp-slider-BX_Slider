<?

add_shortcode( 'slider_mart', 'slider_funcslider_test' ); 

// [slider_mart  id="321" ]
function slider_funcslider_test( $args ){ 
    ob_start(); // уберает от ошибкe когда вставляемый шорткод выводиться с начала всего контента
    
    if(!isset($args['id'])) {
        return;
    }
    
    $slider__data = json_decode(get_post_meta( $args['id'], '_slider__data', true ));

    /* 
        slide fild
        id
        toLabel    
        title      
        subTitle   
        content    
        bg_slide   
        type_bg_link 
        image_slide  
        buttons 
       
        foreach ($slider__data as $key => $value) {
            // Значение элемента $arr[3] будет обновляться значениями массива $arr при каждой итерации цикла...
            //echo "data = {$key} => {$value} ";
            print_r($value->id);
        } 
        */
               
           ?>
    <div class="slider" id="<? echo $args['id']; ?>">
       <ul>
           <?  foreach ($slider__data as $key => $slide) {?>
           
            <li class="first-slide"
                <? // bg image
                    if($slide->type_bg_link) {
                       echo 'style="background: url('.  $slide->bg_slide .')"'; 
                    }
                ?>
            >

                <?
                    if(!$slide->type_bg_link) {
                ?>
                    <video playsinline autoplay muted loop poster="">
                        <source src="<? echo $slide->bg_slide; ?>" type="video/webm">
                        Your browser does not support the video tag.
                    </video>
                 <? }  ?>
                <div class="slide__data">
                    <div class="slide__wrapper">
                        <div class="slide__wrapper_k">
                            <div class="slide__row">
                                <div class="slide__hulf slide__hulf--content">
                                    <div class="slide__tag">
                                         <?
                                            if(isset($slide->toLabel)) {
                                                echo '<div class="slide__SubTitle">'. $slide->toLabel .'</div> ';
                                            }
                                          ?>
                                    </div>
                                    
                                    <div class="slide__mainText">
                                        
                                        <div class="slide__title
                                        <? 
                                            // если заголовок меньшу двух слов, то делаю его больше
                                            if(count(explode(" ", $slide->title)) <= 2 ) { 
                                                echo 'slide__title--x3';
                                            }
                                        ?>
                                        
                                        "> <? echo $slide->title; ?> </div>
                                        <?
                                            if(isset($slide->subTitle)) {
                                                echo '<div class="slide__SubTitle">'.  $slide->subTitle .'</div> ';
                                            }
                                         //   echo 'content '.$slide->content;
                                            if(isset($slide->content)) {
                                                echo '<div class="slide__description">'. $slide->content .'</div>';
                                            }
                                           
                                        ?>
                                        
                                        
                                    </div>
                                    <div class="slide__row--buttons">

                                        <? 
                                        if(isset($slide->buttons)) {
                                           
                                            foreach ($slide->buttons as  $key => $button) {  ?>
                                              
                                            <div class="slide__hulf"><a href="<? echo $button->link; ?>"><button class="slide__button"><? echo $button->text; ?></button></a></div>
                                            
                                        <? 
                                                
                                            }
                                        } 
                                        ?>
                                    </div>
                                </div>
                                <div class="slide__hulf slide__hulf--img">
                                    <? 
                                        if(isset($slide->image_slide)) { ?>
                                        
                                        <img class="slide__img" src="<? echo $slide->image_slide;?>" alt="<? $slide->title; ?>">
                                    
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </li>
            <?  }  ?>
        </ul>
        <div class="slider_controls_UI">
            <div class="pager">
                <?  foreach ($slider__data as $key => $slide) { ?>
                
                <a data-slide-index="<? echo $key; ?>" href="#"></a>
                
                <? } ?>
    
            </div>
    
            <div class="custom-controls">
                <div class="custom-prev"></div>
                <div class="custom-next"></div>
            </div>
        </div>

    </div>

<? 

return ob_get_clean();

} 