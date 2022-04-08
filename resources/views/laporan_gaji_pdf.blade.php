<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Slip</title>
    

    
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        
      </div>
      <h1>INVOICE </h1>
      <div id="company" class="clearfix">
        <div style="text-transform:capitalize">Nama : {{$nama}} ({{$jabatan}})</div>
      </div>
      <br><br><br>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">SERVICE</th>
            <th class="desc">______________</th>
            <th>______________</th>
            <th>____________</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Total Jam Kerja</td>
            <td class="desc"></td>
            <td class="unit"></td>
            <td></td>
            <td class="total">{{$jamkerja}}</td>
          </tr>
          <tr>
            <td class="service">Total Jam Lembur</td>
            <td class="desc"></td>
            <td class="unit"></td>
            <td></td>
            <td class="total">{{$jamlembur}}</td>
          </tr>
          <tr>
            <td class="service">Total Potongan</td>
            <td class="desc"></td>
            <td class="unit"></td>
            <td></td>
            <td class="total">{{$totalpotongan}}</td>
          </tr>
          <tr>
            <td class="service">Tunjangan</td>
            <td class="desc"></td>
            <td class="unit"></td>
            <td></td>
            <td class="total">{{$tunjangan}}</td>
          </tr>
          
          
          
        </tbody>
      </table>
      <br><br>
      <div id="notices">
        <div>TOTAL GAJI BERSIH</div>
        <div class="notice">{{$totalgajibersih}}</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>