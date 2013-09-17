(function() {
    $('select.option').each(function () {
        var title = ($('option:selected', this).val() !== '') ? $('option:selected', this).text() : $(this).attr('title');
       $(this).css({ 'z-index': 10, 'opacity': 0, '-khtml-appearance': 'none' }).after('<span class="option">' + title + '</span>')
              .change(function(){
                val = $('option:selected', this).text();
                $(this).next().text(val);
            });
    });
}());
