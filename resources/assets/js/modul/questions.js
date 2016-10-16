$(document).on('click', 'a#would_like_to_answer', function (event) {
    event.preventDefault();
    var event_link = $(this);
    if ($('#answer_form').hasClass('hidden')) {
        $('#answer_form').removeClass('hidden');
        event_link.html('Űrlap elrejtése');
        return;
    }
    $('#answer_form').addClass('hidden');
    event_link.html('Szeretnék válaszolni neki');

});

$(document).on('click', 'a.solved', function (event) {
    event.preventDefault();
    console.log('Fut a solved.');
    var btn = $(this);
    var action = btn.attr('data-action');
    var comment = btn.attr('data-comment');
    var question = btn.attr('data-question');
    $.post(action, {question: question, comment: comment}, function (result) {
        console.log('Adat küldés.');
    }, 'json')
        .done(function (result) {
            console.log("Sikeres volt a művelet.");
            $(document).find(btn).closest('.media').addClass('solved-background');
            $('a.solved').remove();
            return true;
        })
        .fail(function (result) {
            console.error("Sikertelen volt a művelet.");
            console.error(result.responseText);
            return false;
        });
});
