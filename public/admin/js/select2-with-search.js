$(document).ready(function() {
    $('.js-example-basic-single').select2({
        placeholder: 'Выберите товар ...',
        allowClear: true,
        width: '100%',
        templateResult: formatState
      });
});

function formatState (state) {
    if (!state.id) {
      return state.text;
    }
    var baseUrl = "D:/OpenServer_543/domains/blog/public/admin/images";
    var $state = $(
    //   '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
    // '<span><img src="' + baseUrl + '/' + 48531_01_200_200 + '.jpg" class="img-flag" /> ' + state.text + '</span>'
    '<span><img src="' + baseUrl + '/' + 'logo' + '.png" class="img-flag" /> ' + state.text + '</span>'

    );
    return $state;
  };