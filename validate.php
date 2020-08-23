<?php
function ensure_post() {
    if($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        exit;
    }
}

function validate($input, $answer, $next) {
    $input = htmlspecialchars(stripslashes(trim($input)));
    if($input !== $answer) {
        $output = [
            'correct' => false,
            'next' => '',
        ];
        echo json_encode($output);
    } else {
        $output = [
            'correct' => true,
            // TODO: get a valid redirect url
            'next' => $next,
        ];
        echo json_encode($output);
    }
}
?>
