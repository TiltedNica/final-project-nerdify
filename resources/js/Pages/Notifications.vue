<script setup>

import MainNavLayout from "@/Layouts/MainLayout.vue";
import LeftSidebar from "@/Components/LeftSidebar.vue";
import {Head, usePage} from "@inertiajs/vue3";
import FriendBox from "@/Components/FriendBox.vue";
import ListBox from "@/Components/ListBox.vue";
import ProfilePicture from "@/Components/ProfilePicture.vue";
import MainLayout from "@/Layouts/MainLayout.vue";

defineProps({
    notifications: Object
})

</script>

<template>
    <Head title="Notifications"/>
    <MainLayout>
        <div class="flex h-screen">
            <left-sidebar></left-sidebar>
            <div class="bg-[#F1F1F5] w-full flex flex-col px-48 gap-y-4">
                <div class="flex  mt-8">
                    <h2 class="font-bold text-2xl">Notifications</h2>
                </div>
                <template v-for="notification in notifications.data">
                    <div v-if="notification.type==='App\\Notifications\\LikedPostNotification' && usePage().props.auth.user.id!==notification.data.user.id" class="w-full flex items-center justify-between p-4 bg-[#fffaed] rounded-2xl shadow-2xl">
                        <div class="flex gap-x-5 items-center">

                            <profile-picture :image="notification.data.user.image" h="42" w="42"/>
                            <div class="flex flex-col gap-y-1.5">
                                <div>
                                    <span class="font-bold">{{notification.data.user.name}}</span> liked your post.
                                </div>
                                <div>
                                    {{ notification.formatted_created_at}}
                                </div>
                            </div>
                        </div>
                        <div>
                            <img src="/img/ic_likes%20yellow.svg" alt="">
                        </div>
                    </div>
                    <div v-else-if="notification.type==='App\\Notifications\\CommentPostNotification' && usePage().props.auth.user.id!==notification.data.user.id" class="w-full flex items-center justify-between p-4 bg-[#d0e0e4] rounded-2xl shadow-2xl">
                        <div class="flex gap-x-5 items-center">
                            <profile-picture :image="notification.data.user.image" h="42" w="42"/>
                            <div class="flex flex-col gap-y-1.5">
                                <div>
                                    <span class="font-bold">{{notification.data.user.name}}</span> commented your post <span class="font-bold">{{notification.data.post.text}}</span>.
                                </div>
                                <div>
                                    {{ notification.formatted_created_at}}
                                </div>
                            </div>
                        </div>
                        <div>
                            <img src="/img/ic_comment%20green.png" alt="">
                        </div>
                    </div>
                    <div v-else-if="notification.type==='App\\Notifications\\FollowerNotification'" class="w-full flex items-center justify-between p-4 bg-[#edf2fb] rounded-2xl shadow-2xl">
                        <div class="flex gap-x-5 items-center">
                            <profile-picture :image="notification.data.user.image" h="42" w="42"/>
                            <div class="flex flex-col gap-y-1.5">
                                <div>
                                    <span class="font-bold">{{notification.data.user.name}}</span> started following you
                                </div>
                                <div>
                                    {{ notification.formatted_created_at}}
                                </div>
                            </div>
                        </div>
                        <div>
                            <img src="/img/ic_friends%20blue.png" alt="">
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </MainLayout>
</template>


