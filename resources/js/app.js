import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
// Import axios

import "./bootstrap";
import api from "./api";

document.addEventListener("DOMContentLoaded", function () {
    let productList = document.getElementById("product-list");

    api.get("/products")
        .then((response) => {
            if (response.data.status === "success") {
                let products = response.data.data;

                products.forEach((product) => {
                    let li = document.createElement("li");
                    li.innerHTML = `
                        <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg shadow-sm">
                            <span class="text-lg font-semibold text-gray-700">${product.name}</span>
                            <span class="text-blue-600 font-bold">${product.price} VNĐ</span>
                        </div>
                    `;
                    productList.appendChild(li);
                });
            }
        })
        .catch((error) => console.error("Lỗi:", error));
});
