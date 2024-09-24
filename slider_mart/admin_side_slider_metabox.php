<?

/**
 * добавляю метабокс слайдеру
 */
function addMetabox () {
	add_meta_box( 
		'slider_caption', // id метабокса (прибумываю сам)
		'Слайдер', // создать слайдер
		'banner_caption_html',// вызываемая функция в которой отрисовываю код метабокса 
		'martoyas_slider', // пост тайп в который сохраняю данные поля
		'normal',// side - расположение метабокса в сайтбаре, normal c низу
		'default' // приоритет в котором отображаеться метабокс либо могу задать default тогда будет по стандартому приоритету отрисовываться
	);
}

// удаляю ненужные поля 

function my_remove_meta_boxes() {
    remove_meta_box('categorydiv' , 'martoyas_slider' , 'normal'); // рубрики
    remove_meta_box('postexcerpt' , 'martoyas_slider' , 'normal'); // отрывок
    remove_meta_box('postcustom' , 'martoyas_slider' , 'normal'); // отрывок
    remove_meta_box('_kad_classic_meta_control' , 'martoyas_slider' , 'normal'); // kidence 
    remove_meta_box('postimagediv' , 'martoyas_slider' , 'normal'); // изображение
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );


function banner_caption_html($post) { // отрисовывает html метабокса

// получение сохраннений слайдера и загрузка имеющихся в бд слайдов
$data = get_post_meta( $post->ID, '_slider__data', true );



?>

	<div class="lable_shortcod">Установка: шорткод <? echo '[slider_mart id="'.$post->ID.'"]'; 	?>
	
	</div>

	<link rel="stylesheet" href="<? echo plugins_url(  '/assets/css/style_admin.css',__FILE__); ?>"></link>

	<div id="test" class="admin__slide">

	    <div class="slides__list">
	        <div class="slides__slide-addSlide" @click="show_fild = true, update_or_update_slide = false, reset_form()">
	            <div>+</div>
	        </div>
	        <div class="slides__slide" v-for="(slide,i) in list" :key="slide">
	            <div class="slides__sort">
	                 <span class="slides__sort-n">Слайд №{{i+1}}</span>
	                 <div class="slides__sort-r">
	                     <span class="slides__sort-b" @click="sortSlidse('back',i)"><</span>
	                     <span class="slides__sort-b" @click="sortSlidse('to',i)">></span>
	                 </div>
	                 
	            </div>
	           
	            <div class="slides__title">
	                {{slide.title}}
	            </div>
	            
	           <div class="slides__row">
    	            <div class="slides__button_update" @click="reset_form(), show_fild = true, update_or_update_slide = true, update_set_data(slide.id)">Редактировать</div>
    	            <div class="slides__delete" @click="delete_slide(slide.id)">
    	                <img src="<? echo plugins_url('/assets/img/delete.png',__FILE__); ?>" alt="delete_icon">
    	            </div>
	           
	           </div>
	            
	        </div>
	    </div>
	    
	    <div class="Slide" v-if="show_fild">
	        <div class="Slide__row">
	            <div class="Slide__half">
	                <h3> {{update_or_update_slide? 'Редактировать': 'Создать'}} </h3>
	            </div>
	            <div class="Slide__half Slide__half--right">
	                <button  @click.prevent.stop="reset_form(), show_fild = false"> Закрыть</button>
	            </div>
	        </div>
	        
	        
	        <div class="Slide__content">
	            <div class="Slide__half">
	                <div class="card">
	                    <div class="slides__row_title">Основной контент слайда</div>
    	                <div class="Slide__form_title">Верхний лэйбел</div>
            	        <input type="text" v-model="toLabel">
            	        <div class="Slide__form_title">Заголовок</div>
            	        
            	        <input type="text" v-model="title">
            	        <div class="Slide__form_title">Подзаголовок</div>
            	        <input type="text" v-model="subTitle">
            	        <div class="Slide__form_title">Текстовое описание</div>
            	        <input type="text" v-model="content">
            	        <div class="Slide__form_title">Изображение для контента на слайде (ссылка)</div>
            	        <input type="text" v-model="image_slide">
        	        </div>
                    
        	        
        	        <div class="card">
        	            <div class="slides__row_title">Фоновое изображение слайда</div>
            	        <b>Тип фона: </b>
            	        <div class="Slides__bg_row">
                	        <span title="Изображение" class="Slides__bg" :class="{'Slides__bg--active': type_bg_link}" @click="type_bg_link = true"><i class="fa-regular fa-image"></i></span>
                	        <span title="Видео" class="Slides__bg" :class="{'Slides__bg--active': !type_bg_link}" @click="type_bg_link = false"><i class="fa-solid fa-film"></i></i></span>
                	    </div>
                	    <label for="slide_image">Укажите ссылку</label>
            	        <input type="text" id="slide_image" v-model="bg_slide">
        	        </div>
        	        
        	        
        	        <button class="Slide__save--content" @click.prevent="add_or_update()">{{update_or_update_slide? 'Сохранить': 'Добавить'}}</button>
        	        
	                <div v-show="fildError != ''" class="Slide__error">{{fildError}}</div>
	            </div>
	            <div class="Slide__half">
	                <div class="Slide__buttons card">
        	            <div class="Slide__form_title slides__row_title">Кнопки на слайде</div>
        	            
        	            <div class="Slide__buttons_add" v-show="buttonsList.length <= 1">
        	                <div class="Slide__form_title">Текст кнопки</div>
        	                <input type="text" v-model="button_text">
        	                <div class="Slide__form_title">Ссылка</div>
        	                <input type="text" v-model="button_link">
        	            
        	                <button @click.prevent="addButton()">Добавить кнопку</button>
        	            </div>
        	            
        	            
        	            <div class="Slide__buttons_list">
        	                <div 
        	                    class="Slide__buttonAdded"
        	                    v-for="(button,i) in buttonsList"
        	                    :key="button"
        	                >
        	                 <div class="Slide__row">
        	               
        	                     <div class="Slide__half">
      
                                    <div class="Slide__buttons_title">Кнопка № {{i+1}}</div>
                                    
        	                       <div  v-if="update_or_update_slide" >
        	                            <label :for="'button_text_'+i">Текст:</label>
                                        <input :id="'button_text_'+i" type="text"  v-model="buttonsList[i].text" >
                                        <label :for="'button_link_'+i">Ссылка: </label>
                                        <input :id="'button_link_'+i" type="text" v-model="buttonsList[i].link" >
                                      </div>
                                      <div v-else class="Slide__half">
                                        <label :for="'button_text_'+i">Текст:</label>
                                        <input :id="'button_text_'+i" type="text"  v-model="buttonsList[i].text" >
                                        <label :for="'button_link_'+i">Ссылка: </label>
                                        <input :id="'button_link_'+i" type="text" v-model="buttonsList[i].link" >
                                      </div>
        	                    </div>
        	                    <div class="Slide__half" @click.prevent="deleteButtons(button.id)">
        	                        <div class="Slide__button--delete"><img src="<? echo plugins_url('/assets/img/delete.png',__FILE__); ?>" alt="delete_icon"></div>
        	                    </div>
        	                 </div>
        	                 
        	           
        	                    
        	                </div>
        	                
        	                <div v-show="maxButtonLimin" class="Slide__error">{{errorButtonText}}</div>
        	            </div>
        	           
        	        </div>
        	         
        	        
	            </div>
	        </div>
	        <button class="Slide__save--button" @click.prevent="add_or_update()">{{update_or_update_slide? 'Сохранить': 'Добавить'}}</button>
	   </div>
	    <div class="message_sucsess" v-show="message_sucsess != ''">{{message_sucsess}}</div>
	    
	    
        <form action="" method="POST"  v-show="true">
          <input type="hidden" name="slider__data" :value="JSON.stringify(list)" >
        </form>
        
        
	</div>
	   
      
	<script>

	    
	    // компонент с настройками сладйера
	    <? // require_once(plugins_url('/assets/js/setting_component_slider.js',__FILE__));  ?>
	    // основной компонент обрабатывающий формы и сохранения ЕЩЁ НЕ ГОТОВ
	    <? // require_once(plugins_url('/assets/js/slider_main_component.js',__FILE__));  ?>
	
        const test = {
           
            data() {
                return {
                    toLabel:  '',
                    title:    '',
                    subTitle: '',
                    content:  '',
                    
                    bg_slide:    '',// фон слайдера link
                    type_bg_link: true, // true изображение, else видео фон
                    
                    image_slide: '',// link
                    
                    fildError: '',// вывожу ошибки полей

                    // кнопки слайда
                    buttonsList: [],
                    button_text: '',
                    button_link: '',
                    
                    // вывожу ошибки при создании кнопок
                    maxButtonLimin: false,
                    errorButtonText: '',
           
                   // model
                    slides: [],
                    list: [], //список слайдов
                    settings: {
                        pager: false,
                        controls: true
                    },
                    
                    // UI
                    show_fild: false,
                    update_or_update_slide: false, // меняет надписи на форме редкатировать/добавить 
                    message_sucsess: '', //  переменна для уведомлений
                    
                    
                    // update slide
                    update_slide_data: {},
                }
            },
            created() {
                
                // получаю сохранение слайдера из бд в JSON 
                this.list = <? echo $data; ?>;
               console.log(" item 5",this.list[4])
               console.log(" item 6",this.list[5])
            },
            methods: {
                add_or_update(data) {
                  
                    
                    if(this.update_or_update_slide == true) { // если true то редактиру 
                      this.update_slide();
                      console.log("update")
                      
                    }  else if(this.update_or_update_slide == false) { // если false создаю новый слайд
                     console.log("add")
                    
                       this.addSlide();
                      
                    } else {
                        return;
                    }
                },
                addButton() {
                    if(this.buttonsList.length == 2) {
                        this.maxButtonLimin = true;
                        this.errorButtonText = "Можно указать не более двух кнопок";
                        setTimeout((context = this)=>{
                            context.maxButtonLimin = false;
                            
                        }, 3000);
                        return;
                    }
                    
                    if(this.button_text == '' && this.button_link == '') {
                        this.maxButtonLimin = true;
                        this.errorButtonText = "Укажите название и ссылку создаваемой кнопки!";
                        setTimeout((context = this)=>{
                            context.maxButtonLimin = false;
                            
                        }, 3000);
                        return;
                    }
                    let a = new Date();
                    
                    this.buttonsList.push({
                        text: this.button_text,
                        link: this.button_link,
                        id: a.getTime()
                    });
                },
                deleteButtons(id) {// удалить кнопку на слайдере
                    this.buttonsList = this.buttonsList.filter(item => item.id !== id);
                },
                update_button (e) {
                    console.log("e ",e);
                },
                addSlide() {
                    
                    if(this.title == '') {
                        this.fildError = "Укажите заголовок слайда.";
                        return;
                    }
                    if(this.content == '') {
                        this.fildError = "Укажите основной текст на слайде.";
                        return;
                    }
                    if(this.bg_slide == '') {
                        this.fildError = "Укажите ссылку на фоновое изображение слайда.";
                        return;
                    }
                    if(this.image_slide == '') {
                        this.fildError = "Укажите ссылку на изображение на слайдее.";
                        return;
                    }
                    
                    // чистит сооббщения с ошибками если они есть
                    setTimeout((context = this)=>{
                        context.fildError = '';
                    }, 3000);
                    
                    // КОНЕЦ ПРОВЕРОК ПОЛЕЙ
                    
                    
                    let a = new Date(); // c помощью new Date генерирую уникальный id
                    
                    let slide = {
                        id: a.getTime(),
                        toLabel: this.toLabel,
                        title: this.title,
                        subTitle: this.subTitle,
                        content: this.content,
                        image_slide: this.image_slide,
                        bg_slide: this.bg_slide,
                        type_bg_link: this.type_bg_link,
                        buttons: this.buttonsList
                    }
                    
                    this.list.push(slide); // сохраняю слайды
                    //this.slides.push(slide); 
                   // console.log("this.slides ",this.slides)
                    
                    this.show_fild = false;
                    this.reset_form(); // очищаю форму
                    this.message_sucsess_func('Слайд добавлен, нажмите опубликовать для его сохранения');
                },
                update_slide() {
                    // this.update_slide_data.id // id слайда для сохранения сохранять 
             
                    this.list.filter(slide => {
                        if(slide.id == this.update_slide_data.id) { // нахожу по id и сохраняю новые данные
                            slide.toLabel = this.toLabel;
                            slide.title   = this.title;
                            slide.subTitle= this.subTitle;
                            slide.content = this.content;
                            slide.bg_slide= this.bg_slide;
                            slide.type_bg_link= this.type_bg_link;
                            slide.image_slide = this.image_slide;
                            slide.buttons = this.buttonsList;
                            
                        }
                    })
                 this.message_sucsess_func('Данный обновленны, нажмите опубликовать для сохранения');
                   // console.log("update this.list ", this.list);
                   // console.log("update slide");

                    this.show_fild = false;
                    this.reset_form();
                },
                update_set_data(index){ // заполняет форму при открытии
                    try {
                    
                        this.list.filter(item => {
                            if(item.id == index) {
                                this.toLabel =     item.toLabel;
                                this.title =       item.title;
                                this.subTitle =    item.subTitle;
                                this.content =     item.content;
                                this.bg_slide =    item.bg_slide;
                                this.type_bg_link = item.type_bg_link;
                                this.image_slide = item.image_slide;
                                this.buttonsList = item.buttons;
                                
                                this.update_slide_data = item;
                            }
                            
                        })
                        
                    }
                    catch(e) {
                       console.log('error ',e) 
                    }
                  //  console.log('this.update_slide_data ',this.update_slide_data)

                },
                sortSlidse(vector, index) { // функция позволяет поменять слайды местами
                
                    try {
                        let temp;
                        if(vector == 'back') {
                            if(index == 0) {
                               // console.log("not")
                                return;
                            }
                            
                            temp = this.list[index-1];
                            this.list[index-1] = this.list[index];
                            this.list[index] = temp;
                            
                        } else if (vector ==  'to') {
                           
                            if(this.list.length-1 == index) {
                                // console.log("not")
                                return;
                            }
                            temp = this.list[index];
                            this.list[index] = this.list[index+1];
                            this.list[index+1] = temp;
                        } else {
                            
                        }
                        
                        //console.log(" list ", this.list)
                    }
                    catch (e) {
                        console.log("error ",e)
                    }    
                },
                delete_slide(id) {
                    // удалить слайд
                    this.list = this.list.filter(item => item.id !== id);
                   // console.log('this.list ',this.list)
                },

                reset_form() {
                    this.toLabel =  '',
                    this.title =    '',
                    this.subTitle = '',
                    this.content =  '',
                    this.bg_slide =    '',
                    this.type_bg_link = '',
                    this.image_slide = '',
                    this.fildError = '',
                    this.buttonsList = [],
                    this.button_text = '',
                    this.button_link = '',
                    this.maxButtonLimin = false,
                    this.errorButtonText = '',
                    
                    this.update_slide_data = {};
                },
                message_sucsess_func(text) {
                    this.message_sucsess = text;
                    var context = this;
                    setTimeout(()=>{
                        context.message_sucsess = '';
                    },5000);
                },
            },
        }
        
        Vue.createApp(test).mount("#test");
	</script>

	<?
   
 	wp_nonce_field("slider_data_action", "nonce_slider_data"); 

}

add_action('admin_menu','addMetabox'); // добавляю метабокс
