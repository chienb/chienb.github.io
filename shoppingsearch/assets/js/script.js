$(document).ready(function(){

    var saveTimer,
        searchBox = $('#q'),
        products =  $('#products'),
        message = $('#message'),
        preloader = $('#preload');

    preloader.css('visibility','hidden');

    searchBox.on('input',function(e){

        // Clearing the timeout prevents
        // saving on every key press
        clearTimeout(saveTimer);

        // If the field is not empty, schedule a search
        if($.trim(searchBox.val()).length > 0) {
            saveTimer = setTimeout(ajaxProductsSearch, 2000);
        }
    });

    $('form').submit(function(e){
        e.preventDefault();

        if($.trim(searchBox.val()).length > 0) {
            clearTimeout(saveTimer);
            ajaxProductsSearch();
        }
    });

    function ajaxProductsSearch(){

        products.empty();
        preloader.css('visibility','visible');

        // Issue a request to the proxy
        $.post('test.php', {
            'search' : searchBox.val()
        },
        function($results) { // pass $results from test.php?

            // console.log($results);
            if($results.results_count == 0){

                preloader.css('visibility','hidden');
                message.html("We couldn't find anything!").show();
                return false;
            }

            $.each($results.results, function(i,item) { // code to display in view?

                
                var html = '<a class="product" data-price="$ '+$results.results[i].price+'" href="'+$results.results[i].sitedetails[0].url+'" target="_blank">';
                
                console.log($results);
                // If the product has images
                if($results.results[i].images && $results.results[i].images.length > 0){
                    html += '<img alt="'+$results.results[i].name+'" src="'+ $results.results[i].images+'"/>';
                }

                html+='<span>'+$results.results[i].name.substr(0, 20)+'</span></a> ';
                products.append(html);
            });

            preloader.css('visibility','hidden');

        },'json');  
    }

});