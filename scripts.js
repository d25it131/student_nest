
document.addEventListener('DOMContentLoaded', ()=> {
  
  document.querySelectorAll('form[data-ajax="true"]').forEach(form=>{
    form.addEventListener('submit', e=>{
      e.preventDefault();
      fetch(form.action, {method: form.method, body: new FormData(form)})
        .then(r=>r.text())
        .then(txt=>{
          alert(txt || 'Submitted');
          if(form.dataset.resetOnSuccess==='true') form.reset();
        })
        .catch(err=>alert('Error: '+err));
    });
  });
});
