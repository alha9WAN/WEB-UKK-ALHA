@extends('admin. index')
@section('title', 'Edit Profile')

@section('konten-ds')
<style>
    :root {
        --primary-color: #10B981;
        --primary-light: #D1FAE5;
        --primary-lighter: #ECFDF5;
        --primary-dark: #059669;
        --primary-darker: #047857;
        --accent-color: #34D399;
        --white: #FFFFFF;
        --light-bg: #F9FAFB;
        --card-bg: #FFFFFF;
        --text-primary: #111827;
        --text-secondary: #6B7280;
        --text-light: #9CA3AF;
        --border-color: #E5E7EB;
        --border-light: #F3F4F6;
        --success-color: #10B981;
        --warning-color: #F59E0B;
        --danger-color: #EF4444;
        --info-color: #3B82F6;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --radius-sm: 8px;
        --radius-md: 12px;
        --radius-lg: 16px;
        --radius-xl: 24px;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        color: var(--text-primary);
        line-height: 1.6;
        min-height: 100vh;
        padding: 40px 30px;
    }

    .container-main {
        max-width: 1400px;
        margin: 0 auto;
        width: 100%;
    }

    /* Header Styles */
    .header-section {
        background: var(--white);
        border-radius: var(--radius-xl);
        padding: 50px 60px;
        margin-bottom: 40px;
        box-shadow: var(--shadow-xl);
        border: 1px solid rgba(209, 250, 229, 0.5);
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
    }

    .header-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--primary-darker);
        display: flex;
        align-items: center;
        gap: 20px;
        position: relative;
        z-index: 1;
    }

    .header-title i {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        box-shadow: var(--shadow-lg);
    }

    .header-subtitle {
        color: var(--text-secondary);
        font-size: 1rem;
        line-height: 1.7;
        max-width: 900px;
        position: relative;
        z-index: 1;
    }

    /* Form Container */
    .form-container {
        background: var(--white);
        border-radius: var(--radius-xl);
        overflow: hidden;
        box-shadow: var(--shadow-xl);
        border: 1px solid var(--border-light);
        margin-bottom: 50px;
        position: relative;
        width: 100%;
    }

    .form-header {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        padding: 35px 60px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .form-header::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .form-header h2 {
        font-size: 1.5rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 20px;
        position: relative;
        z-index: 1;
    }

    .form-header h2 i {
        width: 55px;
        height: 55px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
    }

    .form-content {
        padding: 50px 60px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        margin-bottom: 50px;
    }

    .form-group {
        margin-bottom: 35px;
        position: relative;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        margin-bottom: 15px;
        font-weight: 600;
        color: var(--primary-darker);
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .form-label i {
        color: var(--primary-color);
        font-size: 0.9rem;
        width: 20px;
    }

    .required {
        color: var(--danger-color);
        margin-left: 4px;
        font-weight: 700;
        font-size: 1rem;
    }

    .input-group {
        position: relative;
    }

    .password-wrapper {
        position: relative;
        width: 100%;
    }

    .form-input, .form-select, .form-number, .form-textarea, .form-password {
        width: 100%;
        padding: 20px 25px;
        border: 2px solid var(--border-color);
        border-radius: var(--radius-md);
        background: var(--white);
        color: var(--text-primary);
        font-size: 1rem;
        transition: var(--transition);
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .form-input:focus, .form-select:focus, .form-number:focus, .form-textarea:focus, .form-password:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 5px rgba(16, 185, 129, 0.15);
        transform: translateY(-3px);
    }

    .form-textarea {
        resize: vertical;
        min-height: 160px;
        line-height: 1.6;
    }

    /* Custom Select Styles */
    .custom-select-wrapper {
        position: relative;
        width: 100%;
    }

    .form-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        cursor: pointer;
        padding-right: 60px;
        background-color: var(--white);
    }

    .select-arrow {
        position: absolute;
        right: 25px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: var(--text-secondary);
        transition: var(--transition);
    }

    .form-select:focus + .select-arrow {
        transform: translateY(-50%) rotate(180deg);
        color: var(--primary-color);
    }

    .form-select option[value="admin"] {
        color: #EF4444;
        background: rgba(239, 68, 68, 0.05);
    }

    .form-select option[value="petugas"] {
        color: #3B82F6;
        background: rgba(59, 130, 246, 0.05);
    }

    .form-select option[value="user"] {
        color: #10B981;
        background: rgba(16, 185, 129, 0.05);
    }

    .form-select:hover {
        border-color: var(--primary-light);
        transform: translateY(-2px);
    }

    /* Password toggle */
    .password-toggle {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--text-secondary);
        cursor: pointer;
        padding: 5px;
        transition: var(--transition);
    }

    .password-toggle:hover {
        color: var(--primary-color);
    }

    /* Helper Text */
    .helper-text {
        font-size: 0.9rem;
        color: var(--text-secondary);
        margin-top: 12px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        line-height: 1.5;
        padding: 16px 20px;
        background: var(--primary-lighter);
        border-radius: var(--radius-md);
        border-left: 5px solid var(--primary-color);
    }

    .helper-text i {
        color: var(--primary-color);
        margin-top: 2px;
        flex-shrink: 0;
        font-size: 0.9rem;
    }

    /* File Upload */
    .file-upload-area {
        border: 2px dashed var(--border-color);
        border-radius: var(--radius-md);
        padding: 60px 30px;
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
        background: var(--primary-lighter);
        position: relative;
        overflow: hidden;
    }

    .file-upload-area:hover {
        border-color: var(--primary-color);
        background: var(--primary-light);
        transform: translateY(-3px);
    }

    .upload-icon {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 25px;
        opacity: 0.9;
    }

    .upload-text {
        color: var(--primary-darker);
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    .upload-subtext {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-bottom: 30px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .upload-btn {
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        color: white;
        border: none;
        padding: 16px 32px;
        border-radius: var(--radius-md);
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 15px;
        transition: var(--transition);
        font-size: 1rem;
        box-shadow: var(--shadow-md);
    }

    .upload-btn:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
    }

    .file-input {
        display: none;
    }

    /* Image Preview */
    .image-preview-container {
        display: none;
        margin-top: 30px;
        animation: slideUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(25px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .image-preview {
        position: relative;
        display: inline-block;
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        border: 3px solid var(--primary-light);
    }

    .preview-image {
        width: 220px;
        height: 220px;
        object-fit: cover;
        transition: var(--transition);
    }

    .image-preview:hover .preview-image {
        transform: scale(1.08);
    }

    .remove-image-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        width: 45px;
        height: 45px;
        background: rgba(239, 68, 68, 0.95);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        font-size: 1rem;
        transition: var(--transition);
        backdrop-filter: blur(4px);
        box-shadow: var(--shadow-md);
    }

    .remove-image-btn:hover {
        background: #DC2626;
        transform: scale(1.1) rotate(90deg);
    }

    /* Error Styles */
    .error-text {
        position: absolute;
        top: -50px;
        right: 12px;
        background: var(--danger-color);
        color: #fff;
        font-size: 12px;
        font-weight: 600;
        padding: 8px 12px;
        border-radius: 8px;
        box-shadow: 0 6px 16px rgba(239, 68, 68, 0.25);
        white-space: nowrap;
        z-index: 10;
        animation: fadeSlide 0.3s ease-out;
    }

    .error-text::after {
        content: '';
        position: absolute;
        bottom: -6px;
        left: 50%;
        transform: translateX(-50%);
        border-width: 6px 6px 0 6px;
        border-style: solid;
        border-color: var(--danger-color) transparent transparent transparent;
    }

    @keyframes fadeSlide {
        from { opacity: 0; transform: translateY(6px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-input.error,
    .form-select.error,
    .form-number.error,
    .form-textarea.error {
        border-color: var(--danger-color);
        background: #fff5f5;
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.12);
    }

    /* Form Actions */
    .form-actions {
        padding: 40px 60px;
        border-top: 1px solid var(--border-light);
        display: flex;
        justify-content: space-between;
        gap: 25px;
    }

    .btn {
        padding: 20px 40px;
        border-radius: var(--radius-md);
        font-weight: 600;
        font-size: 1.1rem;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 15px;
        border: none;
        text-decoration: none;
        font-family: 'Plus Jakarta Sans', sans-serif;
        min-width: 200px;
        justify-content: center;
    }

    .btn-secondary {
        background: var(--white);
        border: 2px solid var(--border-color);
        color: var(--text-primary);
    }

    .btn-secondary:hover {
        background: var(--light-bg);
        border-color: var(--primary-color);
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border: none;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.7s;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    .btn-primary:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl);
    }

    .loading {
        display: inline-block;
        width: 24px;
        height: 24px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    @keyframes bounceIn {
        0% { transform: scale(0.95); opacity: 0.7; }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); opacity: 1; }
    }

    /* Responsive */
    @media (max-width: 1400px) {
        .container-main {
            max-width: 1200px;
        }
    }

    @media (max-width: 1200px) {
        .container-main {
            max-width: 100%;
            padding: 0 20px;
        }

        .header-section,
        .form-content,
        .form-actions {
            padding: 40px;
        }
    }

    @media (max-width: 992px) {
        .header-title {
            font-size: 1.8rem;
        }

        .header-title i {
            width: 60px;
            height: 60px;
            font-size: 1.3rem;
        }

        .form-header h2 {
            font-size: 1.4rem;
        }
    }

    @media (max-width: 768px) {
        body {
            padding: 30px 20px;
        }

        .header-section,
        .form-content,
        .form-actions {
            padding: 30px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 35px;
        }

        .header-title {
            font-size: 1.6rem;
        }

        .header-title i {
            width: 50px;
            height: 50px;
            font-size: 1.1rem;
        }

        .form-header {
            padding: 25px 30px;
        }

        .form-header h2 {
            font-size: 1.3rem;
        }

        .form-actions {
            flex-direction: column;
            gap: 20px;
        }

        .form-actions .btn {
            width: 100%;
            min-width: auto;
            padding: 18px 30px;
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        body {
            padding: 20px 15px;
        }

        .header-title {
            font-size: 1.4rem;
        }

        .form-content {
            padding: 25px 20px;
        }

        .file-upload-area {
            padding: 40px 20px;
        }

        .preview-image {
            width: 180px;
            height: 180px;
        }

        .btn {
            padding: 16px 30px;
            font-size: 0.95rem;
        }
    }
</style>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
    Swal.fire({
        title: "Success!",
        text: "{{ session('success') }}",
        icon: "success",
        confirmButtonColor: '#3085d6'
    });
</script>
@endif

@if ($errors->any())
<script>
    Swal.fire({
        title: "Failed!",
        text: "Terdapat kesalahan input, mohon periksa kembali formulir.",
        icon: "error",
        confirmButtonColor: '#d33'
    });
</script>
@endif

<main class="main-content" id="mainContent">
    <div class="container-main">
        <!-- Header -->
        <div class="header-section">
            <h1 class="header-title">
                <i class="fas fa-user-edit"></i>
                Edit Profile
            </h1>
            <p class="header-subtitle">
                Update Profile. Pastikan semua informasi diisi dengan benar untuk memudahkan pengelolaan dan hak akses user.
            </p>
        </div>

        <!-- Main Form -->
        <div class="form-container">
            <!-- Form Header -->
            <div class="form-header">
                <h2><i class="fas fa-user-edit"></i> Form Edit Profile</h2>
            </div>

            <!-- Form Content -->
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-content">
                    <div class="form-grid">
                        <!-- Nama Lengkap -->
                        <div class="form-group @error('name') has-error @enderror">
                            <label for="name" class="form-label">
                                <i class="fas fa-user"></i>
                                Nama Lengkap
                                <span class="required">*</span>
                            </label>
                            <div class="input-group">
                                <input type="text"
                                    id="name"
                                    name="name"
                                    class="form-input @error('name') error @enderror"
                                    placeholder="Contoh: John Doe"
                                    value="{{ old('name', $data_user->name) }}"
                                    required>
                                @error('name')
                                    <small class="error-text">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group @error('email') has-error @enderror">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i>
                                Email
                                <span class="required">*</span>
                            </label>
                            <div class="input-group">
                                <input type="email"
                                    id="email"
                                    name="email"
                                    class="form-input @error('email') error @enderror"
                                    placeholder="Contoh: johndoe@example.com"
                                    value="{{ old('email', $data_user->email) }}"
                                    required>
                                @error('email')
                                    <small class="error-text">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>






                        <!-- Nomor HP -->
                        <div class="form-group @error('nomor_hp') has-error @enderror full-width">
                            <label for="nomor_hp" class="form-label">
                                <i class="fas fa-phone"></i>
                                Nomor HP
                            </label>
                            <div class="input-group">
                                <input type="tel"
                                    id="nomor_hp"
                                    name="nomor_hp"
                                    class="form-input @error('nomor_hp') error @enderror"
                                    placeholder="Contoh: 081234567890"
                                    value="{{ old('nomor_hp', $data_user->nomor_hp) }}"
                                    maxlength="20">
                                @error('nomor_hp')
                                    <small class="error-text">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="form-group full-width @error('alamat') has-error @enderror">
                            <label for="alamat" class="form-label">
                                <i class="fas fa-map-marker-alt"></i>
                                Alamat
                            </label>
                            <div class="input-group">
                                <textarea
                                    id="alamat"
                                    name="alamat"
                                    class="form-textarea @error('alamat') error @enderror"
                                    placeholder="Masukkan alamat lengkap user"
                                    rows="4">{{ old('alamat', $data_user->alamat) }}</textarea>
                                @error('alamat')
                                    <small class="error-text">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Foto Profil -->
                        <div class="form-group full-width @error('foto') has-error @enderror">
                            <label class="form-label">
                                <i class="fas fa-camera"></i>
                                Foto Profil
                            </label>

                            <div class="input-group">
                                <!-- Upload Area -->
                                <div class="file-upload-area" id="uploadBtn">
                                    <div class="upload-icon">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </div>
                                    <div class="upload-text">
                                        Upload Foto Profil
                                    </div>
                                    <div class="upload-subtext">
                                        Seret & lepas file atau klik untuk memilih. Format: JPG, PNG, GIF (Maks. 5MB)
                                    </div>
                                    <button type="button" class="upload-btn" id="uploadBtn">
                                        <i class="fas fa-folder-open"></i>
                                        Pilih File Foto
                                    </button>
                                    <input type="file"
                                        id="foto"
                                        name="foto"
                                        class="file-input @error('foto') error @enderror"
                                        accept="image/*">
                                </div>

                                @error('foto')
                                    <small class="error-text">{{ $message }}</small>
                                @enderror

                                <!-- Image Preview -->
                                <div class="image-preview-container" id="imagePreview" @if($data_user->foto) style="display: block;" @endif>
                                    <div class="image-preview">
                                        <img id="previewImage"
                                            class="preview-image"
                                            src="{{ $data_user->foto ? asset('storage/' . $data_user->foto) : '' }}"
                                            alt="Preview Foto Profil">
                                        <button type="button" id="removeImageBtn" class="remove-image-btn">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{ route('admin.manajemenuser.list') }}" class="btn btn-secondary" id="backBtn">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" id="submitBtn" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        <span id="submitText">Update
Profile</span>
                        <span id="loadingIcon" style="display: none;" class="loading"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>






<script>

    // UNTUK MEMBUAKA FILE
    const uploadBtn = document.getElementById('uploadBtn');
    const input = document.getElementById('foto');
    // UNTUK MENPILKAN GAMBAR
        const previewContainer = document.getElementById('imagePreview');
    const previewImage = document.getElementById('previewImage');

    // UNTUK HAPUS GAMBAR
      const removeBtn = document.getElementById('removeImageBtn');


    // klik tombol → buka file explorer
    uploadBtn.addEventListener('click', () => {
        input.click();
    });


    // PROSES MENPILKAN GAMBAR
        // preview gambar
    input.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;

        previewImage.src = URL.createObjectURL(file);
        previewContainer.style.display = 'block';
    });


    // HAPUS GAMBAR
        // hapus gambar
    removeBtn.addEventListener('click', function () {
        input.value = '';
        previewImage.src = '';
        previewContainer.style.display = 'none';
    });

</script>
@endsection

