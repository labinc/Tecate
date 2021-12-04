window._ = require('lodash');

try
{
 window.$ = window.jQuery = require('jquery');
 window.Popper = require('@popperjs/core/dist/umd/popper.js');
 window.Bootstrap = require('bootstrap');
 window.Bootstrap_Select = require('bootstrap-select');
 window.Tempus_Dominus = require('@eonasdan/tempus-dominus/dist/js/tempus-dominus.js');
 window.Toastedjs = require('toastedjs');
 window.Swal = require('sweetalert2');
 window.Base = require('./other/base');
}
catch(e){}

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if(token){
 window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}
else{
 console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
