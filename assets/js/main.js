/*-------------------------------------------------------------
variable
-------------------------------------------------------------*/
const username = document.getElementById("username").value;
const usernameLabel = document.getElementById("usernameLabel");
const password = document.getElementById("password").value;
const passwordLabel = document.getElementById("passwordLabel");

const open = document.getElementById("open");
const atas = document.getElementById("atas");
const table = document.getElementById("table");
const garis = document.getElementById("garis");
const plus = document.getElementById("plus");

const open2 = document.getElementById("open2");
const atas2 = document.getElementById("atas2");
const table2 = document.getElementById("table2");
const garis2 = document.getElementById("garis2");
const plus2 = document.getElementById("plus2");

const open3 = document.getElementById("open3");
const atas3 = document.getElementById("atas3");
const table3 = document.getElementById("table3");
const garis3 = document.getElementById("garis3");
const plus3 = document.getElementById("plus3");
/*-------------------------------------------------------------
Input fields
-------------------------------------------------------------*/
// window loader id = loader

// window.addEventListener("load", () => {
//   document.querySelector(".js-page-loader").classList.add("fade-out");
//   setTimeout(() => {
//     document.querySelector(".js-page-loader").style.display = "none";
//   }, 600);
// });
// document.onreadystatechange = function () {
//   if (document.readyState !== "complete") {
//     document.getElementsByTagName("main").style.visibility = "hidden";
//     document.querySelector("#loader").style.visibility = "visible";
//   } else {
//     document.querySelector("#loader").style.display = "none";
//     document.getElementsByTagName("main").style.visibility = "visible";
//   }
// };

/*-------------------------------------------------------------
show password
-------------------------------------------------------------*/
const show = () => {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("showimg").classList.add("hidden");
    document.getElementById("hideimg").classList.remove("hidden");
  } else {
    x.type = "password";
    document.getElementById("showimg").classList.remove("hidden");
    document.getElementById("hideimg").classList.add("hidden");
    labelInput.classList.remove("text-transparent");
  }
};

/*-------------------------------------------------------------
toggle switch color
-------------------------------------------------------------*/

/*-------------------------------------------------------------
clock
-------------------------------------------------------------*/
const clock = () => {
  const today = new Date();
  const h = today.getHours();
  const m = today.getMinutes();
  const s = today.getSeconds();

  document.getElementById("hours").innerHTML = h;
  document.getElementById("minutes").innerHTML = m;
  document.getElementById("seconds").innerHTML = s;
};
setInterval(clock, 10);
/*-------------------------------------------------------------
table
-------------------------------------------------------------*/
const openTable = () => {
  open.addEventListener("click", function () {
    if (atas.classList.contains("h-[77px]")) {
      localStorage.setItem("open-table", "true");
    } else {
      localStorage.setItem("open-table", "false");
    }
    themeMode();
  });

  function themeMode() {
    if (localStorage.getItem("open-table") == "false") {
      garis.classList.add("hidden");
      plus.classList.add("hidden");
      table.classList.add("hidden");
      atas.classList.remove("h-[450px]");
      atas.classList.add("h-[77px]");
    } else {
      setTimeout(() => {
        table.classList.remove("hidden");
        garis.classList.remove("hidden");
        plus.classList.remove("hidden");
        garis.classList.add("ease-in-out");
        table.classList.add("ease-in-out");
        atas.classList.add("h-[450px]");
        atas.classList.remove("h-[77px]");
      }, 100);
    }
  }
  if (localStorage.getItem("open-table") !== null) {
    themeMode();
  }
  if (atas.classList.contains("h-[450px]")) {
    open.checked = true;
  }
};

const openTable2 = () => {
  open2.addEventListener("click", function () {
    if (atas2.classList.contains("h-[77px]")) {
      localStorage.setItem("open-table2", "true");
    } else {
      localStorage.setItem("open-table2", "false");
    }
    themeMode();
  });

  function themeMode() {
    if (localStorage.getItem("open-table2") == "false") {
      garis2.classList.add("hidden");
      plus2.classList.add("hidden");
      table2.classList.add("hidden");
      atas2.classList.remove("h-[450px]");
      atas2.classList.add("h-[77px]");
    } else {
      setTimeout(() => {
        table2.classList.remove("hidden");
        garis2.classList.remove("hidden");
        plus2.classList.remove("hidden");
        garis2.classList.add("ease-in-out");
        table2.classList.add("ease-in-out");
        atas2.classList.add("h-[450px]");
        atas2.classList.remove("h-[77px]");
      }, 100);
    }
  }
  if (localStorage.getItem("open-table2") !== null) {
    themeMode();
  }
  if (atas2.classList.contains("h-[450px]")) {
    open2.checked = true;
  }
};
openTable2();

const openTable3 = () => {
  open3.addEventListener("click", function () {
    if (atas3.classList.contains("h-[77px]")) {
      localStorage.setItem("open-table3", "true");
    } else {
      localStorage.setItem("open-table3", "false");
    }
    themeMode();
  });

  function themeMode() {
    if (localStorage.getItem("open-table3") == "false") {
      garis3.classList.add("hidden");
      plus3.classList.add("hidden");
      table3.classList.add("hidden");
      atas3.classList.remove("h-[450px]");
      atas3.classList.add("h-[77px]");
    } else {
      setTimeout(() => {
        table3.classList.remove("hidden");
        garis3.classList.remove("hidden");
        plus3.classList.remove("hidden");
        garis3.classList.add("ease-in-out");
        table3.classList.add("ease-in-out");
        atas3.classList.add("h-[450px]");
        atas3.classList.remove("h-[77px]");
      }, 100);
    }
  }
  if (localStorage.getItem("open-table3") !== null) {
    themeMode();
  }
  if (atas3.classList.contains("h-[450px]")) {
    open3.checked = true;
  }
};
openTable3();

// sorting table by column
// const table = document.querySelector('.table');
// const tbody = table.querySelector('tbody');
// const thead = table.querySelector('thead');
// const ths = thead.querySelectorAll('th');
// const tds = tbody.querySelectorAll('td');
// const trs = tbody.querySelectorAll('tr');
// const tfoot = table.querySelector('tfoot');

// ths.forEach((th, index) => {
//     th.addEventListener('click', () => {
//         const sortedRows = Array.from(trs).sort((a, b) => {
//             const aColText = a.querySelector(`td:nth-child(${index + 1})`).textContent.trim();
//             const bColText = b.querySelector(`td:nth-child(${index + 1})`).textContent.trim();
//             return aColText > bColText ? 1 : -1;
//         });
//         tbody.append(...sortedRows);
//     });
// });

// // search table
// const search = document.querySelector('.search');
// search.addEventListener('input', (e) => {
//     const searchText = e.target.value;
//     const rows = tbody.querySelectorAll('tr');
//     rows.forEach((row) => {
//         const rowText = row.textContent;
//         if (rowText.toLowerCase().includes(searchText.toLowerCase())) {
//             row.style.display = 'table-row';
//         } else {
//             row.style.display = 'none';
//         }
//     });
// });

// // select all checkbox
// const selectAll = document.querySelector('.select-all');
// selectAll.addEventListener('click', (e) => {
//     const checkboxes = tbody.querySelectorAll('input[type="checkbox"]');
//     checkboxes.forEach((checkbox) => {
//         checkbox.checked = e.target.checked;
//     });
// });
