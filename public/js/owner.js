window.addEventListener('load', function(){
  let form = document.forms.namedItem('new_owner');
  let cancel = document.querySelector('.reset');

  function resetForm(){
    let messages = document.querySelectorAll('p.fail, p.success');
    let labels = document.querySelectorAll('label');
    messages.forEach(function(message) {
      message.remove();
    })
    labels.forEach(function(label) {
      label.textContent = 'Parcourir';
    })
    form.reset();
  }
  cancel.addEventListener('click', resetForm)
})
