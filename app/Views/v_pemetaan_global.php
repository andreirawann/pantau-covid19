<div class="col-sm-12">
    <div id="mapid" style="height: 550px;"></div>
</div>

<script>
    var mymap = L.map('mapid').setView([20.110575, 11.611622], 2);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
    }).addTo(mymap);

    <?php foreach ($global as $key => $value) { ?>
        L.marker([<?= $value['attributes']['Lat'] ?>, <?= $value['attributes']['Long_'] ?>]).addTo(mymap)
            .bindPopup("Negara : <?= $value['attributes']['Country_Region'] ?><br>" +
                "Positif : <?= number_format($value['attributes']['Confirmed'], 0) ?><br>" +
                "Sembuh : <?= number_format($value['attributes']['Recovered'], 0) ?><br>" +
                "Meninggal : <?= number_format($value['attributes']['Deaths'], 0) ?><br>");
    <?php } ?>
</script>