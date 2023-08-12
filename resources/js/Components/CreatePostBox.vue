<script setup>
import {ref, toRefs} from "vue";
import {Link, usePage} from "@inertiajs/vue3";
import {useGeneralStore} from "@/stores/general.js";
import {storeToRefs} from "pinia";
import ProfilePicture from "@/Components/ProfilePicture.vue";

const useGeneral = useGeneralStore()
// const {isPostOverlay} = storeToRefs(useGeneral)

const props = defineProps({
    placeholder: String
})

const stopScroll = () =>{
    if (useGeneral.isPostOverlay) {
        document.body.classList.add('overflow-hidden')
    }
}



const {placeholder} = toRefs(props);
const user = usePage().props.auth.user

</script>

<template>
    <div id="CreatePostBox" class="w-[625px] bg-white rounded-2xl h-[107px]">
        <h3 class="border-b-2 py-2.5 pl-5 text-[#171725] font-medium">Post Something</h3>
        <div class="pl-3.5 pr-5 py-3.5 flex">
            <div class="flex items-center gap-5 w-full justify-between cursor-pointer" @click="useGeneral.isPostOverlay=true; stopScroll()">
                <div class="flex items-center gap-5">
                    <profile-picture w="36" h="36" class="pointer-events-none" :image="user.image"></profile-picture>
                    <div >
                        <div class="text-[#92929D] font-normal">{{placeholder}}</div>
                    </div>
                </div>
                <img src="/img/ic_Image.svg" alt="">
            </div>


        </div>
    </div>
</template>


<style lang="scss" scoped>

</style>
