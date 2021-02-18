<template>
    <div>
        <ul>
<!--            <li v-for="post in posts" :key="post.id">-->
<!--                Title: {{post.title}}-->
<!--            </li>-->
        </ul>

    </div>
</template>

<script>

export default {
    name: "PostComponent",

    data() {
        return {
            posts: [],

        }
    },
    created() {
        console.log("postComponent");
        console.log(this.posts)

    },mounted() {
        console.log(this.$store.cc);
    }

}
</script>

<style scoped>

</style>
