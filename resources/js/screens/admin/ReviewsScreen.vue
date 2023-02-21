<template>
    <div class="card">
        <div class="card-header">
            <h4>{{ title }}</h4>
        </div>
        <div class="card-body">
            <Loader v-if="loading" />
            <div v-else>
                <div class="legend">
                    <div class="legend-item">
                        <span><button class="btn btn-outline-success" disabled
                                style="width: 15px; height: 15px; padding: 0;"></button> - не прочитано</span>
                    </div>
                    <div class="legend-item">
                        <span><button class="btn btn-success" disabled
                                style="width: 15px; height: 15px; padding: 0;"></button> - прочитано</span>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Отправитель</th>
                            <th>Сообщение</th>
                            <th style="width: 30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <Review v-for="review in reviews" :key="review.id" :review="review" :read="review.read" />
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from '../../components/Loader.vue';
import Review from '../../components/Review.vue';

export default {
    components: {
        Loader,
        Review
    },
    data: () => ({
        reviews: [],
        loading: true
    }),
    props: {
        title: {
            type: String,
            default: ''
        }
    },
    created() {
        this.getReviews();
    },
    methods: {
        getReviews() {
            loading: true
            window.axios.get('/admin/reviews')
                .then((response) => {
                    this.reviews = response.data.reviews;

                    this.loading = false;
                })
        }
    },
}
</script>

<style lang="">

</style>
