@extends('layout.backend.app')
@section('content')
    <div class="clearfix"></div>

    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">INVOICE</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">NO-INVOICE</th>
                                    <th scope="col">NO MEJA</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">TYPE ORDER</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">RINGKASAN ORDER</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">ITEM</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">SUBTOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    {{-- TOTAL BOX --}}
                    <div
                        style="background: rgba(255, 255, 255, 0.257); padding:14px 18px; border-radius:10px; margin-top:14px;">
                        <div class="d-flex justify-content-between" style="font-size:16px; font-weight:600;">
                            <span>Total</span>
                            <span>133.000</span>
                        </div>
                    </div>

                    {{-- NOTE + OTHER COST --}}
                    <div class="row mt-3">

                        <div class="col-md-9">
                            <label style="color:white;">Note</label>
                            <input type="text" class="form-control"
                                style="background: rgba(255,255,255,0.25); border:none; color:white;"
                                value="Es buahnya extra kiwi sama nasigoreng extra sawi">
                        </div>

                        <div class="col-md-3">
                            <label style="color:white;">Other Cost</label>
                            <input type="text" class="form-control"
                                style="background: rgba(255,255,255,0.25); border:none; color:white;" value="3.000">
                        </div>

                    </div>
                    {{-- PAYMENT BOX --}}
                    <div class="card mt-4" style="background: rgba(0, 120, 160, 0.35); border-radius:14px; color:white;">
                        <div class="card-body">

                            {{-- TITLE PAYMENT --}}
                            <h3 class="card-title" style="color:white; font-size:22px; font-weight:700; margin-bottom:8px;">
                                Payment
                            </h3>

                            {{-- GARIS PEMBATAS --}}
                            <hr style="border-color: rgba(255,255,255,0.25); margin-top:0; margin-bottom:20px;">

                            <div class="row">

                                <div class="col-md-4">
                                    <label style="color:white;">Nominal Pembayaran</label>
                                    <input type="text" class="form-control"
                                        style="background: rgba(255,255,255,0.25); border:none; color:white;"
                                        value="136.000">
                                </div>

                                <div class="col-md-4">
                                    <label style="color:white;">Amount Tendered</label>
                                    <input type="text" class="form-control"
                                        style="background: rgba(255,255,255,0.25); border:none; color:white;"
                                        value="150000">
                                </div>

                                <div class="col-md-4">
                                    <label style="color:white;">Paymethod</label>
                                    <input type="text" class="form-control"
                                        style="background: rgba(255,255,255,0.25); border:none; color:white;"
                                        value="Cash">
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-light btn-round px-5" style="margin-right:10px;">
                    BAYAR
                </button>

                <button type="button" class="btn btn-light btn-round px-5">
                    Cancel
                </button>
            </div>


        </div>
    </div>
@endsection
