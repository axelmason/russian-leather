<template>
    <div class="card">
        <div class="card-header"><h4>{{ title }}</h4></div>
        <div class="card-body">
            <div class="row">
                <div class="col-3" style="border-right: 1px solid lightgray;">
                    <div class="d-flex flex-column">
                        <span class="role text-primary" v-for="role of roles" @click="openRole = role.id">{{ role.name }}</span>
                    </div>
                </div>
                <div class="col-9">
                    <Loader v-if="loading" />
                    <role-component :key="openRole" v-if="openRole" :role-id="openRole" :permissions="permissions" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RoleComponent from '../../components/RoleComponent.vue';
import Loader from '../../components/Loader.vue'

export default {
    components: {
        RoleComponent,
        Loader
    },
    data: () => ({
        roles: [],
        permissions: [],
        openRole: null,
        loading: true
    }),
    props: {
        title: {
            type: String,
            default: ''
        }
    },
    created() {
        this.getRoles();
        this.getPermissions();
        this.loading = false;
    },
    methods: {
        getRoles() {
            window.axios.get('/admin/roles')
                .then((response) => {
                    this.roles = response.data.roles;
                })
        },
        getPermissions() {
            window.axios.get('/admin/permissions/')
                .then((response) => {
                    this.permissions = response.data.permissions;
                })
        }
    }
}
</script>

<style scoped>
.role {
    cursor: pointer;
}
</style>
