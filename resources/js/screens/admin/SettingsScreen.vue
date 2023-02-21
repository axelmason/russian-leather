<template>
    <div class="card">
        <div class="card-header">
            <span>
                <h4>{{ title }}</h4>
            </span>
            <span class="text-success">{{ message }}</span>
        </div>
        <div class="card-body">
            <Loader v-if="loading" />
            <div v-else class="settings-items">
                <button class="btn btn-primary" @click="saveChanges">Сохранить</button>
                <div class="settings-item" v-for="setting in settings" :key="setting.id">
                    <div class="setting-text-item" v-if="setting.name == 'about'">
                        <div class="my-1">
                            <h5 class="mb-1">{{ setting.value.title }}</h5>
                            <textarea v-model="setting.value.description" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="setting-text-item" v-if="setting.name == 'leather_types'">
                        <div class="my-1">
                            <h5 class="mb-1">{{ setting.value.title }}</h5>
                            <input v-model="setting.value.description" class="form-control">
                        </div>
                    </div>
                    <div class="setting-array-item" v-if="setting.name == 'news'">
                        <div class="my-1">
                            <h5 class="mb-1">{{ setting.value.title }}</h5>
                            <div class="row">
                                <div class="col-lg-4 col-12" v-for="(item, index) in setting.value.array" :key="index">
                                    <div class="card">
                                        <div class="card-header">
                                            <input v-model="setting.value.array[index]['title']" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="card-body p-0">
                                            <textarea v-model="setting.value.array[index]['description']"
                                                style="resize: none; overflow-y: auto;" class="form-control"
                                                rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" @click="saveChanges">Сохранить</button>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from '../../components/Loader.vue';

export default {
    components: { Loader },
    data: () => ({
        loading: true,
        settings: [],
        message: null
    }),
    props: {
        title: {
            type: Object,
            default: ''
        }
    },
    created() {
        this.loadSettings();
    },
    methods: {
        loadSettings() {
            window.axios.get('/admin/settings')
                .then((response) => {
                    this.settings = response.data.settings;

                    this.loading = false;
                })
        },
        async saveChanges() {
            this.loading = true;

            await window.axios.post('/admin/settings/save', [...this.settings])
                .then((response) => {
                    if (response.data.success) {
                        this.message = 'Настройки обновлены';

                        this.loadSettings();
                    }
                });

            this.loading = false;
        }
    }
}
</script>

<style scoped>
.settings-item > div {
    margin: 1em 0;
}
</style>
