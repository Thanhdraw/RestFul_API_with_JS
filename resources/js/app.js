import "./bootstrap";
import Alpine from "alpinejs";
import axios from "axios";

window.Alpine = Alpine;
Alpine.start();

let currentPage = 1; // Trang hiện tại

// Gọi API lấy danh sách sản phẩm
async function fetchProducts(page = 1) {
    try {
        let response = await axios.get(
            `http://127.0.0.1:8000/api/products?page=${page}`
        );
        let data = response.data;

        if (!data || !data.data || !Array.isArray(data.data)) {
            console.error("Dữ liệu API không đúng định dạng:", data);
            return;
        }

        console.log("Danh sách sản phẩm:", data.data);

        let productList = document.getElementById("product-list");
        productList.innerHTML = "";

        data.data.forEach((product) => {
            let li = document.createElement("li");
            li.className =
                "flex items-center justify-between p-4 space-x-2 bg-white rounded-lg shadow";

            li.innerHTML = `
                <div class="flex-1">
                    <span class="text-lg font-semibold text-gray-700">${product.name}</span>
                    <span class="text-blue-600 font-bold ml-2">${product.price} VNĐ</span>
                </div>
                <div class="flex space-x-2">
                    <button class="text-sm text-white bg-blue-500 px-2 py-1 rounded hover:bg-blue-600 transition"
                        onclick="detailProduct('${product.id}')">
                        Chi tiết
                    </button>
                   <button class="text-sm text-white bg-blue-500 px-2 py-1 rounded hover:bg-yellow-600 transition"
                        onclick="openEditModal('${product.id}', '${product.name}', '${product.price}', '${product.category_id}','${product.slug}','${product.description}')">
                        Sửa
                    </button>

                    <button class="text-sm text-white bg-red-500 px-2 py-1 rounded hover:bg-red-600 transition"
                        onclick="deleteProduct('${product.id}')">
                        Xoá
                    </button>
                </div>
            `;

            productList.appendChild(li);
        });

        // Cập nhật phân trang
        updatePagination(data);
    } catch (error) {
        console.error("Lỗi khi gọi API:", error);
    }
}

//phan trang
function updatePagination(data) {
    let pagination = document.getElementById("pagination");
    pagination.innerHTML = ""; // Xóa phân trang cũ

    // Nút "Trang trước"
    if (data.prev_page_url) {
        let prevButton = document.createElement("button");
        prevButton.innerText = "←";
        prevButton.className =
            "px-3 py-1 bg-gray-300 rounded hover:bg-gray-400";
        prevButton.onclick = () => fetchProducts(data.current_page - 1);
        pagination.appendChild(prevButton);
    }

    // Hiển thị số trang
    for (let i = 1; i <= data.last_page; i++) {
        let pageButton = document.createElement("button");
        pageButton.innerText = i;
        pageButton.className = `px-3 py-1 mx-1 rounded ${
            i === data.current_page
                ? "bg-blue-500 text-white"
                : "bg-gray-300 hover:bg-gray-400"
        }`;
        pageButton.onclick = () => fetchProducts(i);
        pagination.appendChild(pageButton);
    }

    // Nút "Trang sau"
    if (data.next_page_url) {
        let nextButton = document.createElement("button");
        nextButton.innerText = "→";
        nextButton.className =
            "px-3 py-1 bg-gray-300 rounded hover:bg-gray-400";
        nextButton.onclick = () => fetchProducts(data.current_page + 1);
        pagination.appendChild(nextButton);
    }
}

// Xem chi tiết sản phẩm
window.detailProduct = async function (id) {
    console.log(`Sản phẩm ID: ${id}`);
    try {
        let response = await axios.get(
            `http://127.0.0.1:8000/api/products/${id}`
        );
        let product = response.data;

        if (!product) {
            console.log("Sản phẩm không tồn tại");
            return;
        }

        // Gán dữ liệu vào modal
        document.getElementById("product_name").innerText = product.name;
        document.getElementById(
            "id_product"
        ).innerText = `ID sản phẩm: ${product.id}`;
        document.getElementById(
            "product_price"
        ).innerText = `Giá: ${product.price} VNĐ`;
        document.getElementById("product_description").innerText =
            product.description;
        document.getElementById("product_image").src = product.image;

        // Hiển thị modal với hiệu ứng
        let modal = document.getElementById("productModal");
        modal.classList.remove("hidden");
        modal.classList.add("opacity-100", "scale-100");
    } catch (error) {
        console.log("Error:", error);
    }
};

// Hàm sửa sản phẩm
window.editProduct = function (id) {
    console.log(`Chỉnh sửa sản phẩm ID: ${id}`);
    window.location.href = `/admin/products/edit/${id}`;
};

// Hàm xoá sản phẩm
window.deleteProduct = async function (id) {
    console.log(`Bạn muốn xóa sản phẩm có ID: ${id}`);

    if (confirm(`Bạn có chắc muốn xóa sản phẩm này (ID: ${id})?`)) {
        try {
            await axios.delete(`http://127.0.0.1:8000/api/products/${id}`);
            alert("Sản phẩm đã xóa thành công");
            fetchProducts(currentPage); // Cập nhật danh sách sau khi xóa
        } catch (error) {
            console.error("Lỗi khi xóa sản phẩm:", error);
        }
    }
};

// Đóng modal với hiệu ứng
window.closeModal = function () {
    let modal = document.getElementById("productModal");
    modal.classList.add("hidden");
    modal.classList.remove("opacity-100", "scale-100");
};

// update sản phẩm

window.openEditModal = function (
    id,
    name,
    price,
    category_id,
    slug,
    description
) {
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_name").value = name;
    document.getElementById("edit_price").value = price;
    document.getElementById("edit_category").value = category_id;
    document.getElementById("edit_slug").value = slug;
    document.getElementById("edit_description").value = description;

    document.getElementById("editModal").classList.remove("hidden");
};
window.closeEditModal = function () {
    document.getElementById("editModal").classList.add("hidden");
};

// gửi yeu cau cap nhat
window.updateProduct = async function () {
    let id = document.getElementById("edit_id")?.value;
    let name = document.getElementById("edit_name")?.value;
    let price = document.getElementById("edit_price")?.value;
    let description = document.getElementById("edit_description")?.value;
    let categoryElement = document.getElementById("edit_category");
    let slugElement = document.getElementById("edit_slug");

    if (!categoryElement || !slugElement) {
        console.error(
            "Lỗi: Không tìm thấy input edit_category hoặc edit_slug!"
        );
        alert("Lỗi: Không tìm thấy input edit_category hoặc edit_slug!");
        return;
    }

    let category_id = categoryElement.value;
    let slug = slugElement.value;

    try {
        let response = await axios.put(
            `http://127.0.0.1:8000/api/products/${id}`,
            {
                name: name,
                price: price,
                description: description,
                category_id: category_id,
                slug: slug,
            }
        );

        alert(response.data.message);
        closeEditModal();
        fetchProducts(currentPage);
    } catch (error) {
        console.error("Lỗi khi cập nhật sản phẩm:", error.response?.data);
        alert("Lỗi: " + (error.response?.data?.error || "Không xác định"));
    }
};

function closeEditModal() {
    document.getElementById("editModal").classList.add("hidden");
}

// Load sản phẩm khi trang tải xong
document.addEventListener("DOMContentLoaded", () => fetchProducts(currentPage));
