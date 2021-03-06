
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

//
setupFormLoadingImage();
function setupFormLoadingImage(){
    $('form').submit(function(event){
        $('.busy').show('fast');
        return true;
    });
}

$('.dropdown').click(function() {
    $(this).next('.dropdown-container-inverse').toggle();
    $(this).next('.dropdown-container').toggle();
});

$('[type="checkbox"]').each(function(index, el) {
	$(this).wrap('<label class="checkbox-container"></label>');
	$('.checkbox-container').append('<div class="checkmark"></div>');
});