<script setup>
import {Link, Head, usePage} from "@inertiajs/vue3";
import MainNavLayout from "@/Layouts/MainNavLayout.vue";
import CreatePostBox from "@/Components/CreatePostBox.vue";
import Post from "@/Components/Post.vue";
import LeftSidebar from "@/Components/LeftSidebar.vue";

import {useGeneralStore} from "@/stores/general.js";
import ProfilePicture from "@/Components/ProfilePicture.vue";
import BannerFilter from "@/Components/BannerFilter.vue";
import ProfileProgress from "@/Components/ProfileProgress.vue";
import AboutUser from "@/Components/AboutUser.vue";
import Photos from "@/Components/Photos.vue";
import DropdownMenu from "@/Components/DropdownMenu.vue";
import FollowButton from "@/Components/FollowButton.vue";

const useGeneral = useGeneralStore()

defineProps({
    likes: String,
    images: String,
    isFollowing: Boolean,
    posts: Object,
    user: Object,
    date: String
})

// const user = usePage().props.auth.user

</script>

<template>
    <Head title="User"></Head>
    <MainNavLayout>
        <div class="flex h-full ">
            <left-sidebar></left-sidebar>
            <div class="bg-[#F1F1F5] w-full flex flex-col items-center py-8">
                <div class="w-[990px]">
                    <div class="relative w-full">
                        <img class="w-full max-h-[260px] object-cover rounded-t-2xl" :src="user.banner_picture" alt="">
                        <h2 class="left-[221px] top-[183px] absolute text-2xl text-white font-semibold">{{
                                user.name
                            }}</h2>
                        <h4 class="left-[220px] absolute top-[214px] text-[#D5D5DC] text-base font-normal leading-6">@{{user.username}}</h4>
                        <Link v-if="$page.props.auth.user.id === user.id" :href="`/user/${user.username}/edit`"  class="absolute top-5 right-5 py-2.5 px-3.5 bg-[#17172580] rounded-2xl border-white border-2 text-white">Edit Profile</Link>
                        <profile-picture h="156" w="156" :username="user.username" :image="user.image"  class="absolute top-[138px] left-8"></profile-picture>
                    </div>
                    <div class="bg-white w-full rounded-b-2xl">
                        <div class="flex ms-[360px] items-center">
                            <banner-filter :amount="posts.data.length" title="Post"></banner-filter>
                            <banner-filter title="Followers" amount="2,564"></banner-filter>
                            <banner-filter title="Following" amount="3,154"></banner-filter>
                            <banner-filter :amount="likes" title="Likes"></banner-filter>
                            <banner-filter title="Photos" :amount="images"></banner-filter>
                            <banner-filter title="Videos" amount="24"></banner-filter>
                            <banner-filter title="Saved" amount="18"></banner-filter>
                            <follow-button :isFollowing="isFollowing" :username="user.username" v-if="$page.props.auth.user.id !== user.id"/>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex flex-col w-[335px]">
                            <profile-progress></profile-progress>
                            <about-user :date="date" :user="user"></about-user>
                            <photos :posts="posts"></photos>
                        </div>
                        <div>
                            <create-post-box v-if="$page.props.auth.user.id === user.id" class="mt-5" :placeholder="'Whats on your mind ' + user.name + '?'"></create-post-box>
                            <div v-for="post in posts.data" :key="post">
                                <post :user="post.user" :post="post" :comments="post.comments"></post>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </MainNavLayout>
</template>

<style lang="scss" scoped>

</style>
