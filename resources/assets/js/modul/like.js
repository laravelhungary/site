var btn;
$(document).on('click', '.like', function (event) {
    event.preventDefault();
    var action = $(this).attr('data-action');
    var comment = $(this).attr('data-comment');
    btn = $(this);
    $.post(action, {comment: comment}, function (result) {

    }).done(function (result) {
        if (btn.hasClass('active')) {
            btn.removeClass('active');
            btn.attr('data-original-title', 'Tetszik a hozzászólás.');
            return true;
        }
        btn.addClass('active');
        btn.attr('data-original-title', 'Mégsem tetszik a hozzászólás.')
        return true;
    }).fail(function (result) {
        console.error('Hiba történt a lájkolásnál: ' + result.statusText);
    });
});
