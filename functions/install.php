<?php

// These are functions that get called when the plugin is installed for the first time. These are for setting up the database and handlers.

// Create the table to hold the API keys
function registration_install () {
   global $wpdb;

   $installed_ver = get_option( "register_db_version" );

  if( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name || $installed_ver != REGISTER_DB_VERSION ) {

    // Create tables
    $tool_sql            = build_tools_sql();
    $school_sql          = build_school_sql();
    $domain_sql          = build_domains_sql();

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    // Run the sql for the database
    dbDelta( $tool_sql           );
    dbDelta( $school_sql         );
    dbDelta( $domain_sql         );

    update_option( "register_db_version", REGISTER_DB_VERSION );
    // create_first_row();
  }
}

// End of Install functions
