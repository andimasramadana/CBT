@extends('layouts.app')

@section('title', 'Home - Rayon Cibedug 1')

@section('content')

<!-- HERO -->

<section class="hero">

    <div class="container hero-content">

        <div>

            <h1>

                Rayon

                <span>Cibedug 1.</span>

            </h1>

            <p class="hero-description">

                Ruang informasi dan dokumentasi
                Rayon Cibedug 1 SMK Wikrama Bogor.
                Temukan profil siswa, galeri kegiatan,
                serta jadwal piket rayon.

            </p>

            <div class="hero-buttons">

                <a href="{{ route('students') }}"
                   class="btn btn-primary">

                    <i class="fa-solid fa-users"></i>

                    Lihat Profil Murid

                </a>

                <a href="{{ route('gallery') }}"
                   class="btn btn-secondary">

                    <i class="fa-solid fa-images"></i>

                    Lihat Galeri

                </a>

            </div>

        </div>


        <div class="hero-3d-visual" aria-label="Visual teknologi digital Rayon Cibedug 1">
            <div class="hero-3d-visual__glow"></div>
            <div class="hero-3d-visual__orb hero-3d-visual__orb--one"></div>
            <div class="hero-3d-visual__orb hero-3d-visual__orb--two"></div>

            <div class="hero-device hero-device--laptop-main">
                <div class="hero-device__screen">
                    <div class="hero-device__topbar"><span></span><span></span><span></span><b>cibedug-1 • informasi rayon</b></div>
                    <div class="hero-device__rayon-site">
                        <div class="hero-device__site-nav"><strong>Rayon Cibedug 1</strong><span>Profil</span><span>Kegiatan</span><span>Galeri</span></div>
                        <div class="hero-device__site-feature">
                            <div class="hero-device__site-photo"><i class="fa-solid fa-people-group"></i></div>
                            <div><small>KEGIATAN TERBARU</small><strong>Belajar, berkarya, dan bertumbuh bersama</strong><p>Jelajahi cerita siswa Rayon Cibedug 1.</p></div>
                        </div>
                        <div class="hero-device__site-links"><span><i class="fa-solid fa-user-group"></i><b>Profil Murid</b></span><span><i class="fa-solid fa-camera-retro"></i><b>Galeri kegiatan</b></span><span><i class="fa-solid fa-calendar-check"></i><b>Jadwal piket</b></span></div>
                        <div class="hero-device__site-news"><i class="fa-solid fa-bullhorn"></i><span>Agenda dan pengumuman terbaru rayon</span></div>
                    </div>
                </div>
                <div class="hero-device__laptop-hinge"></div>
                <div class="hero-device__laptop-deck"><span></span></div>
            </div>

            <div class="hero-device hero-device--laptop">
                <div class="hero-device__laptop-screen">
                    <div class="hero-device__laptop-line"></div>
                    <div class="hero-device__laptop-card"></div>
                    <div class="hero-device__laptop-card short"></div>
                </div>
                <div class="hero-device__keyboard"></div>
            </div>

            <div class="hero-device hero-device--phone">
                <div class="hero-device__phone-notch"></div>
                <strong>Agenda</strong>
                <small>Kegiatan siswa</small>
                <b>Expo Karya</b>
                <div class="hero-device__phone-line"></div>
                <div class="hero-device__phone-line short"></div>
                <span class="hero-device__phone-dot"></span>
            </div>

            <div class="hero-ui-card hero-ui-card--activity"><i class="fa-solid fa-book-open"></i><span><b>Cerita rayon</b><small>Ruang berbagi siswa</small></span></div>
            <div class="hero-ui-card hero-ui-card--album"><i class="fa-solid fa-images"></i><span><b>Album kegiatan</b><small>Kenangan rayon</small></span></div>
            <div class="hero-prop hero-prop--book"><span>CATATAN</span><b>Ide &amp;<br>cerita siswa</b></div>
            <div class="hero-prop hero-prop--notebook"><i></i><i></i><i></i></div>
            <div class="hero-prop hero-prop--pencil"></div>
            <div class="hero-prop hero-prop--camera"><i class="fa-solid fa-camera"></i></div>
            <div class="hero-prop hero-prop--school-card"><small>SMK WIKRAMA</small><strong>Rayon<br>Cibedug 1</strong><i class="fa-solid fa-graduation-cap"></i></div>
        </div>

    </div>

