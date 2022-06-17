<template>
    <div :key="componentKey">

        <svg v-if="loader" role="status" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>

        <h2 class="text-yellow font-bold text-4xl lg:text-6xl mb-2.5">Dein Eintrag zählt.</h2>
        <p class="text-2xl font-light mb-11 md:mb-28 lg:mb-36">Erzähl Travelo deine Geschichte.</p>


        <div>
            <form @submit.prevent class="lg:px-20 mb-11 lg:flex w-full flex-row-reverse justify-between">

                <div class="lg:w-2/5 mb-11">
                    <label class="inline-block mb-2 text-gray-500">Upload
                        Image(jpg,png)</label>
                    <div class="flex items-center justify-center w-full">
                        <label
                            class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                            <div class="relative flex flex-col items-center justify-center pt-7">
                                <img id="preview" class="absolute inset-0 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                          clip-rule="evenodd" />
                                </svg>
                                <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                    Select a photo</p>
                            </div>

                            <input type="file" class="opacity-0" accept="image/*" @change="showPreview(event)" />
                        </label>
                    </div>
                </div>

                <div class="lg:w-2/5">
                    <div class="flex flex-col lg:flex-row mb-4">
                        <label for="title" class="md:w-20 lg:w-32">Title</label>
                        <input
                            v-model="newPost.title"
                            id="title"
                            type="text"
                            class="border-b-2 pl-2 pb-0.5 pt-2 md:pt-0 lg:w-full"
                        >
                    </div>
                    <div class="flex flex-col lg:flex-row mb-4">
                        <label for="subtitle" class="md:w-20 lg:w-32">Subtitle</label>
                        <input
                            v-model="newPost.subtitle"
                            id="subtitle"
                            type="text"
                            required
                            class="border-b-2 pl-2 pb-0.5 pt-2 md:pt-0 lg:w-full"
                        >
                    </div>
                    <div class="flex flex-col lg:flex-row mb-4">
                        <label for="post-content" class="md:w-20 lg:w-32">Post Body</label>
                        <textarea id="body" v-model="newPost.body" type="text" rows="15" required class="border-b-2 pl-2 pb-0.5 pt-2 md:pt-0 lg:w-full"/>
                    </div>

                    <div class="flex flex-col lg:flex-row mb-4">
                        <label for="country" class="md:w-20 lg:w-32">Country</label>
                        <input
                            v-model="newPost.country"
                            id="country"
                            type="text"
                            placeholder="Post Country"
                            required
                            class="border-b-2 pl-2 pb-0.5 pt-2 md:pt-0 lg:w-full"
                        >
                    </div>
                    <div class="flex flex-col lg:flex-row mb-4">
                        <label for="city" class="md:w-20 lg:w-32">City</label>
                        <input
                            v-model="newPost.city"
                            id="city"
                            type="text"
                            placeholder="Post City"
                            required
                            class="border-b-2 pl-2 pb-0.5 pt-2 md:pt-0 lg:w-full"
                        >
                    </div>
                </div>

<!--                <div>-->
<!--                    <el-upload-->
<!--                        action="https://jsonplaceholder.typicode.com/posts/"-->
<!--                        list-type="picture-card"-->
<!--                        :on-preview="handlePictureCardPreview"-->
<!--                        :on-change="updateImageList"-->
<!--                        :auto-upload="false"-->
<!--                    >-->
<!--                        <i class="el-icon-plus" />-->
<!--                    </el-upload>-->
<!--                    <el-dialog :visible.sync="dialogVisible">-->
<!--                        <img width="100%" :src="dialogImageUrl" alt>-->
<!--                    </el-dialog>-->
<!--                </div>-->







<!--                <input name="image" type="file" id="imageUpload" accept=".png, .jpg, .jpeg" />-->
<!--                <label for="imageUpload"></label>-->



            </form>
        </div>

        <div class="text-center lg:text-left">
            <button
                type="button"
                @click="createPost"
                class="focus:outline-none text-white bg-yellow hover:bg-yellowDark focus:ring-4 focus:ring-yellow font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"
            >Create Post
            </button>
        </div>


<!--        <div class="grid Submit&#45;&#45;button">-->
<!--            <input-->
<!--                type="submit"-->
<!--                @click="savePost()"-->
<!--                value="Submit!"-->
<!--                class="Button justify-self-start mt-1"-->
<!--            />-->
<!--        </div>-->
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    name: 'create-post',
    data() {
        return {
            newPost: {
                title: "",
                subtitle: "",
                body: "",
                country: "",
                city: "",
                image:""
            },
            loader: false,
        };
    },
    computed: {},
    mounted () {},
    methods: {
        createPost (e) {
            e.preventDefault()
            const that = this
            this.isCreatingPost = true
            const formData = new FormData()
            formData.append('title', this.newPost.title)
            formData.append('subtitle', this.newPost.subtitle)
            formData.append('body', this.newPost.body)
            formData.append('country', this.newPost.country)
            formData.append('city', this.newPost.city)
            formData.append('image', this.newPost.image)
            this.loader = true;

            axios.post('/api/create-post', formData).then(() => {
                this.loader = false;
            })
        }
    }
}
</script>
