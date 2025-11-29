@extends('layout.backend.app')
@section('content')
    <div class="clearfix"></div>

    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Table Kasir</h5>
                        <div class="d-flex align-items-center" style="gap:15px;">

                            <input type="text" id="searchInput" class="form-control" placeholder="Search..."
                                style="width:200px; border-radius:8px; font-size:14px;">



                            <select id="isPaidFilter" class="form-control"
                                style="width:180px; border-radius:8px; font-size:14px;">
                                <option value="all">Status Paid (All)</option>
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                            </select>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NOINVOICE</th>
                                    <th scope="col">NO MEJA</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">TIPE ORDERAN</th>
                                    <th scope="col">COST</th>
                                    <th scope="col">STATUS PAYMENT</th>
                                    <th scope="col">STATUS PAID</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->no_invoice }}</th>
                                        <td>{{ $order->table_no }}</td>
                                        <td>{{ $order->name }}</td>

                                        <td>
                                            <span class="badge-order">{{ $order->order_type }}</span>
                                        </td>

                                        <td>
                                            <span class="badge-payment">{{ $order->total_cost }}</span>
                                        </td>

                                        <td>
                                            <span class="badge-paid">{{ $order->status }}</span>
                                        </td>

                                        <td>
                                            <span class="badge-paid">{{ $order->is_paid }}</span>
                                        </td>

                                        <td>

                                            <!-- Detail -->
                                            <a href="/order/detail/{{ $order->id }}" class="btn-view">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <!-- Payment -->
                                            <a href="{{ route('order.payment', $order->id) }}" class="btn-payment">
                                                <i class="fa fa-credit-card"></i>
                                            </a>

                                            <!-- Delete — sudah diperbaiki -->
                                            <form action="{{ route('order.destroy', $order->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete"
                                                    onclick="return confirm('Yakin ingin menghapus order ini?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="paginationContainer"></div>

                    </div>

                </div>
            </div>
        </div>

        <div class="overlay toggle-menu"></div>
    </div>

    <style>
        .badge-order {
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: white;
            background: #28a745;
            display: inline-block;
        }

        .badge-payment {
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: white;
            background: #c82333;
            display: inline-block;
        }

        .badge-paid {
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: white;
            background: #28a745;
            display: inline-block;
        }

        .btn-view,
        .btn-payment,
        .btn-delete {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 45px;
            height: 28px;
            border-radius: 40px;
            color: white;
            margin-right: 5px;
            font-size: 17px;
            text-decoration: none;
            transition: 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-view {
            background: linear-gradient(to right, #1e3c72, #2a5298);
        }

        .btn-payment {
            background: linear-gradient(to right, #009ffd, #2a2a72);
        }

        .btn-delete {
            background: linear-gradient(to right, #8d2245, #a02a58);
        }

        .btn-view:hover {
            background: linear-gradient(to right, #182f5c, #24467f);
        }

        .btn-payment:hover {
            background: linear-gradient(to right, #0084d6, #1e1e5c);
        }

        .btn-delete:hover {
            background: linear-gradient(to right, #7c1c3c, #8d2245);
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const searchInput = document.getElementById("searchInput");
            const isPaidFilter = document.getElementById("isPaidFilter");

            const rows = Array.from(document.querySelectorAll("table.table tbody tr"));

            const rowsPerPage = 10;
            let currentPage = 1;
            let filteredRows = [...rows];

            // --- Pagination HTML ---
            const pagination = document.createElement("div");
            pagination.className = "d-flex justify-content-between align-items-center mt-3";

            pagination.innerHTML = `
            <small id="tableInfo" class="text-muted"></small>
            <div>
                <button id="prevBtn" class="btn btn-outline-secondary btn-sm">Prev</button>
                <span id="pageIndicator" class="mx-2 fw-bold">1</span>
                <button id="nextBtn" class="btn btn-outline-secondary btn-sm">Next</button>
            </div>
        `;

            document.getElementById("paginationContainer").appendChild(pagination);

            const tableInfo = pagination.querySelector("#tableInfo");
            const prevBtn = pagination.querySelector("#prevBtn");
            const nextBtn = pagination.querySelector("#nextBtn");
            const pageIndicator = pagination.querySelector("#pageIndicator");

            function renderTable() {
                const total = filteredRows.length;
                const totalPages = Math.ceil(total / rowsPerPage);
                currentPage = Math.max(1, Math.min(currentPage, totalPages));

                rows.forEach(r => r.style.display = "none");

                const start = (currentPage - 1) * rowsPerPage;
                const end = start + rowsPerPage;

                filteredRows.slice(start, end).forEach(r => r.style.display = "");

                tableInfo.textContent = total ?
                    `Menampilkan ${start + 1} - ${Math.min(end, total)} dari ${total} data` :
                    "Tidak ada data ditemukan";

                pageIndicator.textContent = `${total ? currentPage : 0}/${total ? totalPages : 0}`;

                prevBtn.disabled = currentPage === 1;
                nextBtn.disabled = currentPage === totalPages || total === 0;
            }

            prevBtn.addEventListener("click", () => {
                currentPage--;
                renderTable();
            });

            nextBtn.addEventListener("click", () => {
                currentPage++;
                renderTable();
            });

            // === SEARCH ===
            searchInput.addEventListener("keyup", function() {
                applyFilters();
            });

            // === FILTER STATUS PAID ===
            isPaidFilter.addEventListener("change", function() {
                applyFilters();
            });

            function applyFilters() {
                const keyword = searchInput.value.toLowerCase().trim();
                const isPaidVal = isPaidFilter.value;

                filteredRows = rows.filter(row => {
                    const text = row.innerText.toLowerCase();
                    const paidStatus = row.querySelector("td:nth-child(7)")?.innerText.trim().toLowerCase();

                    let match = text.includes(keyword);

                    if (isPaidVal !== "all" && paidStatus !== isPaidVal) {
                        match = false;
                    }

                    return match;
                });

                currentPage = 1;
                renderTable();
            }

            renderTable();

        });
    </script>
@endsection
