<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div class="text-center text-[#171725] font-bold text-[18px]">Sign Up to your account</div>
            <div>

                <TextInput
                    id="name"
                    type="text"
                    class="mt-[30px] block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Your name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>

                <TextInput
                    id="username"
                    type="text"
                    class="mt-[15px] block w-full"
                    v-model="form.username"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Your username"
                />
                <InputError class="mt-2" :message="form.errors.username" />
            </div>

            <div class="mt-4">

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="email"
                    placeholder="Your email"
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
                    autocomplete="new-password"
                    placeholder="Create Password"

                />
                <i></i>

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm Password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>
            <p class="text-center text-[#92929D] text-[12px] leading-5 mt-11">
                By signing up, you confirm that you’ve read
                and accepted our User Notice and Privacy Policy.
            </p>

            <div class="flex flex-col items-center justify-end mt-4">
                <PrimaryButton class="ml-4 w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
                <div class="text-center text-[#92929D] text-sm uppercase mt-3.5">Or</div>
                <a class="rounded-xl border-2 w-full mt-2.5 flex justify-center gap-x-2.5 py-2.5 text-[#696974] text-sm font-semibold" href="/google-auth/redirect">
                    <img src="/img/Google.svg" alt="">
                    Continue with Google
                </a>
                <Link
                    :href="route('login')"
                    class="text-[#0062FF] text-sm mt-9"
                >
                    Already have an Square account? Log in
                </Link>


            </div>
        </form>
    </GuestLayout>
</template>
