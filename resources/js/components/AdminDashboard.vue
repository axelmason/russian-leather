<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-3">
                <admin-side @open-screen="openScreen" />
            </div>
            <div class="col-lg-9">
                <role-screen v-if="page.href == 'roles'" :title="page.title" />
            </div>
        </div>
    </div>
</template>

<script>
import AdminSide from './AdminSide.vue';
import RoleScreen from '../screens/admin/RoleScreen.vue';

export default {
    components: {
        RoleScreen
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
