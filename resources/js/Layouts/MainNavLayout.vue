<script setup>
import {ref} from 'vue';
import {Link, usePage} from '@inertiajs/vue3';
import {useGeneralStore} from "@/stores/general.js";
import {storeToRefs} from "pinia";
import ProfilePicture from "@/Components/ProfilePicture.vue";
import CreatePostOverlay from "@/Components/CreatePostOverlay.vue";
import EditPicturesOverlay from "@/Components/EditPicturesOverlay.vue";

const useGeneral = useGeneralStore()


const user = usePage().props.auth.user

</script>

<template>

    <div id="MainNav" class="px-6 py-6 border-b-2">
        <div class="flex justify-between items-center">
            <div>
                <Link href="/">
                    <img src="/img/Logo.svg" alt="">
                </Link>
            </div>
            <div class="flex items-center gap-x-6">
                <img src="/img/bell-regular.svg" class="h-[24px] w-[24px]" alt="">
                <div class="flex gap-x-3.5">
                    <profile-picture :username="user.username" :image="user.image"></profile-picture>
                    <img src="/img/ic_Dropdown.svg" alt="">
                </div>
            </div>
        </div>
    </div>
    <slot></slot>
    <create-post-overlay v-if="useGeneral.isPostOverlay"></create-post-overlay>
    <edit-pictures-overlay v-if="useGeneral.isEditProfileOverlay"/>
</template>
