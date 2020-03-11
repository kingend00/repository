<template>
    <div>
        <h1>This is the component Test</h1>
    </div>
</template>
<script>
export default {
    created(){
        axios.get('/category_group/'+ this.id).then(response => {
                console.log(response)
                // this.category_group_details = response.data
            }).catch(e => {
                console.log('error',e)
            });
            console.log(1);
    }
}
</script>