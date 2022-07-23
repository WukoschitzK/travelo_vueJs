<template>
    <div>
        <h2 class="text-yellow font-bold text-4xl lg:text-6xl mb-2.5">Dein Eintrag zählt.</h2>
        <p class="text-2xl font-light mb-11 lg:mb-28">Erzähl Travelo deine Geschichte.</p>

        <div class="lg:mb-28">
            <form @submit.prevent enctype="multipart/form-data" class="mb-11 lg:flex w-full flex-row-reverse justify-between">

                <div class="lg:w-2/5 mb-11">
                    <label class="inline-block mb-2 text-gray-500">Upload
                        Image(jpg,png)</label>
                    <div class="flex items-center justify-center w-full">
                        <label
                            class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300" for="image_path">
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

                            <input name="image_path" id="image_path" type="file" class="opacity-0" accept="image/*" v-on:change="onImageChange"/>
                        </label>
                    </div>
                </div>

                <div class="lg:w-2/5">
                    <div class="flex flex-col lg:flex-row mb-4">
                        <label for="title" class="md:w-20 lg:w-32 text-base">Title</label>
                        <input
                            v-model="newPost.title"
                            id="title"
                            type="text"
                            class="border-b-2 pl-2 pb-0.5 pt-2 lg:pt-0 lg:w-full"
                        >
                    </div>
                    <div class="flex flex-col lg:flex-row mb-4">
                        <label for="subtitle" class="md:w-20 lg:w-32 text-base">Subtitle</label>
                        <input
                            v-model="newPost.subtitle"
                            id="subtitle"
                            type="text"
                            required
                            class="border-b-2 pl-2 pb-0.5 pt-2 lg:pt-0 lg:w-full"
                        >
                    </div>
                    <div class="flex flex-col lg:flex-row mb-4">
                        <label for="post-content" class="md:w-20 lg:w-32 text-base">Body</label>
                        <textarea id="body" v-model="newPost.body" type="text" rows="15" required class="border-b-2 pl-2 pb-0.5 pt-2 lg:pt-0 lg:w-full"/>
                    </div>

                    <div class="flex flex-col lg:flex-row mb-4">
                        <label for="country" class="md:w-20 lg:w-32 text-base">Country</label>
                        <input
                            v-model="newPost.country"
                            id="country"
                            type="text"
                            required
                            class="border-b-2 pl-2 pb-0.5 pt-2 lg:pt-0 lg:w-full"
                        >
                    </div>
                    <div class="flex flex-col lg:flex-row mb-4">
                        <label for="city" class="md:w-20 lg:w-32 text-base">City</label>
                        <input
                            v-model="newPost.city"
                            id="city"
                            type="text"
                            required
                            class="border-b-2 pl-2 pb-0.5 pt-2 lg:pt-0 lg:w-full"
                        >
                    </div>
                </div>
            </form>
        </div>

        <div class="text-center lg:text-left">
            <button
                type="button"
                @click="createPost"
                class="text-base focus:outline-none text-white bg-yellow hover:bg-yellowDark focus:ring-4 focus:ring-yellow font-medium rounded text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"
            >Create Post
            </button>
        </div>
    </div>
</template>

<script>
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
                image_path:""
            }
        };
    },
    computed: {},
    mounted () {},
    methods: {
        onImageChange(e){
            this.newPost.image_path = e.target.files[0];
        },
        createPost (e) {
            e.preventDefault();
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            this.isCreatingPost = true
            const formData = new FormData()
            formData.append('title', this.newPost.title)
            formData.append('subtitle', this.newPost.subtitle)
            formData.append('body', this.newPost.body)
            formData.append('country', this.newPost.country)
            formData.append('city', this.newPost.city)
            formData.append('image_path', this.newPost.image_path)
            axios.post('/api/create-post', formData, config).then(
                window.location.reload()
            )
        }
    }
}
</script>
