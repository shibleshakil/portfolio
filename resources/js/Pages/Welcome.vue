<script setup>
import About from '@/Components/Frontend/About.vue';
import Hero from '@/Components/Frontend/Hero.vue';
import Promote from '@/Components/Frontend/Promote.vue';
import Frontend from '@/Layouts/Frontend.vue';
import { Head, Link } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Welcome To Protfolio" />

    <Frontend>
        <!-- Hero primary -->
        <Hero />
        <!-- Promote tail-100 -->
         <Promote />
        <!-- About secondary -->
         <About />
        <!-- Skills tail-100 -->
        <!-- Protfolio primary -->
        <!-- Service secondary -->
        <!-- Contact primary -->

    </Frontend>

</template>

