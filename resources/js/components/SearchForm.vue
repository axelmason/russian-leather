<template>
    <form action="#" method="get">
        <div>
            <div class="input-group">
                <div class="search-img-wrapper"><img src="/icons/search.svg" alt=""></div>
                <input type="text" name="search" placeholder="Поиск" v-model="searchTerm" @keyup="search">
            </div>
            <div class="input-results" v-if="loading || message || searchResults.length">
                <p class="text-center" v-if="message">{{ message }}</p>
                <Loader v-if="loading" />
                <ul v-else class="result-list">
                    <li class="input-result" v-for="result in searchResults" :key="result">
                        <a :href="`/catalog/product/${result.slug}`">{{ result.title }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</template>

<script>
import Loader from './Loader.vue';

export default {
    components: { Loader },
    name: 'SearchForm',
    data() {
        return {
            timeout: 1,
            searchTerm: '',
            loading: false,
            searchResults: [],
            message: ''
        }
    },
    methods: {
        search() {
            if (this.searchTerm.length <= 3) {
                this.loading = false;
                this.message = ''
                return;
            }

            this.loading = true;
            clearTimeout(this.timeout);
            this.timeout = setTimeout(() => {
                window.axios
                    .get(`http://localhost/api/search?query=${this.searchTerm}`)
                    .then(response => {
                        if (response.status === 200) {
                            this.searchResults = response.data.result
                        } else {
                            this.message = "Ничего не найдено..."
                        }

                    })
                    .catch(error => {
                        this.message = "Ошибка сервера."
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            }, 1000);
        },
    }
}
</script>

<style lang="scss" scoped>
form {
    width: 100%;
    position: relative;
}

.input-group {
    border-bottom: 1px solid #757575;

    .search-img-wrapper {
        padding: 5px;
        border-right: 1px solid #757575;
    }

    input {
        background: transparent;
        border: none;
        padding: 3px;
        padding-left: 5px;
        font-size: 16px;
        flex-grow: 1;

        &:focus {
            outline: none;
        }
    }
}

.input-results {
    min-height: 50px;
    position: absolute;
    background: white;
    width: 100%;
    padding: 10px 15px;
    border-radius: 0 0 5px 5px;

    .result-list {
        list-style: none;
        padding: 0;
        margin-bottom: 0;

        .input-result {
            a {
                display: block;
                text-decoration: none;
                color: black;
                height: 100%;
                width: 100%;
                padding: 5px 0 5px 5px;

                border-bottom: 1px solid #a4a4a4;
            }

            &:last-child {
                a {
                    border: none;
                }
            }
        }
    }
}
</style>
