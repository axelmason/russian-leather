<template>
    <ul class="dashboard-link-items">
        <li class="dashboard-item" v-for="link of links">
            <a @click="openScreen(link)" href="#" class="dashboard-link">{{ link.title }}</a>
        </li>
    </ul>
</template>

<script>
export default {
    data: () => ({
        links: [
            { title: 'Роли', href: 'roles' },
            { title: 'Отзывы', href: 'reviews' },
            { title: 'Настройки', href: 'settings' },
        ]
    }),
    methods: {
        openScreen(link) {
            this.$emit('openScreen', link)
        }
    }
}
</script>

<style scoped lang="scss">
.dashboard {
    &-link-items {
        border: 1px solid lightgray;
        list-style: none;
        padding-left: 0!important;
        background-color: white;
    }

    &-item {
        &:not(:last-child) {
            border-bottom: 1px solid lightgray;
        }
    }

    &-link {
        padding: .5em 1em;
        text-decoration: none;
        color: black;
        width: 100%;
        font-size: 20px;
    }
}
</style>
