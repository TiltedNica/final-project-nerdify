<script setup>

import ProfilePicture from "@/Components/ProfilePicture.vue";
import {Link, usePage} from "@inertiajs/vue3";
import {useGeneralStore} from "@/stores/general.js";

const useGeneral = useGeneralStore();
const user = usePage().props.auth.user
</script>
<template>
    <div class="pl-2.5 pr-2.5">
        <Link href="/" class="mt-5  flex gap-x-2.5 items-center h-16 w-[230px] bg-[#FAFAFB] rounded-2xl border-2 py-3 pl-3">
            <profile-picture :image="user.image"></profile-picture>
            <div>
                <h3 class="font-semibold text-[#171725]">{{ user.name }}</h3>
                <h4 class="text-[#92929D] text-[12px] font-normal">{{user.username}}</h4>
            </div>
        </Link>
        <div class="mt-5">
            <Link href="/" class="flex py-1.5 gap-x-5">
                <img src="/img/ic_Feed.svg" alt="">
                <h3 class="font-semibold text-[#171725]">Feed</h3>
            </Link>
            <Link href="/" class="flex py-1.5 gap-x-5">
                <img src="/img/ic_Friends.svg" alt="">
                <h3 class="font-semibold text-[#171725]">Friends</h3>
            </Link>
            <Link href="/" class="flex py-1.5 gap-x-5">
                <img src="/img/ic_Photos.svg" alt="">
                <h3 class="font-semibold text-[#171725]">Photos</h3>
            </Link>
        </div>
    </div>
</template>

<style lang="scss" scoped>

</style>
