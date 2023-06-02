<?php
function generate_uuid_v4($type) {
    return sprintf('%s%03x%04x-%04x-%04x-%04x-%04x%04x%04x',
        $type,
        mt_rand(0, 0xfff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}
?>