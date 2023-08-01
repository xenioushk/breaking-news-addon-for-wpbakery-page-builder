jQuery(document).ready(function ($) {
  $(function () {
    function _bnm_hidden_field() {
      $(".inline").val("").val(1)
    }

    setTimeout(function () {
      $("span[data-vc-ui-element=button-save]").on("click", function () {
        _bnm_hidden_field()
      })
    }, 0)
  })
})
