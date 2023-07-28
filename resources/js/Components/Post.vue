<script setup>
import {toRefs, reactive} from "vue";
import {Link, router} from "@inertiajs/vue3";
import {useGeneralStore} from "@/stores/general.js";
import ProfilePicture from "@/Components/ProfilePicture.vue";

const form = reactive({
    comment:null
})
//
// const props = defineProps({
//     user: Object,
//     post: Object,
//     comments: Object
// })

</script>
<template>
    <div id="CreatePostBox" class="w-[625px] p-5 bg-white rounded-t-2xl mt-3 border-b-2">
        <div class="flex justify-between">
            <div class="flex items-center gap-x-2.5">
                <profile-picture></profile-picture>
                <div>
                    <h3 class="text-[#171725] font-semibold">Ahmad Nur Fawaid</h3>
                    <div class="text-[#92929D] text-[12px] font-normal">12 April at 09:28 PM</div>
                </div>
            </div>
            <img class="self-start bg-[#F1F1F5] px-1 h-fit rounded-md" src="/img/ic_More.svg" alt="">
        </div>
        <p class="mt-5 text-[#44444F] text-[14px] leading-6">
            One of the perks of working in an international company is sharing knowledge with your colleagues.
        </p>
        <div class="grid grid-cols-2 gap-x-3.5 border-b-2 pb-5 mt-5">
            <img class="w-[285px]  h-[330px] object-cover rounded-2xl" src="/img/316a30da56abfe568bbbda57e61363b0dc53a2cdr1-313-313v2_00.jpg" alt="">
            <img class="w-[285px  h-[330px] object-cover rounded-2xl" src="/img/4363d31f48315ee194af588e55e84d54fed169adr1-1515-981v2_hq.jpg">
        </div>
        <div class="flex items-center gap-x-12 mt-5">
            <div class="flex gap-x-2.5">
                <img src="/img/ic_comment.svg" alt="">
                <h3 class="text-[#44444F] text-[14px] leading-6">25 Comments</h3>
            </div>
            <div class="flex gap-x-2.5">
                <img src="/img/ic_like.svg" alt="">
                <h3 class="text-[#44444F] text-[14px] leading-6">120K Likes</h3>
            </div>
            <div class="flex gap-x-2.5">
                <img src="/img/ic_Saved.svg" alt="">
                <h3 class="text-[#44444F] text-[14px] leading-6">12 Saved</h3>
            </div>
        </div>
    </div>
    <div class="w-[625px] p-5 bg-white rounded-b-2xl border-b-2 flex gap-x-2.5 flex-col gap-y-2.5" >
        <div class="flex items-center gap-x-2.5">
            <profile-picture></profile-picture>
            <div class="bg-[#FAFAFB] p-2.5 rounded-2xl text-[14px] text-[#92929D]">This is a test comment</div>
        </div>
        <div class="flex items-center gap-x-2.5">
            <profile-picture></profile-picture>
            <div class="flex relative w-full">
                <input type="text" placeholder="Write Your Comment" class="bg-[#FAFAFB] placeholder-[#92929D] placeholder: leading-6 placeholder:text-[14px] border-none rounded-2xl w-full">
                <img class="absolute mt-2.5 right-2.5 cursor-pointer" src="/img/ic_Image.svg" alt="">
            </div>
        </div>
    </div>
</template>



<style lang="scss" scoped>

</style>
