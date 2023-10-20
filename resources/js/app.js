import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

// Import SweetAlert and Axios
import Swal from 'sweetalert2';
window.Swal = Swal;
import axios from 'axios';
window.axios = axios;

Alpine.plugin(focus);

Alpine.start();




