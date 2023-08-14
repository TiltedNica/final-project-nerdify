<script setup>

import LeftSidebar from "@/Components/LeftSidebar.vue";
import ListBox from "@/Components/ListBox.vue";
import MainNavLayout from "@/Layouts/MainLayout.vue";
import {Head} from "@inertiajs/vue3";
import PhotosListBox from "@/Components/PhotosListBox.vue";
import {useGeneralStore} from "@/stores/general.js";
import MainLayout from "@/Layouts/MainLayout.vue";

const useGeneral = useGeneralStore()

defineProps({
    postsDesc: Object,
    postsAsc: Object
})
</script>


<template>
    <Head title="Photos"/>
    <main-layout>
        <div class="flex h-screen">
            <left-sidebar/>
            <div class="bg-[#F1F1F5] w-full flex flex-col items-center px-48">
                <div class="flex w-full justify-between items-center gap-x-24 mt-8 ">
                    <h2 class="font-bold text-lg">Friends List</h2>
                    <photos-list-box/>
                </div>
                <div class="grid grid-cols-3 gap-5 mt-8">
                    <template v-if="useGeneral.isSelectedOptionPhotos==='Newest First'">
                        <template v-for="post in postsDesc">
                            <template v-for="photo in post.images">
                                <img class="w-[316px] h-[200px] object-center rounded-2xl" :src="'/storage/images/' + photo.path" alt="">
                            </template>
                        </template>
                    </template>
                    <template v-else>
                        <template v-for="post in postsAsc">
                            <template v-for="photo in post.images">
                                <img class="w-[316px] h-[200px] object-center rounded-2xl" :src="'/storage/images/' + photo.path" alt="">
                            </template>
                        </template>
                    </template>
                </div>
            </div>
        </div>
    </main-layout>
</template>


<style lang="scss" scoped>

</style>
