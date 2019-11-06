<template>
    <div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Post Title" v-model="form.title">
        </div>
        <div class="form-group">
            <wysiwyg v-model="form.content" />
        </div>

        <div class="form-group">
            <label for="title">Publish Date</label>
            <input type="date" class="form-control" aria-describedby="" placeholder="Published Date" v-model="form.publish_date">
        </div>
        <button @click="submitPost" class="btn btn-primary">Post</button>
    </div>
</template>

<script>

    export default {
        name: 'PostForm',
        props:['id',
            'data'
        ],

        data(){
            return {
                form:{
                    title:'',
                    content:'',
                    publish_date:''
                }
            }
        },
        mounted(){
            this.form = this.data;
        },
        methods:{
            async submitPost(e){
                e.preventDefault();

                let response = await fetch('/api/v1/posts', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify(this.form)
                });

                if (response.status === 200){
                    this.$notify({
                        group: 'notify',
                        title: 'New Post',
                        text: 'New post added!'
                        });
                    this.clearForm();
                }
            },
            clearForm(){
                this.form = {
                    title:'',
                    content:'',
                    publish_date:''
                }
            }

        }
    }
</script>

<style lang="scss" scoped>
@import "~vue-wysiwyg/dist/vueWysiwyg.css";
</style>
