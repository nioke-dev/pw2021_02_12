const tombolCari = document.querySelector('.tombol-cari');
// jadi ini artinya javascript tolong carikan saya element yang nama selectornya adalah .tombol-cari
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');


// hilangkan tombol cari
tombolCari.style.display = 'none';


// event ketika kita menulisakan keyword
keyword.addEventListener('keyup', function () {
  // ini maksudnya degarkan sebuah event ketika kita ngapain
  // jadi yang terjadi adalah ketika keyup kita akan jalanin sebuah function()
  // keyup = ketika kita menuliskan sesuatu lalu melepas tombol keyboardnya
  // saya memilih keyup supaya menghindari ketika tombolnya gk sengaja kepencet misalnya maka itu nanti akan terus terusan melakukan request
  // kalau keyup meskipun tombolnya kepencet yang terjadi hanya 1 kali ketika tombolnya kita lepas aja
  // // ajax
  // const xhr = new XMLHttpRequest();
  // // jadi secara singkatnya ajax itu adalah bagaimana cara kita untuk melakukan request terhadap sebuah sumber, sumbernya bisa halaman lain bisa website lain tanpa melakukan refresh pada halaman
  // xhr.onreadystatechange = function () {
  //   if (xhr.readyState == 4 && xhr.status == 200) {
  //     container.innerHTML = xhr.responseText
  //   }
  // };
  // xhr.open('get', 'ajax/ajax_cari.php?keyword=' + keyword.value);
  // // pertama methodnya mau apa
  // // lalu yang kedua kita akan request kemana ajax ini
  // // keyword.value artinya apapun yang ada di dalam keyword akan dikirimkan ke ajax_cari.php
  // xhr.send();
  // // lalu jalankan ajaxnya


  // fetch()
  fetch('ajax/ajax_cari.php?keyword=' + keyword.value) // sebenernya begini ajah sudah melakukan request tapi data yang dikembalikan belom sesuai dengan keinginan kita
    // jadi kita harus tambahkan....
    .then((response) => response.text())
    // jadi kalau datanya dikembalikan respon yang didapatkan itu kita jalankan kedalam sebuah function namanya response.text
    .then((response) => (container.innerHTML = response));
  // lalu kalau sudah dapet response nya kita then sekali lagi (response) baru sekarang container.innerHTMLnya diisi dengan response nya
});



// preview image untuk tambah dan ubah
function previewImage() {
  const gambar = document.querySelector('.gambar');
  const imgPreview = document.querySelector('.img-preview');

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
  // jadi kita akan memanggil sebuah class filereader untuk membaca file yang kita upload
  // lalu nanti file tadi akan kita simpan untuk menggantikan src dari imgPreview
  // src yang tadinya nophoto akan digantikan preview dari gambar yang baru
}