<template>
    <div  class="heading">
       <div class="panel panel-primary">
            <div class="panel-heading">{{title}}</div>
              <div class="panel-body">{{content}}
                   <textarea class="form-control" v-model="textarea" id="exampleFormControlTextarea1" rows="3" v-on:keyup.enter="show_box"  placeholder="Write Somthing and Hit Enter to submit"></textarea>
             
                  
                  <div>
                       <p>{{show_text}}</p>
                      <button class="btn btn-info" v-on:click="hide_text"  title="Hide Text">{{button_title}}</button>
                  </div>
              </div>
       </div>
    </div>
</template>

<script>
    export default {
    data(){
      return {
        title : 'About Page',
        content : 'About Page Content',
        display_box : '',
        textarea:'',
        show_text : '',
      }
    },

    methods:{
       show_box:function(){ 
           this.show_text = this.textarea
           this.textarea = ''
           console.log(this.show_text);
       },

       hide_text:function(){
          this.show_text =''
       }
    },

    computed:{
       button_title(){
         if(this.show_text=='')
         {
           return this.display_box = 'Hide After Enter Text'
         }
         else
         {
          return this.display_box = 'Hide Text'
         }
       }
    }
   
    }
</script>