</section>


<!-- INFORMASI -->

<section class="section home-explore">

    <div class="container">

        <div class="section-header">

            <div class="section-label">
                Jelajahi Website
            </div>

            <h2 class="section-title">
                Semua informasi Rayon
            </h2>

            <p class="section-description">

                Temukan berbagai informasi mengenai
                Rayon Cibedug 1 melalui beberapa
                halaman yang tersedia.

            </p>

        </div>


        <div class="cards">

            <!-- GALERI -->

            <a href="{{ route('gallery') }}"
               class="card">

                <div class="card-icon">

                    <i class="fa-solid fa-images"></i>

                </div>

                <h3>
                    Galeri
                </h3>

                <p>

                    Lihat dokumentasi kegiatan
                    dan momen bersama Rayon
                    Cibedug 1.

                </p>

            </a>


            <!-- SISWA -->

            <a href="{{ route('students') }}"
               class="card">

                <div class="card-icon">

                    <i class="fa-solid fa-user-graduate"></i>

                </div>

                <h3>
                    Profil Murid
                </h3>

                <p>

                    Kenali siswa-siswi yang
                    menjadi bagian dari
                    Rayon Cibedug 1.

                </p>

            </a>


        </div>

    </div>

</section>


<section class="mentor-section">
    <div class="container mentor-section__inner">
        <div class="mentor-section__portrait-wrap">
            <div class="mentor-section__glow"></div>
            <img
                class="mentor-section__portrait"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTHlC5D3dpZnosXcNZeO3wZbbPM1vnk69qzXl_UJlxoA&s=10"
                alt="Bapak Dede Hermansyah S pembimbing Rayon Cibedug 1">
        </div>

        <div class="mentor-section__content">
            <span class="mentor-section__eyebrow"><i class="fa-solid fa-chalkboard-user"></i> Pembimbing Rayon Dan, Guru Di SMK Wikrama Bogor</span>
            <h2>Bapak Dede Hermansyah, S.Si</h2>
            <p>
                Pembimbing Rayon Cibedug 1 yang mendampingi siswa dalam kegiatan,
                pengembangan diri, dan perjalanan belajar di SMK Wikrama Bogor.
            </p>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // ── Auth state dari server (Blade) ──────────────────────────────────────
    const IS_LOGGED_IN = {{ auth()->check() ? 'true' : 'false' }};
    const USER_ID      = IS_LOGGED_IN ? '{{ auth()->id() }}' : null;

    // Storage key per user — kunci berbeda per user agar data tidak tercampur
    const STORAGE_KEY  = IS_LOGGED_IN
        ? `cibedug_todo_user_${USER_ID}_v1`
        : null; // Guest tidak ada storage

    const defaultTasks = [
        { id: '1', title: 'Piket kebersihan rayon pagi', priority: 'penting', completed: true },
        { id: '2', title: 'Persiapan materi koding Laravel & Web', priority: 'urgent', completed: false },
        { id: '3', title: 'Kumpul pembimbingan rayon dengan Bp. Dede', priority: 'biasa', completed: false }
    ];

    // Jika belum login: hentikan di sini (card sudah di-blur via CSS)
    if (!IS_LOGGED_IN) {
        return;
    }

    // Load tasks milik user ini — kalau belum pernah login, pakai default
    let tasks = JSON.parse(localStorage.getItem(STORAGE_KEY)) || defaultTasks;
    let currentFilter = 'all';

    const todoForm         = document.getElementById('todoForm');
    const todoInput        = document.getElementById('todoInput');
    const todoPriority     = document.getElementById('todoPriority');
    const todoList         = document.getElementById('todoList');
    const todoEmpty        = document.getElementById('todoEmpty');
    const todoProgressText = document.getElementById('todoProgressText');
    const todoProgressFill = document.getElementById('todoProgressFill');
    const todoClearCompleted = document.getElementById('todoClearCompleted');
    const countAll         = document.getElementById('countAll');
    const countActive      = document.getElementById('countActive');
    const countCompleted   = document.getElementById('countCompleted');
    const filterBtns       = document.querySelectorAll('.todo-filter-btn');

    function saveTasks() {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(tasks));
    }

    function escapeHtml(str) {
        return str.replace(/[&<>'"]/g,
            tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[tag] || tag)
        );
    }

    function render() {
        const total     = tasks.length;
        const completed = tasks.filter(t => t.completed).length;
        const active    = total - completed;
        const percent   = total > 0 ? Math.round((completed / total) * 100) : 0;

        countAll.textContent         = total;
        countActive.textContent      = active;
        countCompleted.textContent   = completed;
        todoProgressText.textContent = `${completed} dari ${total} selesai (${percent}%)`;
        todoProgressFill.style.width = `${percent}%`;

        let filteredTasks = tasks;
        if (currentFilter === 'active') {
            filteredTasks = tasks.filter(t => !t.completed);
        } else if (currentFilter === 'completed') {
            filteredTasks = tasks.filter(t => t.completed);
        }

        todoList.innerHTML = '';
        if (filteredTasks.length === 0) {
            todoEmpty.hidden = false;
        } else {
            todoEmpty.hidden = true;
            filteredTasks.forEach(task => {
                const li = document.createElement('li');
                li.className = `todo-item ${task.completed ? 'completed' : ''}`;
                li.dataset.id = task.id;

                const priorityBadge = {
                    biasa:   '<span class="todo-badge todo-badge--biasa">Biasa</span>',
                    penting: '<span class="todo-badge todo-badge--penting">Penting</span>',
                    urgent:  '<span class="todo-badge todo-badge--urgent">Urgent</span>'
                }[task.priority] || '';

                li.innerHTML = `
                    <label class="todo-checkbox-label">
                        <input type="checkbox" class="todo-checkbox" ${task.completed ? 'checked' : ''}>
                        <span class="todo-custom-checkbox"><i class="fa-solid fa-check"></i></span>
                        <span class="todo-title">${escapeHtml(task.title)}</span>
                    </label>
                    <div class="todo-item-actions">
                        ${priorityBadge}
                        <button type="button" class="todo-delete-btn" aria-label="Hapus tugas">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                `;

                const checkbox = li.querySelector('.todo-checkbox');
                checkbox.addEventListener('change', () => toggleTask(task.id));

                const deleteBtn = li.querySelector('.todo-delete-btn');
                deleteBtn.addEventListener('click', () => deleteTask(task.id));

                todoList.appendChild(li);
            });
        }
        saveTasks();
    }

    function addTask(title, priority) {
        const newTask = {
            id: Date.now().toString(),
            title: title.trim(),
            priority: priority,
            completed: false
        };
        tasks.unshift(newTask);
        render();
    }

    function toggleTask(id) {
        tasks = tasks.map(t => t.id === id ? { ...t, completed: !t.completed } : t);
        render();
    }

    function deleteTask(id) {
        tasks = tasks.filter(t => t.id !== id);
        render();
    }

    todoForm?.addEventListener('submit', (e) => {
        e.preventDefault();
        const title = todoInput.value;
        const priority = todoPriority.value;
        if (title.trim()) {
            addTask(title, priority);
            todoInput.value = '';
        }
    });

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentFilter = btn.dataset.filter;
            render();
        });
    });

    todoClearCompleted?.addEventListener('click', () => {
        tasks = tasks.filter(t => !t.completed);
        render();
    });

    render();
});
</script>

@endsection
