<script setup>
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import { Head as Head, useForm, usePage } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    campaign: Object,
    title: {
        type: String,
        default: "Sanction Campaign"
    },
    code: String,
    splash: String
});

const form = useForm({
    agree: true,
});
const submit = () => {
    form.post(route('sanction-campaign.store', {mobile: '09171234567', email: 'jane@doe.com'}), {
        onFinish: () => form.reset(),
    });
};

</script>

<template>
    <Head :title="usePage().props.title" />
    <AuthenticationCard>
        <h4 class="text-2xl font-bold dark:text-white">Header</h4>
        <div class="py-1 text-xs text-indigo-600 dark:text-indigo-300">Label</div>
        {{ campaign }}
        <form @submit.prevent="submit">
            <template v-if="splash?.length">
                <div class="flex justify-center">
                    <img :src="splash" class="h-auto max-w-full rounded-lg" alt="Landing" />
                </div>
            </template>
            <div class="flex items-center justify-between mt-4">
                <SecondaryButton @click="form.agree=false; submit();">
                    Cancel
                </SecondaryButton>
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Continue
                </PrimaryButton>
            </div>
        </form>

    </AuthenticationCard>
</template>

<style scoped>

</style>
