/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';


  
 
 import * as noUiSlider from 'nouislider';
 import 'nouislider/dist/nouislider.css';
 const slider = document.getElementById('price-slider');
 if(slider){

    const pmin = document.getElementById('pmin');
    const pmax = document.getElementById('pmax');
    const range = noUiSlider.create(slider, {
        start: [pmin.value || 0, pmax.value || 100],
        connect: true,
        step: 10,
        range: {
            'min': 0,
            'max':50000
        }
    })
    range.on('slide',function(values,handle){

        //silder prix
        if(handle === 0){
            pmin.value = Math.round(values[0])
            
        }

        if(handle === 1){
            pmax.value = Math.round(values[1])
            
        }
        
    })
    
 }




 
// start the Stimulus application
import './bootstrap';
 