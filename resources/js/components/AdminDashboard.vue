<template>
    <div class="container mt-3" style="z-index: -1; min-height: 800px; padding-top: 2em;">
        <div class="row">
            <div class="col-lg-3">
                <admin-side @open-screen="openScreen" />
            </div>
            <div class="col-lg-9">
                <div style="height: 800px; overflow-y: auto;">
                    <role-screen v-if="page.href == 'roles'" :title="page.title" />
                    <reviews-screen v-if="page.href == 'reviews'" :title="page.title" />
                    <settings-screen v-if="page.href == 'settings'" :title="page.title" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AdminSide from './AdminSide.vue';
import RoleScreen from '../screens/admin/RoleScreen.vue';
import ReviewsScreen from '../screens/admin/ReviewsScreen.vue';
import SettingsScreen from '../screens/admin/SettingsScreen.vue';

export default {
    components: {
        RoleScreen,
        ReviewsScreen,
        SettingsScreen
    },
    data: () =>({
        page: {
            href: '',
            title: ''
        }
    }),
    methods: {
        openScreen(page) {
            this.page = page;
        }
    }
}
</script>
