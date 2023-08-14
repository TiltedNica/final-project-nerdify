<script setup>
import {ref} from 'vue';
import {Link, usePage} from '@inertiajs/vue3';
import {useGeneralStore} from "@/stores/general.js";
import {onMounted, computed} from "vue";
import {storeToRefs} from "pinia";
import ProfilePicture from "@/Components/ProfilePicture.vue";
import CreatePostOverlay from "@/Components/CreatePostOverlay.vue";
import EditPicturesOverlay from "@/Components/EditPicturesOverlay.vue";
import DropdownMenu from "@/Components/DropdownMenu.vue";
import Notification from "@/Components/NotificationBell.vue";
import NotificationBell from "@/Components/NotificationBell.vue";


const useGeneral = useGeneralStore()

const unreadNotificationsCount = ref(usePage().props.unreadNotificationsCount);
const updateUnreadNotificationsCount = (count)=>{
    unreadNotificationsCount.value = count
}


const user = usePage().props.auth.user
onMounted(()=>{
    window.Echo.private(`App.Models.User.${user.id}`).notification((notification)=>{
        console.log(notification)
        switch (notification.type){
            case 'App\\Notifications\\LikedPostNotification':
                updateUnreadNotificationsCount(unreadNotificationsCount.value + 1);
                console.log(unreadNotificationsCount.value);
                break;
            case 'App\\Notifications\\CommentPostNotification':
                updateUnreadNotificationsCount(unreadNotificationsCount.value + 1);
                console.log(unreadNotificationsCount.value);
                break;
            case 'App\\Notifications\\FollowerNotification':
                updateUnreadNotificationsCount(unreadNotificationsCount.value + 1);
                console.log(unreadNotificationsCount.value);
                break;
        }
    })
})

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

                <notification-bell :unreadNotificationsCount="unreadNotificationsCount"/>
                <div class="flex gap-x-3.5 items-center">
                    <profile-picture w="34" h="34" :username="user.username" :image="user.image"></profile-picture>
                    <dropdown-menu></dropdown-menu>
                </div>
            </div>
        </div>
    </div>
    <slot ></slot>
    <create-post-overlay v-if="useGeneral.isPostOverlay"></create-post-overlay>
    <edit-pictures-overlay v-if="useGeneral.isEditProfileOverlay"/>
</template>
