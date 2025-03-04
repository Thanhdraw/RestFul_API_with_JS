import {
    fetchProducts,
    deleteProduct,
    getProductDetail,
    createProduct,
} from "./api.js";
import { renderProducts, renderPagination } from "./ui.js";

let currentPage = 1;

export async function loadProducts(page = 1) {
    let data = await fetchProducts(page);
    if (data) {
        renderProducts(data.data);
        renderPagination(data);
        currentPage = page;
    }
}

window.handleDeleteProduct = async function (id) {
    if (confirm("Bạn có chắc muốn xóa sản phẩm này?")) {
        let success = await deleteProduct(id);
        if (success) {
            alert("Sản phẩm đã xóa thành công");
            loadProducts(currentPage);
        }
    }
};

window.detailProduct = async function (id) {
    let product = await getProductDetail(id);
    if (product) {
        document.getElementById("product_name").innerText = product.name;
        document.getElementById(
            "product_price"
        ).innerText = `Giá: ${product.price} VNĐ`;
        document.getElementById("product_image").src = product.image;
        document.getElementById("product_description").innerText =
            product.description;
        document.getElementById("productModal").classList.remove("hidden");
    }
};

// window.openEditModal = async function (id) {
//     let product = await getProductDetail(id);

//     if (product) {
//         document.getElementById("product_name").innerText = product.name;
//         document.getElementById(
//             "product_price"
//         ).innerText = `Giá: ${product.price} VNĐ`;
//         document.getElementById("product_description").innerText =
//             product.description;
//         document.getElementById("productModal").classList.remove("hidden");
//     }
// };

// create product
window.createProductUI = async function (data) {
    let product = await createProduct(data);
    console.log(product);

    if (product) {
        alert("🎉 Tạo sản phẩm thành công!");
        closeCreateModal(); // Đóng modal sau khi tạo thành công
        location.reload(); // Refresh danh sách sản phẩm
    } else {
        alert("❌ Tạo sản phẩm thất bại! Kiểm tra lại dữ liệu.");
    }
};

// Hàm đóng modal
window.closeCreateModal = () => {
    const modal = document.getElementById("createModal");
    modal.classList.add("hidden");
};

document.addEventListener("DOMContentLoaded", () => loadProducts(currentPage));
