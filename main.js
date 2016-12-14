$('#but').on('click', function() {
    console.log('work');
    $.ajax({
        url: 'get.php'
    }).done(function (data) {
        $('.result').html(data);
    })
})