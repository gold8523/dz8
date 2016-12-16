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
            id: $('#getGoods').val(),
            name: "getGoods"
        },
        method: "POST",
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
            id: $('#getCategories').val(),
            name: "getCategories"
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
            id: $('#putGoods').val(),
            name: "putGoods"
        },
        method: "POST",
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
            id: $('#delGoods').val(),
            name: "delGoods"
        },
        method: "POST",
        error:function (xhr, ajaxOptions, thrownError) {
            $('.result').html(xhr.responseText);
        }
    }).done(function (data) {
        $('.result').html(data);
    })
})