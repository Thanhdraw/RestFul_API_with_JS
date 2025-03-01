import axios from "axios";

const API_BASE_URL = "http://127.0.0.1:8000/api/products";
const API_BASE_CONTACT = "http://127.0.0.1:8000/api";
axios.defaults.withCredentials = true;

export async function login(email, password) {
    await fetchCSRFToken();
    const response = await axios.post("http://127.0.0.1:8000/api/login", {
        email,
        password,
    });

    const token = response.data.token;
    localStorage.setItem("token", token);

    // Cập nhật headers mặc định cho tất cả request
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
    console.log(axios.defaults.headers.common["Authorization"]);
}

// Trước khi gửi request API, gọi `sanctum/csrf-cookie`
export async function fetchCSRFToken() {
    await axios.get("http://127.0.0.1:8000/sanctum/csrf-cookie");
}

// Config Users
// api.js
export async function getUser() {
    try {
        let response = await axios.get(`${API_BASE_CONTACT}/users`);
        console.log(response.data);

        return response.data;
    } catch (error) {
        console.log("lỗi : ", error);
    }
}

export async function fetchProducts(page = 1) {
    try {
        const token = localStorage.getItem("token");

        let response = await axios.get(`${API_BASE_URL}?page=${page}`, {
            headers: { Authorization: `Bearer ${token}` },
        });
        console.log(response.data);

        return response.data;
    } catch (error) {
        console.log("lỗi : ", error);
    }
}
export async function getProductDetail(id) {
    try {
        let response = await axios.get(`${API_BASE_URL}/${id}`);
        return response.data;
    } catch (error) {
        console.error("Lỗi khi lấy thông tin sản phẩm:", error);
        return null;
    }
}

export async function deleteProduct(id) {
    try {
        await axios.delete(`${API_BASE_URL}/${id}`);
        return true;
    } catch (error) {
        console.error("Lỗi khi xóa sản phẩm:", error);
        return false;
    }
}

//api.js
export async function updateProduct(id, data) {
    try {
        let response = await axios.put(`${API_BASE_URL}/${id}`, data);
        return response.data;
    } catch (error) {
        console.error(
            "Lỗi khi cập nhật sản phẩm:",
            error.response?.data || error.message
        );
        return null;
    }
}

// tim kiem san pham
// api.j
export async function searchProducts(text) {
    try {
        let response = await axios.get(`${API_BASE_URL}/search?q=${text}`);

        if (!response.data || !Array.isArray(response.data.products)) {
            console.warn(
                "API không trả về danh sách sản phẩm hợp lệ",
                response.data
            );
            return [];
        }

        console.log("Dữ liệu hợp lệ:", response.data.products);
        return response.data.products;
    } catch (error) {
        console.error(
            "Lỗi khi tìm kiếm sản phẩm:",
            error.response?.data || error.message
        );
        return [];
    }
}

// api.js
export async function createProduct(data) {
    try {
        if (!data.image) {
            data.image = "default.jpg"; // Thêm giá trị mặc định
        }
        let response = await axios.post(`${API_BASE_URL}`, data);
        return response.data;
    } catch (error) {
        console.error(
            "❌ Lỗi khi tạo sản phẩm:",
            error.response?.data || error.message
        );
        return null;
    }
}
export async function sendContact(data) {
    try {
        let response = await axios.post(`${API_BASE_CONTACT}/contacts`, data);
        console.log(response);
        return response.data;
    } catch (error) {
        console.error(
            "❌ Lỗi khi gửi phản hồi:",
            error.response?.data || error.message
        );
        return null;
    }
}
