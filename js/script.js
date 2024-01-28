const navMobile = document.querySelector(".navHam1");
const menu = document.querySelector(".mMenu");
const pfp = document.querySelector(".pfpMenu");
const pfpBtn = document.querySelector(".pfpBtn");

menu.addEventListener("click", () => {
  navMobile.classList.toggle("hidden");
});

pfpBtn.addEventListener("click", () => {
  pfp.classList.toggle("hidden");
});

// var keyword = document.getElementById('keyword');
// var tombolCari = document.getElementById('tombol-cari');
// var container = document.getElementById('container');

// keyword.addEventListener('keyup', function(){
//   //buat object ajax
//   var xhr = new XMLHttpRequest();

//   //cek kesiapan ajax
//   xhr.onreadystatechange = function(){
//     if( xhr.readyState == 4 && xhr.status == 200) {
//       container.innerHTML = xhr.responseText;
//     }
//   }

//   xhr.open('GET', 'ajax/mahasiswa.php?keywor=' + keyword.value, true);
//   xhr.send();

// });

// script.js

// function searchAdmins() {
//   var keyword = $('#keyword').val();

//   $.ajax({
//     type: 'POST',
//     url: '../query/search.php', // Replace with the actual path to your search script
//     data: { keyword: keyword },
//     success: function (data) {
//       $('#search-results').html(data);
//     }
//   });
// }
