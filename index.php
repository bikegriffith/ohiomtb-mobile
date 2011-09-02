<!DOCTYPE html> 
<html> 
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>OhioMTB Mobile: Ohio Mountain Bike Trail Conditions optimized for mobile devices</title>
    <link rel="stylesheet" href="/themes/default/" />
    <script src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js"></script>
    <style>
        .current { text-align: left; }
        h1 { font-size: 1.3em; text-align: center;  }
        .ui-listview img { left: auto; margin: 10px; position: absolute; right: 10px; }
        .current { position: relative; }
        .current img { float: left; margin: 5px 10px 0 0; }
        .current p { font-weight: bold; font-size: 1.1em; margin-left: 20px; }
        .ui-mobile label { position: absolute; left: -9999px; }
        .ui-input-search, .min-width-480px .ui-input-search { margin: 5px auto; width: auto; float: none; display: block; }
    </style>
    <script>
    $(document).ready(function(){
        $.ajax({
            url: '/api-proxy.php',
            dataType: 'json',
            success: function(data){
                $('#loading').hide();
                $.each(data, function(i, trail){
                    $('#trail-list').append($(renderTrail(trail)));
                });
            }
        });
    });
    function renderTrail(t) {
        return '<li>' +
               '<h3><a href="' + t.update_url + '">' + t.name + '</a></h3>' +
               '<p>' + t.status + ' as of ' + t.modified.toLowerCase() + ' ago</p>' +
               '</li>';
    }
    </script>
</head>
<body>

<div data-role="page" data-theme="a">

    <div data-role="content">
        <h1>Ohio<strong>MTB</strong> Trail Conditions</h1>
        <div id="loading" class="current ui-body ui-bar-a ui-corner-all">
            <p class="condition">Loading latest updates...</p>
        </div>


        <ul id="trail-list" data-role="listview" data-inset="true" data-theme="a">
            <li data-role="list-divider"></li>
        </ul>
    </div>

</div>

</body>
</html>
