<template>
    <div>

        <h2 class="text-yellow font-bold text-4xl lg:text-6xl mb-2.5">What's new!</h2>
        <p class="text-2xl font-light mb-12 lg:mb-28">Die letzten Einträge bei Travelo.</p>

        <div class="xl:flex flex-wrap lg:mb-28">
            <div v-for="(post, i) in posts" :key=i class="xl:max-w-1/2 w-full">
                <div class="grid grid-cols-12 gap-4 divide-y divide-y-reverse mb-12 xl:px-11">
                    <div class="w-full divide-y pt-2 col-span-2 xl:col-span-2 text-center font-bold text-2xl md:px-4 lg:px-6">
                        <div>{{ splitDate(post.created_at).day }}</div>
                        <div>{{ splitDate(post.created_at).year }}</div>
                    </div>

                    <div class="col-span-10 xl:col-span-10 flex justify-between">
                        <div class="w-full">
                            <div class="font-bold text-sm mb-2">
                                <div>{{ post.country }} {{ post.city }}</div>
                            </div>
                            <img :src="post.image_path" alt="Picture of Post" class="w-full"/>

                            <div class="font-bold text-xl mt-4">{{ post.title }}</div>
                            <div class="flex justify-between">
                                <div class="font-light mb-4">{{ post.subtitle }}</div>

                                <svg @click="viewPost(i)" class="self-end w-5" v-bind:class="{'fill-yellow transform rotate-180 transition duration-500 ease-in-out': postDialogVisible}" xmlns="http://www.w3.org/2000/svg" width="39" height="27" viewBox="0 0 39 27">
                                    <path id="Polygon_8" data-name="Polygon 8" d="M19.5,0,39,27H0Z" transform="translate(39 27) rotate(180)"/>
                                </svg>
                            </div>

                            <div v-if="currentPost.id == post.id">
                                <div v-if="postDialogVisible">
                                    <div v-for="(img, i) in currentPost.post_images" :key=i>
                                        <img :src="img.post_image_path" alt="">
                                    </div>
                                    <h3 class="font-bold">Die Story</h3>
                                    <p>{{ currentPost.body }}</p>
                                </div>
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
        ...mapState(['posts']),
    },
    beforeMount() {
        //this.$store.dispatch('getAllPosts');
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
                    "/api/posts"
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
