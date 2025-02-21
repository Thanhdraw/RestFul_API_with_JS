import "./bootstrap";

import Alpine from "alpinejs";
import "./bootstrap";
import api from "./api";
import axios from "axios";
window.Alpine = Alpine;

Alpine.start();
// Import axios

// lay dc id

let currentPage = 1; // Trang hiện tại
async function fetchProducts(page = 1) {
    try {
        let response = await axios.get(
            `http://127.0.0.1:8000/api/products?page=${page}`
        );
        let data = response.data;

        // Kiểm tra API có trả về dữ liệu đúng không
        if (!data || !data.data || !Array.isArray(data.data)) {
            console.error("Dữ liệu API không đúng định dạng:", data);
            return;
        }

        console.log("Danh sách sản phẩm:", data.data); // Xem thử dữ liệu có đúng không

        let productList = document.getElementById("product-list");
        productList.innerHTML = "";

        data.data.forEach((product) => {
            let li = document.createElement("li");
            li.innerHTML = `
            <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg shadow-sm">
                <span class="text-lg font-semibold text-gray-700">${product.name}</span>
                <span class="text-blue-600 font-bold">${product.price} VNĐ</span>
            </div>
            <button type="button" onclick="detailProduct('${product.id}')">
                Detail Product
            </button>
        `;

            productList.appendChild(li);
        });
    } catch (error) {
        console.error("Lỗi khi gọi API:", error);
    }
}
window.detailProduct = async function (id) {
    console.log(`Sản phẩm ID: ${id}`);
    try {
        let response = await axios.get(
            `http://127.0.0.1:8000/api/products/${id}`
        );
        let data = response.data;
        console.log(data);
    } catch (error) {
        console.log("Erorr", error);
    }
};

// Load sản phẩm khi trang tải xong
document.addEventListener("DOMContentLoaded", () => fetchProducts(currentPage));
