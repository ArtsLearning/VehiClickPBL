<!-- Form Ulasan -->
        <!-- Bintang Rating -->
        <div class="flex items-center mb-3">
            @for ($i = 1; $i <= 5; $i++)
                <svg onclick="selectStar({{ $i }})" id="star-{{ $i }}" class="w-6 h-6 cursor-pointer text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.973a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.388 2.462a1 1 0 00-.364 1.118l1.286 3.973c.3.921-.755 1.688-1.538 1.118l-3.388-2.462a1 1 0 00-1.176 0l-3.388 2.462c-.783.57-1.838-.197-1.538-1.118l1.286-3.973a1 1 0 00-.364-1.118L2.045 9.4c-.783-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.973z"/>
                </svg>
            @endfor
        </div>
        <input type="hidden" name="rating" id="rating" value="0">

        <!-- Tags -->
        <div class="flex flex-wrap gap-2 text-sm mb-4">
            @foreach (['Mobil Bersih', 'Pelayanan Ramah', 'Sopir Tepat Waktu', 'AC Dingin'] as $tag)
                <span onclick="toggleTag(this)" class="tag-item cursor-pointer bg-gray-200 text-gray-700 px-3 py-1 rounded-full">
                    {{ $tag }}
                </span>
            @endforeach
        </div>
        <input type="hidden" name="tags" id="tags" value="">
        <!-- Nama Lengkap -->
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="w-full border border-gray-300 rounded-md p-2 text-sm mb-4" placeholder="Nama Lengkap Anda" required>

        <!-- Teks Ulasan -->
        <textarea name="review_text" id="review_text" rows="3" class="w-full border border-gray-300 rounded-md p-2 text-sm" placeholder="Tulis ulasan Anda di sini..."></textarea>
        
        <!-- Tombol Kirim -->
        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-md hover:bg-orange-600 text-sm">
                Kirim Ulasan
            </button>
        </div>



<!-- Script Interaktif -->
<script>
    let selectedTags = [];

    function selectStar(rating) {
        document.getElementById('rating').value = rating;
        for (let i = 1; i <= 5; i++) {
            const star = document.getElementById('star-' + i);
            star.classList.remove('text-yellow-400', 'text-gray-300');
            star.classList.add(i <= rating ? 'text-yellow-400' : 'text-gray-300');
        }
    }

    function toggleTag(el) {
        const text = el.innerText;
        if (selectedTags.includes(text)) {
            selectedTags = selectedTags.filter(tag => tag !== text);
            el.classList.remove('bg-orange-100', 'text-orange-700');
            el.classList.add('bg-gray-200', 'text-gray-700');
        } else {
            selectedTags.push(text);
            el.classList.remove('bg-gray-200', 'text-gray-700');
            el.classList.add('bg-orange-100', 'text-orange-700');
        }
        document.getElementById('tags').value = selectedTags.join(',');
    }

    document.getElementById('reviewForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const rating = document.getElementById('rating').value;
        const tags = document.getElementById('tags').value;
        const text = document.getElementById('review_text').value;

        alert(`Rating: ${rating}\nTags: ${tags}\nUlasan: ${text}`);
        // Bisa kirim ke server via fetch/ajax di sini
    });
</script>