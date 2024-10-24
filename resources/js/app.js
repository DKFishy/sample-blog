import './bootstrap';
import { createApp } from 'vue';
import SuccessMessage from './components/SuccessMessage.vue';

/*import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();*/

const app = createApp({});

app.component('SuccessMessage', SuccessMessage);

app.mount('#app');