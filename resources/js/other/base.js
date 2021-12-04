"use strict";

class Base
{
 disableButton()
 {
  if(document.body.contains(document.querySelector('#formLogin')))
  {
   const formLogin = document.querySelector('#formLogin');

   formLogin.addEventListener('submit', () => {
    document.querySelector("button[type='submit']").disabled = true;
   });
  }
 }

 logout()
 {
  const token = document.querySelector("meta[name='csrf-token']").getAttribute("content");
  const url = '/session';

  fetch(url, {
   method: 'PUT',
   headers: {
    "Content-Type": "application/json",
    "X-CSRF-Token": token
   }
  })
  .then((response) => {
   if(response.ok){
    return response.text();
   }
  })
  .catch((error) => {
   this.showSwal("#FFA500", "<p class='p-0 small'>Por favor revise su conexión a internet.</p>", "warning", "¡Atención!");
  })
  .then((data) => {
   if(data!='No logueado')
   {
    const minutes = 518400-20;
    const number = 60000*minutes;
    const token = document.querySelector("meta[name='csrf-token']").getAttribute("content");

    setTimeout(() => {
     this.showSwal("#FFA500", "<p class='p-0 small'>Su sesión ha caducado, por favor vuelva a loguearse.</p>", "warning", "¡Atención!");

     fetch(`/logout`, {
      method: 'PUT',
      headers: {
       "Content-Type": "application/json",
       "X-CSRF-Token": token
      }
     })
     .then((response) => {
      if(!response.ok){
       throw Error(response.status);
      }

      setTimeout(() => location.href = '/', 1500);
     });
    }, number);
   }
  });
 }

 selectDate()
 {
  if(document.body.contains(document.querySelector('#date_birthday')))
  {
   document.querySelectorAll('.readonly').forEach(item => {

    item.addEventListener('keydown', event => {
     event.preventDefault();
    })
   })

   new Tempus_Dominus.TempusDominus(document.querySelector('#date_birthday'), {
    display: { viewMode: 'clock' },
    localization: { locale: 'es' }
   });
  }
 }

 showSwal(confirmButtonColor, html, icon, title)
 {
  Swal.fire({
   backdrop: 'rgba(0, 0, 0, 0.95)',
   background: '#FFFFFF',
   confirmButtonColor: confirmButtonColor,
   customClass: "col-11 col-md-4",
   html: html,
   icon: icon,
   title: title
  })
 }

 showSwalConfirm(cancelButtonText, confirmButtonColor, confirmButtonText, html, icon, title)
 {
  let modal =  Swal.fire({
   cancelButtonText: cancelButtonText,
   confirmButtonColor: confirmButtonColor,
   confirmButtonText: confirmButtonText,
   customClass: "col-11 col-md-4",
   focusConfirm: false,
   html: html,
   icon: icon,
   showCancelButton: true,
   showCloseButton: true,
   title: title
  })

  return modal;
 }
}

window.onload = () => {
 let base = new Base();

 base.disableButton();
 base.logout();
 base.selectDate();
};
