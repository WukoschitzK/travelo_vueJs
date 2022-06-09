<template>
    <div>
        <h1>Posts</h1>
        <ul>
            <li
                v-for="post in posts"
                :key="randomNumber() + `${post.title}`"
                class="bg-white shadow-md rounded-sm"
            >
            </li>
        </ul>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ListAllPosts",
    data: () => {
        return {
            posts: ""
        };
    },
    methods: {
        /**
         * Gets current project.
         */
        getPosts() {
            axios
                .get(`/`)
                .then((res) => {
                    this.posts = res.data;
                });

            console.log("get the posts");
        },
        /**
         * Creates random number to make sure that the keys used are always unique.
         */
        randomNumber() {
            return Math.floor(Math.random() * 1000);
        },
    },
    /**
     * The me() function gets the current user that is logged in.
     * See userDataService.js file in src/services
     */
    created() {
        this.getPosts();
    },
};
</script>
