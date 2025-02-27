import { sendContact } from "./api";

window.sendContact = () => {
    document.addEventListener("click", async function (e) {
        e.preventDefault();
        console.log("ban da clicke sencontact");
        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let phone = document.getElementById("phone").value;
        let subject = document.getElementById("subject").value;
        let message = document.getElementById("message").value;
        const data = { name, email, phone, subject, message };

        const response = await sendContact(data);
        return response.data;
    });
};
