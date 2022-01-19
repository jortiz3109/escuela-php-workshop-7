require('./bootstrap');
require('./buefy')

import DeleteComponent from "./components/DeleteComponent"

const app = new Vue({
    el: '#app',
    components: {
        DeleteComponent
    }
})
