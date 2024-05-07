# TP4DPBO2024C2
## Janji
Saya ilham akbar NIM [2201017] mengerjakan Tugas Praktikum 4 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## desain program

### Tabel Member

Tabel `member` berfungsi sebagai tempat penyimpanan data member. Setiap baris dalam tabel ini merepresentasikan satu member dengan detail seperti nama, email, nomor telepon, tanggal bergabung, id kota, dan id tipe keanggotaan. Tabel ini adalah pusat dari aplikasi, karena hampir semua operasi yang dilakukan dalam aplikasi ini berhubungan dengan data member.

### Tabel City

Tabel `city` berfungsi untuk menyimpan data tentang kota. Setiap baris dalam tabel ini merepresentasikan satu kota. Tabel ini relevan karena setiap member yang ada dalam tabel `member` berasal dari salah satu kota yang ada dalam tabel ini. Dengan demikian, tabel ini memungkinkan aplikasi untuk melacak asal kota dari setiap member.

### Tabel Membership

Tabel `membership` berfungsi untuk menyimpan data tentang tipe keanggotaan. Setiap baris dalam tabel ini merepresentasikan satu tipe keanggotaan. Tabel ini relevan karena setiap member yang ada dalam tabel `member` memiliki salah satu tipe keanggotaan yang ada dalam tabel ini. Dengan demikian, tabel ini memungkinkan aplikasi untuk melacak tipe keanggotaan dari setiap member.

- `MemberView`: Kelas ini berfungsi sebagai jembatan antara pengguna dan data member. Metode `render` dalam kelas ini menerima data member dan mengubahnya menjadi tabel HTML yang informatif dan mudah dibaca.

- `AddMemberView`: Kelas ini berfungsi sebagai pintu masuk untuk menambahkan member baru. Metode `render` dalam kelas ini menerima data yang diperlukan untuk form dan menghasilkan form HTML yang intuitif dan ramah pengguna.

- `editMemberView`: Kelas ini berfungsi sebagai alat untuk mengedit data member. Metode `render` dalam kelas ini menerima data member yang akan diedit dan data yang diperlukan untuk form, lalu menghasilkan form HTML yang memudahkan proses pengeditan.

- `index.php`: File ini berfungsi sebagai titik awal aplikasi. File ini mencakup file-file yang diperlukan, membuat objek `MemberController`, dan memanggil metode yang sesuai berdasarkan permintaan pengguna.

- `Member.controller.php`: File ini berisi definisi kelas `MemberController`. Kelas ini berisi metode-metode yang menangani permintaan pengguna, seperti menampilkan data member, menambahkan member baru, mengedit data member, dan menghapus member.

- `Member.class.php`: File ini berisi definisi kelas `Member` yang merupakan model dalam pola MVC. Kelas ini berisi metode-metode untuk berinteraksi dengan database, seperti mendapatkan data member, menambahkan member baru, mengedit data member, dan menghapus member.

Untuk tabel lain seperti `city` dan `membershiptype`, alurnya kurang lebih sama seperti `member`. Sedangkan untuk `edit.php` dan `tambah.php`, file-file ini berfungsi sebagai titik masuk ke dalam formnya.

# Alur Program 

Aplikasi web ini memiliki operasi CRUD (Create, Read, Update, Delete) untuk masing-masing tabel: `member`, `city`, dan `membership`. Berikut ini adalah penjelasan alur program:

1. **Read/Show**: Data dari masing-masing tabel ditampilkan dalam bentuk tabel. Pengguna dapat melihat data `member`, `city`, dan `membership` dalam tampilan yang rapi dan informatif.

2. **Create/Add**: Jika pengguna ingin menambahkan data baru, mereka akan diarahkan ke form. Setelah pengguna memasukkan data, data tersebut akan dikirim ke database. Proses ini memastikan bahwa data baru berhasil ditambahkan ke dalam tabel yang relevan.

3. **Update/Edit**: Proses ini mirip dengan penambahan data, tetapi dengan satu perbedaan utama: data yang akan diedit sudah ada di dalam form sesuai dengan data yang akan pengguna edit. Ketika pengguna mengubah data di form dan mengirimkannya, data di database akan diperbarui sesuai dengan perubahan yang dibuat pengguna.

4. **Delete**: Jika pengguna ingin menghapus data, aplikasi akan langsung mengeksekusi operasi ini. Aplikasi akan mengirimkan id dan perintah delete melalui query ke database, yang akan menghapus data dari tabel yang relevan.


## dokumentasi
### tampilkan tabel
![Screenshot (774)](https://github.com/Ilham9675/TP4DPBO2024C2/assets/117561201/20ffa227-ad5d-41ad-bb7d-1ebaee5d978f)
![Screenshot (765)](https://github.com/Ilham9675/TP4DPBO2024C2/assets/117561201/cee5bb5a-af4a-4cce-89fc-c34edac8f2bc)
![Screenshot (766)](https://github.com/Ilham9675/TP4DPBO2024C2/assets/117561201/1463e2d1-d28e-41da-a4bf-cc5e2caa052f)
### add Data
![Screenshot (767)](https://github.com/Ilham9675/TP4DPBO2024C2/assets/117561201/66c4140d-e307-420d-92fc-ce1fd09d1d31)
![Screenshot (768)](https://github.com/Ilham9675/TP4DPBO2024C2/assets/117561201/8b66112d-a977-4476-bfcb-95c10a314f86)
![Screenshot (775)](https://github.com/Ilham9675/TP4DPBO2024C2/assets/117561201/8b4455da-8f38-4f1a-9015-9cd2953f521f)
### update Data
![Screenshot (770)](https://github.com/Ilham9675/TP4DPBO2024C2/assets/117561201/b7d78be6-0308-4c35-9df1-65dfc5370e6f)
![Screenshot (771)](https://github.com/Ilham9675/TP4DPBO2024C2/assets/117561201/17317c3d-1927-4442-aa45-bf87b931a05a)
![Screenshot (772)](https://github.com/Ilham9675/TP4DPBO2024C2/assets/117561201/7d653fd8-a0b8-4bf2-baab-f8d6b9bd3d81)