<script setup>
import {ref, reactive} from 'vue'
import {router, usePage} from "@inertiajs/vue3";
import {useGeneralStore} from "@/stores/general.js";
import ProfilePicture from "@/Components/ProfilePicture.vue";

const useGeneral = useGeneralStore()

const emit = defineEmits(['showModal'])
const user = usePage().props.auth.user
const imageDisplay = ref('')

const form = reactive({
    text: '',
    image: '',
})

const error = ref('')

const getUploadedImage = (e) =>{
    imageDisplay.value = URL.createObjectURL(e.target.files[0])
    form.image = e.target.files[0]
}

const clearImage = () =>{
    imageDisplay.value = null,
    form.image = null
}

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
            <form @submit.prevent class="p-4 max-h-[600px] overflow-y-scroll">
                <div class="flex items-center border-b-2">
                    <profile-picture></profile-picture>
                    <div class="w-full">
                        <textarea v-model="form.text" class="resize-none rounded-2xl w-full border-none placeholder: text-[##92929D] placeholder:text-[18px]" placeholder="Whats on your mind?" type="text"/>
                    </div>
                </div>
                <div v-if="form.image" class="relative">
                    <img class="rounded-2xl mt-3 w-[576px] h-[400px]" :src="imageDisplay" alt="">
                    <img class="absolute h-6 w-6 right-2.5 top-2.5 cursor-pointer" @click="clearImage" src="/img/circle-xmark-solid.svg" alt="">
                </div>
                <div class="flex items-center justify-between mt-4">
                    <label for="image" class="cursor-pointer">
                        <img src="/img/ic_Image.svg" alt="">
                    </label>
                    <input id="image" type="file" class="hidden" @input="getUploadedImage($event)">
                    <input class="cursor-pointer bg-[#0062FF] rounded-2xl text-white px-8 py-3" type="submit" value="Share Post">
                </div>
            </form>
        </div>
    </div>

</template>


<style lang="scss" scoped>

</style>
