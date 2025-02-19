@section('content')
    <div class="container p-4 mx-auto">
        <h3 class="mb-4 text-lg font-bold">Danh sách sản phẩm</h3>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Tên sản phẩm</th>
                    <th class="px-4 py-2 border">Giá</th>
                    <th class="px-4 py-2 border">Hình ảnh</th>
                </tr>
            </thead>
            <tbody id="product-table">
                <!-- Dữ liệu sẽ được render bằng JS -->
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch("http://127.0.0.1:8000/api/products")
                .then(response => response.json()) // Chuyển đổi dữ liệu JSON thành đối tượng JavaScript
                .then(products => {
                    console.log(products); // In ra dữ liệu trả về để kiểm tra
                    let tableBody = document.getElementById("product-table");
                    tableBody.innerHTML = ""; // Xóa bất kỳ dòng nào trước khi render lại

                    // Duyệt qua từng sản phẩm và tạo row cho bảng
                    products.forEach(product => {
                        let row = `
                            <tr>
                                <td class="px-4 py-2 border">${product.id}</td>
                                <td class="px-4 py-2 border">${product.name}</td>
                                <td class="px-4 py-2 border">${parseInt(product.price).toLocaleString()} VND</td>
                                <td class="px-4 py-2 border">
                                    <img src="${product.image}" alt="${product.name}" class="object-cover w-16 h-16">
                                </td>
                            </tr>
                        `;
                        tableBody.innerHTML += row; // Thêm row vào bảng
                    });
                })
                .catch(error => console.error("Lỗi lấy dữ liệu:", error));
        });

    </script>
@endsection