<!-- resources/js/components/SuccessMessage.vue -->
<template>
    <div v-if="visible" class="fixed top-4 left-1/2 transform -translate-x-1/2 max-w-md w-full bg-green-100 text-green-800 border border-green-300 rounded p-4 z-50">
        {{ message }}
    </div>
</template>

<script>
export default {
    props: {
        message: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            visible: true,
        };
    },
    mounted() {
        setTimeout(() => {
            this.visible = false; // Hide after 2 seconds
        }, 2000);
    },
};
</script>
