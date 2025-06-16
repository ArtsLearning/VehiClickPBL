@extends('layouts.app')

@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Pengguna') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        body, html {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: #111827; /* Warna latar belakang gelap */
        }

        .profile-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            padding: 7rem 3rem; /* Padding untuk menghindari tumpang tindih */
            max-width: 1200px; /* Lebar maksimum konten */
            margin: auto; /* Centering konten */
        }

        .profile-card {
            background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
            border-radius: 15px;
            padding: 2rem;
            width: 100%;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            position: relative;
            margin-bottom: 2rem; /* Jarak antar kartu */

            /* Perubahan utama untuk membuat 2 kolom */
            display: flex;
            flex-wrap: wrap; /* Izinkan wrap pada layar kecil */
            gap: 2rem; /* Jarak antar kolom */
        }

        .profile-left-column {
            flex: 0 0 250px; /* Lebar tetap untuk kolom kiri */
            display: flex;
            flex-direction: column;
            align-items: center; /* Pusatkan item di kolom kiri */
            gap: 1.5rem; /* Jarak antar elemen di kolom kiri */
            padding-right: 2rem; /* Ruang di kanan kolom kiri */
            border-right: 1px solid rgba(255, 255, 255, 0.1); /* Garis pemisah vertikal */
        }

        .profile-right-column {
            flex: 1; /* Ambil sisa ruang yang tersedia */
            min-width: 300px; /* Pastikan kolom kanan tidak terlalu sempit */
        }

        .profile-photo-container {
            position: relative;
            display: inline-block;
            border-radius: 50%;
            border: 3px solid #ff6b35;
            box-shadow: 0 0 10px rgba(255, 107, 53, 0.5);
            width: 150px;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #333;
            z-index: 1; /* Memberikan konteks stacking baru */
        }

        .profile-photo-container img { /* Sesuaikan selector img */
            width: 100%; /* Gambar mengisi wadah lingkaran */
            height: 100%; /* Gambar mengisi wadah lingkaran */
            border-radius: 50%; /* Memastikan gambar tetap lingkaran */
            object-fit: cover;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none; /* Hapus border yang tumpang tindih */
            box-shadow: none; /* Hapus shadow yang tumpang tindih */
        }

        .profile-photo-container img:hover { /* Sesuaikan selector img */
            transform: scale(1.05);
            /* Tambahkan z-index pada shadow hover */
            box-shadow: 0 0 15px rgba(255, 107, 53, 0.7);
            z-index: 2; /* Pastikan di atas container tapi di bawah overlay */
        }

        .photo-edit-overlay {
            position: absolute;
            bottom: 10px; /* Sedikit ke atas dari bawah */
            right: 10px; /* Sedikit ke kiri dari kanan */
            width: 35px;
            height: 35px;
            background: #ff6b35;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
            border: 3px solid #1a1a1a;
            z-index: 10;
        }

        .photo-edit-overlay:hover {
            background: #f7931e;
            transform: scale(1.1);
        }

        .photo-edit-overlay i {
            color: white;
            font-size: 14px;
        }

        .profile-photo-info {
            text-align: center;
            color: #aaa;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .profile-photo-info p {
            margin: 0.3rem 0;
        }

        /* Styling untuk grup tombol di kolom kiri */
        .profile-actions {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            width: 100%; /* Agar tombol selebar kolom */
            align-items: center; /* Pusatkan tombol */
            margin-top: 2rem; /* Jarak dari info foto */
        }

        .action-button {
            background: #333;
            color: #eee;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 80%; /* Lebar tombol agar tidak terlalu lebar */
            max-width: 200px;
        }

        .action-button:hover {
            background: #ff6b35;
            color: white;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        .action-button i {
            margin-right: 10px;
        }

        .profile-section-title {
            color: #ff6b35;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .profile-data-group {
            margin-bottom: 1.5rem;
        }

        .profile-data-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.7rem 0;
            border-bottom: 1px dotted rgba(255, 255, 255, 0.05);
        }

        .profile-data-row:last-child {
            border-bottom: none;
        }

        .profile-data-label {
            color: #eee;
            flex-basis: 35%;
            margin-right: 1rem;
            font-weight: 500;
        }

        .profile-data-value {
            flex-basis: 65%;
            color: #ccc;
            display: flex;
            align-items: center;
            /* Hapus justify-content: space-between; jika link ubah ingin mepet ke kanan teks */
            /* Kita akan mengelola posisi link Ubah secara independen */
        }

        .profile-data-value .data-text {
            flex-grow: 1; /* Ambil ruang sebanyak mungkin */
            margin-right: 1rem; /* Jarak antara teks dan link/tombol */
        }

        /* Styling baru untuk change-link */
        .change-link {
            background-color: #ff6b35; /* Warna latar belakang */
            color: white; /* Warna teks */
            text-decoration: none;
            padding: 6px 12px; /* Padding untuk ukuran tombol */
            border-radius: 6px; /* Sudut tombol */
            font-weight: 500;
            font-size: 0.9rem; /* Ukuran font sedikit lebih kecil */
            transition: all 0.3s ease;
            white-space: nowrap; /* Pastikan link tidak pecah baris */
            min-width: 80px; /* Lebar minimum agar konsisten */
            text-align: center; /* Pusatkan teks */
        }

        .change-link:hover {
            background-color: #f7931e; /* Warna saat hover */
            transform: translateY(-2px); /* Efek sedikit naik */
            box-shadow: 0 4px 10px rgba(255, 107, 53, 0.4); /* Shadow saat hover */
        }

        /* Hapus styling verified-status karena sudah dihapus */
        /*
        .verified-status {
            background-color: #28a745;
            color: white;
            padding: 3px 8px;
            border-radius: 5px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-left: 10px;
        }
        */

        .back-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: #ff6b35;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            z-index: 1000;
        }

        .back-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 35px rgba(255, 107, 53, 0.5);
        }

        /* Modal Styles (tetap sama) */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
            margin: 10% auto;
            padding: 2rem;
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            position: relative;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-header h3 {
            color: #ff6b35;
            margin: 0;
            font-size: 1.5rem;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close:hover {
            color: #ff6b35;
        }

        .photo-upload-area {
            border: 2px dashed #ff6b35;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .photo-upload-area:hover {
            background-color: rgba(255, 107, 53, 0.1);
        }

        .photo-upload-area.dragover {
            background-color: rgba(255, 107, 53, 0.2);
            border-color: #f7931e;
        }

        .photo-upload-area i {
            font-size: 3rem;
            color: #ff6b35;
            margin-bottom: 1rem;
        }

        .photo-upload-area p {
            color: #ccc;
            margin: 0.5rem 0;
        }

        .file-input {
            display: none;
        }

        .upload-btn {
            background: #ff6b35;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0.5rem;
        }

        .upload-btn:hover {
            background: #f7931e;
        }

        .photo-preview {
            max-width: 100%;
            max-height: 300px;
            border-radius: 10px;
            margin-top: 1rem;
            display: none;
        }

        @media (max-width: 768px) {
            .profile-card {
                flex-direction: column;
                gap: 2rem;
                padding: 1.5rem;
            }

            .profile-left-column {
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                padding-bottom: 1.5rem;
                padding-right: 0;
                flex: 0 0 auto;
                width: 100%;
            }

            .profile-right-column {
                min-width: unset;
                width: 100%;
            }

            .profile-data-row {
                flex-direction: column;
                align-items: flex-start;
                padding: 0.5rem 0;
            }

            .profile-data-label {
                flex-basis: auto;
                margin-bottom: 0.3rem;
                margin-right: 0;
            }

            .profile-data-value {
                flex-basis: auto;
                width: 100%;
                flex-direction: column; /* Stack nilai dan link Ubah */
                align-items: flex-start;
            }

            .profile-data-value .data-text {
                margin-bottom: 0.3rem;
            }

            .change-link {
                margin-left: 0;
                margin-top: 0.5rem;
                width: 100%; /* Agar link Ubah mengambil lebar penuh di mobile */
                text-align: left;
            }

            /* Hapus media query untuk verified-status */
            /*
            .verified-status {
                margin-left: 0;
                margin-top: 0.5rem;
            }
            */

            .action-button {
                width: 100%;
            }

            .modal-content {
                width: 95%;
                margin: 5% auto;
            }
        }
    </style>

    <div class="min-h-screen bg-gray-900 text-white">
        <div class="profile-container">
            <div class="profile-card">
                {{-- Kolom Kiri: Foto Profil dan Tombol Aksi --}}
                <div class="profile-left-column">
                    <div class="profile-photo-container">
                        <img id="profileImage" src="https://via.placeholder.com/120" alt="Profile Picture">
                        <div class="photo-edit-overlay" onclick="openPhotoModal()" title="Edit Foto Profil">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>
                    <div class="profile-photo-info">
                        <p>Besar file: maksimum 10.000.000 bytes (10 Megabytes).</p>
                        <p>Ekstensi file yang diperbolehkan: JPG, JPEG, PNG</p>
                    </div>

                    <button class="action-button" onclick="openPhotoModal()">
                        Pilih Foto
                    </button>

                    <div class="profile-actions">
                        <button class="action-button">
                            <i class="fas fa-key"></i> Buat Kata Sandi
                        </button>
                        {{-- Tombol PIN Tokopedia dan Verifikasi Instan telah dihapus sesuai permintaan --}}
                    </div>
                </div>

                {{-- Kolom Kanan: Data Diri dan Kontak --}}
                <div class="profile-right-column">
                    <div class="profile-data-group">
                        <h3 class="profile-section-title">{{ __('Ubah Biodata Diri') }}</h3>
                        <div class="profile-data-row">
                            <span class="profile-data-label">Nama</span>
                            <div class="profile-data-value">
                                <span class="data-text">User505146</span>
                                <a href="#" class="change-link">Ubah</a>
                            </div>
                        </div>
                        <div class="profile-data-row">
                            <span class="profile-data-label">Tanggal Lahir</span>
                            <div class="profile-data-value">
                                <span class="data-text"></span>
                                <a href="#" class="change-link">Tambah Tanggal Lahir</a>
                            </div>
                        </div>
                        <div class="profile-data-row">
                            <span class="profile-data-label">Jenis Kelamin</span>
                            <div class="profile-data-value">
                                <span class="data-text"></span>
                                <a href="#" class="change-link">Tambah Jenis Kelamin</a>
                            </div>
                        </div>
                    </div>

                    <div class="profile-data-group">
                        <h3 class="profile-section-title">{{ __('Ubah Kontak') }}</h3>
                        <div class="profile-data-row">
                            <span class="profile-data-label">Email</span>
                            <div class="profile-data-value">
                                <span class="data-text">fbblaster2000@gmail.com</span>
                                {{-- Label "Terverifikasi" telah dihapus --}}
                                <a href="#" class="change-link">Ubah</a>
                            </div>
                        </div>
                        <div class="profile-data-row">
                            <span class="profile-data-label">Nomor HP</span>
                            <div class="profile-data-value">
                                <span class="data-text"></span>
                                <a href="#" class="change-link">Tambah Nomor HP</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- End profile-card --}}
        </div> {{-- End profile-container --}}

        <button class="back-btn" onclick="window.history.back()" title="Kembali">
            <i class="fas fa-arrow-left"></i>
        </button>
    </div>

    <div id="photoModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Foto Profil</h3>
                <span class="close" onclick="closePhotoModal()">&times;</span>
            </div>
            <div class="photo-upload-area" onclick="triggerFileInput()" id="uploadArea">
                <i class="fas fa-cloud-upload-alt"></i>
                <p><strong>Klik untuk memilih foto</strong></p>
                <p>atau seret dan lepaskan file di sini</p>
                <p class="text-sm text-gray-400">Format: JPG, PNG, GIF (Max: 5MB)</p>
            </div>
            <input type="file" id="fileInput" class="file-input" accept="image/*" onchange="handleFileSelect(event)">
            <img id="photoPreview" class="photo-preview" alt="Preview">
            <div style="text-align: center; margin-top: 1rem;">
                <button class="upload-btn" onclick="savePhoto()" id="saveBtn" style="display: none;">
                    <i class="fas fa-save"></i> Simpan Foto
                </button>
                <button class="upload-btn" onclick="closePhotoModal()" style="background: #6b7280;">
                    <i class="fas fa-times"></i> Batal
                </button>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900">
        @include('components.footer')
    </footer>

    <script>
        let selectedFile = null;

        function openPhotoModal() {
            document.getElementById('photoModal').style.display = 'block';
        }

        function closePhotoModal() {
            document.getElementById('photoModal').style.display = 'none';
            resetPhotoModal();
        }

        function resetPhotoModal() {
            document.getElementById('photoPreview').style.display = 'none';
            document.getElementById('saveBtn').style.display = 'none';
            document.getElementById('fileInput').value = '';
            selectedFile = null;
        }

        function triggerFileInput() {
            document.getElementById('fileInput').click();
        }

        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                validateAndPreviewFile(file);
            }
        }

        function validateAndPreviewFile(file) {
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                alert('Format file tidak didukung. Gunakan JPG, PNG, atau GIF.');
                return;
            }

            const maxSize = 10 * 1024 * 1024; // 10MB in bytes
            if (file.size > maxSize) {
                alert('Ukuran file terlalu besar. Maksimal 10MB.');
                return;
            }

            selectedFile = file;

            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('photoPreview');
                preview.src = e.target.result;
                preview.style.display = 'block';
                document.getElementById('saveBtn').style.display = 'inline-block';
            };
            reader.readAsDataURL(selectedFile);
        }

        function savePhoto() {
            if (!selectedFile) {
                alert('Pilih foto terlebih dahulu.');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
                closePhotoModal();
                alert('Foto profil berhasil diperbarui!');
            };
            reader.readAsDataURL(selectedFile);
        }

        const uploadArea = document.getElementById('uploadArea');

        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                validateAndPreviewFile(files[0]);
            }
        });

        window.onclick = function(event) {
            const modal = document.getElementById('photoModal');
            if (event.target === modal) {
                closePhotoModal();
            }
        }

        // Fungsi untuk mengirim ke server (implementasi nyata)
        function uploadToServer(file) {
            const formData = new FormData();
            formData.append('profile_photo', file);

            // Contoh menggunakan fetch API
            /*
            fetch('/api/upload-profile-photo', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('profileImage').src = data.photo_url;
                    closePhotoModal();
                    alert('Foto profil berhasil diperbarui!');
                } else {
                    alert('Terjadi kesalahan saat mengunggah foto.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengunggah foto.');
            });
            */
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection