<template>
    <div class="menu">
        <div class="menu-toggler text-center" @click="isShow = !isShow">Меню</div>
        <transition name="fade">
            <div class="menu-content" v-if="isShow">
                <ul class="menu-items">
                    <li class="menu-item" v-for="link in links" :key="link.text">
                        <a :href="link.href">{{ link.text }}</a>
                    </li>
                </ul>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: "MenuDropdown",
    data() {
        return {
            links: [
                { href: '/catalog/', text: 'Продукция и услуги' },
                { href: '', text: 'О компании' },
                { href: '', text: 'Стандарты качества' },
                { href: '', text: 'Клиентам и партнерам' },
                { href: '', text: 'Работа в компании' },
                { href: '', text: 'Контакты' },
                { href: '', text: 'Написать нам' },
            ],
            isShow: false
        }
    },
    methods: {
        goToPage(link) {
            window.location.href = `${window.location.origin}/${link}`
        }
    }
}
</script>

<style lang="scss" scoped>
.menu {
    z-index: 9999;
    position: relative;

    &-toggler {
        font-size: 20px;
        cursor: pointer;
    }

    &-content {
        position: absolute;
        background: white;
        top: 3em;
        width: 100%;
        padding: 1em 2em;
        border-radius: 0 0 10px 10px;
        z-index: 999;
    }

    &-items {
        list-style: none;
        padding: 0;
        margin-bottom: 0;
        display: flex;
        flex-direction: column;

        &>li {
            &:hover {
                background: black;

                a {
                    color: white;
                }
            }

            a {
                padding: 10px 0;
                font-size: 16px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
                text-decoration: none;
                color: black;
                border-bottom: 1px solid #757575;
            }

            &:last-child {
                a {
                    border-bottom: none;
                }
            }
        }
    }
}
</style>
