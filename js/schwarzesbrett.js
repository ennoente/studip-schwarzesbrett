(function ($, STUDIP) {
    var GetURL = (function () {
        var URL = 'plugins.php/schwarzesbrettplugin/ajaxdispatch';
        return function (parameters) {
            return STUDIP.URLHelper.getURL(URL, parameters);
        };
    }());

    window.showArtikel = function (id, typ) {
        var url = GetURL({objid: id});

        typ = typ || '';

        $.get(url, function(response) {
            $('#content' + typ + '_' + id).html(response).slideDown();
            $('#headline' + typ + '_' + id).hide();

            if (typ != '') {
                $('#close_' + id).click(function () {
                    window.closeArtikel(id, 'l');
                });
            }
        });
    }

    window.closeArtikel = function (id, typ) {
        typ = typ || '';

        $('#content' + typ + '_' + id).hide();
        $('#headline' + typ + '_' + id).show();
        $('#indikator_' + id).attr('src', STUDIP.ASSETS_URL + 'images/icons/16/blue/arr_1right.png');
    }

    window.toggleThema = function (id) {
        if ($('#list_' + id).is(':hidden')) {
            var url = GetURL({thema_id: id})
            $.get(url, function(response) {
                $('#list_'+id).html(response).slideDown();
            });
        } else {
            $('#list_' + id).slideUp();
        }
        $('#show_' + id).toggle();
        $('#hide_' + id).toggle();
    }

}(jQuery, STUDIP));

