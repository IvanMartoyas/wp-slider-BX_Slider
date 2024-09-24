 <div id="setting_slider" >
             <div class="Slide__row">
	            <div class="Slide__half">
                    <div class="Slide__form_title slides__row_title">{{ title }}</div>
                </div>
	            <div class="Slide__half">
                    <div @click="show_panel = !show_panel" >{{show_panel? 'Открыть' : 'Закрыть'}}</div>
                </div>
	            <div class="settings__panel" v-show="show_panel">
	                test sett
	            </div>
        </div>
    console.log(" settings file added");
    
    /*
    	var component_settings = {
	        pager: {
	            visible: { // Видимость
    	            display: true,// общее отображение на всех экранах, false скроет блок 
	                desctop: true,
	                tablet: true,
	                mobile: true,
	            }, 
	            position: { // задаёт отступ
	                top: '0',
	                left: '0',
	                bottom: '2',
	                right: '1',
	                type_size: 'rem', // rem, px
	            },
	            styling: {
	                width: 'var(--pager-size)',
                    height: 'var(--pager-size)',
	                background: 'transparent',
    	            border: '2px solid #fff',
    	            //box_shadow: '0 0 2px 1px #9b9b9b6e',
    	            transition: '.4s',
                    margin_bottom:  'calc(16px * .7)',
                    border_radius: '5px',
                    hover: {
                        background: '#fff',
                    },
                    active: {
                        background: '#fff',
                    },
	            }
	        },
	        controlse: {
	            visible: { // Видимость
    	            display: true,// общее отображение на всех экранах, false скроет блок 
	                desctop: true,
	                tablet: true,
	                mobile: true,
	            }, 
	            position: { // задаёт отступ
	                top: '0',
	                left: '1',
	                bottom: '2',
	                right: '0',
	                type_size: 'rem', // rem, px
	            },
	            styling: {
	                width: 'var(--pager-size)',
                    height: 'var(--pager-size)',
	                background: 'transparent',
    	            border: '2px solid #fff',
    	            //box_shadow: '0 0 2px 1px #9b9b9b6e',
    	            transition: '.4s',
                    margin_bottom:  'calc(16px * .7)',
                    border_radius: '5px',
                    hover: {
                        background: '#fff',
                    },
                    active: {
                        background: '#fff',
                    },
	            }
	        },
	    }
    */
	    
    const setting_slider = {
       // template: `  `,
        data () {
            return {
                title: 'Настройки слайдера',
                // UI
                show_panel: false,
                component_settings,
            }
        },
        mounted() {
            console.log(" component_settings ", this.component_settings);
        }
    }

Vue.createApp(setting_slider).mount("#setting_slider");