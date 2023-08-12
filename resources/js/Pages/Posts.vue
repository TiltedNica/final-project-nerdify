<script setup>
import MainNavLayout from '@/Layouts/MainNavLayout.vue';
import {Head, Link, usePage} from '@inertiajs/vue3';
import ProfilePicture from "@/Components/ProfilePicture.vue";
import CreatePostBox from "@/Components/CreatePostBox.vue";
import Post from "@/Components/Post.vue";
import LeftSidebar from "@/Components/LeftSidebar.vue";
import {useGeneralStore} from "@/stores/general.js";

const user = usePage().props.auth.user
defineProps({ posts: Object })

</script>

<template>
    <Head title="Posts"/>
    <MainNavLayout>
            <div class="flex">
                <left-sidebar></left-sidebar>
                <div class="bg-[#F1F1F5] w-full flex flex-col items-center">
                    <create-post-box class="mt-3" :placeholder="'Whats on your mind ' + user.name + '?'"></create-post-box>
                    <div v-for="post in posts.data" :key="post">
                        <post :user="post.user" :post="post" :comments="post.comments"></post>
                    </div>
                </div>
            </div>
    </MainNavLayout>

</template>
