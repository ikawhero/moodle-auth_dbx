<?php

function xmldb_auth_dbx_install() {
    global $CFG, $DB;

    // upgrade from 1.9.x, introducing version.php

    // remove cached passwords, we do not need them for this plugin, but only if internal
    $type = get_config('auth/dbx', 'passtype');
    if ($type and $type !== 'internal') {
        $DB->set_field('user', 'password', 'not cached', array('auth'=>'dbx'));
    }

}
