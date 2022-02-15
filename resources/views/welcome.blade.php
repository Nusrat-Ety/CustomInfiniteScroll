<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custome Infinite Scroll</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
  <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h2>custom Infinite Scroll</h2>
                </div>
            <div class="col-md-12"id="custom-scroll">
                @include('data')
            </div>
        </div>
        </div>
</section> 
<div class="ajax-load text-center"style="display:none">
<p><img src="{{asset('img/loading.gif')}}" />loading more users</p>

</div> 
</body>
</html>
    <script>
        function loadMoreData(page){
            $.ajax({
                url:'/?page='+page,
                type:'get',
                beforeSend:function(){
                    $(".ajax-load").show();
                }
            })
            .done(function(data){
                if(data.html == ""){
                    $('.ajax-load').html("no data found!");
                    return;
                }
                $('.ajax-load').hide();
                $("#custom-scroll").append(data.html);
                page++;
            })
            .fail(function(jqXHR,ajaxOptions,thrownError){
                alert("server not working!");
            });
        }
        var page = 1;
        $(window).scroll(function(){
            if($(window).scrollTop() + $(window).height() >= $(document).height() - 100){
                page++;
                loadMoreData(page);
            }
        });
        </script>