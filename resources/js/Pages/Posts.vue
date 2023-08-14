<script setup>
import MainNavLayout from '@/Layouts/MainLayout.vue';
import {Head, Link, usePage} from '@inertiajs/vue3';
import ProfilePicture from "@/Components/ProfilePicture.vue";
import CreatePostBox from "@/Components/CreatePostBox.vue";
import Post from "@/Components/Post.vue";
import LeftSidebar from "@/Components/LeftSidebar.vue";
import {useGeneralStore} from "@/stores/general.js";
import MainLayout from "@/Layouts/MainLayout.vue";

const user = usePage().props.auth.user
defineProps({ posts: Object })

</script>

<template>
    <Head title="Posts"/>
    <MainLayout>
            <div class="flex">
                <left-sidebar></left-sidebar>
                <div class="bg-[#F1F1F5] min-h-screen w-full flex flex-col items-center">
                    <create-post-box class="mt-3" :placeholder="'Whats on your mind ' + user.name + '?'"></create-post-box>
                    <div v-for="post in posts.data" :key="post">
                        <post :user="post.user" :post="post" :comments="post.comments"></post>
                    </div>
                </div>
            </div>
    </MainLayout>

</template>
