<template>
    <tr>
        <td>{{ review.id }}</td>
        <td>{{ review.user.email }}</td>
        <td>{{ review.message }}</td>
        <td style="text-align: center;">
            <button @click="setRead(review.id)" class="btn btn-outline-success" :class="{ 'btn-success': readData }"
                style="width: 30px; height: 30px;"></button>
        </td>
    </tr>
</template>

<script>
export default {
    data: () => ({
        readData: false
    }),
    props: {
        review: {
            type: Object
        },
        read: {
            type: Boolean
        }
    },
    created() {
        this.readData = this.read;
    },
    methods: {
        setRead(id) {
            window.axios.patch('/admin/reviews/read-toggler/'+id)
                .then(() => {
                    this.readData = !this.readData;
                })
        }
    },
}
</script>

<style scoped>

</style>
