const openAddModalButton = document.getElementById('openAddModal')
const openViewModalButtons = document.getElementsByClassName('openViewModal')
const openEditModalButtons = document.getElementsByClassName('openEditModal')
const closeAddModalButton = document.getElementById('closeAddModal')
const closeViewModalButton = document.getElementById('closeViewModal')
const closeEditModalButton = document.getElementById('closeEditModal')
const addModal = document.getElementById('addModal')
const viewModal = document.getElementById('viewModal')
const editModal = document.getElementById('editModal')

openAddModalButton.addEventListener('click', function () {
  addModal.style.display = 'block'
})

Array.from(openViewModalButtons).forEach(function (button) {
  button.addEventListener('click', function () {
    let id = this.getAttribute('data-id')
    console.log(id)

    fetch('obter_tipoDocumento.php?id=' + id)
      .then(response => response.json())
      .then(data => {
        document.getElementById('tipoDocVisualizar').value = data.tipo_doc
        document.getElementById('tempoArmazenamentoVisualizar').value =
          data.temp_arquivamento
        viewModal.style.display = 'block'
      })
      .catch(error => {
        alert(
          'Erro ao obter os dados do registro. Por favor, tente novamente mais tarde.\n\nDetalhes do erro: ' +
            error
        )
      })
  })
})

Array.from(openEditModalButtons).forEach(function (button) {
  button.addEventListener('click', function () {
    let id = this.getAttribute('data-id')
    console.log(id)

    fetch('obter_tipoDocumento.php?id=' + id)
      .then(response => response.json())
      .then(data => {
        document.getElementById('codTipoDocEditar').value = data.cod_tipo_doc
        document.getElementById('tipoDocEditar').value = data.tipo_doc
        document.getElementById('tempoArmazenamentoEditar').value =
          data.temp_arquivamento
        editModal.style.display = 'block'
      })
      .catch(error => {
        alert(
          'Erro ao obter os dados do registro. Por favor, tente novamente mais tarde.\n\nDetalhes do erro: ' +
            error
        )
      })
  })
})

closeAddModalButton.addEventListener('click', function () {
  addModal.style.display = 'none'
})

closeViewModalButton.addEventListener('click', function () {
  viewModal.style.display = 'none'
})

closeEditModalButton.addEventListener('click', function () {
  editModal.style.display = 'none'
})

window.addEventListener('click', function (event) {
  if (event.target === addModal) {
    addModal.style.display = 'none'
  } else if (event.target === viewModal) {
    viewModal.style.display = 'none'
  } else if (event.target === editModal) {
    editModal.style.display = 'none'
  }
})