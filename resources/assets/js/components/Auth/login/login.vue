
<script>
    export default {
        template : '#loginUser',
        created(){
            console.log('home loaded')
        },

        data(){
            return {
                loginTitle : 'Please Login',
                emailName : 'E-Mail Address',
                emailPassword : 'Password',
                login : {
                      email : '',
                      password : '',
                },
                forgot : false,
                logins : true,
                forgotTitle : 'Forgot',
                forgotEmailName : 'Forgot Email',
                forgotBtnName : 'Forgot',
                forgotEmail : {
                    email : ''
                }
            }
        },
        methods:{
            loggedInUser:function(e){
                e.preventDefault()
               if( this.login.email == '' && this.login.password == '') {
                    Vue.toast('Email and Password Should Be Required', {  
                        id: 'my-toast',
                        className: ['my-toast', 'toast-warning'],
                        horizontalPosition: 'right',
                        verticalPosition: 'top',
                        duration: 3000,
                        transition: 'my-transition'
                    })
               } else if( this.login.email =='') {
                    Vue.toast('Email  Should Be Required', {  
                        id: 'my-toast',
                        className: ['my-toast', 'toast-warning'],
                        horizontalPosition: 'right',
                        verticalPosition: 'top',
                        duration: 3000,
                        transition: 'my-transition'
                    })
               } else if( this.login.password == ''){
                    Vue.toast('Password Should Be Required', {  
                        id: 'my-toast',
                        className: ['my-toast', 'toast-warning'],
                        horizontalPosition: 'right',
                        verticalPosition: 'top',
                        duration: 3000,
                        transition: 'my-transition'
                    })
               } else {
                    axios.post('/loginuser', this.login).then(function (response) { 
                    console.log(response.data)
                     window.location.replace('/home');
                    //$('.ui.modal').modal('hide');
                    //window.location.replace("home");
                   }, function (response) {
                        console.log(response)
                         Vue.toast('Unauthorize User', {  
                                id: 'my-toast',
                                className: ['my-toast', 'toast-warning'],
                                horizontalPosition: 'right',
                                verticalPosition: 'top',
                                duration: 3000,
                                transition: 'my-transition'
                        })
                    });
               }

            },
            showForgot:function(){
                this.forgot = true,
                this.logins = false
            },
            showlogin:function() {
                this.forgot = false,
                this.logins = true
            },

            forgotUser:function(e){
                e.preventDefault()
                if(this.forgotEmail.email == '') {
                    Vue.toast('Forgot Email Should Be Required', {  
                            id: 'my-toast',
                            className: ['my-toast', 'toast-warning'],
                            horizontalPosition: 'right',
                            verticalPosition: 'top',
                            duration: 3000,
                            transition: 'my-transition'
                    })
                } else {
                    axios.post('/forgot/email', this.forgotEmail).then(function (response) { 
                        console.log(response)
                    })
                }
            }
        }
    }
</script>

<style lang="">
    .et-wrapper {
        background-color: orangered;
        border-radius: 5px;
        padding: 10px 30px;
        display: inline-block;
        max-width: 300px;
        min-width: 120px;
        color: #fff;
        z-index: 9999;
        margin: auto;
        position: fixed;
        top: 80%;
        margin-top: 8px;
    }   
</style>
