const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
form.addEventListener ('submit', e => {
e.preventDetault();

const hasConfirmed = confirm(`Sei proprio sicuro di voler eliminare questo post?`);
if (hasConfirmed) form.submit();
});
})
