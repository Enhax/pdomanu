// DELETE

var openModalBtn = document.getElementsByClassName('openModalBtn');
var modalContainer = document.getElementById('modalContainer');
var closeBtn = document.getElementById('closeBtn');
var modalText = document.getElementById('modalText');
var modal = document.getElementById('modal');
let deleteInput = document.getElementById('deleteInput');
let elementToDelete = document.getElementById('elementToDelete');



for (let omb of openModalBtn) {
    omb.addEventListener("click", () => {
        let deleteAttribute = omb.getAttribute('delete');
        let deleteElement = deleteAttribute.substring(0, 7)
        let deleteId = deleteAttribute.substring(8, deleteAttribute.length)
        deleteInput.setAttribute('name', 'delete' + deleteElement)
        deleteInput.value = deleteId;
        if (deleteElement == 'article') {
            elementToDelete.textContent = 'l\'article'
        } else if (deleteElement == 'comment') {
            elementToDelete.textContent = 'le commentaire'
        }
        modalContainer.style.display = "flex"
    })
}
closeBtn.addEventListener("click", () => {
    modalContainer.style.display = "none"
})

modalContainer.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        modalContainer.style.display = "none"
    }
})


