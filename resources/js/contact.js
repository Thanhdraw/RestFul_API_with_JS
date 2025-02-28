import { sendContact } from "./api";

window.sendContact = () => {
    document
        .getElementById("contactForm")
        .addEventListener("submit", async function (e) {
            e.preventDefault(); // Ngăn reload trang
            console.log("ban da clicke sencontact");
            let name = document.getElementById("name").value;
            let email = document.getElementById("email").value;
            let phone = document.getElementById("phone").value;
            let subject = document.getElementById("subject").value;
            let message = document.getElementById("message").value;
            const data = { name, email, phone, subject, message };

            const response = await sendContact(data);
            let notice = document.getElementById("notice");
            try {
                if (response.success) {
                    notice.innerHTML =
                        "✅ Phản hồi của bạn đã được ghi lại, Cảm ơn Quý khách 💕!";
                    notice.classList.remove("hidden", "bg-red-500");
                    notice.classList.add("bg-green-500");
                    setTimeout(() => {
                        notice.classList.add("hidden");
                        window.location.reload();
                    }, 5000);
                } else {
                    notice.innerHTML = "❌ Oops , Gửi thất bại 🤔";
                    notice.classList.remove("hidden", "bg-green-500");
                    notice.classList.add("bg-red-500");
                }
            } catch (error) {
                console.error("Lỗi:", error);
                notice.innerHTML = "❌ Lỗi hệ thống, vui lòng thử lại!";
                notice.classList.remove("hidden", "bg-green-500");
                notice.classList.add("bg-red-500");
                setTimeout(() => {
                    notice.classList.add("hidden");
                    window.location.reload();
                }, 5000);
            }
        });
};
