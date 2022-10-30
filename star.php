<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

</head>
<body>
    <div class="container">
        <div class="row">
            <form action="star.php" method="post">
                <div>
                    <h3>sistema rating</h3>
                </div>
                <div>
                    <label>nombre</label>
                    <input type="text" name="name">
                </div>

                <div class="rateyo" id=rating
                    data-rateyo-rating="4"
                    data-rateyo-num-stars="5"
                    data-rateyo-score="3">
                </div>

                <span class="result">0</span>
                <input type="hidden" name="rating">
                </div>

                <div>
                    <input type="submit" name="add">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script>
      $(function () {
 
 $(".rateYo").rateYo().on("rateyo.change", function (e, data) {

               var rating = data.rating;
               $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
               $(this).parent().find('.result').text('rating :'+ rating);
               $(this).parent().find('input[name=rating]').val(rating);
             });
});  
        </script>
</body>
</html>