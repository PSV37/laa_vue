<script>
    export default {
         template : '#aboutPage',
            created:function(){
              console.log('about loaded')
            },
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
              this.show_text  += this.textarea
              this.textarea = ''
              console.log(this.show_text);
          },
          hide_text:function(){
              this.show_text =''
          }
        },
        computed:{
          button_title(){
            if(this.show_text=='') {
              return this.display_box = 'Hide After Enter Text'
            } else {
              return this.display_box = 'Hide Text'
            }
          }
        }
      
    }
</script>
