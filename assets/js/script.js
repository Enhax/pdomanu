// DELETE ARTICLE

var openModalBtn = document.getElementById('openModalBtn');
var modalContainer = document.getElementById('modalContainer');
var closeBtn = document.getElementById('closeBtn');
var modalText = document.getElementById('modalText');
var modal = document.getElementById('modal');

openModalBtn.addEventListener("click", () => {
    modalContainer.style.display = "flex"
})

closeBtn.addEventListener("click", () => {
    modalContainer.style.display = "none"
})

modalContainer.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        modalContainer.style.display = "none"
    }
})


// DELETE COMMENTS

var openModalBtns = document.querySelectorAll('.openModalBtns');
var modalContainers = document.querySelectorAll('.modalContainers');
var modalContainer2 = document.querySelectorAll('.modalContainers');
var closeBtns = document.querySelectorAll('.closeBtns');
var modalText2 = document.querySelector('.modalText2');
var modal2 = document.querySelectorAll('.modal2');


modalContainers.forEach(function (modalContainer2) {
    modalContainer2.addEventListener("click", (e) => {
        if (e.target != modal2 && e.target != modalText2) {
            modalContainer2.style.display = "none";
        }
    })
});

openModalBtns.forEach(function (openModalBtn2) {
    openModalBtn2.addEventListener("click", () => {
        modalContainer2.style.display = "flex";
    })
});


closeBtns.forEach(function (closeBtn2) {
    closeBtn2.addEventListener("click", () => {
        modalContainer2.style.display = "none";
    })
});


