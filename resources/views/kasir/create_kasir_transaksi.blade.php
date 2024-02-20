@extends('temp.kasirdas')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Nambah transasksinya lho ges</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('kasir.store_transaksi') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="nama_pembeli" class="col-sm-2 col-form-label">Nama Pembeli</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="id_produk" class="col-sm-2 col-form-label">Produk (Ctrl + klik untuk
                                        memilih lebih dari satu)</label>
                                    <div class="col-sm-10">
                                        <select name="id_produk[]" id="id_produk" class="form-control" multiple
                                            required>
                                            @foreach ($produk as $produkItem)
                                                <option value="{{ $produkItem->id_produk }}"
                                                    data-harga="{{ $produkItem->harga }}">
                                                    {{ $produkItem->nama_produk }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="detail_produk">
                                    <!-- Detail produk akan ditambahkan secara dinamis -->
                                </div>
                                <div class="form-group">
                                    <label for="total">Total Harga</label>
                                    <input type="text" name="total" id="total" class="form-control" readonly>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="javascript:history.back()" style="color: white"
                                        class="btn btn-warning">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .input-group-append {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
        }

        .produk-item {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .produk-item label {
            font-weight: bold;
        }

        .produk-item input {
            width: 100px;
        }
    </style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const produkSelect = document.getElementById('id_produk');
        const produkDetails = document.getElementById('detail_produk');
        const totalHargaInput = document.getElementById('total');

        produkSelect.addEventListener('change', function() {
            let selectedOptions = produkSelect.selectedOptions;
            produkDetails.innerHTML = ''; // Bersihkan detail produk sebelum menambahkan yang baru
            let totalHarga = 0;

            for (let option of selectedOptions) {
                let hargaAwal = parseFloat(option.getAttribute('data-harga'));

                let produkItem = document.createElement('div');
                produkItem.classList.add('produk-item');

                let label = document.createElement('label');
                label.innerHTML = option.text + ' - Harga: ' + hargaAwal.toFixed(2);

                let qtyInput = document.createElement('input');
                qtyInput.setAttribute('type', 'text');
                qtyInput.setAttribute('name', 'jumlah[]');
                qtyInput.setAttribute('class', 'form-control');
                qtyInput.setAttribute('placeholder', 'Jumlah Produk');

                let subTotalInput = document.createElement('input');
                subTotalInput.setAttribute('type', 'text');
                subTotalInput.setAttribute('name', 'subtotal[]');
                subTotalInput.setAttribute('class', 'form-control');
                subTotalInput.setAttribute('readonly', 'readonly');

                qtyInput.addEventListener('input', function() {
                    let jumlah = parseFloat(qtyInput.value);
                    let subTotal = hargaAwal * jumlah;
                    subTotalInput.value = subTotal.toFixed(2);

                    totalHarga = 0;
                    document.querySelectorAll('[name="subtotal[]"]').forEach(input => {
                        totalHarga += parseFloat(input.value);
                    });
                    totalHargaInput.value = totalHarga.toFixed(2);
                });

                let jumlahProdukLabel = document.createElement('label');
                jumlahProdukLabel.innerHTML = 'Jumlah Produk:';
                let subTotalLabel = document.createElement('label');
                subTotalLabel.innerHTML = 'Sub Total:';

                produkItem.appendChild(label);
                produkItem.appendChild(jumlahProdukLabel);
                produkItem.appendChild(qtyInput);
                produkItem.appendChild(subTotalLabel);
                produkItem.appendChild(subTotalInput);
                produkDetails.appendChild(produkItem);
            }
        });
    });
</script>

