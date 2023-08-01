;(function ($) {
  function bnm_vc_installation_counter() {
    return $.ajax({
      type: "POST",
      url: ajaxurl,
      data: {
        action: "bnm_vc_installation_counter", // this is the name of our WP AJAX function that we'll set up next
        product_id: BnmVcAdminData.product_id, // change the localization variable.
      },
      dataType: "JSON",
    })
  }

  if (typeof BnmVcAdminData.installation != "undefined" && BnmVcAdminData.installation != 1) {
    $.when(bnm_vc_installation_counter()).done(function (response_data) {
      // console.log(response_data)
    })
  }
})(jQuery)
