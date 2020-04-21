<template>
    <div class="container">
        <h1>404 NOT FOUND</h1>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>
    .container {
        width: 100%;
        height: 900px;
    }
    h1 {
        text-align: center;
        line-height:500px;
        font-size:40px;
    }

</style>
