<template>
    <div class="row">

        <h2>What's new!</h2>
        <p>Die letzten Einträge bei Travelo.</p>

        <div v-for="(post, i) in posts" :key=i>
            <div>
                <div>{{ post.country }}</div>
                <div>{{ post.city }}</div>
                <div>{{ post.title }}</div>
                <div>{{ post.subtitle }}</div>
            </div>

            <img v-if="post.post_images.length" :src="post.post_images[0].post_image_path">

            <svg @click="viewPost(i)" xmlns="http://www.w3.org/2000/svg" width="39" height="27" viewBox="0 0 39 27">
                <path id="Polygon_8" data-name="Polygon 8" d="M19.5,0,39,27H0Z" transform="translate(39 27) rotate(180)"/>
            </svg>

            <div v-if="currentPost.id == post.id">
                <div v-if="postDialogVisible">
                    <div v-for="(img, i) in post.post_images" :key=i>
                        <img :src="img.post_image_path" alt="">
                    </div>

                    <p>{{ currentPost.body }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex';
import axios from "axios";

export default {
    name: 'all-posts',
    data() {
        return {
            postDialogVisible: false,
            currentPost: '',
            posts: [],
        };
    },
    computed: {
        ...mapState(['posts'])
    },
    beforeMount() {
        this.$store.dispatch('getAllPosts');
    },
    methods: {
        truncateText(text) {
            if (text.length > 24) {
                return `${text.substr(0, 24)}...`;
            }
            return text;
        },
        viewPost(postIndex) {
            const post = this.posts[postIndex];
            this.currentPost = post;

            if (!this.postDialogVisible) {
                this.postDialogVisible = true;
            } else {
                this.postDialogVisible = false;
            }
        },
        getPosts() {
            axios
                .get(
                    "/api/posts/"
                )
                .then((res) => {
                    this.posts = res.data;

                    console.log(res.data);

                });
        },
    },
    created() {
        this.getPosts();
    },
}
</script>
