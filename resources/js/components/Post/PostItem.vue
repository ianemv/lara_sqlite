<template>
    <div>
       <h2>  <a v-bind:href="'/posts/'+post.slug"> {{ post.title}} </a></h2>
        <div v-html="post.content"></div>
    </div>
</template>

<script>
    export default {
        name: 'PostItem',
        props: ['post']
    }
</script>

<style lang="scss" scoped>

</style>
