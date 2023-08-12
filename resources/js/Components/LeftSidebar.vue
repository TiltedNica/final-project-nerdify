<script setup>

import ProfilePicture from "@/Components/ProfilePicture.vue";
import {Link, usePage} from "@inertiajs/vue3";
import {useGeneralStore} from "@/stores/general.js";

const useGeneral = useGeneralStore();
const user = usePage().props.auth.user
</script>
<template>
    <div class="pr-2.5">
        <Link href="/" class="mt-5 ms-2.5  flex gap-x-2.5 items-center h-16 w-[230px] bg-[#FAFAFB] rounded-2xl border-2 py-3 pl-2.5">
            <profile-picture w="32" h="32" :username="user.username" :image="user.image"></profile-picture>
            <div>
                <h3 class="font-semibold text-[#171725]">{{ user.name }}</h3>
                <h4 class="text-[#92929D] text-[12px] font-normal">{{user.username}}</h4>
            </div>
        </Link>
        <div class="mt-5">
            <Link href="/" class="flex gap-x-4" :class="{'text-[#0062ff]': $page.url==='/'}">
                <div v-if="$page.url==='/'" class="w-[3px] h-[32px] bg-[#0062FF] rounded-r-md"></div>
                <div class="flex py-1.5 gap-x-5">
                    <img v-if="$page.url==='/'" src="/img/ic_FeedActive.svg" alt="">
                    <img v-else src="/img/ic_Feed.svg" alt="">

                    <h3 class="font-semibold">Feed</h3>
                </div>
            </Link>
            <Link :href="route('users.followings', {user: `${user.username}`})"  class="flex py-1.5 gap-x-5">
                <div v-if="$page.url.endsWith('/followings')" class="w-[3px] h-[32px] bg-[#0062FF] rounded-r-md"></div>
                <div class="flex py-1.5 gap-x-5">
                    <img v-if="$page.url.endsWith('/followings')"  src="/img/ic_FriendsActive.svg" alt="">
                    <img v-else src="/img/ic_Friends.svg" alt="">
                    <h3 class="font-semibold text-[#171725]">Friends</h3>
                </div>
            </Link>
            <Link :href="route('user.photos', {user: `${user.username}`})" class="flex py-1.5 gap-x-5">
                <div v-if="$page.url.endsWith('/photos')" class="w-[3px] h-[32px] bg-[#0062FF] rounded-r-md"></div>
                <div class="flex py-1.5 gap-x-5">
                    <img v-if="$page.url.endsWith('/photos')" src="/img/ic_PhotosActive.svg" alt="">
                    <img v-else src="/img/ic_Photos.svg" alt="">
                    <h3 class="font-semibold text-[#171725]">Photos</h3>
                </div>
            </Link>
        </div>
    </div>
</template>

<style lang="scss" scoped>

</style>
