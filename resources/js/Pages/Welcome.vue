<script setup>
import About from '@/Components/Frontend/About.vue';
import Contact from '@/Components/Frontend/Contact.vue';
import Hero from '@/Components/Frontend/Hero.vue';
import Portfolio from '@/Components/Frontend/Portfolio.vue';
import Projects from '@/Components/Frontend/Projects.vue';
import Promote from '@/Components/Frontend/Promote.vue';
import Services from '@/Components/Frontend/Services.vue';
import Skills from '@/Components/Frontend/Skills.vue';
import Frontend from '@/Layouts/Frontend.vue';
import { Head, Link } from '@inertiajs/vue3';

    defineProps({
        skills: Object,
        projects: Object,
    });
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
         <Skills :skills="skills" />
        <!-- Protfolio primary -->
         <Portfolio :skills="skills" :projects="projects" />
        <!-- Service secondary -->
         <Services />
        <!-- Contact primary -->
         <Contact />

    </Frontend>

</template>

