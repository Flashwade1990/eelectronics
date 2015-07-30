@extends('templates.main')

@section('content')

<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Контакты</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <script>

function initialize() {
  var mapOptions = {
    zoom: 15,
    center: {lat: 53.906, lng: 27.542683}
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var marker = new google.maps.Marker({
    // The below line is equivalent to writing:
    // position: new google.maps.LatLng(-34.397, 150.644)
    position: {lat: 53.906621, lng:  27.542883},
    map: map
  });

  // You can use a LatLng literal in place of a google.maps.LatLng object when
  // creating the Marker object. Once the Marker object is instantiated, its
  // position will be available as a google.maps.LatLng object. In this case,
  // we retrieve the marker's position using the
  // google.maps.LatLng.getPosition() method.
  var infowindow = new google.maps.InfoWindow({
    content: '<p>eElectronics</p>'
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>

	<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Контактная информация</h2>

<p><strong>MTS</strong> +375 (29) 7-429-429</br>

<strong>VELCOM</strong> +375 (44) 7-429-429</br>

<strong>LIFE</strong> +375 (25) 7-734-343</br>

<strong>CITY</strong> +375 (17) 380-55-44</br>

<strong>ICQ</strong> 656163940</br>

<strong>SKYPE</strong> amdshop.by</br>

<strong>EMAIL</strong> amd@amd.by</p>

<p>Онлайн-заказы через сайт AMD.by принимаются круглосуточно! В рабочее время вам перезвонит менеджер для уточнения деталей заказа.</br></br>

<h3>График работы Call-центра:</h3>

    <strong>Пн.</strong> 09:00 – 19:00</br>
    <strong>Вт.</strong> 09:00 – 19:00</br>
    <strong>Ср.</strong> 09:00 – 19:00</br>
    <strong>Чт.</strong> 09:00 – 19:00</br>
    <strong>Пт.</strong> 09:00 – 19:00</br>
    <strong>Сб.</strong> 10:00 – 14:00</br>
    <strong>Вс.</strong> Выходной</p>


<p>По вопросам оптовых закупок пишите: amd@amd.by</br>  

При возникновении гарантийного случая, наличии претензии по качеству или комплектности приобретенной продукции просим вас оставить заявление.
</p>



        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Обратная связь</h2>

                    <h4>Александр</h4>
    <strong>Телефон:</strong> +375 29 3507144</br>
    <strong>E-mail:</strong> flashwadexxx1990@gmail.com</br>
                        </div>
                    </div>
                </div>
<br>
<br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-content-right">

                                <div id="map-canvas"></div> 
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
        </div>



@stop