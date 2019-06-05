<template>
    <div>
        <form-article v-if="type == 'article'" v-on:newsCreated="modelCreated" :categories="categories" :languages="languages"></form-article>
        <form-advertising v-if="type == 'advertising'" v-on:newsCreated="modelCreated" :categories="categories" :languages="languages"></form-advertising>
        <form-message v-if="type == 'message'" v-on:newsCreated="modelCreated" :categories="categories" :languages="languages"></form-message>
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
        },
        methods: {

            modelCreated() {
                this.$emit('newsCreated');
            }
        }
    }
</script>