<template>
    <button class="btn btn-outline-dark me-2" @click="modal = true">Регистрация</button>
    <Modal :title="'Регистрация'" :show="modal" @close="modal = false">
        <form action="" @submit.prevent="submit">
            <div class="modal-input-group">
                <label for="email" class="form-label">Электронная почта</label>
                <input type="email" class="modal-input" v-model="credentials.email" placeholder="email@email.com">
                <div class="modal-errors" v-if="errors['email']">
                    <div class="modal-error" v-for="error in errors['email']" :key="error">{{ error }}</div>
                </div>
            </div>

            <div class="modal-input-group">
                <label for="password" class="form-label">Придумайте пароль</label>
                <input type="password" class="modal-input" v-model="credentials.password" placeholder="********">
                <div class="modal-errors" v-if="errors['password']">
                    <div class="modal-error" v-for="error in errors['password']" :key="error">{{ error }}</div>
                </div>
            </div>

            <div class="modal-input-group">
                <label for="password_confirmation" class="form-label">Подтвердите пароль</label>
                <input type="password" class="modal-input" v-model="credentials.password_confirmation" placeholder="********">
            </div>

            <div class="modal-checkbox-group">
                <input type="checkbox" class="modal-checkbox" v-model="credentials.consent">
                <label for="consent" class="form-label">Я соглашаюсь с правилами</label>
            </div>

            <div class="modal-errors" v-if="errors['consent']">
                <div class="modal-error" v-for="error in errors['consent']" :key="error">{{ error }}</div>
            </div>

            <button class="btn btn-outline-dark mt-2 w-100" :disabled="loading">
                <span v-if="!loading">Зарегистрироваться</span>
                <Loader v-else />
            </button>
        </form>
    </Modal>
    <Modal :title="'Регистрация'" :show="verifyModal" @close="verifyModal = false">
        <p>Вы успешно зарегистрировались!</p>
        <p>Чтобы пользоваться функциями сайта необходимо подтвердить ваш аккаунт.</p>
        <p>Ссылка отправлена по адресу: <b>{{ credentials.email }}</b></p>
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
                password: '',
                password_confirmation: '',
                consent: false
            },
            errors: [],
            modal: false,
            verifyModal: false,
            loading: false
        }
    },
    components: { Modal, Loader },
    methods: {
        submit(e) {
            this.loading = true;

            window.axios.post('/register', this.credentials)
            .then((response) => {
                this.verifyModal = true;
                this.modal = false;
            })
            .catch((err) => {
                console.log(err)
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
