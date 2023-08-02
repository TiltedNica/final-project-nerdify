<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="">
            <div class="text-center text-[#171725] font-bold text-[18px]">Login to your account</div>
            <div>

                <TextInput
                    id="email"
                    type="email"
                    class="mt-5 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Your Email"

                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    placeholder="Your Password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>
            <PrimaryButton class="w-full bg-[#0062FF] mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Log in
            </PrimaryButton>
            <div class="text-center text-[#92929D] text-sm uppercase mt-3.5">Or</div>
            <a class="rounded-xl border-2 w-full mt-2.5 flex justify-center gap-x-2.5 py-2.5 text-[#696974] text-sm font-semibold" href="/google-auth/redirect">
                <img src="/img/Google.svg" alt="">
                Continue with Google
            </a>
            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4 gap-x-[5px]">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="text-[#0062FF] font-semibold"
                >
                    Cant' login?
                </Link>
                <img src="/img/Oval.svg" alt="">
                <Link href="/register" class="text-[#0062FF] font-semibold">Sign up for new user?</Link>
            </div>
        </form>
    </GuestLayout>
</template>
