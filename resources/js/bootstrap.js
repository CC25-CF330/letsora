import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * --- TAMBAHKAN KODE DI BAWAH INI ---
 *
 * Kode ini akan mencari meta tag CSRF token yang biasanya ada di layout Blade
 * Laravel dan secara otomatis menambahkannya ke header setiap permintaan Axios.
 */

// 1. Ambil token dari meta tag di HTML Anda
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

// 2. Jika token ditemukan, set sebagai header default untuk Axios
if (csrfToken) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
