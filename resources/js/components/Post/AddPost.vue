<template>
    <div>
        <div id="">
            <div class="title">
                <h2>Add Post</h2>
            </div>
            <div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" v-model="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title...">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Slug</label>
                    <input type="text" class="form-control" v-model="convertSlug" id="exampleInputPassword1"  readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tag</label>
                    <input-tag v-model="tags" class="form-control"></input-tag>
                </div>
                <vue-simplemde :highlight="true" preview-class="markdown-body" v-model="content" ref="markdownEditor" />
                <button class="btn first button-right" >Save</button>
            </div>
        </div>
    </div>
</template>
<script>
import VueSimplemde from 'vue-simplemde'
import hljs from 'highlight.js';
window.hljs = hljs;
export default {
    components: {
      VueSimplemde
    },
    data(){
        return {
            content:'',
            title:'',
            tags:[]
        }
    },
    computed:{
        convertSlug(){
            return this.sanitizeTitle(this.title)
        }
    },
    methods:{
        sanitizeTitle: function(title) {
            var slug = "";
            // Change to lower case
            var titleLower = title.toLowerCase();
            // Letter "e"
            slug = titleLower.replace(/e|é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ/gi, 'e');
            // Letter "a"
            slug = slug.replace(/a|á|à|ã|ả|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ/gi, 'a');
            // Letter "o"
            slug = slug.replace(/o|ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ/gi, 'o');
            // Letter "u"
            slug = slug.replace(/u|ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự/gi, 'u');
            // Letter "i"
            slug = slug.replace(/i|í|ì|ị|ĩ|ỉ/gi, 'i');
            // Letter "d"
            slug = slug.replace(/đ/gi, 'd');
            // Trim the last whitespace
            slug = slug.replace(/\s*$/g, '');
            // Change whitespace to "-"
            slug = slug.replace(/\s+/g, '-');
            
            return slug;
        }
    }
}
</script>

<style lang="scss" scoped>
  /* @import '~simplemde/dist/simplemde.min.css'; */
  @import '~github-markdown-css';
  @import '~highlight.js/styles/atom-one-dark.css';
  @import '~simplemde-theme-base/dist/simplemde-theme-base.min.css';
 /* Highlight theme list: https://github.com/isagalaev/highlight.js/tree/master/src/styles */


$green: #2ecc71;
$red: #e74c3c;
$blue: #3498db;
$yellow: #f1c40f;
$purple: #8e44ad;
$turquoise: #1abc9c;

.btn {
  box-sizing: border-box;
  appearance: none;
  background-color: transparent;
  border: 2px solid $red;
  border-radius: 0.6em;
  color: $red;
  cursor: pointer;
  display: flex;
  align-self: center;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1;
  margin: 20px;
  padding: 0.8em 1.4em;
  text-decoration: none;
  text-align: center;
  text-transform: uppercase;
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;

  &:hover,
  &:focus {
    color:#fff;
    outline: 0;
  }
}
.first {
  transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
  &:hover {
    box-shadow: 0 0 40px 40px $red inset;
  }
}
.button-right {
    float:right;
}
</style>