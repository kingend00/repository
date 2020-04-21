<template>
    <div>
        <h1>This is the component Test</h1>
    </div>
</template>
<script>
export default {
    created(){
        axios.get('/category_group/'+ this.id).then(response => {
                // this.category_group_details = response.data
            }).catch(e => {
                console.log('error',e)
            });
    }
}
</script>