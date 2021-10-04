let send = document.getElementById('btn');
send.addEventListener("click", () => {
    sendEmail();
});
function sendEmail(){
    console.log("send message");
    Email.send({
        Host : "smtp.yourisp.com",
        Username : "alaminr270@gmail.com",
        Password : "asdfghjkl007",
        To : 'hprony12@gmail.com',
        From : "alaminr270@gmail.com",
        Subject : "This is the subject",
        Body : "And this is the body"
    }).then(
      message => alert(message)
    );
}