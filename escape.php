<?php

// TODO: Make this something in lib so it's not exposed
// include 'validate.php';

function ensure_post()
{
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header("Location: /cheat.html");
    exit;
  }
}

function validate($input, $answer, $next, $stage)
{
  $input = strtolower(htmlspecialchars(stripslashes(trim($input))));
  if (!in_array($input, $answer)) {
    $output = [
      'correct' => false,
      'next' => '',
      'stage' => '',
      'redirect' => false,
    ];
    echo json_encode($output);
  } else {
    $output = [
      'correct' => true,
      // TODO: get a valid redirect url
      'next' => $next,
      'stage' => $stage,
      'redirect' => $stage == "end",
    ];
    echo json_encode($output);
  }
}

ensure_post();

$second = <<<SECOND

<div class="second">
    <div class="col">
      <h2>Jonah's Prayer</h2>
      <p>
      Now the Lord provided a huge fish to swallow Jonah, and Jonah was in the belly of the fish three days and three nights. And the Lordcommanded the fish, and it vomited Jonah onto dry land. Jonah, however, was stuck and needed a ride, so he sends a message in a bottle back into the sea.
      </p>

      <div class="do">
        <p>Find the town which Jonah is stranded in.</p>
      </div>
    </div>

      <div class="col">
      <a href="images/puzzle2.jpg" target="blank_"><img src="images/puzzle2.jpg" alt="second puzzle" /></a>
        <div>
      <a href="images/puzzle2.jpg" target="blank_">Click to enlarge</a>
      </div>
      </div>
    </div>

  </div>

SECOND;

// DOM for third puzzle goes here
$third = <<<THIRD

<div class="third">
    <div class="col">
      <h2>Jonah Goes to Nineveh</h2>
      <p>Jonah began by going a day’s journey into the city, proclaiming, “Forty more
      days and Nineveh will be overthrown.” Unfortunately, the megaphone he used
      didn't work the way he thought it would, and he ended up saying something
      completely different. Try and decipher Jonah's true message.</p>

      <audio controls> <source src="phase3-audio.wav" type="audio/wav"> </audio>
      <div>
        <a href="phase3-audio.wav" download>Download Mysterious Audio Here</a>
    </div>
    </div>

    <div class="col">
      <p>You may find these excerpts in the megaphone's instruction manual useful:</p>

      <div class="manual">
        <p>by the decree of king and his nobles do not let people animals taste anything
      eat drink but be covered with sackcloth call urgently on God</p>

      <p>nobles covered covered eat be :// but the . his on / drink people people and but urgently</p>
    </div>
  </div>

THIRD;

// Can make this a redirect if we want
$end = "end.html";

// TODO: Let's not use a switch and use a dict if we can
switch ($_POST['puzzle']) {
  case "flight":
    validate($_POST['answer'], array("tajsdsp"), $second, "fish");
    break;
  case "fish":
    validate($_POST['answer'], array("malabo"), $third, "megaphone");
    break;
  case "megaphone";
    validate($_POST['answer'], array("jonah 4:11", "jonah4:11", "jon4:11", "jon 4:11", "jnh 4:11", "jnh4:11"), $end, "end");
    break;
  default:
    http_response_code(400);
    exit;
}
