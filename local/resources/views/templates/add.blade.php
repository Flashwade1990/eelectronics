 <?php $i = 0; 
$summa = 0;?>

<?php $a = $product->feature;
    foreach ($a as $one){
        $summa += $one->rate; 
        $i++;
        $summa/$i;
  }
  if($summa !== 0){
  $rating = round($summa/$i, 0, PHP_ROUND_HALF_UP);
}
  else {
    $rating = 0;
  }

switch ($rating) {
                                            case '1':
                                               $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '2':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '3':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '4':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '5':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>';
                                                break;
                                            default:
                                                 $first = '<i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                            break;

                                        }


?>