<template>
    <div  class="heading">
       <h2 :class="ClassName">Hi ,Vue js</h2>
    </div>
</template>

<script>
    export default {
    props:[
       'color'
    ],
    computed:{
        ClassName(){
           'heading-' + this.color
        }
    },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
