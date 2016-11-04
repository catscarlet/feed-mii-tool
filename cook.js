$(document).ready(function() {
    $('.ingredients').on('click', function(events) {
        var obj = $(events.target);
        if (obj.hasClass('ingredients-selected')) {
            obj.removeClass('ingredients-selected');
        } else {
            obj.addClass('ingredients-selected');
        }
    });

    $('.button-collapse').sideNav();
    
    $('#cook').on('click', calc);

    $(document).ready(function() {
        $('.modal').modal();
    });
});

function calc() {
    var sum = 0;
    var obj = $('.ingredients');
    obj.each(function() {
        if ($(this).hasClass('ingredients-selected')) {
            sum = sum + parseInt(this.parentNode.id);
        }
    });
    console.log(sum);

    var data = {
        sum: sum,
        table: 1
    };

    $.ajax({
        type: 'POST',
        url: 'getAvaliableRecipeByIngredients.php',
        data: data,
        dataType: 'html',
        async: true,
        success: function(msg) {
            Materialize.toast('Cooked!', 4000);
            $('#table').html(msg);
            console.log(msg);
        },
        error: function() {
            console.log(msg);
        }
    });
}
