<template>
    <div>
        <PostForm/>
    </div>
</template>

<script>
    import PostForm from './Form'
    export default {
        props:['id'],
        name: 'EditPost',
        components: {
            PostForm
        }
    }
</script>

<style lang="scss" scoped>

</style>
