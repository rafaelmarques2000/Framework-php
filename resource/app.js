import Vue from 'vue'
import HelloWorld from './views/helloworld'

Vue.component("hello-world",HelloWorld)

window.onload = ()=>{
    new Vue({
        data(){
            return {teste:"Framework VueJS "}
        }
    }).$mount("#app");
}