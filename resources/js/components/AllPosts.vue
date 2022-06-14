<template>
    <div>

        <h2 class="text-yellow font-bold text-4xl lg:text-6xl">What's new!</h2>
        <p class="text-2xl font-light mb-16 md:mb-28 lg:mb-36">Die letzten Einträge bei Travelo.</p>

        <div v-for="(post, i) in posts" :key=i>
            <div class="md:grid grid-cols-12 gap-4 divide-y divide-y-reverse mb-9">
                <div class="w-1/5 md:w-full divide-y col-span-2 xl:col-span-1 text-center font-bold text-2xl md:px-4 lg:px-6">
                    <div>{{ splitDate(post.created_at).day }}</div>
                    <div>{{ splitDate(post.created_at).year }}</div>
                </div>

                <div class="col-span-10 lg:col-span-5 flex justify-between">
                    <div>
                        <div class="font-bold text-xs">
                            <div>{{ post.country }} {{ post.city }}</div>
                        </div>
<!--                        <img v-if="post.post_images.length" :src="post.post_images[0].post_image_path">-->
                        <img src="../../img/header-img.jpg">

                        <div class="font-bold text-xl">{{ post.title }}</div>
                        <div class="flex justify-between">
                            <div class="font-light">{{ post.subtitle }}</div>

                            <svg @click="viewPost(i)" class="self-end w-5" v-bind:class="{'fill-yellow transform rotate-180 transition duration-500 ease-in-out': postDialogVisible}" xmlns="http://www.w3.org/2000/svg" width="39" height="27" viewBox="0 0 39 27">
                                <path id="Polygon_8" data-name="Polygon 8" d="M19.5,0,39,27H0Z" transform="translate(39 27) rotate(180)"/>
                            </svg>
                        </div>

                        <div v-if="currentPost.id == post.id">
                            <div v-if="postDialogVisible">
                                <div v-for="(img, i) in currentPost.post_images" :key=i>
                                    <img :src="img.post_image_path" alt="">
                                </div>

                                <p>{{ currentPost.body }}</p>
                            </div>
                        </div>

                    </div>





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
        splitDate(date) {
            var arr1 = date.split('-');
            var arr2 = arr1[0].split('0');

            var newDate = {
                year: arr2[1],
                day: arr1[1]
            }

            return newDate;
        },
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
