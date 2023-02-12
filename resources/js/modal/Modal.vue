<template>
    <transition name="fade">
        <div class="modal-background" v-if="show" @click="close">
            <div class="modal-wrapper rounded-1" @click.stop>
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <p class="modal-title">{{ title }}</p>
                        <button type="button" class="close" @click="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <hr>
                    <div class="modal-body">
                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: 'Modal',
    props: {
        title: {
            type: String,
            default: 'Default modal'
        },
        show: {
            type: Boolean,
            default: false
        },
    },
    methods: {
        close() {
            this.$emit('close');
        }
    },
}
</script>

<style scoped lang="scss">
.close {
    background: transparent;
    font-size: 20px;
    color: black;
    border: none;
}
.modal-background {
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba($color: #000, $alpha: .5);

    .modal-wrapper {
        background: white;
        padding: 1em 2em;
        min-width: 200px;

        width: 500px;

        .modal-header {
            .modal-title {
                font-size: 24px;
            }
        }
    }
}
</style>
