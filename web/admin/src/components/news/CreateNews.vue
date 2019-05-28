<template>
    <div>
        <form-article v-if="type == 'article'" :categories="categories" :languages="languages"></form-article>
        <form-advertising v-if="type == 'advertising'" :categories="categories" :languages="languages"></form-advertising>
        <form-message v-if="type == 'message'" :categories="categories" :languages="languages"></form-message>
    </div>
</template>

<script>
    import FormArticle from './CreateArticle'
    import FormAdvertising from './CreateAdvertising'
    import FormMessage from './CreateMessage'

    export default {
        props: ['type', 'categories', 'languages'],
        components: {FormArticle, FormAdvertising, FormMessage},
        data(){
            return {

            }
        }
    }
</script>