// import { data } from "alpinejs";
import {
    fetchProducts,
    deleteProduct,
    getProductDetail,
    updateProduct,
} from "./api.js";
import { loadProducts } from "./app.js";

export function renderProducts(products) {
    let productList = document.getElementById("product-list");
    productList.innerHTML = "";

    products.forEach((product) => {
        let li = document.createElement("li");
        li.className =
            "flex items-center justify-between p-4 bg-white rounded-lg shadow";

        li.innerHTML = `
            <div class="flex-1">
                <span class="text-lg font-semibold">${product.name}</span>
                <span class="text-blue-600 font-bold ml-2">${
                    product.price
                } VNĐ</span>
            </div>
            <div class="flex space-x-2">
                <button class="text-sm text-white bg-blue-500 px-2 py-1 rounded"
                    onclick="detailProduct('${product.id}')">Chi tiết</button>
                <button class="text-sm text-white bg-blue-500 px-2 py-1 rounded"
                    onclick='openEditModal(${JSON.stringify(
                        product
                    )})'>Sửa</button>

                <button class="text-sm text-white bg-red-500 px-2 py-1 rounded"
                    onclick="handleDeleteProduct('${product.id}')">Xoá</button>
            </div>
        `;

        productList.appendChild(li);
    });
}

export function renderPagination(data) {
    let pagination = document.getElementById("pagination");
    pagination.innerHTML = "";

    if (data.prev_page_url) {
        let prevButton = document.createElement("button");
        prevButton.innerText = "←";
        prevButton.className =
            "px-3 py-1 bg-gray-300 rounded hover:bg-gray-400";
        prevButton.onclick = () => loadProducts(data.current_page - 1);
        pagination.appendChild(prevButton);
    }

    for (let i = 1; i <= data.last_page; i++) {
        let pageButton = document.createElement("button");
        pageButton.innerText = i;
        pageButton.className = `px-3 py-1 mx-1 rounded ${
            i === data.current_page
                ? "bg-blue-500 text-white"
                : "bg-gray-300 hover:bg-gray-400"
        }`;
        pageButton.onclick = () => loadProducts(i);
        pagination.appendChild(pageButton);
    }

    if (data.next_page_url) {
        let nextButton = document.createElement("button");
        nextButton.innerText = "→";
        nextButton.className =
            "px-3 py-1 bg-gray-300 rounded hover:bg-gray-400";
        nextButton.onclick = () => loadProducts(data.current_page + 1);
        pagination.appendChild(nextButton);
    }
}

// Mở modal sản phẩm
window.openModal = (product) => {
    const modal = document.getElementById("productModal");
    modal.classList.remove("hidden");
    modal.classList.add("flex"); // Hiển thị modal

    // Gán dữ liệu sản phẩm vào modal
    document.getElementById("product_name").innerText = product.name;
    document.getElementById("id_product").innerText = "ID: " + product.id;
    document.getElementById("product_image").src = product.image;
    document.getElementById("product_price").innerText =
        "Giá: " + product.price + " VNĐ";
    document.getElementById("product_description").innerText =
        product.description;
};

// Đóng modal sản phẩm
window.closeModal = () => {
    const modal = document.getElementById("productModal");
    modal.classList.add("hidden");
};

// Mở modal chỉnh sửa
window.openEditModal = (product) => {
    if (!product) {
        console.error("Product data is missing!");
        return;
    }

    document.getElementById("edit_id").value = product.id || "";
    document.getElementById("edit_name").value = product.name || "";
    document.getElementById("edit_price").value = product.price || "";

    document.getElementById("edit_category").value = product.category_id || "";
    document.getElementById("edit_slug").value = product.slug || "";
    document.getElementById("edit_description").value =
        product.description || "";

    document.getElementById("editModal").classList.remove("hidden");
    document.getElementById("editModal").classList.add("flex");
};
// Đóng modal chỉnh sửa
document.addEventListener("DOMContentLoaded", function () {
    window.closeEditModal = () => {
        console.log("ban da dong chinh sua");

        const modal = document.getElementById("editModal");
        if (modal) modal.classList.add("hidden");
    };
});

// Cập nhật sản phẩm (Demo)
// Gọi API để cập nhật sản phẩm
window.updateProductUI = async function () {
    const id = document.getElementById("edit_id").value;
    const name = document.getElementById("edit_name").value;
    const price = document.getElementById("edit_price").value;
    const category_id = document.getElementById("edit_category").value;
    const slug = document.getElementById("edit_slug").value;
    const description = document.getElementById("edit_description").value;

    // Dữ liệu cần gửi
    const data = {
        name,
        price,
        category_id,
        slug,
        description,
    };

    console.log("Gửi yêu cầu cập nhật:", data);

    // Gọi API
    let success = await updateProduct(id, data);
    if (success) {
        alert("Cập nhật sản phẩm thành công!");
        closeEditModal();
        location.reload(); // Reload lại danh sách sản phẩm
    } else {
        alert("Cập nhật thất bại!");
    }
};

// ui.js
window.openCreateProductModal = () => {
    const modal = document.getElementById("createModal");
    modal.classList.remove("hidden");
    modal.classList.add("flex");

    // Xóa dữ liệu cũ khi mở modal
    document.getElementById("create_name").value = "";
    document.getElementById("create_price").value = "";
    document.getElementById("create_category").value = "";
    document.getElementById("create_slug").value = "";
    document.getElementById("create_description").value = "";
};

// Hàm xử lý tạo sản phẩm từ UI
window.createProductHandler = () => {
    const name = document.getElementById("create_name").value.trim();
    const price = document.getElementById("create_price").value.trim();
    const category_id = document.getElementById("create_category").value.trim();
    const slug = document.getElementById("create_slug").value.trim();
    const description = document
        .getElementById("create_description")
        .value.trim();

    console.log("🔍 Dữ liệu trước khi gửi:", {
        name,
        price,
        category_id,
        slug,
        description,
    });

    if (!name || !price || !category_id || !slug || !description) {
        alert("⚠️ Vui lòng nhập đầy đủ thông tin sản phẩm!");
        return;
    }

    const data = { name, price, category_id, slug, description };

    // Gửi đến app.js
    createProductUI(data);
};

// Đóng modal create
window.closeEditModal = () => {
    const modal = document.getElementById("createModal");
    modal.classList.add("hidden");
};
