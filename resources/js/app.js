require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import VueGeolocation from 'vue-browser-geolocation';
import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGeolocation)
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyDwwFgz7dCIYU4jZ8TOSD0VNQK-xz2iY9o',
    libraries: 'places',
  },
})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('map-component', require('./components/MapComponent.vue').default);
Vue.component('user-map', require('./components/UserMap.vue').default);
Vue.component('pharmacy-map', require('./components/Pharmacy.vue').default);
Vue.component('doctor-map', require('./components/Doctor.vue').default);

Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    data:{
		  place: { },
      animal: '',
      disease: {},
	},
	methods:{
		find(){
      if(this.animal.length > 0){
        axios.get('find/'+this.animal)
        .then(response => {
            this.disease = response.data;
        });
      }
    },
	},
});
