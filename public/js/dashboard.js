const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click",() => {
    toggleLocalStorage();
    toggleRootClass();
});

function toggleRootClass(){
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme',inverted);
}

function toggleLocalStorage(){
    if(isLight()){
        localStorage.removeItem("light");
    }else{
        localStorage.setItem("light","set");
    }
}

function isLight(){
    return localStorage.getItem("light");
}

if(isLight()){
    toggleRootClass();
}

// Preview Image
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('imagePreview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}

// modal delete user
document.addEventListener('DOMContentLoaded', function () {
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var username = button.getAttribute('data-username');
        var slug = button.getAttribute('data-slug');
        var modalTitle = deleteModal.querySelector('.modal-title');
        var modalBody = deleteModal.querySelector('.modal-body #deleteUserName');
        var confirmDeleteButton = deleteModal.querySelector('#confirmDeleteButton');

        modalTitle.textContent = 'Konfirmasi Hapus ' + username;
        modalBody.textContent = username;
        confirmDeleteButton.href = '/user-destroy/' + slug;
    });
});

//// modal delete room
document.addEventListener('DOMContentLoaded', function () {
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var room_name = button.getAttribute('data-room_name');
        var slug = button.getAttribute('data-slug');
        var modalTitle = deleteModal.querySelector('.modal-title');
        var modalBody = deleteModal.querySelector('.modal-body #deleteUserName');
        var confirmDeleteButton = deleteModal.querySelector('#confirmDeleteButton');

        modalTitle.textContent = 'Konfirmasi Hapus ' + room_name;
        modalBody.textContent = room_name;
        confirmDeleteButton.href = '/room-destroy/' + slug;
    });
});
