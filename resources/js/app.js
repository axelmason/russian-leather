import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

import LoginModal from './modal/LoginModal.vue';
import RegisterModal from './modal/RegisterModal.vue';


import RoleComponent from './components/RoleComponent.vue';
import MenuDropdown from './components/MenuDropdown.vue';
import SearchForm from './components/SearchForm.vue';
import AdminDashboard from './components/AdminDashboard.vue';

import SettingsScreen from './screens/admin/SettingsScreen.vue';
import ReviewsScreen from './screens/admin/ReviewsScreen.vue';
import RoleScreen from './screens/admin/RoleScreen.vue';
import AdminSide from './components/AdminSide.vue';

app.component('login-modal', LoginModal);
app.component('register-modal', RegisterModal);


app.component('admin-dashboard', AdminDashboard);
    app.component('admin-side', AdminSide);
    app.component('role-screen', RoleScreen);
        app.component('role-component', RoleComponent);
    app.component('reviews-screen', ReviewsScreen);
    app.component('settings-screen', SettingsScreen);


app.component('menu-dropdown', MenuDropdown);
app.component('search-form', SearchForm);


app.mount('#app');
