<script setup>

import PhotosListBox from "@/Components/PhotosListBox.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import LeftSidebar from "@/Components/LeftSidebar.vue";
import Post from "@/Components/Post.vue";

defineProps({
    user: Object,
    posts: Object
})

</script>

<template>
    <main-layout>
        <div class="flex h-screen">
            <left-sidebar/>
            <div class="bg-[#F1F1F5] w-full flex flex-col items-center px-48">
                <div class="flex w-full justify-center items-center gap-x-24 mt-8 ">
                    <h2 class="font-bold text-lg">Hidden Posts</h2>
                </div>
                <div v-for="post in posts.data" :key="post.id">
                    <post :user="post.user" :post="post" :comments="post.comments"/>
                </div>
            </div>
        </div>
    </main-layout>
</template>
