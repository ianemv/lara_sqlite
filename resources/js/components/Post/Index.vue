<template>
    <div>
        <PostItem v-for="post in posts" :post="post" :key="post.id" />
    </div>
</template>

<script>
    import PostItem from './PostItem'
    export default {
        name: 'PostIndex',
        components:{
            PostItem
        },
        data(){
            return {
                posts:[]
            }
        },
        mounted(){
            this.fetchPosts();
        },
        methods:{
            async fetchPosts(){
                const response = await fetch('/api/v1/posts');
                if (response.status == 200 ){
                const resp = await response.json();

                    const { data } = resp.data;
                    this.posts = data;
                }
            }
        }

    }
</script>

<style lang="scss" scoped>

</style>
