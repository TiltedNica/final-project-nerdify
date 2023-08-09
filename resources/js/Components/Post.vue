<script setup>
import {toRefs, reactive, computed} from "vue";
import {Link, router, usePage} from "@inertiajs/vue3";
import {useGeneralStore} from "@/stores/general.js";
import ProfilePicture from "@/Components/ProfilePicture.vue";
import {c} from "../../../public/build/assets/app-3d4439b8.js";

const form = reactive({
    comment:null
})

const props = defineProps({
    user: Object,
    post: Object,
    comments: Object
})




const isVideo = (filename) =>{
    return /\.mp4$/i.test(filename)
}

const userAuth = usePage().props.auth.user

const createComment = () =>{
    router.post('/comment', {
        post_id: props.post.id,
        text: form.comment
    },
        {
            preserveScroll: true
        }
    )
}

const isHeartActiveComputed = computed(() => {
    let isTrue = false

    for (let i = 0; i < props.post.likes.length; i++) {
        const like = props.post.likes[i];
        if (like.user_id === userAuth.id && like.post_id === props.post.id) {
            isTrue = true
        }
    }

    return isTrue
})

const createLike = () => {
    let deleteLike = false
    let id = null

    for (let i = 0; i < props.post.likes.length; i++) {
        const like = props.post.likes[i];
        if (like.user_id === userAuth.id && like.post_id === props.post.id) {
            deleteLike=true
            id = like.id
        }
    }

    if (deleteLike) {
        router.delete('/likes/' + id, {
            preserveScroll: true
        })
    } else {
        router.post('/likes', {
                post_id: props.post.id,
            },
            {
                preserveScroll: true
            }
        )
    }



}

const isUser = () =>{
    router.get('/user/' + user.value.id)
}

</script>
<template>
    <div id="CreatePostBox" class="w-[625px] p-5 bg-white rounded-t-2xl mt-3 border-b-2">
        <div class="flex justify-between">
            <div class="flex items-center gap-x-2.5">
                <profile-picture :username="user.username" :image="user.image"></profile-picture>
                <div>
                    <h3 class="text-[#171725] font-semibold">{{ user.name }}</h3>
                    <div class="text-[#92929D] text-[12px] font-normal">{{ post.created_at }}</div>
                </div>
            </div>
            <img class="self-start bg-[#F1F1F5] px-1 h-fit rounded-md" src="/img/ic_More.svg" alt="">
        </div>
        <p class="mt-5 text-[#44444F] text-[14px] leading-6">
            {{post.text}}
        </p>
        <div v-if="post.images" class="grid grid-cols-2 grid-flow-dense gap-3.5 border-b-2 pb-5 mt-5">
            <div v-for="image in post.images" :class="[isVideo(image.name) ? 'aspect-w-16 aspect-h-9 w-full col-span-2' : '']">
                <video  autoplay="autoplay" muted controls v-if="isVideo(image.name)">
                    <source :src="'/storage/images/' + image.path">
                </video>
                <img v-else class="w-[285px] h-[330px] object-cover rounded-2xl" :src="'/storage/images/' + image.path" alt="">
            </div>
        </div>
        <div class="flex items-center gap-x-12 mt-5">
            <div class="flex gap-x-2.5">
                <img src="/img/ic_comment.svg" alt="">
                <h3 class="text-[#44444F] text-[14px] leading-6">{{ comments.length }} Comments</h3>
            </div>
            <div class="flex gap-x-2.5">
                <button @click="createLike">
                    <img v-if="!isHeartActiveComputed" src="/img/ic_like.svg" class="h-6 w-6" alt="">
                    <img v-else src="/img/heart-solid.svg" class="h-6 w-6" alt="">
                </button>
                <h3 class="text-[#44444F] text-[14px] leading-6">{{post.likes.length}} Likes</h3>
            </div>
            <div class="flex gap-x-2.5">
                <img src="/img/ic_Saved.svg" alt="">
                <h3 class="text-[#44444F] text-[14px] leading-6">12 Saved</h3>
            </div>
        </div>
    </div>
    <div class="w-[625px] p-5 bg-white rounded-b-2xl border-b-2 flex gap-x-2.5 flex-col gap-y-2.5" >
        <div v-for="comment in comments" :key="comment" class="flex items-center gap-x-2.5">
            <profile-picture :image="user.image"></profile-picture>
            <div class="bg-[#FAFAFB] p-2.5 rounded-2xl text-[14px] text-[#92929D]">{{ comment.text }}</div>
        </div>
        <div class="flex items-center gap-x-2.5">
            <profile-picture :image="user.image"></profile-picture>
            <form action="" @submit.prevent="createComment" class="flex relative w-full">
                    <input v-model="form.comment" type="text" placeholder="Write Your Comment" class="bg-[#FAFAFB] placeholder-[#92929D] placeholder: leading-6 placeholder:text-[14px] border-none rounded-2xl w-full">
                    <img class="absolute mt-2.5 right-2.5 cursor-pointer" src="/img/ic_Image.svg" alt="">
            </form>
        </div>
    </div>
</template>



<style lang="scss" scoped>

</style>
