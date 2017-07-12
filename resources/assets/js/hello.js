/**
 * Created by jianqi on 2017/6/28.
 */
require('./bootstrap');

//引入Hello.vue
import Hello from './components/Hello'

new Vue({
    el: '#app',
    components: { Hello }
})
