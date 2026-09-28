<script setup>
import { ref, onMounted } from 'vue'

const daftarTugas = ref([])

onMounted(async () => {
  try {
    const apiUrl = import.meta.env.VITE_API_URL
    const response = await fetch(`${apiUrl}/tugas`)
    daftarTugas.value = await response.json()
  } catch (error) {
    console.error('Gagal mengambil data API:', error)
  }
})
</script>

<template>
  <div>
    <h1>Daftar Tugas dari Laravel</h1>
    <ul>
      <li v-for="item in daftarTugas" :key="item.id">
        {{ item.judul }} - <strong>{{ item.status }}</strong>
      </li>
    </ul>
  </div>
</template>
