const searchBar = document.querySelector(".users .search input")
searchBtn = document.querySelector(".users .search button")
usersList = document.querySelector(".users-list")
outgoingId = document.querySelector(".users").getAttribute("data-id")

searchBtn.onclick = () => {
    searchBar.classList.toggle("active")
    searchBar.focus();
    searchBtn.classList.toggle("active")
}

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true)
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){
                    data = "";
                }
                usersList.innerHTML = data;
            }
        }
    }
    let formData = new FormData();
    formData.append("searchTerm", searchTerm)
    xhr.send(formData)
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/users.php", true)
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){
                    usersList.innerHTML = data;
                }
            }
        }
    }
    let formData = new FormData();
    formData.append("outgoing_id", outgoingId)
    xhr.send(formData)
}, 500);
