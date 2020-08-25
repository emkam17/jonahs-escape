<?php

// TODO: Make this something in lib so it's not exposed
include 'validate.php';

ensure_post();

$second = <<<SECOND
  
<div class="second">
  <p>
    Now the Lord provided a huge fish to swallow Jonah, and Jonah was in the
    belly of the fish three days and three nights. From the fish's belly, he
    sent out a weird message in a bottle. Decipher his message.
  </p>

  <ul>
    <li>
      And the Lord commanded the fish, and it vomited Jonah onto dry land.
    </li>
    <li>.</li>
    <li>From inside the fish Jonah prayed to the Lord his God.</li>
    <li>
      You hurled me into the depths, into the very heart of the seas, and
      the currents swirled about me; all your waves and breakers swept over
      me.
    </li>
    <li>
      He said: “In my distress I called to the Lord, and he answered me.
      From deep in the realm of the dead I called for help, and you listened
      to my cry.
    </li>
    <li>,</li>
    <li>
      You hurled me into the depths, into the very heart of the seas, and
      the currents swirled about me; all your waves and breakers swept over
      me.
    </li>
    <li>.</li>
    <li>
      But I, with shouts of grateful praise, will sacrifice to you. What I
      have vowed I will make good. I will say, ‘Salvation comes from the
      Lord.’ ”
    </li>
    <li>
      To the roots of the mountains I sank down; the earth beneath barred me
      in forever. But you, Lord my God, brought my life up from the pit.
    </li>
    <li>
      “Those who cling to worthless idols turn away from God’s love for
      them.
    </li>
  </ul>

  <div class="another_num">
      <form id="answer">
        <label>Answer!</label>
        <input type="text" id="answer" name="answer" />
        <input type="hidden" id="puzzle" name="puzzle" value="flight"/>
        <input type="submit" value="submit" />
      </form>
    </div>
</div>

SECOND;

// DOM for third puzzle goes here
$third = <<<THIRD
<div class="third">
  <div class="col">
    <p>Jonah began by going a day’s journey into the city, proclaiming, “Forty more
    days and Nineveh will be overthrown.” Unfortunately, the megaphone he used
    didn't work the way he thought it would, and he ended up saying something
    completely different. Try and decipher Jonah's true message.</p>

    <audio controls <source src="phase3-audio.wav" type="audio/wav"> </audio>
    <a href="phase3-audio.wav" download>Download Mysterious Audio</a>
  </div>

  <div class="col">
    <p>You may find these excerpts in the megaphone's instruction manual useful:</p>

    <p>by the decree of king and his nobles do not let people animals taste anything
    eat drink but be covered with sackcloth call urgently on God</p> 

    <p>nobles covered covered eat be :// but the . his on / drink people people and but urgently</p>

    <div class="verse">
      <form id="answer">
        <label>Answer!</label>
        <input type="text" id="answer" name="answer" />
        <input type="hidden" id="puzzle" name="puzzle" value="flight"/>
        <input type="submit" value="submit" />
      </form>
    </div>

  </div>
</div>
THIRD;

// TODO: Let's not use a switch and use a dict if we can
switch ($_POST['puzzle']) {
  case "flight":
    validate($_POST['answer'], "TAJSDSP", $second);
    break;
  case "fish":
    validate($_POST['answer'], "hmm", $third);
    break;
  default:
    http_response_code(400);
    exit;
}
