<template>
    <div class="role-component">
        <h4>{{ role.name }}</h4>
        <p>Права: </p>
        <Loader v-if="loading" />
        <form v-else action="" @submit.prevent="changePermissions">
            <div class="form-check form-switch" v-for="permission of permissions">
                <input class="form-check-input"  type="checkbox" :name="'permission-'+permission.id" :value="permission.id" :checked="selectedRole(permission.id)" :disabled="permission.slug === 'full_access'">
                <label class="form-check-label" :for="'permission-'+permission.id" :value="permission.id">{{ permission.name }}</label>
            </div>
            <button type="submit" class="btn btn-primary">Применить</button>
        </form>
    </div>
</template>

<script>
import Loader from './Loader.vue';

    export default {
        components: {
            Loader
        },
        data: () => ({
            role: {},
            loading: true
        }),
        props: {
            roleId: {
                type: Number,
                required: true
            },
            permissions: {
                type: Array,
                required: true
            }
        },
        created() {
            this.getRole();
        },
        methods: {
            selectedRole(perm_id) {
                console.log()
                return this.role['permissions'].find(({id}) => (id === perm_id))
            },
            getRole() {
                window.axios.get('/admin/roles/'+this.roleId)
                .then((response) => {
                    this.role = response.data.role;

                    this.loading = false;
                })
            },
            changePermissions(e) {
                let checkedNodes = document.querySelectorAll('input:checked')
                let values = [];

                checkedNodes.forEach((el) => {
                    values.push(el.value);
                })

                window.axios.patch('/admin/roles/'+this.roleId+'/permissions', values)
                .then((response) => {
                    this.$emit('onSave');
                })
            }
        },
    }
</script>

<style scoped>

</style>
