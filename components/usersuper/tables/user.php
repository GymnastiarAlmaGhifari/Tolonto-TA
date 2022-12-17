  <?php
    ?>

  <!-- table start -->
  <section class="mt-24 text-neutral_050  ml-16">
      <div class="container px-6 max-w-full ">
          <div id="atas" class="bg-neutral_800 rounded-xl shadow-elevation-dark-4 px-8 duration-300 ease-in-out relative pt-5">
              <div class="flex flex-wrap flex-col ">
                  <div class=" flex flex-row justify-between items-center -mb-3">
                      <div class="flex gap-4">
                          <h1 class="capitalize font-semibold">user</h1>
                          <h2><?php echo $ju ?></h2>

                      </div>
                      <span id="open" class="w-[36px] h-[36px] bg-neutral_050 rounded-full flex items-center justify-center cursor-pointer -mr-2">
                          <span class="bg-neutral_900 w-3.5 h-[2px] rounded-full"></span>
                          <span id="plus" class="bg-neutral_800 w-[2px] h-3.5 absolute rounded-full"></span>
                      </span>
                  </div>
                  <span id="garis" class="w-full mx-auto mt-5 -top-4 h-[2px] bg-neutral_600 rounded-full"></span>
                  <div class="w-full mx-auto relative block h-[360px] overflow-y-auto mt-2" id="table">
                      <table class="w-full">
                          <thead class="bg-neutral_800 sticky top-0">
                              <tr class="font-semibold ">
                                  <th scope="col" class="text-left relative">
                                      <div class="flex flex-row gap-x-3 items-center">
                                          <i class="fa-solid fa-magnifying-glass "></i>
                                          <input type="text" id="search" name="search" class="border-none font-normal text-base bg-transparent  outline-none placeholder:text-neutral_400 placeholder:pl-0.5  placeholder:font-noto-sans placeholder:text-base" placeholder="Search">
                                      </div>
                                  </th>
                                  <th scope="col" class="text-left  ">
                                      <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900">
                                          <h1 class=" uppercase">No. Hp</h1>
                                          <i class="fa-solid fa-angle-up"></i>
                                      </button>
                                  </th>
                                  <th scope="col" class="text-left  ">
                                      <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                          <h1 class="uppercase">Saldo</h1>
                                          <i class="fa-solid fa-angle-up"></i>
                                      </button>
                                  </th>
                                  <th scope="col" class="text-left  ">
                                      <button class="flex flex-row items-center mx-auto gap-x-7 bg-neutral_050 rounded-xl py-1 px-2 text-neutral_900 ">
                                          <h1 class="uppercase">Play Time</h1>
                                          <i class="fa-solid fa-angle-up"></i>
                                      </button>
                                  </th>
                                  <th scope="col" class="text-left  ">
                                      <button onclick="showItems()" id="btn-option" class="flex flex-row items-center mx-auto gap-x-3 bg-transparent hover:bg-neutral_600 rounded-xl py-1 px-2 text-neutral_100 drop">
                                          <h1 class="capitalize font-normal">option</h1>
                                          <i class="fa-solid fa-caret-down"></i>
                                      </button>
                                  </th>
                              </tr>
                          </thead>
                          <tbody class="overflow-y-hidden">
                              <!-- list 1 start -->
                              <?php
                                $row = 0;
                                while ($row < count($tb_user)) { ?>
                                  <input id="userid" type="hidden" value="<?php echo $tb_user[$row]['user_id'] ?>">
                                  <tr class="">
                                      <td class="flex flex-row gap-x-3 pb-5">
                                          <div class="form-control ml-[5px]">
                                              <h1 class="font-semibold font-noto-sans text-xl my-auto"><?php echo $row + 1 ?></h1>
                                          </div>
                                          <div class="rounded-full w-[42px] h-[42px] bg-error_050 flex flex-row items-center justify-center">
                                              <img src="<?php echo $tb_user[$row]['img'] ?>" alt="" class="rounded-full w-full h-full object-cover">
                                          </div>
                                          <div class="flex flex-col gap-y-1 ml-2">
                                              <h1 class="font-semibold"><?php echo $tb_user[$row]['username'] ?></h1>
                                              <h2 class="text-neutral_400 text-xs"><?php echo $tb_user[$row]['email'] ?></h2>
                                          </div>
                                      </td>
                                      <td class="text-center"><?php echo $tb_user[$row]['hp'] ?></td>
                                      <td class="text-center"><?php echo $tb_user[$row]['saldo'] ?></td>
                                      <td class=" text-center"><?php echo $tb_user[$row]['playtime'] ?></td>
                                      <td class=" text-center">
                                          <button id="topup" value="<?php echo $tb_user[$row]['username'] ?>" class="h-[36px] bg-neutral_050 rounded-full p-4 flex flex-row items-center justify-center mx-auto gap-2">
                                              <h1 class="text-neutral_900 font-semibold">Topup</h1>
                                              <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M0 16H2.66667C2.66667 17.44 4.49333 18.6667 6.66667 18.6667C8.84 18.6667 10.6667 17.44 10.6667 16C10.6667 14.5333 9.28 14 6.34667 13.2933C3.52 12.5867 0 11.7067 0 8C0 5.61333 1.96 3.58667 4.66667 2.90667V0H8.66667V2.90667C11.3733 3.58667 13.3333 5.61333 13.3333 8H10.6667C10.6667 6.56 8.84 5.33333 6.66667 5.33333C4.49333 5.33333 2.66667 6.56 2.66667 8C2.66667 9.46667 4.05333 10 6.98667 10.7067C9.81333 11.4133 13.3333 12.2933 13.3333 16C13.3333 18.3867 11.3733 20.4133 8.66667 21.0933V24H4.66667V21.0933C1.96 20.4133 0 18.3867 0 16Z" fill="#303030" />
                                              </svg>
                                          </button>
                                      </td>
                                  </tr>
                              <?php $row++;
                                }
                                ?>
                              <!-- list 1 end -->
                          </tbody>
                      </table>
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

      const openTable = () => {
          open.addEventListener("click", function() {
              if (atas.classList.contains('h-[77px]')) {
                  localStorage.setItem("open-table", "true");
              } else {
                  localStorage.setItem("open-table", "false");
              }
              themeMode();
          });

          function themeMode() {
              if (localStorage.getItem("open-table") == "false") {
                  garis.classList.add('hidden');
                  plus.classList.add('hidden');
                  table.classList.add('hidden');
                  atas.classList.remove('h-[450px]');
                  atas.classList.add('h-[77px]');
              } else {
                  setTimeout(() => {
                      table.classList.remove('hidden');
                      garis.classList.remove('hidden');
                      plus.classList.remove('hidden');
                      garis.classList.add('ease-in-out');
                      table.classList.add('ease-in-out');
                      atas.classList.add('h-[450px]');
                      atas.classList.remove('h-[77px]');
                  }, 100);
              }
          }
          if (localStorage.getItem("open-table") !== null) {
              themeMode();
          }
          if (atas.classList.contains("h-[450px]")) {
              open.checked = true;
          }
      }
      openTable();
  </script>