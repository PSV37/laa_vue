
<script>
    export default {
    template : '#home',
    created(){
        console.log('home loaded')
    },
    props: ['message'],
    data(){
        return {
                title : 'Home Page',
                content : 'Home Page Content',
                hi : 'Say Hi',
                text:'click to show msg',
                msg : '',
                displaymsg:false,
                addMsg : false,
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
      },
      computed:{
         if(msg)
         {
           return this.addMsg = true;
         }
      }
   
    }
</script>
