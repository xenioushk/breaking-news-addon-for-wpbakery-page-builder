jQuery(document).ready(function ($) {
  $(function () {
    function _bnm_cat_lists() {
      var output = ""
      var count = 0
      $(".bnm_cat")
        .find("li")
        .each(function () {
          output += $(this).data("value") + ","
          count++
        })

      if (count > 0) {
        output = output.substr(0, output.length - 1)
      }

      $(".bnm_cat").val("").val(output)
    }

    setTimeout(function () {
      $("span[data-vc-ui-element=button-save]").on("click", function () {
        _bnm_cat_lists()
      })
    }, 0)

    $("#sortable1, #sortable2")
      .sortable({
        connectWith: ".connectedSortable",
      })
      .disableSelection()
  })
})

//[bnm_category categories="affiliate,blank,copyright"]
//[bnm_category categories="introduction,resources,requirements,affiliate,copyright,license,misc" cols="1" /]
