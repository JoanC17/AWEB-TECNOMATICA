function iniciarMap(){
    var coord = {lat:17.99030764418843 ,lng: -92.91647979984545};
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 15,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}
