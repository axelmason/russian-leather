import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

import LoginModal from './modal/LoginModal.vue';
import RegisterModal from './modal/RegisterModal.vue';


import MenuDropdown from './components/MenuDropdown.vue';
import SearchForm from './components/SearchForm.vue';
import Loader from './components/Loader.vue';

app.component('login-modal', LoginModal);
app.component('register-modal', RegisterModal);


app.component('menu-dropdown', MenuDropdown);
app.component('search-form', SearchForm);
app.component('loader', Loader);


app.mount('#app');
