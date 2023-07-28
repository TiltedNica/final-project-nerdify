<script setup>
import MainNavLayout from '@/Layouts/MainNavLayout.vue';
import {Head, Link} from '@inertiajs/vue3';
import ProfilePicture from "@/Components/ProfilePicture.vue";
import CreatePostBox from "@/Components/CreatePostBox.vue";
import Post from "@/Components/Post.vue";
import LeftSidebar from "@/Components/LeftSidebar.vue";
import {useGeneralStore} from "@/stores/general.js";

const useGeneral = useGeneralStore();
</script>

<template>
    <Head title="Posts"/>
    <MainNavLayout>
            <div class="flex">
                <left-sidebar></left-sidebar>
                <div class="bg-[#F1F1F5] w-full flex flex-col items-center ">
                    <create-post-box class="mt-3" placeholder="Whats on your mind tim"></create-post-box>
                    <post></post>
                </div>
            </div>
    </MainNavLayout>

</template>
