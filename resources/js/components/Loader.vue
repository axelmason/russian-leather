<template>
    <div class="loader-wrapper">
        <span class="loader"></span>
    </div>
</template>

<script>
export default {
    name: 'Loader'
}
</script>

<style scoped lang="scss">
.loader-wrapper {
    position: relative;
    display: flex;
    justify-content: center;
}
.loader {
    width: 30px;
    height: 30px;
    border: 3px solid #000;
    border-bottom-color: transparent;
    border-radius: 50%;
    display: inline-block;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
    // position: absolute;
    // top: 50%;
    // left: 50%;
    // transform: translate(50%, 50%);
    text-align: center;
}

@keyframes rotation {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>
