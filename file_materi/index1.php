<form name="form1" method="post" action="proses.php">
  <table width="371" border="0" align="center">
  	<td colspan="3" align="center">Input Nilai Mahasiswa</td>
    <tr>
      <td width="70">Nim</td>
      <td width="3">:</td>
      <td width="287"><label for="nim"></label>
      <input type="text" name="nim" id="nim"></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><label for="nim"></label>
      <input type="text" name="nm" id="nm"></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><label for="alm"></label>
      <input type="text" name="alm" id="alm"></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td>:</td>
      <td><label for="jk"></label>
        <select name="jk" id="jk">
          <option>Laki-laki</option>
          <option>Perempuan</option>
      </select></td>
    </tr>
    <tr>
      <td>Jurusan</td>
      <td>:</td>
      <td><input type="text" name="jrs" id="jrs"></td>
    </tr>
    <tr>
      <td>Mata Kuliah</td>
      <td>:</td>
      <td><input type="text" name="mk" id="mk"></td>
    </tr>
    <tr>
      <td>Kelas</td>
      <td>:</td>
      <td><label for="kelas"></label>
        <select name="kelas" id="kelas">
          <option>KELAS1</option>
          <option>KELAS2</option>
          <option>KELAS3</option>
      </select></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td><label for="ket"></label>
      <textarea name="ket" id="ket" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Nilai</td>
      <td>:</td>
      <td><input type="text" name="nilai" id="nilai"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Proses">
      <input type="reset" name="button2" id="button2" value="Reset"></td>
    </tr>
  </table>
</form>
