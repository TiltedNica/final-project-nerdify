<script setup>
import {ref, reactive} from 'vue'
import {router, usePage, useForm} from "@inertiajs/vue3";
import {useGeneralStore} from "@/stores/general.js";
import ProfilePicture from "@/Components/ProfilePicture.vue";
import vueFilePond from 'vue-filepond';

// Import plugins
import FilePondPluginImagePreview from 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.esm.js';
// Import styles
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

// Create FilePond component
const FilePond = vueFilePond(FilePondPluginImagePreview);

const useGeneral = useGeneralStore()

const emit = defineEmits(['showModal'])
const user = usePage().props.auth.user
const imageDisplay = ref('')

const form = useForm({
    text: '',
    images: []
})

const handleSubmit = () => {
    form.post('/post');
    useGeneral.isPostOverlay = false;
    resetScroll();
}

const handleFilePondLoad = (response) => {
    form.images.push(response);
    return response;
}

const handleFilePondRevert = (uniqueId, load, error) => {
    form.images = form.images.filter((image)=>image !== uniqueId);
    router.delete('/revert/' + uniqueId)
    load()
}

const error = ref('')


const resetScroll = () =>{
    document.body.classList.remove('overflow-hidden')
}

</script>

<template>
    <div id="CreatePostOverlay" class="fixed inset-0 top-0 left-0 w-full h-full bg-[#92929D] bg-opacity-60 flex justify-center">
        <div class="w-[625px] bg-white mt-[100px] h-fit rounded-2xl">
            <div class="flex items-center justify-between py-2.5 px-5 border-b-2">
                <h3>Post Something</h3>
                <img class="cursor-pointer" @click="useGeneral.isPostOverlay=false; resetScroll()" src="/img/ic_Close.svg" alt="">
            </div>
            <form @submit.prevent="handleSubmit" class="p-4 max-h-[600px] overflow-y-scroll">
                <div class="flex items-center border-b-2">
                    <profile-picture class="pointer-events-none" :image="user.image"></profile-picture>
                    <div class="w-full">
                        <textarea v-model="form.text" class="resize-none rounded-2xl w-full border-none placeholder: text-[##92929D] placeholder:text-[18px]" :placeholder="'Whats on your mind ' + user.name + '?'"  type="text"/>
                    </div>
                </div>
                <div class="flex flex-col justify-between mt-4">
                    <file-pond
                        class="w-full"
                        name="image"
                        ref="pond"
                        class-name="my-pond"
                        label-idle="Drop images here..."
                        allow-multiple="true"
                        accepted-file-types="image/jpeg, image/png, video/mp4"
                        :server="{
                            url: '',
                            maxFileSize: 1024 * 1024 * 1024,
                            process: {
                                url: '/upload',
                                method: 'POST',
                                onload: handleFilePondLoad
                            },
                            revert: handleFilePondRevert,
                            headers: {
                                'X-CSRF-TOKEN': $page.props.csrf_token
                            }
                        }"
                    />
                    <input class="cursor-pointer bg-[#0062FF] rounded-2xl text-white px-8 py-3" type="submit" value="Share Post">
                </div>
            </form>
        </div>
    </div>

</template>


<style lang="scss" scoped>

</style>
