/* java script stuff idk */

// Yeah, I know this is jank
// But looking at this probably won't help you

$(document).ready(function () {
  console.log("Welcome to the Escape Room!");

  $("#answer-form").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "escape.php",
      data: $("#answer-form").serialize(),
      success: function (d) {
        // console.log(d);
        data = JSON.parse(d);
        if (data["correct"]) {
          // show a modal ??
          var rightModal = document.getElementById("rightModal");
          rightModal.style.display = "block";
          // if they click the next button
          $("#next").on("submit", function (e) {
            e.preventDefault();
            rightModal.style.display = "none";
            document.getElementById("answer").value = ""
            document.getElementById("puzzle").innerHTML = data["next"];
            document.getElementById("puzzle-stage").value =  data["stage"];
          });
        } else {
          var wrongModal = document.getElementById("wrongModal");
          wrongModal.style.display = "block";
        }
      },
    });
  });
});

function hide() {
  console.log("hiding modal content");
  document.getElementById("wrongModal").style.display = "none";
}
