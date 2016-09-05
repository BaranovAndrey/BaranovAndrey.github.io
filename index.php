<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My page</title>

        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css" rel="stylesheet">
        
    </head>
    <body>
    
    	<?php require('partials/header.php'); ?>

    	<div id="content">
    	
    	</div>

    	<?php require('partials/footer.php'); ?>
        
        <script src="https://use.fonticons.com/ffe176a3.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
        <script>

			lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
            })


            function loadPageContent(pageName)
			{
                // Active links 
                $('.navbar-primary').find('li').removeClass('active');
                $('.navbar-primary').find('a[href="'+pageName+'"]').closest('li').addClass('active');

                if(pageName == '/')
                {
                    pageName = '/home';
                }

                var postObj = $.post('pages'+pageName+'.html')
                postObj.done(function(response)
                {  
                    $('#content').html(response);
                });
			}

            $(".load-page").click(function(e)
            {
                e.preventDefault();

                loadPageContent($(this).attr('href'));

                window.history.pushState('forward', null, $(this).attr('href'));
            });

            $(window).on('popstate', function()
            {
                loadPageContent(window.location.pathname);  
            }).trigger('popstate');
            
        </script>
    </body>
</html>