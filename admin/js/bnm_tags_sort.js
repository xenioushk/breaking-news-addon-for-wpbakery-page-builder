jQuery(document).ready(function ($) {
  $(function () {
    function _bkb_tags_lists() {
      var output = ""
      var count = 0
      $(".bnm_tags")
        .find("li")
        .each(function () {
          output += $(this).data("value") + ","
          count++
        })

      if (count > 0) {
        output = output.substr(0, output.length - 1)
      }

      $(".bnm_tags").val("").val(output)
    }

    setTimeout(function () {
      $("span[data-vc-ui-element=button-save]").on("click", function () {
        _bkb_tags_lists()
      })
    }, 0)

    $("#sortable1, #sortable2")
      .sortable({
        connectWith: ".connectedSortable",
      })
      .disableSelection()
  })
})

//[bkb_category categories="affiliate,blank,copyright"]
//[bkb_category categories="introduction,resources,requirements,affiliate,copyright,license,misc" cols="1" /]
