<template>
    <div>
        <form-article v-if="news.type == 'article'" :news="news" :categories="categories"
                      :languages="languages" v-on:newsEdited="modelEdited"></form-article>
        <form-advertising v-if="news.type == 'advertising'" :news="news" :categories="categories"
                          :languages="languages" v-on:newsEdited="modelEdited"></form-advertising>
        <form-message v-if="news.type == 'message'" :news="news" :categories="categories"
                      :languages="languages" v-on:newsEdited="modelEdited"></form-message>
    </div>
</template>

<script>
    import FormArticle from './EditArticle'
    import FormAdvertising from './EditAdvertising'
    import FormMessage from './EditMessage'

    export default {
        props: ['news', 'categories', 'languages'],
        components: {FormArticle, FormAdvertising, FormMessage},
        data() {
            return {}
        },
        methods: {
            modelEdited() {
                this.$emit('newsEdited');
            }
        }
    }
</script>
