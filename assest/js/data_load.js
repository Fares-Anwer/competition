$(document).ready(function () {
  // getevents Function Code Starts

  function getevents() {
    // Manufacturers Code Starts

    var sPath = "";

    var aInputs = $("li").find(".get_manufacturer");

    var aKeys = Array();

    var aValues = Array();

    iKey = 0;

    $.each(aInputs, function (key, oInput) {
      if (oInput.checked) {
        aKeys[iKey] = oInput.value;
      }

      iKey++;
    });

    if (aKeys.length > 0) {
      var sPath = "";

      for (var i = 0; i < aKeys.length; i++) {
        sPath = sPath + "man[]=" + aKeys[i] + "&";
      }
    }

    // Manufacturers Code ENDS

    // events Categories Code Starts

    var aInputs = Array();

    var aInputs = $("li").find(".get_p_cat");

    var aKeys = Array();

    var aValues = Array();

    iKey = 0;

    $.each(aInputs, function (key, oInput) {
      if (oInput.checked) {
        aKeys[iKey] = oInput.value;
      }

      iKey++;
    });

    if (aKeys.length > 0) {
      for (var i = 0; i < aKeys.length; i++) {
        sPath = sPath + "p_cat[]=" + aKeys[i] + "&";
      }
    }

    // events Categories Code ENDS

    // Categories Code Starts

    var aInputs = Array();

    var aInputs = $("li").find(".get_cat");

    var aKeys = Array();

    var aValues = Array();

    iKey = 0;

    $.each(aInputs, function (key, oInput) {
      if (oInput.checked) {
        aKeys[iKey] = oInput.value;
      }

      iKey++;
    });

    if (aKeys.length > 0) {
      for (var i = 0; i < aKeys.length; i++) {
        sPath = sPath + "cat[]=" + aKeys[i] + "&";
      }
    }

    // Categories Code ENDS

    // Loader Code Starts

    $("#wait").html('<img src="assets/images/loader.gif">');

    // Loader Code ENDS

    // ajax Code Starts

    $.ajax({
      url: "load.php",

      method: "POST",

      data: sPath + "sAction=getevents",

      success: function (data) {
        $("#events").html("");

        $("#events").html(data);

        $("#wait").empty();
      },
    });

    $.ajax({
      url: "load.php",
      method: "POST",
      data: sPath + "sAction=getPaginator",
      success: function (data) {
        $(".pagination").html("");
        $(".pagination").html(data);
      },
    });

    // ajax Code Ends
  }

  // getevents Function Code Ends

  $(".get_manufacturer").click(function () {
    getevents();
  });

  $(".get_p_cat").click(function () {
    getevents();
  });

  $(".get_cat").click(function () {
    getevents();
  });
});
