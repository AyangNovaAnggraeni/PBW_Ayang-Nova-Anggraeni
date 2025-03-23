// external javascript
function salam() 
{
    alert("Selamat datang di website kami!");
}
  

// Variabel dan Tipe Data dalam JavaScript
// Variabel dalam JavaScript

// a. let
function contohLet() 
{
    let y = 10;
    if (true) {
        let y = 20;
        console.log("Nilai dalam blok:", y);
    }
    console.log("Nilai luar blok:", y);
}
contohLet();

// b. const
const z = 100;
z = 200; // Akan menyebabkan error

// c. tipe data
let nama = "Budi"; // String
let umur = 30; // Number
let isStudent = false; // Boolean
let buah = ["Apel", "Mangga", "Jeruk"]; // Array
let mahasiswa = { nama: "Rina", usia: 20, jurusan: "Informatika" }; // Object
console.log(nama);  // Output: Budi
console.log(buah[1]); // Output: Mangga
console.log(mahasiswa.jurusan); // Output: Informatika

