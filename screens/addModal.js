const openAddModalButton = document.getElementById('openAddModal')
const openViewModalButton = document.getElementById('openViewModal')
const openEditModalButton = document.getElementById('openEditModal')
const closeAddModalButton = document.getElementById('closeAddModal')
const closeViewModalButton = document.getElementById('closeViewModal')
const closeEditModalButton = document.getElementById('closeEditModal')
const addModal = document.getElementById('addModal')
const viewModal = document.getElementById('viewModal')
const editModal = document.getElementById('editModal')

openAddModalButton.addEventListener('click', function () {
  addModal.style.display = 'block'
})

openViewModalButton.addEventListener('click', function () {
  viewModal.style.display = 'block'
})

openEditModalButton.addEventListener('click', function () {
  editModal.style.display = 'block'
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