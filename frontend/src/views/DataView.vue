<script setup lang="ts">
import { ref, onMounted } from "vue";

type Tugas = {
    id: number;
    nama_tugas: string;
};

const dataTugas = ref<Tugas[]>([]);
const error = ref("");
const loading = ref(true);

onMounted(async () => {
    try {
        const apiUrl = import.meta.env.VITE_API_URL.replace(/\/$/, "");
        const response = await fetch(`${apiUrl}/tugas`);
        if (!response.ok) throw new Error(`HTTP ${response.status}`);
        dataTugas.value = await response.json();
    } catch {
        error.value =
            "Data tugas gagal dimuat. Periksa koneksi ke server Laravel.";
    } finally {
        loading.value = false;
    }
});
</script>

<template>
    <section class="tasks-view">
        <div class="tasks-heading">
            <div>
                <p class="eyebrow"><span></span> RUANG KERJA / CATATAN</p>
                <h1>Daftar tugas<span>.</span></h1>
                <p class="tasks-subtitle">
                    Semua yang perlu kamu bereskan, terkumpul di sini.
                </p>
            </div>
            <div class="task-count" aria-label="Jumlah tugas">
                <span>{{ dataTugas.length.toString().padStart(2, "0") }}</span>
                <small>{{ dataTugas.length === 1 ? "TUGAS" : "TUGAS" }}</small>
            </div>
        </div>

        <div class="list-header">
            <span>DAFTAR</span>
            <span>STATUS</span>
        </div>

        <div v-if="loading" class="state-panel" aria-live="polite">
            <span class="loading-mark"></span>
            <p>Sedang memuat daftar...</p>
        </div>
        <div v-else-if="error" class="state-panel error-panel" role="alert">
            <span class="state-number">!</span>
            <p>{{ error }}</p>
        </div>
        <div v-else-if="dataTugas.length === 0" class="state-panel empty-panel">
            <span class="state-number">—</span>
            <div>
                <h2>Masih ada ruang kosong.</h2>
                <p>Belum ada tugas untuk ditampilkan.</p>
            </div>
        </div>
        <ol v-else class="task-list">
            <li
                v-for="(item, index) in dataTugas"
                :key="item.id"
                class="task-row"
            >
                <span class="task-index">{{
                    (index + 1).toString().padStart(2, "0")
                }}</span>
                <span class="task-name">{{ item.nama_tugas }}</span>
                <span class="task-status"><span></span> Tercatat</span>
            </li>
        </ol>

        <div class="list-footer">
            <span>RUANG TUGAS</span>
            <span>Ambil satu, selesaikan satu.</span>
        </div>
    </section>
</template>

<style scoped>
.tasks-view {
    max-width: 850px;
    margin: 0 auto;
    animation: list-enter 420ms ease both;
}

.tasks-heading {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 24px;
    padding: 12px 0 37px;
}

.eyebrow {
    display: flex;
    align-items: center;
    gap: 9px;
    margin: 0 0 18px;
    color: #7c8e85;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1.4px;
}

.eyebrow span {
    width: 18px;
    height: 1px;
    background: var(--coral);
}

h1 {
    margin: 0;
    color: var(--green-dark);
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(38px, 6vw, 55px);
    font-weight: 400;
    letter-spacing: 0;
    line-height: 1.1;
}

h1 span {
    color: var(--coral);
}

.tasks-subtitle {
    margin: 12px 0 0;
    color: #75877e;
    font-size: 13px;
    line-height: 1.6;
}

.task-count {
    min-width: 84px;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    padding-bottom: 5px;
}

.task-count span {
    color: #668879;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 38px;
    line-height: 1;
}

.task-count small {
    margin-top: 5px;
    color: #8a9b92;
    font-size: 8px;
    font-weight: 700;
    letter-spacing: 1.3px;
}

.list-header {
    min-height: 42px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 18px;
    background: var(--green);
    color: #d5e4dc;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1.3px;
}

.task-list {
    margin: 0;
    padding: 0;
    background: var(--paper);
    list-style: none;
}

.task-row {
    min-height: 74px;
    display: grid;
    grid-template-columns: 60px 1fr 110px;
    align-items: center;
    gap: 14px;
    padding: 10px 18px;
    border-bottom: 1px solid #e6ebe5;
    transition: background-color 150ms ease;
}

.task-row:hover {
    background: #f8fbf7;
}

.task-index {
    color: #a2b2a8;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 16px;
}

.task-name {
    overflow-wrap: anywhere;
    color: var(--ink);
    font-size: 14px;
    line-height: 1.5;
}

.task-status {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: #75877e;
    font-size: 10px;
}

.task-status span {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #83aa8b;
}

.state-panel {
    min-height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    padding: 24px;
    background: var(--paper);
    color: #778a80;
    font-size: 13px;
    text-align: center;
}

.state-panel p {
    margin: 0;
    line-height: 1.6;
}

.loading-mark {
    width: 18px;
    height: 18px;
    border: 2px solid #dce8dd;
    border-top-color: var(--green);
    border-radius: 50%;
    animation: spin 800ms linear infinite;
}

.empty-panel {
    justify-content: flex-start;
    text-align: left;
}

.state-number {
    width: 42px;
    height: 42px;
    flex: 0 0 auto;
    display: grid;
    place-items: center;
    border: 1px solid #d8e4da;
    border-radius: 50%;
    color: #719182;
    font-family: Georgia, serif;
    font-size: 19px;
}

.empty-panel h2 {
    margin: 0 0 5px;
    color: var(--green-dark);
    font-family: Georgia, "Times New Roman", serif;
    font-size: 18px;
    font-weight: 400;
}

.error-panel .state-number {
    border-color: #eed7ce;
    color: #c56e55;
}

.list-footer {
    display: flex;
    justify-content: space-between;
    gap: 12px;
    padding: 14px 2px;
    color: #8a9b92;
    font-size: 9px;
    letter-spacing: 0.7px;
}

.list-footer span:first-child {
    font-weight: 700;
    letter-spacing: 1.2px;
}

@keyframes list-enter {
    from {
        opacity: 0;
        transform: translateY(8px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

@media (max-width: 560px) {
    .tasks-heading {
        align-items: flex-start;
        padding-top: 6px;
        padding-bottom: 26px;
    }

    .task-count {
        min-width: 56px;
        padding-top: 30px;
    }

    .task-count span {
        font-size: 30px;
    }

    .task-row {
        min-height: 68px;
        grid-template-columns: 34px 1fr;
        gap: 8px;
        padding: 10px 13px;
    }

    .task-status {
        grid-column: 2;
        margin-top: -7px;
        font-size: 9px;
    }

    .list-header {
        padding: 0 13px;
    }

    .list-footer {
        font-size: 8px;
    }
}
</style>
