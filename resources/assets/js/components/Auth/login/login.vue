
<script>
    export default {
        template : '#loginUser',
        created(){
            console.log('home loaded')
        },

        data(){
            return {
                title : 'Please Login',
                emailName : 'E-Mail Address',
                email_error : false,
                pass_error : false,
                emailPassword : 'Password',
                login : {
                      email : '',
                      password : '',
                },
                succcessMessage : false
            }
        },
        methods:{
            loggedInUser:function(e){
                e.preventDefault()
               if( this.login.email == '' && this.login.password == '') {
                   this.email_error = true;
                   this.pass_error = true;
               } else {
                    axios.post('/loginuser', this.login).then(function (response) { 
                    console.log(response.data)
                     Vue.toast('You are Successfully LoggedIn', {  
                        id: 'my-toast',
                        className: ['my-toast', 'toast-warning'],
                        horizontalPosition: 'right',
                        verticalPosition: 'top',
                        duration: 3000,
                        transition: 'my-transition',
                        backgroundColor: 'red'
                        })
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

            }
        }
    }
</script>
