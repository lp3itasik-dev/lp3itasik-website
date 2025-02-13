<section id="popup" class="hidden flex-col items-center justify-center bg-black bg-opacity-70 w-full h-full z-50 fixed">
    <div class="relative">
        <button type="button" onclick="hiddenPopup()"
            class="absolute top-4 right-5 text-red-500 hover:text-red-600 cursor-pointer">
            <i class="fa-solid fa-times text-xl"></i>
        </button>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 max-w-4xl bg-white p-10 border-l-8 border-lp3i-100">
            <div>
                <img src="{{ asset('images/doc-kk/KK-1.jpeg') }}" alt="">
                <div class="mt-3 space-y-1">
                    <h2 class="font-bold text-xl uppercase text-gray-900">REGULER SORE!</h2>
                    <p class="text-sm text-gray-700">Pendaftaran Gelombang 1 telah resmi dibuka. Ayo daftar sekarang untuk mendapatkan potongan beasiswa sampai dengan Rp5.000.000!</p>
                </div>
            </div>
            <form onsubmit="RegisterPMBAPI(event)" class="grid grid-cols-2 gap-2">
                <div class="col-span-2 space-y-1">
                    <label for="name" class="text-sm font-medium">Nama Lengkap</label>
                    <input type="text" name="name" id="name"
                        class="w-full border border-gray-300 text-gray-800 text-sm px-3 py-2" placeholder="Nama Lengkap"
                        required>
                    <small class="text-xs text-red-500" id="error-name"></small>
                </div>
                <div class="col-span-1 space-y-1">
                    <label for="phone" class="text-sm font-medium">No. Whatsapp</label>
                    <input type="number" name="phone" id="phone"
                        class="w-full border border-gray-300 text-gray-800 text-sm px-3 py-2" placeholder="No. Whatsapp"
                        required>
                    <small class="text-xs text-red-500" id="error-phone"></small>
                </div>
                <div class="col-span-1 space-y-1">
                    <label for="year" class="text-sm font-medium">Tahun Lulus</label>
                    <input type="number" name="year" id="year"
                        class="w-full border border-gray-300 text-gray-800 text-sm px-3 py-2" placeholder="Tahun Lulus" required>
                    <small class="text-xs text-red-500" id="error-year"></small>
                </div>
                <div class="col-span-2 space-y-1">
                    <label for="school" class="text-sm font-medium">Pilih Sekolah</label>
                    <select name="school" id="school" class="js-example-input-single w-full" required></select>
                    <small class="text-xs text-red-500" id="error-school"></small>
                </div>
                <button type="submit"
                    class="mt-5 bg-sky-500 hover:bg-sky-600 text-white px-3 py-2.5 text-sm font-medium border-l-4 border-sky-700">Dapatkan
                    Beasiswa!</button>
            </form>
        </div>
    </div>
</section>
@push('scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        async function RegisterPMBAPI(e) {
            e.preventDefault();

            const form = e.target;
            const name = form.name.value.trim();
            const phone = form.phone.value.trim();
            const school = form.school.value.trim();
            const year = form.year.value.trim();

            if (!name || !phone || !school || !year) {
                alert('Semua kolom harus diisi!');
                return;
            }

            const data = {
                name,
                phone,
                school,
                year,
            };

            try {
                const response = await axios.post(
                    `https://pmb-api.politekniklp3i-tasikmalaya.ac.id/auth/website/v1`,
                    data, {
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    }
                );
                alert(response.data.message);
                form.reset();
            } catch (error) {
                if (error.response) {
                    console.error('Error Response:', error.response);
                    if (error.response.data.errors.length > 0) {
                        error.response.data.errors.forEach(error => {
                            document.getElementById(`error-${error.path}`).innerText = error.msg;
                        });
                    }
                } else if (error.request) {
                    console.error('No Response:', error.request);
                    alert('Tidak ada respons dari server.');
                } else {
                    console.error('Error Message:', error.message);
                    alert(error.message);
                }
            }
        }
    </script>
    <script>
        const getSchools = async () => {
            await axios.get(`https://pmb-api.politekniklp3i-tasikmalaya.ac.id/schools`, {
                    headers: {
                        'lp3i-api-key': 'aEof9XqcH34k3g6IbJcQLxGY'
                    }
                })
                .then((response) => {
                    const schools = response.data;
                    let options = '<option>Pilih Sekolah</option>';
                    schools.forEach((school, index) => {
                        options += `<option value="${school.id}">${school.name}</option>`;
                    });
                    document.getElementById('school').innerHTML = options;
                })
                .catch((error) => {
                    console.error(error);
                });
        }
        getSchools();
    </script>
    <script>
        let phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('input', function() {
            let phone = phoneInput.value;

            if (phone.length > 14) {
                phone = phone.substring(0, 14);
            }

            if (phone.startsWith("62")) {
                if (phone.length === 3 && (phone[2] === "0" || phone[2] !== "8")) {
                    phoneInput.value = '62';
                } else {
                    phoneInput.value = phone;
                }
            } else if (phone.startsWith("0")) {
                phoneInput.value = '62' + phone.substring(1);
            } else {
                phoneInput.value = '62';
            }
        });
    </script>
    <script>
        function showUp() {
            document.getElementById('popup').classList.remove('hidden');
            document.getElementById('popup').classList.add('flex');
            $('.js-example-input-single').select2({
                tags: true,
            });
        }
        setTimeout(() => showUp(), 2000);
    </script>
@endpush
