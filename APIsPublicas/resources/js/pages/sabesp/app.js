import '../../bootstrap';
import { createApp } from 'vue';
import Sabesp from '../../components/sabesp/Sabesp.vue';

const el = document.getElementById('app');

createApp(Sabesp, {
    initialDate: el.dataset.initialDate,
    apiSabespUrl: el.dataset.apiSabespUrl
}).mount('#app');