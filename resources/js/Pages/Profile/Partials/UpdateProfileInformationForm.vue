<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage, router } from '@inertiajs/vue3';
import MainNavLayout from "@/Layouts/MainNavLayout.vue";
import LeftSidebar from "@/Components/LeftSidebar.vue";
import {useGeneralStore} from "@/stores/general.js";


defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },

});

// const props = defineProps({
//     User: Object
// })

const useGeneral = useGeneralStore()
const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    image: null,
    banner_picture: null,
    username: user.username,
    location: user.location,
    website: user.website,
    job: user.job
});

function updateProfile(){
    router.post(`/user/${user.username}`, {
        _method: 'put',
        username: form.username,
        image: form.image,
        banner_picture: form.banner_picture,
        location: form.location,
        website: form.website,
        job: form.job
    })
}
</script>

<template>
    <main-nav-layout>
        <div class="flex h-full">
            <left-sidebar/>
            <div class="bg-[#F1F1F5] w-full flex flex-col items-center py-8">
                <section class="bg-white p-12 rounded-lg w-2/5">
                    <div class="flex flex-col items-center">
                        <h2 class="text-2xl font-medium text-gray-900">Profile Information</h2>

                        <p class="mt-1 text-lg text-gray-600">
                            Update your account's profile information and email address.
                        </p>
                    </div>

                    <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
                        <div>
                            <InputLabel for="name" value="Name" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="name"
                            />

                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div>
                            <InputLabel for="email" value="Email" />

                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                                autocomplete="username"
                            />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div>
                            <InputLabel for="username" value="Username" />

                            <TextInput
                                id="username"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.username"
                                required
                                autocomplete="username"
                            />

                            <InputError class="mt-2" :message="form.errors.username" />
                        </div>

                        <div>
                            <InputLabel for="location" value="Location" />

                            <TextInput
                                id="location"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.location"
                                required
                                autocomplete="location"
                            />

                            <InputError class="mt-2" :message="form.errors.location" />
                        </div>

                        <div>
                            <InputLabel for="website" value="Website" />

                            <TextInput
                                id="website"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.website"
                                required

                            />

                            <InputError class="mt-2" :message="form.errors.website" />
                        </div>

                        <div>
                            <InputLabel for="job" value="Job" />

                            <TextInput
                                id="job"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.job"
                                required
                           />

                            <InputError class="mt-2" :message="form.errors.job" />
                        </div>

                        <div v-if="mustVerifyEmail && user.email_verified_at === null">
                            <p class="text-sm mt-2 text-gray-800">
                                Your email address is unverified.
                                <Link
                                    :href="route('verification.send')"
                                    method="post"
                                    as="button"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Click here to re-send the verification email.
                                </Link>
                            </p>

                            <div
                                v-show="status === 'verification-link-sent'"
                                class="mt-2 font-medium text-sm text-green-600"
                            >
                                A new verification link has been sent to your email address.
                            </div>
                        </div>

                        <div class="flex items-center gap-4 justify-between">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                            <div class="cursor-pointer bg-[#0062ff] px-4 py-2 rounded-lg text-white" @click="useGeneral.isEditProfileOverlay=true">Update Profile Pictures</div>
                            <Transition
                                enter-active-class="transition ease-in-out"
                                enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out"
                                leave-to-class="opacity-0"
                            >
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>

                    </form>

                </section>

            </div>

        </div>
    </main-nav-layout>
</template>
