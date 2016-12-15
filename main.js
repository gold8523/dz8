// $('#but1').on('click', function() {
//     console.log('work');
//     $.ajax({
//         url: 'get.php',
//         data: {
//             id_cat: $('#getCategories').val()
//         },
//         error:function (xhr, ajaxOptions, thrownError) {
//             $('.result').html(xhr.responseText);
//         }
//     }).done(function (data) {
//         $('.result').html(data);
//     })
// })

$('#but').on('click', function() {
    console.log('work');
    $.ajax({
        url: 'route.php',
        data: {
            id: $('#getGoods').val()
        },
        error:function (xhr, ajaxOptions, thrownError) {
            $('.result').html(xhr.responseText);
        }
    }).done(function (data) {
        $('.result').html(data);
    })
})


$('#post').on('click', function() {
    console.log('work');
    $.ajax({
        url: 'route.php',
        data: {
            id: $('#getCategories').val()
        },
        method: "POST",
        error:function (xhr, ajaxOptions, thrownError) {
            $('.result').html(xhr.responseText);
        }
    }).done(function (data) {
        $('.result').html(data);
    })
})

$('#but1').on('click', function() {
    console.log('work');
    $.ajax({
        url: 'route.php',
        data: {
            id: $('#putGood').val()
        },
        method: "PUT",
        error:function (xhr, ajaxOptions, thrownError) {
            $('.result').html(xhr.responseText);
        }
    }).done(function (data) {
        $('.result').html(data);
    })
})

$('#but2').on('click', function() {
    console.log('work');
    $.ajax({
        url: 'route.php',
        data: {
            id: $('#delG').val()
        },
        method: "DELETE",
        error:function (xhr, ajaxOptions, thrownError) {
            $('.result').html(xhr.responseText);
        }
    }).done(function (data) {
        $('.result').html(data);
    })
})