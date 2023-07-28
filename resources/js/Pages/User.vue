<script setup>
import {Link, Head} from "@inertiajs/vue3";
import MainNavLayout from "@/Layouts/MainNavLayout.vue";
import CreatePostBox from "@/Components/CreatePostBox.vue";
import Post from "@/Components/Post.vue";
import LeftSidebar from "@/Components/LeftSidebar.vue";

import {useGeneralStore} from "@/stores/general.js";
import ProfilePicture from "@/Components/ProfilePicture.vue";
import ProfilePictureUser from "@/Components/ProfilePictureUser.vue";
import BannerFilter from "@/Components/BannerFilter.vue";
import ProfileProgress from "@/Components/ProfileProgress.vue";
import AboutUser from "@/Components/AboutUser.vue";
import Photos from "@/Components/Photos.vue";

const useGeneral = useGeneralStore()

</script>

<template>
    <Head title="User"></Head>
    <MainNavLayout>
        <div class="flex h-full ">
            <left-sidebar></left-sidebar>
            <div class="bg-[#F1F1F5] w-full flex flex-col items-center py-8">
                <div class="w-[990px]">
                    <div class="relative w-full">
                        <img src="/img/Cover.png" alt="">
                        <h2 class="left-[221px] top-[183px] absolute text-2xl text-white font-semibold">Ahmad Nur Fawaid</h2>
                        <h4 class="left-[220px] absolute top-[214px] text-[#D5D5DC] text-base font-normal leading-6">@fawaid</h4>
                        <button class="absolute top-5 right-5 py-2.5 px-3.5 bg-[#17172580] rounded-2xl border-white border-2 text-white">Edit Profile</button>
                        <profile-picture-user class="absolute top-[138px] left-8"></profile-picture-user>
                    </div>
                    <div class="bg-white w-full rounded-b-2xl">
                        <div class="flex ms-[360px]">
                            <banner-filter title="Post" amount="10.3K"></banner-filter>
                            <banner-filter title="Followers" amount="2,564"></banner-filter>
                            <banner-filter title="Following" amount="3,154"></banner-filter>
                            <banner-filter title="Likes" amount="12.2K"></banner-filter>
                            <banner-filter title="Photos" amount="35"></banner-filter>
                            <banner-filter title="Videos" amount="24"></banner-filter>
                            <banner-filter title="Saved" amount="18"></banner-filter>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex flex-col w-[335px]">
                            <profile-progress></profile-progress>
                            <about-user></about-user>
                            <photos></photos>
                        </div>
                        <div>
                            <create-post-box class="mt-5" placeholder="Whats on your mind tim"></create-post-box>
                            <post></post>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </MainNavLayout>
</template>

<style lang="scss" scoped>

</style>
