<script>
    export default {
        template : '#user',
        created(){
            console.log('User loaded')
        },
        data(){
            return {
                    title : 'User Page',
                    content : 'User Page Content',
            }
        }
    }
</script>
