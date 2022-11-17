<?php
if(isset($_POST['napthe']))
{ //TUANORIIT
    $mathe = $_POST['mathe'];
    $seri =  $_POST['seri'];
    $amount =  $_POST['amount'];
    $type =  $_POST['type'];
    if(!$mathe | !$seri)
    {
        echo 'Vui lòng nhập đầy đủ thông tin';
    }
    function curl_get($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        
        curl_close($ch);
        return $data;
    }
    $code = rand(11111111,99999999999);
    $id = '63630455476';
    $key = '7ad7889f1ceb3f65a130b07bb320baaa';
    $url = 'https://shopthe.vn.com/chargingws/v2?sign='.md5($key.$mathe.$seri).'&telco='.$type.'&code='.$mathe.'&serial='.$seri.'&amount='.$amount.'&request_id='.$code.'&partner_id='.$id.'&command=charging';
    $xuly = json_decode(curl_get($url), true);
    if($xuly['status'] == 99)
    {
        echo 'Gửi thẻ thành công';
    }
    else
    {
        echo $xuly['message'];
    }
}
?>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<form method="POST">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Mã Thẻ</label>
    <div class="col-sm-10">
      <input type="text" name="mathe" class="form-control" id="inputEmail3" placeholder="mã thẻ">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Seri </label>
    <div class="col-sm-10">
      <input type="text" name="seri" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Loại thẻ</label>
    <div class="col-sm-10">
        <select class="form-control" name="type">
            <option value="VIETTEL">VIETTEL</option>
            <option value="VINAPHONE">VINAPHONE</option>
        </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Mệnh giá</label>
    <div class="col-sm-10">
        <select class="form-control" name="amount">
            <option value="50000">50.000</option>
            <option value="100000">100.000</option>
        </select>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="napthe" class="btn btn-primary">Gửi thẻ</button>
    </div>
  </div>
</form>