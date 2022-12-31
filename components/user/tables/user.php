  <?php
  
    ?>

  <!-- table start -->
  <section class="xs:mt-[84px] sm:mt-24 text-neutral_050 ml-16">
      <div class="container px-6 max-w-full ">
          <div id="atas" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
              <div class="flex flex-wrap flex-col ">
                  <div class=" flex flex-row justify-between items-center -mb-3">
                      <div class="flex gap-4">
                          <h1 class="capitalize font-semibold">user</h1>
                          <h2><?php echo $ju ?></h2>

                      </div>
                      <span id="open" class="w-[36px] h-[36px] bg-neutral_050 hover:bg-neutral_050/90 focus:bg-neutral_050/75 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                          <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                          <span id="plus" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                      </span>
                  </div>
                  <span id="garis" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                  <h1 id="data-kosong" class="hidden my-auto mt-3 text-xl">Tidak Ada Data</h1>
                  <div class="w-full mx-auto relative block h-[360px] overflow-y-auto mt-2" id="table">
                      <table id="table" class="w-full">
                          <thead class="bg-neutral_800 sticky -top-[1.4px]">
                              <tr class="font-semibold ">
                                  <th scope="col" class="text-left pl-4 relative">
                                      <div class="flex flex-row gap-x-3 items-center">
                                          <i class="fa-solid fa-magnifying-glass "></i>
                                          <input type="text" id="search" name="search" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Cari Username">
                                      </div>
                                  </th>
                                  <th scope="col"  class="text-left pl-4 relative">
                                    <h1 class="bg-neutral_050 text-neutral_900 p-1 flex justify-center w-32 rounded-2xl">
                                        NO HP
                                    </h1>
                                    </th>
                                  <th scope="col"  class="text-left pl-4  ">
                                  <h1 class="bg-neutral_050 text-neutral_900 p-1 flex justify-center w-32 rounded-2xl">
                                        SALDO
                                    </h1>
                                  </th>
                                  <th scope="col"  class="text-left pl-4  ">
                                  <h1 class="bg-neutral_050 text-neutral_900 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                        PLAY TIME
                                    </h1>
                                  </th>
                                  <th scope="col" class="text-left pl-4  ">
                                  <h1 class="bg-transparent text-neutral_050 p-1 flex justify-center mx-auto w-32 rounded-2xl">
                                        OPTIONS
                                    </h1>
                                  </th>
                              </tr>
                          </thead>
                          <tbody class="overflow-y-hidden">
                              <!-- list 1 start -->
                              <?php
                                $row = 0;
                                if (empty($tb_user)) {
                                    echo
                                    '<script>
                                    document.getElementById("table").style.display = "none"
                                        
                                    document.getElementById("data-kosong").classList.remove("hidden") 
                
                                    document.getElementById("atas").classList.add("h-[450px]") 
    
                                    if (document.getElementById("atas").classList.contains("h-[77px]")) {
                                        document.getElementById("data-kosong").classList.add("hidden")
                                    }
    
                                        </script> ';
                                } else {
                                    while ($row < count($tb_user)) { ?>
                                      <input id="userid" type="hidden" value="<?php echo $tb_user[$row]['user_id'] ?>">
                                      <tr class="">
                                          <td class="flex flex-row gap-x-3 pb-5 w-96">
                                              <div class="flex flex-row justify-center items-center w-10">
                                                  <h1 class="font-semibold font-noto-sans text-xl my-auto"><?php echo $row + 1 ?></h1>
                                              </div>
                                              <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                                  <img src="img/user/<?php echo FormatID::convert($tb_user[$row]['user_id']) ?>/<?php echo $tb_user[$row]['img'] ?>" alt="gambar user" class="rounded-full w-full h-full object-cover">
                                              </div>
                                              <div class="flex flex-col gap-y-1 ml-2">
                                                  <h1 class="font-semibold"><?php echo $tb_user[$row]['username'] ?></h1>
                                                  <h2 class="text-neutral_400 text-xs"><?php echo $tb_user[$row]['email'] ?></h2>
                                              </div>
                                          </td>
                                          <td class="pl-6 whitespace-nowrap"><?php echo $tb_user[$row]['hp'] ?></td>
                                          <td class="pl-6 whitespace-nowrap"><?php
                                                                    $saldo = Rupiah::to($tb_user[$row]['saldo']);
                                                                    echo $saldo
                                                                    ?></td>
                                          <td class=" pl-4 whitespace-nowrap mx-auto flex justify-center items-center"><?php echo $tb_user[$row]['playtime'] ?> Jam</td>
                                          <td class="pl-4 whitespace-nowrap">
                                              <button id="topupUser" value="<?php echo $tb_user[$row]['email'] ?>" class="h-[36px] bg-neutral_050 rounded-full p-4 flex flex-row items-center mx-auto justify-center hover:bg-neutral_050/90 focus:bg-neutral_050/75 gap-2">
                                                  <h1 class="text-neutral_900 font-semibold">Topup</h1>
                                                  <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M0 16H2.66667C2.66667 17.44 4.49333 18.6667 6.66667 18.6667C8.84 18.6667 10.6667 17.44 10.6667 16C10.6667 14.5333 9.28 14 6.34667 13.2933C3.52 12.5867 0 11.7067 0 8C0 5.61333 1.96 3.58667 4.66667 2.90667V0H8.66667V2.90667C11.3733 3.58667 13.3333 5.61333 13.3333 8H10.6667C10.6667 6.56 8.84 5.33333 6.66667 5.33333C4.49333 5.33333 2.66667 6.56 2.66667 8C2.66667 9.46667 4.05333 10 6.98667 10.7067C9.81333 11.4133 13.3333 12.2933 13.3333 16C13.3333 18.3867 11.3733 20.4133 8.66667 21.0933V24H4.66667V21.0933C1.96 20.4133 0 18.3867 0 16Z" fill="#303030" />
                                                  </svg>
                                              </button>
                                          </td>
                                      </tr>
                              <?php $row++;
                                    }
                                } ?>
                              <!-- list 1 end -->
                          </tbody>
                      </table>
                      <h1 id="tidak_ditemukan" class="hidden mt-7 ml-2 text-lg">Data Tidak Ditemukan</h1>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- table end -->

  <script>
      const open = document.getElementById('open');
      const atas = document.getElementById('atas');
      const table = document.getElementById('table');
      const garis = document.getElementById('garis');
      const plus = document.getElementById('plus');
      const search = document.getElementById('search');
      const data_kosong = document.getElementById('data-kosong');
      const tidak_ditemukan = document.getElementById('tidak_ditemukan');

      window.addEventListener("load", () => {
          if (localStorage.getItem("open-table-user") == "false") {
              data_kosong.classList.add('hidden');
          }
      });

      <?php if (empty($tb_user)) { ?>
          data_kosong.classList.remove('hidden');
          table.classList.add('hidden');
          open.addEventListener("click", () => {
              if (localStorage.getItem("open-table-user") == "false") {
                  data_kosong.classList.remove('hidden');
                  table.classList.add('hidden');
              } else {
                  data_kosong.classList.add('hidden');
                  table.classList.add('hidden');
              }
          });

      <?php } ?>

      const openTable = () => {
          open.addEventListener("click", function() {
              if (atas.classList.contains('h-[77px]')) {
                  localStorage.setItem("open-table-user", "true");
              } else {
                  localStorage.setItem("open-table-user", "false");
              }
              openTab();
          });

          function openTab() {
              if (localStorage.getItem("open-table-user") == "false") {
                  garis.classList.add('hidden');
                  plus.classList.add('hidden');
                  table.classList.add('hidden');
                  atas.classList.remove('h-[450px]');
                  atas.classList.add('h-[77px]');
              } else {

                  setTimeout(() => {
                      table.classList.remove('hidden');
                  }, 150);
                  garis.classList.remove('hidden');
                  plus.classList.remove('hidden');
                  garis.classList.add('ease-in-out');
                  table.classList.add('ease-in-out');
                  atas.classList.add('h-[450px]');
                  atas.classList.remove('h-[77px]');

              }
          }
          if (localStorage.getItem("open-table-user") !== null) {
              openTab();
          }
          if (atas.classList.contains("h-[450px]")) {
              open.checked = true;
          }
      }
      openTable();
      
    //   urutkan data ketika di klik th pada table
        const urutkan = () => {
            const th = document.getElementsByTagName('th');
            for (let i = 0; i < th.length; i++) {
                th[i].addEventListener("click", function() {
                    const table = document.getElementById('table');
                    const rows = table.rows;
                    let switching = true;
                    let shouldSwitch;
                    let dir = "asc";
                    let switchcount = 0;
                    while (switching) {
                        switching = false;
                        for (let i = 1; i < (rows.length - 1); i++) {
                            shouldSwitch = false;
                            const x = rows[i].getElementsByTagName("TD")[i];
                            const y = rows[i + 1].getElementsByTagName("TD")[i];
                            if (dir == "asc") {
                                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                    shouldSwitch = true;
                                    break;
                                }
                            } else if (dir == "desc") {
                                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                    shouldSwitch = true;
                                    break;
                                }
                            }
                        }
                        if (shouldSwitch) {
                            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                            switching = true;
                            switchcount++;
                        } else {
                            if (switchcount == 0 && dir == "asc") {
                                dir = "desc";
                                switching = true;
                            }
                        }
                    }
                });
            }
        }

        
        


      const searchUser = () => {
          const input = document.getElementById('search');
          const filter = input.value.toUpperCase();
          const table = document.getElementById('table');
          const tr = table.getElementsByTagName('tr');
          for (let i = 0; i < tr.length; i++) {
              const td = tr[i].getElementsByTagName('td')[0];
              if (td) {
                  const txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                      tr[i].style.display = "";
                  } else {
                      tr[i].style.display = "none";
                  }
              }
          }
          if (tr[1].style.display == "none") {
              tidak_ditemukan.classList.remove('hidden');
          } else {
              tidak_ditemukan.classList.add('hidden');
          }
      }
      search.addEventListener('keyup', searchUser);
  </script>
  <?php require_once 'components/user/modals/topup.php'; ?>