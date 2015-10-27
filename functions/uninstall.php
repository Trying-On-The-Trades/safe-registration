<?php

// Uninstall functions to clean up the database if the plugin is removed

function registration_uninstall() {
  global $wpdb;

  // Get all the table names
  $domain_table_name          = get_domain_table_name();
  $tool_table_name            = get_tool_table_name();

  // Drop all the tables
  $wpdb->query( "DROP TABLE IF EXISTS $domain_table_name" );
  $wpdb->query( "DROP TABLE IF EXISTS $tool_table_name" );

  echo "bbbbbbbbb";

  // Update the db version to 0 so the next time the plugin is run it will reinstall
  update_option( "register_db_version", REGISTER_DB_VERSION );
}

// Hook is commented out so we don't lose data for now
register_uninstall_hook( __FILE__, 'registration_uninstall' );

// End of Uninstall