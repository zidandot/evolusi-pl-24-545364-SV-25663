<template>
    <div class="app-shell">
        <header class="topbar">
            <RouterLink class="brand" to="/" aria-label="Ruang Tugas, beranda">
                <span class="brand-mark">r.</span>
                <span>ruang<span class="brand-light">tugas</span></span>
            </RouterLink>

            <nav class="main-nav" aria-label="Navigasi utama">
                <RouterLink to="/" exact-active-class="is-active"
                    >Beranda</RouterLink
                >
                <RouterLink to="/tugas" active-class="is-active"
                    >Daftar tugas</RouterLink
                >
            </nav>

            <span class="topbar-note"
                ><span class="status-dot"></span> Ruang kerjamu</span
            >
        </header>

        <main class="page-content">
            <RouterView />
        </main>

        <footer class="site-footer">
            <span>ruangtugas <span class="footer-dot">/</span> 2026</span>
            <span>Pelan-pelan, yang penting selesai.</span>
        </footer>
    </div>
</template>

<style>
:root {
    font-family: "Trebuchet MS", "Segoe UI", sans-serif;
    color: #183b35;
    background: #f4f7f2;
    font-synthesis: none;
    text-rendering: optimizeLegibility;
    --ink: #183b35;
    --muted: #6d817a;
    --green: #1e5548;
    --green-dark: #123e35;
    --mint: #dcece3;
    --paper: #fffefa;
    --line: #dce5dd;
    --coral: #e67b5c;
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-width: 320px;
    min-height: 100vh;
    background-color: #f4f7f2;
    background-image: radial-gradient(#d8e2d9 0.7px, transparent 0.7px);
    background-size: 18px 18px;
}

.app-shell {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.topbar {
    width: min(1120px, calc(100% - 48px));
    min-height: 82px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #d9e2d9;
}

.brand {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: var(--ink);
    font-size: 17px;
    font-weight: 800;
    letter-spacing: 0;
    text-decoration: none;
}

.brand-mark {
    width: 34px;
    height: 34px;
    display: grid;
    place-items: center;
    background: var(--green);
    color: white;
    border-radius: 8px 8px 8px 2px;
    font-family: Georgia, serif;
    font-size: 21px;
    font-weight: 400;
}

.brand-light {
    color: #789087;
    font-weight: 400;
}

.main-nav {
    display: flex;
    align-items: center;
    gap: 6px;
}

.main-nav a {
    padding: 10px 14px;
    color: #61766e;
    border-radius: 5px;
    font-size: 13px;
    text-decoration: none;
    transition:
        background-color 160ms ease,
        color 160ms ease;
}

.main-nav a:hover,
.main-nav a.is-active {
    background: #e4eee7;
    color: var(--green-dark);
}

.topbar-note {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--muted);
    font-size: 12px;
}

.status-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #76a987;
    box-shadow: 0 0 0 3px #e3eee5;
}

.page-content {
    width: min(1120px, calc(100% - 48px));
    flex: 1;
    margin: 0 auto;
    padding: 48px 0 64px;
}

.site-footer {
    width: min(1120px, calc(100% - 48px));
    min-height: 64px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid #d9e2d9;
    color: #85958d;
    font-size: 11px;
}

.footer-dot {
    padding: 0 5px;
    color: var(--coral);
}

@media (max-width: 640px) {
    .topbar,
    .page-content,
    .site-footer {
        width: min(100% - 32px, 520px);
    }

    .topbar {
        min-height: 72px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .topbar-note {
        display: none;
    }

    .main-nav {
        gap: 0;
    }

    .main-nav a {
        padding: 9px 10px;
        font-size: 12px;
    }

    .page-content {
        padding: 32px 0 48px;
    }

    .site-footer {
        gap: 12px;
        font-size: 10px;
    }
}
</style>
