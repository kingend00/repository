<template>
    <div class="col-md-18 card-body">
        <h3>Login</h3>
        <form method="POST" action="" v-on:submit.prevent="handleSubmit">
            <div class="col-md-6 offset-md-4 alert alert-danger" role="alert" v-if="form.error">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{form.error}}
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" v-model="form.email" value="" required autocomplete="email" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" v-model="form.password" class="form-control" name="password" required autocomplete="current-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary" :disabled='!isComplete'>
                        Login
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    data(){
        return {
            form:{
                email:'',
                password:'',
                error:''
            }
        }
    },
    created(){
        if(this.$cookies.get('token'))
        {
            axios.get('/user/data')
            .then(res => {
                this.$router.push({name:'home_page'})
                // console.log('cookie',this.$cookies.get('token'))
            })
        }
    },
    computed: {
        isComplete () {
            return this.form.password && this.form.email;
        }
    },
    methods: {

        /**   
        * Function handleReset description is handled form reset password
        */
        handleSubmit() {
            axios.post('/user/login',this.form)
                .then(res => {
                    this.$cookies.set('token',res.data.access_token)
                    this.$store.commit('changeLogin',true)
                    this.$router.push({name:'dashboard'})
                }).catch(err => {
                    console.log(err)
                    this.form.error = "Invalid email or password !"
                    })
        },
    }
}
</script>