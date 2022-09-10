perintah - perintah model manipulasi database

1. menampilkan isi table = <namamodel>::all()
2. menambahkan isi table = <namamodel>::create(['<namakolom>' => <namadata>] ..... n)
3. mengubah isi table = <namamodel>::where('id', <nilaiid>)->update(['<namakolom>' => <namadata>] ..... n)
4. menghapus isi table =  <namamodel>::destroy('id', <nilaiid>)

