<template>
    <tr>
        <td>{{ review.id }}</td>
        <td>{{ review.user.email }}</td>
        <td>{{ review.message }}</td>
        <td style="text-align: center;">
            <button @click="setRead(review.id)" class="btn btn-outline-success" :class="{ 'btn-success': review.read }"
                style="width: 30px; height: 30px;"></button>
        </td>
    </tr>
</template>

<script>
export default {
    props: {
        review: {
            type: Object
        }
    },
    methods: {
        setRead(id) {
            // window.axios.patch('/admin/')
        }
    },
}
</script>

<style scoped>

</style>
