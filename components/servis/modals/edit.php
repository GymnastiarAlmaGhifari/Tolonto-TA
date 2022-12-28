<!-- modal Rental tambah start -->
<section>
    <div id="modal_overlay_edit" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-center pt-10 md:pt-0 z-50">

        <!-- modal -->
        <div id="modal_edit" class="opacity-0 transform -translate-y-full scale-150  relative bg-neutral_800 h-[575px]  xs:w-[345px] sm:w-[500px] rounded-2xl flex flex-col justify-center gap-4 transition-opacity transition-transform duration-300">
            <div class="flex flex-row justify-between items-center -mt-6">
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
            <span class="w-11/12 h-0.5 mx-auto -mt-6 bg-neutral_600"></span>
            <form action="servis.php" method="post" class="flex flex-col items-center justify-center gap-4 -mt-2" enctype="multipart/form-data">
            <input type="hidden" name="id-servis-edit" id="id-servis-edit">
            <input type="hidden" name="tgl-servis-edit" id="tgl-servis-edit">
                <div class="relative z-0 w-11/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Nama Barang</h1>
                    <input disabled type="text" id="nama_barang_edit" name="nama_barang_edit" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                </div>
                <div class="flex flex-row xs:gap-6 md:gap-[42px]  justify-center items-center w-full">
                    <div class="relative z-0 w-5/12 ">
                        <h1 class="text-neutral_050 font-medium mb-2 ml-3">Status</h1>
                        <svg width="14" height="24" class="absolute top-12  xs:left-5 md:left-7" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.12 20.2267L1.89333 16L0.0133336 17.88L6.12 24L12.24 17.88L10.3467 16M6.12 3.77333L10.3467 8L12.2267 6.12L6.12 0L0 6.12L1.89333 8L6.12 3.77333Z" fill="black" />
                        </svg>
                        <select name="status" id="status" required class="select select-bordered font-normal py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl xs:pl-12 md:pl-16  pr-3 ">
                            <option value="" class="text-neutral_500 text-base" hidden>Status Saat Ini</option>
                            <option id="option" value="pending" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">Pending</option>
                            <option id="option" value="progress" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">Progress</option>
                            <option id="option" value="selesai" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">Selesai</option>
                            <option id="option" value="batal" class="text-base mt-1 pt-1 bg-primary_050 cursor-pointer">Batal</option>
                        </select>
                        <i id="arrow_rental" class="fa-solid fa-caret-down  absolute right-4 mt-5"></i>

                    </div>
                    <div class="relative z-0 w-5/12">
                        <h1 class="text-neutral_050 font-medium mb-2 ml-3">Bayar</h1>
                        <input type="text" id="bayar" name="bayar" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl focus:pt-5 valid:pt-5 xs:pl-12 md:pl-16 peer" placeholder=" " />
                        <label for="bayar" class="absolute text-base text-neutral_900  duration-300 transform -translate-y-3 scale-75 top-12 z-10 origin-[0] left-14 peer-focus:left-14 peer-focus:text-neutral_500 peer-valid:text-neutral_500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-sm peer-valid:text-sm">Biaya Perbaikan</label>
                        <svg width="14" height="24" class="absolute top-12 xs:left-5 md:left-7" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 16H2.66667C2.66667 17.44 4.49333 18.6667 6.66667 18.6667C8.84 18.6667 10.6667 17.44 10.6667 16C10.6667 14.5333 9.28 14 6.34667 13.2933C3.52 12.5867 0 11.7067 0 8C0 5.61333 1.96 3.58667 4.66667 2.90667V0H8.66667V2.90667C11.3733 3.58667 13.3333 5.61333 13.3333 8H10.6667C10.6667 6.56 8.84 5.33333 6.66667 5.33333C4.49333 5.33333 2.66667 6.56 2.66667 8C2.66667 9.46667 4.05333 10 6.98667 10.7067C9.81333 11.4133 13.3333 12.2933 13.3333 16C13.3333 18.3867 11.3733 20.4133 8.66667 21.0933V24H4.66667V21.0933C1.96 20.4133 0 18.3867 0 16Z" fill="#303030" />
                        </svg>
                    </div>
                </div>
                <div class="relative z-10 w-11/12 ">
                    <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                        <label for="datepicker" class="text-neutral_050 font-medium mb-2 ml-3">Estimasi Selesai</label>
                        <div class="relative w-full mt-1">
                            <input type="hidden" name="date" x-ref="date">
                            <input id="datepickerValue" name="datepickerValue" type="text" readonly x-model="datepickerValue" @click="showDatepicker = !showDatepicker" @keydown.escape="showDatepicker = false" class="w-full h-14 pl-16 pr-10 py-3 leading-none rounded-2xl shadow-sm focus:outline-none focus:shadow-outline bg-neutral_050 text-neutral_600 font-medium cursor-pointer" placeholder="Select date">
                            <div class="absolute top-0 left-4 px-2 py-4">
                                <svg class="h-6 w-6 text-neutral_400" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4 13.0909H16.2V16.1673L19.128 17.7055L18.228 19.1236L14.4 17.1164V13.0909ZM19.2 7.63636H2.4V19.6364H8.004C7.488 18.6436 7.2 17.5309 7.2 16.3636C7.2 14.3383 8.085 12.396 9.6603 10.9639C11.2356 9.53182 13.3722 8.72727 15.6 8.72727C16.884 8.72727 18.108 8.98909 19.2 9.45818V7.63636ZM2.4 21.8182C1.068 21.8182 0 20.8364 0 19.6364V4.36364C0 3.15273 1.068 2.18182 2.4 2.18182H3.6V0H6V2.18182H15.6V0H18V2.18182H19.2C19.8365 2.18182 20.447 2.41169 20.8971 2.82086C21.3471 3.23003 21.6 3.78498 21.6 4.36364V11.0182C23.088 12.3927 24 14.28 24 16.3636C24 18.3889 23.115 20.3313 21.5397 21.7634C19.9644 23.1955 17.8278 24 15.6 24C13.308 24 11.232 23.1709 9.72 21.8182H2.4ZM15.6 11.0727C14.0564 11.0727 12.5761 11.6302 11.4846 12.6224C10.3932 13.6146 9.78 14.9604 9.78 16.3636C9.78 19.2873 12.384 21.6545 15.6 21.6545C16.3643 21.6545 17.1211 21.5177 17.8272 21.2518C18.5333 20.9859 19.1749 20.5962 19.7154 20.1049C20.2558 19.6136 20.6845 19.0303 20.977 18.3884C21.2695 17.7465 21.42 17.0584 21.42 16.3636C21.42 13.44 18.816 11.0727 15.6 11.0727Z" fill="#303030" />
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
                <div class="relative z-0 w-11/12 ">
                    <h1 class="text-neutral_050 font-medium mb-2 ml-3">Detail Perbaikan</h1>
                    <input type="text" id="detail_perbaikan" name="detail_perbaikan" required class="block py-2.5 text-base text-neutral_900 bg-neutral_050 w-full h-14 rounded-2xl pl-3" />
                </div>
                <button type="submit" name="edit_konfirmasi" id="edit_konfirmasi" class="bg-[#4FCF2F] text-neutral_050 shadow-elevation-light-2 w-11/12 h-[58px] rounded-2xl flex flex-row gap-3 justify-center items-center mt-2   hover:bg-[#81FF62] focus:bg-[#4FCF2F]/80">
                    <h1>Update Status Servis</h1>
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
    const bayar = document.querySelector('#bayar');
    const datepickerValue = document.querySelector('#datepickerValue');
    const tgl_servis = document.querySelector('#tgl-servis-edit');


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
    openModalEdit(false)

    editServis.forEach((item) => {
        item.addEventListener('click', () => {
            openModalEdit(true)
            const id = item.value
            id_servis_edit.innerHTML = id
            console.log(id_servis_edit)

            const id_servis = document.getElementById('id-servis-edit');
            const nama_barang_edit = document.getElementById('nama_barang_edit');
            const status_edit = document.getElementById('status');
            const bayar_edit = document.getElementById('bayar');
            const detail_perbaikan_edit = document.getElementById('detail_perbaikan');
            //  gunakan varibale id untuk mengirim season ke php
            //  gunakan variable id untuk mengambil data dari database        

            var xhr = new XMLHttpRequest();
            // path getuser.php in main dir
            var url = "..\\..\\..\\getservis.php";
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var json = JSON.parse(xhr.responseText);
                    id_servis.value = json.id;
                    nama_barang_edit.value = json.nama_barang;
                    status_edit.value = json.status_servis;
                    bayar_edit.value = json.biaya;
                    tgl_servis.value = json.tgl;
                    datepickerValue.value =  json.selesai;
                    detail_perbaikan_edit.value = json.perbaikan;
                }
            };
            var data = JSON.stringify({
                "id": id
            });
            xhr.send(data);
            // format ke dalam bentuk database
            console.log(datepickerValue.value)
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

                // datepickerValue.value = same as json.selesai

                // format to beforr adding to database
                //                 $myDate = new DateTime('2000-01-01');
                // echo $myDate->format('Y-m-d H:i:s');

            },
            isToday(date) {
                const today = new Date();   
                const d = new Date(this.year, this.month, date);

                return today.toDateString() === d.toDateString() ? true : false;
            },

            getDateValue(date) {
                let selectedDate = new Date(this.year, this.month, date);
                // format selecteddate to '2022-12-27'
                let datedb = selectedDate.getFullYear() + "-" + ('0' + selectedDate.getMonth()).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
                tgl_servis.value = datedb+' 00:00:00';

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
                let d = new Date(this.year, this.month, date + 1);
                if (d < today - 1) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
    bayar.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        bayar.value = formatRupiah(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp " + rupiah : "";
    }


</script>