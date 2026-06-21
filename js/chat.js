const form = document.querySelector(".typing-area")
inputField = form.querySelector(".input-field")
sendBtn = form.querySelector("button")
chatBox = document.querySelector(".chat-box")

form.onsubmit = (e) => {
    e.preventDefault();
}

sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true)
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";
                scrollToBottom();
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true)
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!inputField.matches(":focus")){
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData();
    formData.append("incoming_id", form.querySelector("input[name='incoming_Id']").value)
    formData.append("outgoing_id", form.querySelector("input[name='outgoing_id']").value)
    xhr.send(formData);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}
