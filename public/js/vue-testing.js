// Vue.component('vue-test', require('vue-test.vue'));

// register it with the tag <example>


Vue.component('vue-test', {
	template: '<div>{{ messenger }}</div>',
	data: function(){
		return{
			messenger: 'omore bi custard'
		}
	}

});

var app = new Vue({
    el: '#apps',
    data: {
        message: 'hello vue world'
    }
});


