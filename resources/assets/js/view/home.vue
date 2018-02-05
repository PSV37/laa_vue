<template>
    <div  class="heading">
        <div class="panel panel-primary">
             <div class="panel-heading">{{title}}
                <span class="pull-right"  v-on:click="change" style="cursor:pointer" title="change Title">Change Title</span>
             </div>

             <div class="panel-body">{{content}}
                 <input type="text" v-model="text" ><button class="btn btn-default " v-on:click="display">Hit</button>
                 <p>{{msg}}</p>

                 <div class="pull-right" >
                    <button class="btn btn-info"  v-on:click="displaymsg=!displaymsg" title="Display message">Display</button><br>
                    <p class="pull-right" v-if="displaymsg"  v-on:click="say" style="cursor:pointer" title="Show message">{{hi}}</p>
                 </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    data(){
        return {
                title : 'Home Page',
                content : 'Home Page Content',
                hi : 'Say Hi',
                text:'click to show msg',
                msg : '',
                displaymsg:false,
              }
          },

    methods:{
          change:function(){
              this.title = 'changed Home Title'
          },
          say:function(){
              alert(this.hi);
          },
          display:function(){
              this.msg  += this.text +'<br>'
          },
      }
   
    }
</script>
