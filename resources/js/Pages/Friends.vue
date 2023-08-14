<script setup>

import MainNavLayout from "@/Layouts/MainLayout.vue";
import LeftSidebar from "@/Components/LeftSidebar.vue";
import Post from "@/Components/Post.vue";
import {Head} from "@inertiajs/vue3";
import CreatePostBox from "@/Components/CreatePostBox.vue";
import ListBox from "@/Components/ListBox.vue";
import FriendBox from "@/Components/FriendBox.vue";
import {useGeneralStore} from "@/stores/general.js";
import MainLayout from "@/Layouts/MainLayout.vue";

const useGeneral = useGeneralStore()

    defineProps({
    profile: Object,
    followers: Array,
    followings: Array
})
</script>

<template>
    <Head title="Friends"/>
    <MainLayout>
        <div class="flex h-screen">
            <left-sidebar></left-sidebar>
            <div class="bg-[#F1F1F5] w-full flex flex-col items-center">
                <div class="flex items-center gap-x-24 mt-8">
                    <h2 class="font-bold text-lg">Friends List</h2>
                    <list-box></list-box>
                </div>
<!--                {{followings}}-->
                <div v-if="useGeneral.isSelectedOption === 'Followers'">
                    <div v-for="follower in followers">
                        <friend-box :profile="profile" :follower="follower"/>
                    </div>
                </div>
                <div v-else>
                    <div v-for="follower in followings">
                        <friend-box :profile="profile" :follower="follower"/>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>


