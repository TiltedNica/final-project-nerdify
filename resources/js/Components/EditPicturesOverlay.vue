<script setup>
import {router, useForm, usePage} from "@inertiajs/vue3";
import {useGeneralStore} from "@/stores/general.js";
import {ref} from "vue";

const user = usePage().props.auth.user;

const form = useForm({
    image: null,
    banner_picture: null,
});

const imageDisplay = ref('')
const bannerDisplay = ref('')

const getUploadedImage = (e) => {
    imageDisplay.value = URL.createObjectURL(e.target.files[0])
    form.image = e.target.files[0]
}

const getUploadedBanner = (e) => {
    bannerDisplay.value = URL.createObjectURL(e.target.files[0])
    form.banner_picture = e.target.files[0]
}

const useGeneral = useGeneralStore()

function updateProfile(){
    router.post(`/user/${user.username}`, {
        _method: 'put',
        image: form.image,
        banner_picture: form.banner_picture,
    })

    useGeneral.isEditProfileOverlay=false;

}
</script>

<template>
    <div class="fixed inset-0 top-0 left-0 w-full h-full bg-[#92929D] bg-opacity-60 flex justify-center">
        <div class="w-[625px] bg-white mt-[100px] h-fit rounded-2xl p-4">
            <form class="w-full" @submit.prevent="updateProfile">
                <div class="flex">
                    <div class="flex-1">
                        <label for="title" class="block text-xl text-center font-medium text-gray-700">Profile Picture</label>
                        <div class="mt-1 flex flex-col items-start gap-y-3">
                            <div class="w-[300px] max-h-[300px]">
                                <img v-if="imageDisplay" class="w-[300px] h-[300px]" :src="imageDisplay"  alt="">
                                <img v-else class="w-[300px] h-[300px]" :src="user.image"  alt="">
                            </div>
                            <input type="file" id="image" @input="getUploadedImage($event)"  class="block w-full transition duration-150 ease-in-out">
                        </div>
                    </div>
                    <div>
                        <img class="cursor-pointer" @click="useGeneral.isEditProfileOverlay=false" src="/img/ic_Close.svg" alt="">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="title" class="block text-xl text-center font-medium text-gray-700">Banner Picture</label>
                    <div class="mt-1 flex flex-col items-start gap-y-3">
                        <div class="max-h-[200px]">
                            <img class="max-h-[200px]" v-if="bannerDisplay"  :src="bannerDisplay"  alt="">
                            <img class="max-h-[200px]" v-else :src="user.banner_picture"  alt="">
                        </div>
                        <input type="file" id="banner_picture" @input="getUploadedBanner($event)"  class="block w-full transition duration-150 ease-in-out">
                    </div>
                </div>
                <div class="flex justify-between">
                    <input type="submit" value="Submit Changes" class="bg-[#0062ff] px-4 py-2 text-white rounded-xl mt-4">
                    <div @click="useGeneral.isEditProfileOverlay=false" class="bg-red-600 px-4 py-2 text-white rounded-xl mt-4">Cancel</div>
                </div>
            </form>
        </div>
    </div>

</template>


<style lang="scss" scoped>

</style>
