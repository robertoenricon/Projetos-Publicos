<template>
    <SabespDashboard 
        :initial-date="initialDate"
        :api-url="apiUrl"
    />
</template>

<script setup>
import SabespDashboard from './components/SabespDashboard.vue'

const el = document.getElementById('app')

const initialDate = el.dataset.initialDate
const apiUrl = el.dataset.apiUrl
</script>