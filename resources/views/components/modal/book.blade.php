<style>
    .modal-dialog .modal-content {
        border-radius: 20px;
    }

    .form-control,
    .form-select {
        border: 1px solid #F4926B;
        font-size: 20px;
        border-radius: 15px;
    }

    .btn.btn-brown {
        padding: 10px 50px;
    }

</style>

<div class="modal fade" id="book" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="booking text-center px-4">
                    <img src="./assets/images/LOGO LUMBS CUT.png" alt="" width="150px">
                    <h3 class="fw-bold">BOOKING</h3>
                    <form class="text-start">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nama</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label fw-bold">Lokasi</label>
                            <input type="location" class="form-control" id="location" aria-describedby="location" required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label fw-bold">Waktu</label>
                            <input type="time" class="form-control" id="time" aria-describedby="time" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-brown">BOOK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
