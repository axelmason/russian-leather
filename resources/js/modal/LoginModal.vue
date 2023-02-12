<template>
    <button class="btn btn-outline-dark" @click="modal = true">Войти</button>
    <Modal :title="'Авторизация'" :show="modal" @close="modal = false">
        {{ errors }}
        <form action="" @submit.prevent="submit">
            <div class="modal-input-group">
                <label for="email" class="form-label">Электронная почта</label>
                <input type="email" class="modal-input" v-model="credentials.email" placeholder="email@email.com">
                <div class="modal-errors" v-if="errors['email']">
                    <div class="modal-error" v-for="error in errors['email']" :key="error">{{ error }}</div>
                </div>
            </div>

            <div class="modal-input-group">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="modal-input" v-model="credentials.password" placeholder="*******">
                <div class="modal-errors" v-if="errors['password']">
                    <div class="modal-error" v-for="error in errors['password']" :key="error">{{ error }}</div>
                </div>
            </div>

            <button class="btn btn-outline-dark mt-2 w-100" :disabled="loading">
                <span v-if="!loading">Войти</span>
                <Loader v-else />
            </button>
        </form>
    </Modal>
</template>

<script>
import Modal from './Modal.vue';
import Loader from '../components/Loader.vue';

export default {
    data() {
        return {
            credentials: {
                email: '',
                password: ''
            },
            errors: [],
            modal: false,
            loading: false
        }
    },
    components: { Modal, Loader },
    methods: {
        submit() {
            this.loading = true;

            window.axios.post('/login', this.credentials)
            .then((response) => {
                location.href = '/';
            })
            .catch((err) => {
                this.errors = err.response.data.errors
            })
            .finally(() => {
                this.loading = false;
            })
        }
    },
}
</script>

<style>

</style>
