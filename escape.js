/* java script stuff idk */

$(document).ready(function () {
  console.log("testing");

  $("#answer").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "escape.php",
      data: $("#answer").serialize(),
      success: function (d) {
        data = JSON.parse(d);
        if (data["correct"]) {
          document.getElementById("puzzle").innerHTML = data["next"];
        } else {
          // show a modal ??
          var wrongModal = document.getElementById("wrongModal");
          wrongModal.style.display = "block";
        }
      },
    });
  });
});
