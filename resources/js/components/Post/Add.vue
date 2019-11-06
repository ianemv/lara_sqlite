<template>
    <div>
        <PostForm :data="post"/>
        <notifications group="notify" />
    </div>
</template>

<script>
    import PostForm from './Form.vue'
    export default {
        name: 'AddPost',
        components: {
            PostForm
        },
        data(){
            return {
                post: {
                    title:'',
                    content:''
                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
