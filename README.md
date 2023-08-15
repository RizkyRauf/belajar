# ERP data pegawai

**Project ERP ini dibuat untuk keperluan belajar**, anda dapat membantu berkontribusi untuk mengembangkan aplikasi ini.
 
## Berikut adalah package dan bahasa yang di gunakan pada project ini.
	- **PHP 8^**
	- **Laravel 10**
	- **Boostrap 5**
	- **Fontawesome V5**
## Cara untuk melakukan cloning
 
1.  ```
    git clone https://github.com/RizkyRauf/belajar.git
    ```

2. Pastikan anda sudah menginstal composer. jika anda belum melakukan instalasi, anda dapat mengikuti langkah di bawah.
    	- [Install Composer Linux](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)
    	- [Install Composer Windows](https://getcomposer.org/doc/00-intro.md#installation-windows)
      
	- setelah anda melakukan instalasi composer. masuk kedalam folder project anda dan lakukan perintah dibawah ini.
	    ```
	    composer install
	    ```
 
3. masuk kedalam folder project laravel lalu masukan perintah di bawah di terminal anda.
	    - untuk anda pengguna Windows anda dapat malakukan langkah berikut ini.
		```
    		cp .env.example .env
    		```
	    - untuk anda pengguna Linux anda dapat melakukan langkah berikut ini.     
		    ```
		    .env.example .env
		    ```

4. langkah selanjutnya anda dapat menjalankan perintah 
	
	```
	php artisan key: generate
	```

5. setelah anda melakukan perintah di atas, cek kembali .env anda, untuk memastikan apakah anda sudah membuat nama database yang sama dengan .env anda. jika anda merasa sudah membuatnya sama dengan .env anda, anda bisa melakukan perintah berikut ini.

	```
	php artisan migrate
	```
	
6. Jika anda sudah melakukan dan perintah semua di atas, anda bisa melakukan perintah di bawah ini.
	```
	php artisan ser
	```
