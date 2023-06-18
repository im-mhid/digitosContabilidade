document.querySelectorAll('.deleteButton').forEach(function (button) {
  button.addEventListener('click', function () {
    let id = this.getAttribute('data-id')
    console.log(id)
    if (confirm('Deseja realmente excluir este registro?')) {
      window.location.href = 'excluir_tipoDocumento.php?id=' + id
    }
  })
})
