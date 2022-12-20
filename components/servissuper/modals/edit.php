<!-- modal Rental tambah start -->
<section>
    <div id="modal_overlay_edit" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0 z-50">

        <!-- modal -->
        <div id="modal_edit" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_800 h-[520px] w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <div class="flex flex-row justify-between items-center -mt-3">
                <div class="flex flex-row justify-start ml-[23px] mt-4 gap-3 mb-3">
                    <svg class="mx-auto my-auto" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 7H11V5H9M10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM10 0C8.68678 0 7.38642 0.258658 6.17317 0.761205C4.95991 1.26375 3.85752 2.00035 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7362 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20C12.6522 20 15.1957 18.9464 17.0711 17.0711C18.9464 15.1957 20 12.6522 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM9 15H11V9H9V15Z" fill="#fff" />
                    </svg>
                    <h1 class="text-neutral_050 font-base font-noto-sans text-xl">Id <span id="id_servis_edit"></span></h1>
                </div>
                <button onclick="openModalEdit(false)" class="bg-neutral_050 w-[30px] h-[30px] rounded-full mr-6 relative">
                    <svg class="mx-auto" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="#E53935" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6 6L18 18" stroke="#E53935" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <span class="w-11/12 h-0.5 mx-auto -mt-5 bg-neutral_600"></span>
            <form action="servisSuperAdmin.php" method="post" class="flex flex-col items-center justify-center gap-4 -mt-2" enctype="multipart/form-data">
                <div class="relative z-0 w-11/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Nama Barang</h1>
                    <input disabled type="text" id="nama_barang_edit" name="nama_barang_edit" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                </div>
                <div class="relative z-10 w-11/12 ">
                    <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                        <div class="mb-5 w-64">
                            <label for="datepicker" class="font-bold mb-1 text-neutral_700 block">Estimasi Selesai</label>
                            <div class="relative">
                                <input type="hidden" name="date" x-ref="date">
                                <input type="text" readonly x-model="datepickerValue" @click="showDatepicker = !showDatepicker" @keydown.escape="showDatepicker = false" class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-neutral_600 font-medium cursor-pointer" placeholder="Select date">
                                <div class="absolute top-0 right-0 px-3 py-2">
                                    <svg class="h-6 w-6 text-neutral_400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="bg-neutral_050 mt-12 rounded-lg shadow p-4 absolute top-0 left-0" style="width: 17rem" x-show.transition="showDatepicker" @click.away="showDatepicker = false">
                                    <div class="flex justify-between items-center mb-2">
                                        <div>
                                            <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-neutral_800"></span>
                                            <span x-text="year" class="ml-1 text-lg text-neutral_600 font-normal"></span>
                                        </div>
                                        <div>
                                            <button type="button" class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-neutral_200 p-1 rounded-full" :disabled="isToday && month == new Date().getMonth()" @click="if (month == 0) { month = 11; year--;} else {month--;} getNoOfDays()">
                                                <svg class="h-6 w-6 text-neutral_500 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                                </svg>
                                            </button>
                                            <button type="button" class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-neutral_200 p-1 rounded-full" @click="if (month == 11) { month = 0; year++;} else {month++;} getNoOfDays()">
                                                <svg class="h-6 w-6 text-neutral_500 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap mb-3 -mx-1">
                                        <template x-for="(day, index) in DAYS" :key="index">
                                            <div style="width: 14.26%" class="px-1">
                                                <div x-text="day" class="text-neutral_800 font-medium text-center text-xs"></div>
                                            </div>
                                        </template>
                                    </div>

                                    <div class="flex flex-wrap -mx-1">
                                        <template x-for="blankday in blankdays">
                                            <div style="width: 14.28%" class="text-center border p-1 border-transparent text-sm"></div>
                                        </template>
                                        <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                            <div style="width: 14.28%" class="px-1 mb-1">
                                                <div @click="getDateValue(date)" x-text="date" class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100" :class="{'bg-teriary_500 text-white': isToday(date) == true, 'text-neutral_700 hover:bg-teriary_200': isToday(date) == false ,'cursor-not-allowed hidden': isPastDay(date) == true,}"></div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative z-0 w-11/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Detail Perbaikan</h1>
                    <input type="text" id="detail_perbaikan" name="detail_perbaikan" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                </div>
                <button type="submit" name="edit_konfirmasi" id="edit_konfirmasi" class="bg-[#4FCF2F] text-neutral_050 shadow-elevation-light-2 w-11/12 h-[58px] rounded-2xl flex flex-row gap-3 justify-center items-center">
                    <h1>WhatsApp Customer</h1>
                </button>
        </div>
        </form>
    </div>
    </div>
</section>
<!-- modal_edit tambah end -->

<script>
    const modal_overlay_edit = document.querySelector('#modal_overlay_edit');
    const modal_edit = document.querySelector('#modal_edit');
    const editServis = document.querySelectorAll('#editServis');
    const id_servis_edit = document.querySelector('#id_servis_edit');

    const openModalEdit = (value) => {
        const modalClEdit = modal_edit.classList
        const overlayClEdit = modal_overlay_edit

        if (value) {
            overlayClEdit.classList.remove('hidden')
            setTimeout(() => {
                modalClEdit.remove('opacity-0')
                modalClEdit.remove('-translate-y-full')
                modalClEdit.remove('scale-150')
            }, 100);
        } else {
            modalClEdit.add('-translate-y-full')
            setTimeout(() => {
                modalClEdit.add('opacity-0')
                modalClEdit.add('scale-150')
            }, 100);
            setTimeout(() => overlayClEdit.classList.add('hidden'), 300);
        }
    }
    openModalEdit(true)

    editServis.forEach((item) => {
        item.addEventListener('click', () => {
            openModalEdit(true)

            const id = item.value
            id_servis_edit.innerHTML = id

        })
    })
</script>
<script>
    const MONTH_NAMES = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    const DAYS = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];

    function app() {
        return {
            showDatepicker: false,
            datepickerValue: '',
            formatDate: '',
            month: '',
            year: '',
            no_of_days: [],
            blankdays: [],
            days: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],

            initDate() {
                let today = new Date();
                this.month = today.getMonth();
                this.year = today.getFullYear();
                // this.datepickerValue = new Date(this.year, this.month, today.getDate() + 1).toDateString();
                // date picker value ke bahasa indonesia
                this.datepickerValue = new Date(this.year, this.month, today.getDate() + 1).toLocaleDateString('id-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

            },
            isToday(date) {
                const today = new Date();
                const d = new Date(this.year, this.month, date);

                return today.toDateString() === d.toDateString() ? true : false;
            },

            getDateValue(date) {
                let selectedDate = new Date(this.year, this.month, date);
                this.datepickerValue = selectedDate.toLocaleDateString('id-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + selectedDate.getMonth()).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);

                console.log(this.$refs.date.value);

                this.showDatepicker = false;
            },

            getNoOfDays() {
                let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                // find where to start calendar day of week
                let dayOfWeek = new Date(this.year, this.month).getDay();
                let blankdaysArray = [];
                for (var i = 1; i <= dayOfWeek; i++) {
                    blankdaysArray.push(i);
                }

                let daysArray = [];
                for (var i = 1; i <= daysInMonth; i++) {
                    daysArray.push(i);
                }

                this.blankdays = blankdaysArray;
                this.no_of_days = daysArray;
            },
            isPastDay(date) {
                let today = new Date();
                let d = new Date(this.year, this.month, date);
                if (d < today - 1) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
</script>