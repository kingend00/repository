<template>
    <div>
        <div id="">
            <div class="title">
                <h2>Add Post</h2>
            </div>
            <div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" v-model="title" id="title" aria-describedby="titleHelp" placeholder="Title...">
                </div>                
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" v-model="description" id="description" aria-describedby="titleHelp" placeholder="Description...">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" v-model="convertSlug" id="slug"  readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tag</label>
                    <input-tag v-model="tags" :add-tag-on-blur="true" class="form-control"></input-tag>
                </div>
                  <div class="form-group">
                    <label for="post_group_select">Post Group</label>
                    <select class="form-control" id="post_group_select" v-model="post_group_check" >
                        <option value="" selected>Select post group</option>
                        <option v-for="(data,index) in post_group" :key="index" :value="data.id">{{ data.title }}</option>
                    </select>
                  </div>
                <vue-simplemde :highlight="true" preview-class="markdown-body" v-model="content" ref="markdownEditor" />
                <div class="button-right">
                      <div class="fileUpload blue-btn btn width100">
                            <span class="text-center">Insert Image</span>
                            <input type="file" class="uploadlogo" ref="file" v-on:change="onImageChange" />
                        </div>
                    <button class="btn first" @click="addPost" >Save</button>
                    <button class="btn first" @click="uploadImage" >uploadImage</button>
                </div>
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
            description:'',
            tags:[],
            post_group:[],
            post_group_check:'',
            image:[]
        }
    },
    computed:{
        convertSlug(){
            return this.sanitizeTitle(this.title)
        }
    },
    watch:{
        post_group_check(){
            console.log('post_group_check',this.post_group_check)
        }
    },
    created(){
        axios.get('/post_group')
        .then(res => {
            this.post_group = res.data
        }).catch(err => {
            console.log('post_group index',err)
        })
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
        },
        addPost(){
            axios.post('/post',
            {
                title:this.title,
                slug:this.convertSlug,
                tag:this.tags,
                description:this.description,
                content:this.content,
                post_group:this.post_group_check
            }).then(res =>{
                console.log('data post before post',res)
            }).catch(err => {
                console.log(err);
            })
        },
        onImageChange(event) {
            console.log('image has been inserted')
            this.image.push(this.$refs.file.files[0]);
            console.log(this.image)
            const url = '/image/saveImageProvisional';
            const formData = new FormData();
            formData.append('image',this.$refs.file.files[0])
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            // axios.post(url,formData,config).then(response => {
            //     if (response.data.file_path) {
            //         this.content += '![]('+process.env.MIX_AWS_URL+'/'+response.data.file_path+')';
            //     }
            // });

        },
        uploadImage(){
            const url = '/image/store';
            const formData = new FormData();
            for(var i = 0 ; i < this.image.length;i++){
                formData.append('image[]',this.image[i])
            }
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            axios.post(url,formData,config).then(response => {
                if (response.data.success) {
                    alert(response.data.success);
                }
            });
            this.image = []
        },
        cancel(){

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
.text-center{
    text-align: center;
}
.button-right {
    float:right;
}
.blue-btn:hover,
.blue-btn:active,
.blue-btn:focus,
.blue-btn {
  background: transparent;
  border: solid 1px #27a9e0;
  border-radius: 3px;
  color: #27a9e0;
  font-size: 16px;
  margin-bottom: 20px;
  outline: none !important;
  padding: 10px 20px;
}

.fileUpload {
  position: relative;
  overflow: hidden;
  height: 43px;
  width: 180px;
  text-align: center;
  margin-top: 0;
}

.fileUpload input.uploadlogo {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 20px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
  width: 100%;
  height: 42px;
}

/*Chrome fix*/
input::-webkit-file-upload-button {
  cursor: pointer !important;
  height: 42px;
  width: 100%;
}
</style>